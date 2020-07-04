<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $req)
    {
        $orders = auth()->user()
                        ->orders()
                        ->with('category', 'city')
                        ->get();

        return view('site.account.orders.index', [
            'orders' => $orders,
        ]);
    }
}
