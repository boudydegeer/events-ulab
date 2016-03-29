<?php

namespace App\Event;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed user_id
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

}
