<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderAcceptedController extends Controller
{
    public function index(Request $req) {
        return view('site.account.orders.order-accepted.index');
    }
}
