<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }
    public function Activate(){
        $employees = Employee::all()->where('Statue','Activate');
        return view('admin.employees.index', compact('employees'));
    }
    public function Deactivate(){
        $employees = Employee::all()->where('Statue','Deactivate');
        return view('admin.employees.index', compact('employees'));
    }
    public function ChangeStatue(Employee $employee){
        if ($employee->Statue == "Activate"){
            $employee->Statue = "Deactivate";
            $employee->save();
        }else{
            $employee->Statue = "Activate";
            $employee->save();
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
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'exp' => 'required',
            'phone' => 'required',
            'cat_id' => 'required',
            'password'  =>  'required',
        ]);
        $emp = Employee::create($request->except('password'));
        $emp->password = Hash::make($request->get('password'));
        $emp->save();
        alert('', 'تم الانشاء', 'success');
        return Redirect::route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'exp' => 'required',
            'phone' => 'required',
            'cat_id' => 'required',
        ]);
        $employee->update($request->except('password'));
        if ($request->get('password') != "same"){
            $employee->password = Hash::make($request->get('password'));
            $employee->save();
        }
        alert('', 'تم التعديل', 'success');
        if(auth()->guard('employee')->check()){
            return  Redirect::route('employee.account');
        }else{
            return Redirect::route('admin.employees.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return Redirect::route('admin.employees.index');
    }

    public function removeOrder(Request $request, Employee $employee, Order $order)
    {
        $employee->orders()->detach($order);
        $this->actionDoneSuccessfully();
        return \redirect()->back();
    }
    public function orders(Employee $employee){
        $orders = $employee->orders;
        return view('admin.employees.orders',compact('orders'));
    }
    public function login(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('employee')->attempt($request->only('email', 'password'), $request->filled('remember'))) {

            return redirect()->route('employee.account');
        }
        return back()->withInput($request->only('email'));
    }

}
