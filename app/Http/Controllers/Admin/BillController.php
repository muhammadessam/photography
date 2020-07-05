<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\Notification;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bills.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bills.create');
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
            'customer_id' => ['required', 'exists:customers,id', 'numeric'],
            'order_id' => ['required', 'exists:orders,id', 'numeric'],
            'cat_id' => ['required', 'exists:categories,id', 'numeric'],
            'price' => ['required', 'numeric'],
            'status' => ['required'],
            'remains' => ['required_if:status,متبقي'],
        ], [], [
            'price' => 'الملبغ',
            'customer_id' => 'العميل',
            'order_id' => 'الطلب',
            'cat_id' => 'القسم',
            'status' => 'الحالة',
            'remains' => 'الباقي',
        ]);
        $order = Order::find($request->get('order_id'));
        $user = $order->customer->user;
        Notification::query()->create([
            'body'      =>  'لقد تم اصدار فاتورة جديدة علي طلب لك',
            'user_id'   =>  $user->id,
        ]);
        Bill::create($request->all());
        $this->actionDoneSuccessfully();
        return redirect()->route('admin.bills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Bill $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return view('admin.bills.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Bill $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return view('admin.bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Bill $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $request->validate([
            'customer_id' => ['required', 'exists:customers,id', 'numeric'],
            'order_id' => ['required', 'exists:orders,id', 'numeric'],
            'cat_id' => ['required', 'exists:categories,id', 'numeric'],
            'price' => ['required', 'numeric'],
            'status' => ['required'],
            'remains' => ['required_if:status,متبقي'],
        ], [], [
            'price' => 'الملبغ',
            'customer_id' => 'العميل',
            'order_id' => 'الطلب',
            'cat_id' => 'القسم',
            'status' => 'الحالة',
            'remains' => 'الباقي',
        ]);
        $bill->update($request->all());
        $this->actionDoneSuccessfully();
        return redirect()->route('admin.bills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Bill $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
        $this->actionDoneSuccessfully();
        return redirect()->back();
    }


    public function createOrderBill(Request $request, Order $order)
    {
        return view('admin.bills.create', compact('order'));
    }

}
