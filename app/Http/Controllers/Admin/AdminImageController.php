<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AdminImage;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
            $image = Image::make($request->file('image'));
            $logo = Image::make(public_path(Setting::first()->logo))->opacity(50)->resize(100,100);
            $logo->save(public_path('logos/watermark.png'));
            $image->insert(public_path('logos/watermark.png'), 'bottom-right', 10, 10);
            $new_name = 'images/'.time().'.'.$request->file('image')->extension();
            $image->save(public_path($new_name));
            AdminImage::create([
                'image'     =>  $new_name,
                'category_id'  =>$request->get('category_id'),
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
    public function destroy($adminImage)
    {
        $ai = AdminImage::find($adminImage);
        $ai->delete();
        alert('','تم الحذف بنجاح','success');
        return Redirect::back();
    }
}
