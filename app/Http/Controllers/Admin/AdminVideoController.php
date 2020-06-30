<?php

namespace App\Http\Controllers\Admin;

use App\AdminVideo;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminVideoController extends Controller
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

        AdminVideo::create($request->only('video'));
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
    public function edit(AdminVideo $adminVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminVideo  $adminVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminVideo $adminVideo)
    {
        //
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
