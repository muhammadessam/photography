<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        if (\request('status'))
            $orders = $orders->where('status', \request('status'));
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create');
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
            'customer_id' => ['required', 'exists:customers,id'],
            'cat_id' => ['required', 'exists:categories,id'],
            'status' => ['required', Rule::in(['waiting', 'accepted', 'billed', 'final', 'rejected'])],
            'address' => ['required'],
            'date' => ['required'],
            'is_special' => ['required'],
            'is_right_print' => ['required'],
            'is_on_our_page' => ['required'],
        ], [], [
            'customer_id' => 'اسم العميل',
            'cat_id' => 'القسم',
            'status' => 'الحالة',
            'address' => 'العنوان',
            'date' => 'التاريخ والوقت',
            'is_special' => 'هل المناسبة خاصة',
            'is_right_print' => 'هل نضع حقوقنا علي التصميم',
            'is_on_our_page' => 'وضع الصور علي صفحاتنا',
        ]);
        Order::create($request->all());
        toast('تم', 'success')->position('bottom-start');
        return redirect()->route('admin.orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'cat_id' => ['required', 'exists:categories,id'],
            'status' => ['required', Rule::in(['waiting', 'accepted', 'billed', 'final', 'rejected'])],
            'address' => ['required'],
            'date' => ['required'],
            'is_special' => ['required'],
            'is_right_print' => ['required'],
            'is_on_our_page' => ['required'],
        ], [], [
            'customer_id' => 'اسم العميل',
            'cat_id' => 'القسم',
            'status' => 'الحالة',
            'address' => 'العنوان',
            'date' => 'التاريخ والوقت',
            'is_special' => 'هل المناسبة خاصة',
            'is_right_print' => 'هل نضع حقوقنا علي التصميم',
            'is_on_our_page' => 'وضع الصور علي صفحاتنا',
        ]);
        $order->update($request->all());
        toast('تم', 'success')->position('bottom-start');
        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        toast('تم الحذف', 'success')->position('bottom-start');
        return redirect()->back();
    }

    public function addEmployee(Request $request, Order $order)
    {
        $request->validate(['employee_id' => 'required']);
        $order->employees()->syncWithoutDetaching($request['employee_id']);
        toast('تم', 'success')->position('bottom-start');
        return redirect()->back();
    }

    public function removeEmployee(Request $request, Order $order, Employee $employee)
    {
        $order->employees()->detach($employee);
        toast('تم', 'success')->position('bottom-start');
        return redirect()->back();
    }

    public function comments(Order $order){
        return view('admin.orders.comments',compact('order'));
    }


    public function starEmployee(Request $request, Order $order, Employee $employee)
    {
        $request->validate([
            'star' => 'required|numeric|max:5|min:1'
        ]);
        $employee->orders()->find($order)->pivot->update([
            'stars' => $request['star']
        ]);
        $this->actionDoneSuccessfully();
        return redirect()->back();
    }
}
