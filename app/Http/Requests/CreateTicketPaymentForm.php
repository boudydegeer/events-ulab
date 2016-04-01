<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTicketPaymentForm extends Request
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
			"stripe_token" => 'required',
			'name'         => 'required',
			'lastname'     => 'required',
			'email'        => 'required|email|unique:users,email',
			'phone'        => 'required'
		];
	}

	/**
	 *
	 */
	public function save()
	{
		$ticket = $this->route('tickets');

		return $event;
	}
}
