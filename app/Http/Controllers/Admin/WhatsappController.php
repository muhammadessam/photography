<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhatsappController extends Controller
{
    public function index(Customer $customer){
        $phone = $customer->phone;
        return view('admin.whatsapp.index',compact('phone'));
    }
}
