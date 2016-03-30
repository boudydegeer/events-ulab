<?php

namespace App\Http\Requests;

use App\Event\Event;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Gate;

class UpdateEventForm extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$event = $this->route('events');

		return Gate::allows('update', $event);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'       => 'required|min:4',
			'description' => 'required|min:20',

			// Tickets Validation
			'tickets.*.amount' => 'integer|between:0,100',
			'tickets.*.price' => 'integer|between:0,1000',
			'tickets.*.discount' => 'integer|between:0,100',
			'tickets.*.code' => 'required_with:tickets.*.discount',
		];
	}

	public function save()
	{
		$event = $this->route('events');
		
		$event->update(
			$this->except('tickets')
		);

		return $event;
	}
}
