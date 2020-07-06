<?php

namespace App\Http\Controllers;

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
        $settiing = Setting::first();

        return view('site.home.index', [
            'setting' => $settiing
        ]);
    }

}
