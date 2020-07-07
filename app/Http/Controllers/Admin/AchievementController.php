<?php

namespace App\Http\Controllers\Admin;

use App\Achievement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = Achievement::all();

        return view('admin.achievements.index', [
            'achievements' => $achievements,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'number' => 'required',
            'icon' => 'required',
        ], [
            'name.required' => 'العنوان',
            'number.required' => 'الرقم',
            'icon.required' => 'الأيقونة',
        ]);

        Achievement::create($request->except('_token'));

        alert(('تم اضافة انجاز'));

        return redirect()->route('admin.achievements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $achievement = Achievement::find($id);

        return view('admin.achievements.edit', [
            'achievement' => $achievement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'number' => 'required',
            'icon' => 'required',
        ], [
            'name.required' => 'العنوان',
            'number.required' => 'الرقم',
            'icon.required' => 'الأيقونة',
        ]);

        $achievement = Achievement::find($id);

        $achievement->update($request->except('_token'));
        
        alert(('تم حفط تعديلاتك'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $achievement = Achievement::find($id);

        $achievement->delete();

        return redirect()->route('admin.achievements.index');
    }
}
