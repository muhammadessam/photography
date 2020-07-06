<?php

namespace App\Http\Controllers;

use App\AdminImage;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = AdminImage::all();

        return view('site.gallery.images.index', [
            'images' => $images,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = AdminImage::find($id);

        // return 404 if image is not found
        if (! $image) {
            abort(404);
        }
        
        $image->addView();

        return view('site.gallery.images.show', [
            'image' => $image,
        ]);
    }

}
