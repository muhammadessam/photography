<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Service;
use App\Setting;

class HomeController extends Controller
{

    /**
     * Show the landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = Setting::first();
        $orders = Order::all();
        $clientCount = Customer::count();
        $services = Service::all();

        return view('site.home.index', [
            'setting' => $setting,
            'orders' => $orders,
            'clientCount' => $clientCount,
            'services' => $services,
        ]);
    }

}
