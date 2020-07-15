<?php

namespace App\Http\Controllers;

use App\Admin;
use App\City;
use App\Not;
use App\Order;
use App\Category;
use App\Notifications\Admin\NewOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use ZipArchive;

class OrderController extends Controller
{
    public function index(Request $req)
    {
        if(auth()->guard('employee')->check()){
            $orders = auth()->guard('employee')->user()
                ->orders()
                ->with('category', 'city')
                ->withCount('images', 'videos')
                ->orderBy('created_at', 'desc')
                ->get();

        }else{

            $orders = auth()->user()
                ->orders()
                ->with('category', 'city')
                ->withCount('images', 'videos')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('site.account.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function show(Request $req, $id)
    {
        if(auth()->guard('employee')->check()){
            $order = auth()->guard('employee')->user()->orders()
                ->with('city', 'category', 'comments', 'bills', 'employees')
                ->find($id);

        }else{

            $order = auth()->user()->orders()
                ->with('city', 'category', 'comments', 'bills', 'employees')
                ->find($id);
        }

        // return 404 if order is not found
        if (! $order) {
            abort(404);
        }

        if($req->has('notif_id')){
            markNotificationAsRead($req->get('notif_id'));
        }

        return view('site.account.orders.show', [
            'order' => $order,
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
            'day' => ['required'],
            'date' => ['required'],
            'is_special' => ['required'],
            'is_right_print' => ['required'],
            'is_on_our_page' => ['required'],
        ], [], [
            'cat_id' => 'القسم',
            'address' => 'العنوان',
            'day' => 'اليوم',
            'date' => 'التاريخ والوقت',
            'is_special' => 'هل المناسبة خاصة',
            'is_right_print' => 'هل نضع حقوقنا علي التصميم',
            'is_on_our_page' => 'وضع الصور علي صفحاتنا',
        ]);

        $data = $request->all();
        $data['customer_id'] = auth()->user()->customer->id;
        $order = Order::create($data);
        foreach (Admin::all() as $admin) {
            Not::query()->create([
                'body' => 'لقد تم اضافة طلب مناسبة جديدة من عميل',
                'admin_id' => $admin->id,
            ]);
        }
        return redirect()->route('account.orders.show', ['id' => $order->id])->withMsg('تم تلقي طلبك بنجاح');
    }
    public function makeFinal(Order $order){
        $order->status = "final";
        $order->save();
        alert('','تم','success');
        return redirect()->back();
    }
    public function downloadAllImages(Order $order){
        $files = $order->images()->get();
        $zipname = 'كل الصور.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        foreach ($files as $file) {
            $zip->addFile($file->image);
        }
        $zip->close();
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);
    }
}
