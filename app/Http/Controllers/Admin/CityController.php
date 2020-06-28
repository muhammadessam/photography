<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'name' => 'required',
        ], [
            'name.required' => 'هذا الحقل مطلوب'
        ]);
        $country = Country::find($request['country_id']);
        $country->cities()->create($request->all());
        $this->actionDoneSuccessfully();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $city->update($request->all());
        $this->actionDoneSuccessfully();
        return redirect()->route('admin.country.show', $city->country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        $this->actionDoneSuccessfully();
        return redirect()->back();
    }
}
