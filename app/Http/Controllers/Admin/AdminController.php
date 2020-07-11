<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admins.index');
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->only('name','email'));
        if ($request->get('password') != "same"){
            $admin->update([
                'password'  =>  Hash::make($request->get('password'))
            ]);
        }
        alert('','تم التعديل','success');
        return redirect()->route('admin.admins.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        alert('','تم الحذف','success');
        return Redirect::back();
    }
    public function permissions(Admin $admin){
        if($admin->permissions == null){
            $admin->permissions()->save(new Permission());
        }
        $permissions = $admin->permissions;
        return view('admin.permissions.index',compact('permissions','admin'));
    }
    public function updatePerms(Request $request ,Admin $admin){
        $admin->permissions->update($request->except('_token'));
        alert('','تم التعديل','success');
        return Redirect::route('admin.admins.index');
    }
}
