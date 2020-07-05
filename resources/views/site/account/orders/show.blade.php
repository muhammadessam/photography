@extends('site.layouts.base', ['isAccount' => true])

@section('content')

<section class="my-5 register">
    <div class="container">
        <div class="my-shadow py-4">
            <div class="dif">
                <h4 class="text-center font-weight-bold"> تفاصيل الطلب</h4>
                <span class="d-block text-center"> <img src="{{ asset('images/flower.svg') }}" alt=""></span>
            </div>
            <div class="row px-5 mt-4">
                <div class="col-12 mb-4">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link c-bol active" href="{{ route('account.orders.show', ['id' => $order->id]) }}">تفاصيل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol" href="#">التعليقات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol" href="#">الفواتير</a>
                        </li>
                    </ul>
                    <hr>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h4 class="mb-3 mt-3">العنوان </h4>
                    <span>{{ $order->address }}</span>
                    <h4 class="mb-3 mt-3">الوقت </h4>
                    <span>{{ $order->date->toDateTimeString() }}</span>
                    <h4 class="mb-3 mt-3">الحالة </h4>
                    <span>{{ $order->get_status() }}</span>
                    <h4 class="mb-3 mt-3">اضافة حقوقنا علي التصميم </h4>
                    <span>{{ $order->is_right_print ? 'نعم' : 'لا' }}</span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h4 class="mb-3 mt-3">القسم </h4>
                    <span>{{ $order->category->name }}</span>
                    <h4 class="mb-3 mt-3">نوع المناسبة </h4>
                    <span>{{ $order->is_special ? 'خاصة' : 'عامة' }}</span>
                    <h4 class="mb-3 mt-3">المدينة  </h4>
                    <span>{{ $order->city->name }}</span>
                    <h4 class="mb-3 mt-3">عرض المناسبة علي صفحاتنا  </h4>
                    <span>{{ $order->is_on_our_page ? 'نعم' : 'لا' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection
