<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\AdminImage;
use App\AdminVideo;
use App\Image;
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
        $services = Service::all();
        $achievements = Achievement::all();
        $images = AdminImage::all();
        $videos = AdminVideo::all();

        return view('site.home.index', [
            'setting' => $setting,
            'services' => $services,
            'achievements' => $achievements,
            'images' => $images,
            'videos' => $videos,
        ]);
    }

}
