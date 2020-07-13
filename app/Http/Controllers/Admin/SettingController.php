<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Setting::all()->count() == 0){
            Setting::create();
        }
        $sets = Setting::all()->first();
        return view('admin.settings.index',compact('sets'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $data = $request->except('_token','_method');
        $data['is_closed'] = $request->has('is_closed') ? 1 : 0;
        $data['can_register'] = $request->has('can_register') ? 1 : 0;
//        $data['is_closed'] = $request->has('is_closed') ? 1 : 0;

        $setting->update($data);
        if($request->hasFile('logo1')){
            $logo = Storage::disk('public')->putFile('logos',$request->file('logo1'));
            $setting->logo = $logo;
            $setting->save();
        }
        if($request->hasFile('icon1')){
            $icon = Storage::disk('public')->putFileAS('',$request->file('icon1'),'favicon.ico');
            $setting->icon = $icon;
            $setting->save();
        }
        return Redirect::route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
