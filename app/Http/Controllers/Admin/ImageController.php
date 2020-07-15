<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use App\Not;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $img = Storage::disk('public')->putFile('images',$image);
                Image::create([
                    'image'     =>$img,
                    'order_id'  =>$request->get('order_id'),
                ]);
            }
            $order = Order::find($request->get('order_id'));
            $user = $order->customer->user;
            Not::query()->create([
                'body'      =>  'لقد تم اضافة صورة جديدة لمناسبة لك',
                'user_id'   =>  $user->id,
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
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Image $image)
    {
        $image->delete();
        alert('','تم الحذف بنجاح','success');
        return Redirect::back();
    }
}
