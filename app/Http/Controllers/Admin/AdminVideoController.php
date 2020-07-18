<?php

namespace App\Http\Controllers\Admin;


use App\AdminVideo;
use App\Http\Controllers\Controller;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['cat_id'])){
            $videos = AdminVideo::where('cat_id',$_GET['cat_id'])->paginate(10);
        }else{
            $videos = AdminVideo::paginate(10);
        }
        return view('admin.videos.index',compact('videos'));
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
        $data = $request->only('video','title','cat_id');
        if ($request->hasFile('local')){
            $data['local']  =   Storage::disk('public')->put('storage/uploads/videos',$request->file('local'));
        }
        AdminVideo::create($data);
        alert('','تم الاضافة بنجاح','success');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminVideo  $adminVideo
     * @return \Illuminate\Http\Response
     */
    public function show(AdminVideo $adminVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminVideo  $adminVideo
     * @return \Illuminate\Http\Response
     */
    public function edit($adminVideo)
    {
        $video = AdminVideo::find($adminVideo);
        return view('admin.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminVideo  $adminVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $adminVideo)
    {
        $video = AdminVideo::find($adminVideo);
        $data = $request->only('video','title','cat_id');
        if ($request->hasFile('local')){
            $data['local']  =   Storage::disk('public')->put('storage/uploads/videos',$request->file('local'));
        }
        $video->update($data);
        alert('','تم','success');
        return \redirect()->route('admin.videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminVideo  $adminVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($adminVideo)
    {
        $ad = AdminVideo::find($adminVideo);
        $ad->delete();
        alert('','تم الحذف بنجاح','success');
        return Redirect::back();
    }
}
