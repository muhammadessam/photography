<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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
        ]);
        Employee::create($request->all());
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
        $employee->update($request->all());
        alert('', 'تم التعديل', 'success');
        return Redirect::route('admin.employees.index');
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
}
