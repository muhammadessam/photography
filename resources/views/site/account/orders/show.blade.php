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
                            <a class="nav-link c-bol active" data-toggle="tab" href="#details">تفاصيل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol" data-toggle="tab" href="#comments">التعليقات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol"  data-toggle="tab" href="#bills">الفواتير</a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="tab-content px-5">
                <div class="tab-pane {{ session()->has('tab')  ? '' : 'active' }}" id="details">
                    <div class="row">
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
                <div class="tab-pane {{ session()->has('tab') && session()->get('tab') == 'comments' ? 'active' : '' }}" id="comments">
                    <div id="comments-list">
                        @foreach ($order->comments as $comment)                            
                            <div class="py-1">
                                <strong class="d-block">{{ $comment->is_admin ? 'الإدارة' : auth()->user()->name }}</strong>
                                <span style="font-size:11px;">{{ $comment->created_at }}</span>
                                <p>{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('account.comments.store') }}" method="post" class="mt-3">
                        <div class="form-group">
                            <label for="body">محتوي التعليق</label>
                            <textarea name="body" id="body" cols="30" class="form-control" rows="5"></textarea>
                        </div>
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="is_admin" value="0">
                        {{ csrf_field() }}
                        <button type="submit" id="post-comment" class="btn-outline-success btn">ارسال</button>
                    </form>
                </div>
                <div class="tab-pane {{ session()->has('tab') && session()->get('tab') == 'bills' ? 'active' : '' }}" id="bills">
                    <table class="table table-striped table-bordered table-responsive-lg" id="bills">
                        <thead>
                            <tr>
                                <th>رقم الفاتورة</th>
                                <th>القسم</th>
                                <th>المبلغ</th>
                                <th>الحالة</th>
                                <th>القيمة المتبقة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->bills as $bill)
                                <tr>
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->category->name}}</td>
                                    <td>{{$bill->price}}</td>
                                    <td>{{$bill->status}}</td>
                                    <td>{{$bill->remains}}</td>
                                </tr>
                            @endforeach
                            @if($order->bills->count() == 0)
                                <tr>
                                    <td colspan="6">
                                        <h4 class="col-12 text-center">لا توجد فواتير </h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection