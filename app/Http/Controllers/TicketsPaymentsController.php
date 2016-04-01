<?php

namespace App\Http\Controllers;

use App\Coupons\Coupon;
use App\Event\Event;
use App\Event\Ticket;
use App\Http\Requests\CreateTicketPaymentForm;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe;

class TicketsPaymentsController extends Controller
{
	/**
	 * @param Event                   $event
	 * @param Ticket                  $ticket
	 * @param CreateTicketPaymentForm $request
	 */
	public function store(Event $event, Ticket $ticket, CreateTicketPaymentForm $request)
	{
		if ($request->has('coupon') &&
		    $coupon = Coupon::where('code', $request->get('coupon'))->first()
		) {
			$ticket->applyDiscount($coupon->discount);
		}

			// Create Customer
		$user = User::create([
			'email'    => $request->get('email'),
			'password' => Hash::make(str_random(8))
		]);

		if (!$user->hasStripeId()) {
			$user->createAsStripeCustomer($request->get('stripe_token'), [
				"metadata" => [
					'name'     => $request->get('name'),
					'lastname' => $request->get('lastname'),
					'phone'    => $request->get('phone'),
				]
			]);
		}
		
		// Try to charge
		$charge = $user->charge($ticket->priceWithDiscount(), [
			'description' => $event->title
		]);

		// Save Ticket payment
		if ($charge) {
			$ticket->payments()->create(
				array_merge($request->all(), [
					"stripe_id" => $charge->id,
					"paid"      => true,
					"code"      => $request->get('coupon')
				])
			);
		}
		
		// Send Email
		
		// Response
		
		return redirect()->route('home', ['events' => $event->slug])->with([
			'status' => 'payment-done',
			'user' => $user
		]);
	}
}
