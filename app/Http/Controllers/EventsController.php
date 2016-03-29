<?php

namespace App\Http\Controllers;

use App\Event\Event;
use App\Http\Requests\CreateEventForm;
use App\Http\Requests\UpdateEventForm;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventsController extends Controller
{
	/*
	 * Build up the EventsController instance
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}

	/**
	 * List the entity objects
	 */
	public function index(){}


	/**
	 * Shows the entity
	 *
	 * @param $event
	 */
	public function show(Event $event){
		dd($event);
	}

	/**
	 * Shows the create form for the entity
	 * @return mixed
	 */
	public function create()
	{
		return view("events.create");
	}

	/**
	 * Stores the entity to the DataBase
	 *
	 * @param CreateEventForm $request
	 *
	 * @return string
	 */
	public function store(CreateEventForm $request)
	{
		$event = $request->save();

		return redirect()->route('events.edit', [$event->id]);
	}

	/**
	 * Shows edit form of the entity
	 *
	 * @param $event
	 */
	public function edit(Event $event)
	{
		return view("events.edit", compact('event'));
	}

	/**
	 * Updates an entity to the database
	 *
	 * @param UpdateEventForm $request
	 *
	 */
	public function update(UpdateEventForm $request)
	{
		$event = $request->save();

		return redirect()->route("events.edit", [$event->id]);
	}

	/**
	 * Deletes an entity from the database
	 */
	public function destroy(){}
}
