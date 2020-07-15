<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Contact;
use App\Not;
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
        foreach (Admin::all() as $admin){
            Not::query()->create([
                'body'      =>  'لقد تم ارسال رسالة تواصل معنا ',
                'user_id'   =>  $admin->id,
            ]);
        }
        return redirect(route('home').'#contact-form')->withMsg('سوف تقوم الادارة بالتواصل معكم', 'تم الارسال');;
    }
}
