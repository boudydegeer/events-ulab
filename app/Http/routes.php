<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Event\Event;

Route::get('/', function () {
	$events = Event::all();
	return view('welcome', compact('events'));
});

Route::get('/{slug}', [
	'as'   => 'home',
	'uses' => 'EventsController@show'
]);

Route::post('/{slug}/tickets/{tickets}/payment/', [
	'as'   => 'events.tickets.payments',
	'uses' => 'TicketsPaymentsController@store'
]);

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('events', 'EventsController');

Route::group(['namespace' => 'Api', 'prefix' => 'api'], function () {
	Route::get('coupons/{coupons}', ['as' => 'api.coupons.show', 'uses' => 'CouponsController@show']);
});

