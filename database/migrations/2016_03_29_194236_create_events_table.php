<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('description');

			// Relations
			$table->integer('user_id')->unsigned()->nullable();;
			$table->foreign('user_id')
						->references('id')
						->on('users')
						->onDelete('cascade');

			// Status
			// $table->boolean('status');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}
}
