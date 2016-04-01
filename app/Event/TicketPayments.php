<?php

namespace App\Event;

use Illuminate\Database\Eloquent\Model;

class TicketPayments extends Model
{
	protected $fillable = ['name', 'lastname', 'email', 'phone', 'paid', 'stripe_id', 'ticket_id', 'code'];
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tickets()
	{
		return $this->belongsTo(Ticket::class);
	}
}
