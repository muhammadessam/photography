<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.opinions.index');
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
        $request->validate([
           'body'   =>  'required'
        ]);
        if (auth()->guard('admin')->check()){
            Opinion::query()->create([
                'body'          =>  $request->get('body'),
                'customer_id'   =>  $request->get('customer_id')
            ]);
        }else{
            Opinion::query()->create([
                'body'          =>  $request->get('body'),
                'customer_id'   =>  auth()->user()->customer->id
            ]);
        }
        alert('','تم الارسال','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinion $opinion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        $opinion->delete();
        alert('','تم الحذف','success');
        return redirect()->back();
    }
}
