@extends('admin.layouts.layout')
@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{route('admin.showReplyForm', $contact)}}"> <i class="fa fa-send"></i></a>
                        <a class="btn btn-primary" href="{{route('contact.index')}}"> <i class="fa fa-list-ul"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="contact-wd p-3">
            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">الإسم </label>
                <div class="form-control">{{$contact['name']}}</div>
            </div>

            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">الجوال</label>
                <div class="form-control">{{$contact['phone']}}</div>
            </div>

            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">البريد الإلكترونى</label>
                <div class="form-control">
                    {{$contact['email']}}
                </div>
            </div>
            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">الرسالة</label>
                <div class="d-flex justify-content-start align-items-center">
                    <textarea class="form-control text-right py-4" name="msg" rows="4" placeholder="نص الرسالة">{{$contact['msg']}}</textarea>
                </div>
            </div>
            <div>
                <button class="btn bg-green text-white btn-lg px-4"><i class="fab fa-telegram-plane"></i> إرسال</button>
            </div>
        </div>

    </div>
@endsection
