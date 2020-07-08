@extends('site.layouts.base', ['isAccount' => true])

@section('content')

<section class="my-5 register mb-5 mb-5">
    <div class="container">
        <div class="my-shadow py-4 ">
            <div class="dif">
                <h4 class="text-center font-weight-bold"> تفاصيل الطلب</h4>
                <span class="d-block text-center"> <img src="{{ asset('images/flower.svg') }}" alt=""></span>
            </div>
            @if(session()->has('msg'))
                <div class="row mt-4 px-5">
                    <div class="col-12">
                        <div class="alert alert-success">{{ session()->get('msg') }}</div>
                    </div>
                </div>
            @endif
            <div class="row mt-5">
                <div class=" col-sm-12">
                    @if ($order->status  != 'rejected')
                        <div class="order-status px-5">
                            <div class="timeline d-flex justify-content-between">
                                <div class="step"></div>
                                <div class="step {{ $order->status == 'waiting' || $order->status == 'billed' ? 'active' : '' }}"></div>
                                <div class="step {{ $order->status == 'accepted' ? 'active' : '' }}"></div>
                                <div class="step {{ $order->status == 'final' ? 'active' : '' }}"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>طلب جديد</span>
                                <span>تحت المراجعة</span>
                                <span>تم قبول الطلب</span>
                                <span>تم انجاز</span>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger px-5" role="alert">
                            <h4 class="alert-heading">مرفوض</h4>
                            <p>تم رفض هذا الطلب منل قبل الإدارة</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row px-5 mt-4">
                <div class="col-12 mb-4">
                    <ul class="nav p-0 nav-md">
                        <li class="nav-item">
                            <a class="nav-link c-bol {{ request()->has('tab') && request()->get('tab') == 'details' || !request()->has('tab') ? 'active' : '' }}" data-toggle="tab" href="#details"><i class="fas fa-info-circle"></i>  تفاصيل </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol {{ request()->has('tab') && request()->get('tab') == 'comments' ? 'active' : '' }}" data-toggle="tab" href="#comments"><i class="fas fa-comments"></i> التعليقات </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol {{ request()->has('tab') && request()->get('tab') == 'bills' ? 'active' : '' }}"  data-toggle="tab" href="#bills"><i class="fas fa-file-invoice-dollar"></i>   الفواتير </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol {{ request()->has('tab') && request()->get('tab') == 'images' ? 'active' : '' }}"  data-toggle="tab" href="#images"><i class="far fa-images"></i> الصور </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-bol {{ request()->has('tab') && request()->get('tab') == 'videos' ? 'active' : '' }}"  data-toggle="tab" href="#videos"><i class="fa fa-camera"></i> الفيديوهات </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="tab-content mb-3 px-5">
                <div class="tab-pane {{ request()->has('tab') ? '' : 'active' }}" id="details">
                    @if ($order->employees->count() > 0)
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-light" role="alert">
                                    <h4 class="alert-heading mb-4">المسؤولون عن التغطية</h4>
                                    @foreach ($order->employees as $employee)                                    
                                        <p><i class="fa fa-user"></i> {{ $employee->name }} | <i class="fa fa-phone"></i> {{ $employee->phone }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row kory">
                        <div class="col-md-6 col-sm-12">
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-map-marked-alt"></i>العنوان </h4>
                            <span>{{ $order->address }}</span>
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-th-large"></i> الوقت </h4>
                            <span>{{ $order->date->toDateTimeString() }}</span>
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-th-large"></i> اليوم </h4>
                            <span>{{ $order->day }}</span>
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-building"></i> الحالة </h4>
                            <span>{{ $order->get_status() }}</span>
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-copyright"></i>  اضافة حقوقنا علي التصميم </h4>
                            <span>{{ $order->is_right_print ? 'نعم' : 'لا' }}</span>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-th-large"></i> القسم </h4>
                            <span>{{ $order->category->name }}</span>
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-birthday-cake"></i> نوع المناسبة  </h4>
                            <span>{{ $order->is_special ? 'خاصة' : 'عامة' }}</span>
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-city"></i>المدينة  </h4>
                            <span>{{ $order->city->name }}</span>
                            <h4 class="mb-3 mt-3"><i class="pl-2 fas fa-eye"></i>عرض المناسبة علي صفحاتنا  </h4>
                            <span>{{ $order->is_on_our_page ? 'نعم' : 'لا' }}</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane {{ request()->has('tab') && request()->get('tab') == 'comments' ? 'active' : '' }} mb-4 h-100" id="comments">
                    <div id="comments-list">
                        @foreach ($order->comments as $comment)
                            <div class="p-2 c-bol {{ $comment->is_admin ? 'admin-color' : 'normal-color' }}">
                                <strong class="d-block ">{{ $comment->is_admin ? 'الإدارة' : auth()->user()->name }}</strong>
                                <span style="font-size:11px;">{{ $comment->created_at }}</span>
                                <p>{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('account.comments.store') }}" method="post" class="mt-3">
                        <div class="form-group">
                            <label for="body" class="c-bol"><i class="fas fa-comment-dots"></i> محتوي التعليق    </label>
                            <textarea name="body" id="body" cols="30" class="form-control" rows="5"></textarea>
                        </div>
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <input type="hidden" name="is_admin" value="0">
                        {{ csrf_field() }}
                        <button type="submit" id="post-comment" class="btn-primary btn mb-3"> <i class="fab fa-telegram-plane"></i>  ارسال </button>
                    </form>
                </div>
                <div class="tab-pane cad-p {{ request()->has('tab') && request()->get('tab') == 'bills' ? 'active' : '' }}" id="bills">
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
                <div class="tab-pane {{ request()->has('tab') && request()->get('tab') == 'images' ? 'active' : '' }}" id="images">
                    <div class="row justify-content-center">
                        @if ($order->images->count() > 0)                            
                            @foreach ($order->images as $img)
                                <div class="col-md-3">
                                    <a href="{{ request()->root() . '/' .$img->image }}" data-toggle="lightbox" data-gallery="example-gallery">
                                        <img src="{{ request()->root() . '/' .$img->image }}" class="img-fluid">
                                    </a>
                                </div>                            
                            @endforeach
                        @else
                            <p class="text-center">ال يتوفر أي أي صور </p>
                        @endif
                    </div>
                </div>
                <div class="tab-pane {{ request()->has('tab') && request()->get('tab') == 'videos' ? 'active' : '' }}" id="videos">
                    <div class="row">
                        @if ($order->videos->count() > 0)                            
                            @foreach ($order->videos as $video)
                                <div class="col-md-6">
                                    <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                        @php
                                            parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                        @endphp
                                        src="https://www.youtube.com/embed/{{  $output['v'] }}"
                                        frameborder="0"></iframe>
                                </div>                            
                            @endforeach
                        @else
                            <p class="text-center">لا توجد فيديوهات </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });    
    </script>
@endsection