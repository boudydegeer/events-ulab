<?php

namespace App;

use App\Event\Event;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed id
 */
class User extends Authenticatable
{
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
}
