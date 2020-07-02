<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\ReplyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.home.contact.index');
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'msg' => 'required',
        ], [
            'name.required' => 'هذا الحقل مطلوب',
            'phone.required' => 'هذا الحقل مطلوب',
            'email.required' => 'هذا الحقل مطلوب',
            'msg.required' => 'هذا الحقل مطلوب',
        ]);
        Contact::create($request->all());
        alert()->success('سوف تقوم الادارة بالتواصل معكم', 'تم الارسال');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        alert()->success('تم الحذف بنجاح', 'تم الحذف');
        return redirect()->back();
    }

    public function showReply(Request $request, Contact $contact)
    {
        return view('admin.contact.reply', compact('contact'));
    }

    public function sendReply(Request $request, Contact $contact)
    {
        $request->validate([
            'msg' => 'required',
        ], [
            'msg.required' => 'هذا الحقل مطلوب'
        ]);
        Mail::to($contact['email'])->send(new ReplyContact($request['msg']));
        alert()->success('البريد مرسل بنجاح', 'تم');
        return redirect()->route('contact.index');
    }
}

