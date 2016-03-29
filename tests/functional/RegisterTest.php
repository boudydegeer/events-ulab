<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
	  use DatabaseTransactions, DatabaseMigrations;

		/**
		 * My test implementation
		 * @test
		 */
		public function aNewUserCanRegister()
		{
				$this->visit('/register');
				$this->type('Foo Bar', 'name');
				$this->type('foo@bar.com', 'email');
				$this->type('P@ssw0rd', 'password');
				$this->type('P@ssw0rd', 'password_confirmation');
				$this->press('Register');
				$this->seePageIs('/');
				$this->visit('/home');
				$this->see('You are logged in!');
		}
}