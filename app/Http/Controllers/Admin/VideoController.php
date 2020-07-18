<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Not;
use App\Order;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.videos.index');
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
        $data = $request->only('order_id','video');
        if ($request->hasFile('local')){
            $data['local']  =   Storage::disk('public')->put('storage/uploads/videos',$request->file('local'));
        }
        Video::create($data);
        $order = Order::find($request->get('order_id'));
        $user = $order->customer->user;
        Not::query()->create([
            'body'      =>  'لقد تم اضافة فيديو جديد لمناسبة لك',
            'user_id'   =>  $user->id,
        ]);
        alert('','تم الاضافة بنجاح','success');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Video $video)
    {
        $video->delete();
        alert('','تم الحذف بنجاح','success');
        return Redirect::back();
    }
}
