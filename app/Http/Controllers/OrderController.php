<?php

namespace App\Http\Controllers;

use App\City;
use App\Order;
use App\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $req)
    {
        $orders = auth()->user()
                        ->orders()
                        ->with('category', 'city')
                        ->get();

        return view('site.account.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function showOrderCreationForm(Request $req)
    {
        $categories = Category::all();
        $cities = City::all();
        
        return view('site.account.orders.create', [
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => ['required', 'exists:categories,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'address' => ['required'],
            'date' => ['required'],
            'is_special' => ['required'],
            'is_right_print' => ['required'],
            'is_on_our_page' => ['required'],
        ], [], [
            'cat_id' => 'القسم',
            'address' => 'العنوان',
            'date' => 'التاريخ والوقت',
            'is_special' => 'هل المناسبة خاصة',
            'is_right_print' => 'هل نضع حقوقنا علي التصميم',
            'is_on_our_page' => 'وضع الصور علي صفحاتنا',
        ]);

        $data = $request->all();
        $data['customer_id'] = auth()->user()->customer->id;
        Order::create($data);

        return redirect()->route('account.orders')->withMsg('تم تلقي طلبك بنجاح');
    }
}
