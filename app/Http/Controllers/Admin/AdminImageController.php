<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AdminImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')){
            $img = Storage::disk('public')->putFile('images',$request->file('image'));
            AdminImage::create([
                'image'     =>$img,
            ]);
            alert('','تم الاضافة بنجاح','success');
            return Redirect::back();
        }else{
            alert('','يجب ان يكون الملف صورة','error');
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminImage  $adminImage
     * @return \Illuminate\Http\Response
     */
    public function show(AdminImage $adminImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminImage  $adminImage
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminImage $adminImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminImage  $adminImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminImage $adminImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminImage  $adminImage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AdminImage $adminImage)
    {
        $adminImage->delete();
        alert('','تم الحذف بنجاح','success');
        return Redirect::back();
    }
}
