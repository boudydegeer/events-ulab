<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('amount');
			$table->integer('available');
			$table->integer('price');
			$table->integer('discount');
			$table->string('code');

			// Relations
			$table->integer('event_id')->unsigned()->nullable();
			$table->foreign('event_id')
			      ->references('id')
			      ->on('events')
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
		Schema::drop('tickets');
	}
}
