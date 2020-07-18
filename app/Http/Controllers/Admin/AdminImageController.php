<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AdminImage;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\This;

class AdminImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['cat_id'])){
            $images = AdminImage::where('category_id',$_GET['cat_id'])->paginate(10);
        }else{
            $images = AdminImage::paginate(10);
        }
        return view('admin.images.index',compact('images'));
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
            $new_name = 'storage/uploads/images/'.time().'.'.$request->file('image')->extension();
            $image->save(public_path($new_name));
            AdminImage::create([
                'image'     =>  $new_name,
                'category_id'  =>$request->get('category_id'),
                'title'  =>$request->get('title'),
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
    public function edit($adminImage)
    {
        $image = AdminImage::find($adminImage);
        return view('admin.images.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminImage  $adminImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$adminImage)
    {
        $Aimage = AdminImage::find($adminImage);
        if ($request->hasFile('image')){
            $image = Image::make($request->file('image'));
            $logo = Image::make(public_path(Setting::first()->logo))->opacity(50)->resize(100,100);
            $logo->save(public_path('logos/watermark.png'));
            $image->insert(public_path('logos/watermark.png'), 'bottom-right', 10, 10);
            $new_name = 'storage/uploads/images/'.time().'.'.$request->file('image')->extension();
            $image->save(public_path($new_name));
            $Aimage->image = $new_name;
            $Aimage->save();
        }
        $Aimage->update($request->only('title','cat_id'));
        alert('','تم التعديل بنجاح','success');
        return Redirect::route('admin.images.index');
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
    public function deleteAll(Request $request,$table){
        $items = $request['images'];
        if (! empty($items)){
            foreach ($items as $i){
                DB::table("$table")->delete("$i");
            }
            alert('','تم الحذف','success');
        }else{
            alert('','يجب تحديد','error');
        }
        return \redirect()->back();
    }
}
