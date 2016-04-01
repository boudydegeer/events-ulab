<?php

namespace App\Event;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer id
 * @property string title
 * @property string slug
 * @property integer user_id
 */
class Event extends Model
{
	/**
	 * Fillable fields protects against mass assignment
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description'];

	/**
	 * @var int
	 */
	protected $vat = 0;


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * The tickets for this event
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}

	/**
	 * @return mixed
	 */
	public function ticket()
	{
		return $this->tickets()->first();
	}

	/**
	 * Returns the price for the event
	 * @param string $currency
	 *
	 * @return string
	 */
	public function price($currency = "€")
	{
		$rawPrice = $this->tickets()->first()->price;
		$price = $rawPrice / 100;

		$number = number_format($price, 2, '.', '');

		return $number . $currency;
	}

	/**
	 * Returns the VAT in % for the event price
	 */
	public function vat($sign = true)
	{
		$sign = $sign?'%':'';
		return $this->vat.$sign;
	}

	/**
	 * Returns the taxes for the event price
	 */
	public function taxes($currency = "€")
	{
		$rawPrice = $this->tickets()->first()->price;
		$price = ($this->vat * $rawPrice) / 100;

		$number = number_format($price, 2, '.', '');

		return $number . $currency;
	}

}
