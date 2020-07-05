<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    /**
     * Show the landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('site.home.index');
    }

}
