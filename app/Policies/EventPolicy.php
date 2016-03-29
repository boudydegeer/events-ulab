<?php

namespace App\Policies;

use App\Event\Event;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 */
	public function __construct()
	{

	}

	public function update(User $user, Event $event)
	{
		return $user->id === $event->user_id;
	}
}
