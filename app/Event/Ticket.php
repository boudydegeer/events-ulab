<?php

namespace App\Event;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed amount
 * @property mixed price
 */
class Ticket extends Model
{
	/**
	 * Fillable fields to protect against mass assignment
	 * @var array
	 */
	protected $fillable = ['amount', 'available', 'price', 'discount', 'code'];

	/**
	 * Discount to apply
	 * @var int
	 */
	protected $discount = 0;

	/**
	 * The event who that ticket belongs to
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function payments()
	{
		return $this->hasMany(TicketPayments::class, 'ticket_id', 'id');
	}

	public function applyDiscount( $discount = 0 )
	{
		$this->discount = $discount;
	}

	public function priceWithDiscount()
	{
		return $this->attributes['price'] * (1 - ($this->discount / 100));
	}
}
