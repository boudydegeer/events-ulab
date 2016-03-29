<?php

namespace App\Http\Requests;

use App\Event\Event;
use App\Http\Requests\Request;

class CreateEventForm extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|min:4',
			'description' => 'required|min:20'
		];
	}

	/**
	 * Persists Event to the database
	 * @return mixed
	 */
	public function save()
	{
		$event = $this->user()->events()->create( $this->all() );

		return $event;
	}
}
