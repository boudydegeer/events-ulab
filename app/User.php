<?php

namespace App;

use App\Event\Event;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

/**
 * @property integer id
 * @property string name
 * @property string email
 * @property string password
 */
class User extends Authenticatable
{
	use Billable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function events()
	{
		return $this->hasMany(Event::class);
	}

	/**
	 * Get the Stripe supported currency used by the entity.
	 *
	 * @return string
	 */
	public function preferredCurrency()
	{
		return 'eur';
	}
}
