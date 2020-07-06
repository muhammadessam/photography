<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'msg' => 'required',
        ], [],
        [
            'name' => 'الإسم',
            'phone' => 'الهاتف',
            'email' => 'بريد الإلكتروني',
            'msg' => 'الرسالة',
        ]
        );

        Contact::create($req->all());

        return redirect(route('home').'#contact-form')->withMsg('سوف تقوم الادارة بالتواصل معكم', 'تم الارسال');;
    }
}
