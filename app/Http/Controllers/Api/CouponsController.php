<?php

namespace App\Http\Controllers\Api;

use App\Coupons\Coupon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
	public function show(Coupon $coupon)
	{
		return $coupon ? : abort(404);
	}
}
