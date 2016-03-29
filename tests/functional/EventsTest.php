<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventsTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * @test
	 */
	public function user_must_be_logged_in_to_create_an_event()
	{
		$this->visit('/events/create');
		$this->seePageIs('/login');
	}

	/**
	 * @test
	 */
	public function logged_user_can_create_new_post()
	{
		// Given
		$user = factory(App\User::class)->make();
		auth()->login($user);

		$this->visit('/events/create');
		$this->see('Create a new event');

		$this->type('This is my event', 'title');
		$this->type('This is going to be a really awesome event, the best one ever!', 'description');
		$this->press('Submit');

		$this->seePageIs("/events/1");
		$this->seeInDatabase('events', ['title' => 'This is my event']);
	}

}
