<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index',$customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      =>  'required',
            'email'     =>  'required',
            'password'  =>  'required',
            'phone'     =>  'required',
            'city'      =>  'required',
        ]);
        $data['password'] = Hash::make($request->get('password'));
        $user = User::create($data);
        $customer = new Customer();
        $customer->phone = $data['phone'];
        $customer->city = $data['city'];
        $user->customer()->save($customer);
        alert('','تم الانشاء','success');
        return Redirect::route('admin.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->user->update($request->only('name','email'));
        $customer->update($request->only('city','phone'));
        alert('','تم التعدبل','success');
        return Redirect::route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $customer)
    {
        $customer->delete();
        return Redirect::route('admin.customers.index');
    }
    public function orders(Customer $customer){
        return view('admin.customers.orders',compact('customer'));
    }
    public function videos(Customer $customer){
        return view('admin.customers.videos',compact('customer'));
    }
    public function images(Customer $customer){
        return view('admin.customers.images',compact('customer'));
    }
    public function bills(Customer $customer){
        return view('admin.customers.bills',compact('customer'));
    }
    public function export()
    {
        return Excel::download(new CustomersExport(), 'العملاء.xlsx');
    }
}
