<?php

namespace App\Event;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	/**
	 * Fillable fields to protect against mass assignment
	 * @var array
	 */
	protected $fillable = ['amount', 'available', 'price', 'discount', 'code'];

	/**
	 * The event who that ticket belongs to
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function event()
	{
		return $this->belongsTo(Event::class);
	}
}
