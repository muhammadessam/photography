<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
        $customers = Customer::paginate(10);
        return view('admin.customers.index',compact('customers'));
    }
    public function Activate(){
        $customers = Customer::where('statue','Activate')->paginate(10);
        return view('admin.customers.index',compact('customers'));
    }
    public function Deactivate(){
        $customers = Customer::where('statue','Deactivate')->paginate(10);
        return view('admin.customers.index',compact('customers'));
    }
    public function ChangeStatue(Customer $customer){
        if ($customer->statue == "Activate"){
            $customer->statue = "Deactivate";
            $customer->save();
        }else{
            $customer->statue = "Activate";
            $customer->save();
        }
        alert('','تم تغيير الحالة','success');
        return redirect()->back();
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
        if ($request->hasFile('image')){
            $customer->image = Storage::disk('public')->put('images',$request->file('image'));
        }
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
        if ($request->get('password') != "same"){
            $customer->user->password = Hash::make($request->get('password'));
            $customer->user->save();
        }
        if ($request->hasFile('image')){
            $customer->user->image = Storage::disk('public')->put('images',$request->file('image'));
            $customer->user->save();
        }
        alert('','تم التعدبل','success');
        if (auth()->check()){
            return \redirect()->route('account');
        }
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
