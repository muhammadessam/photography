@extends('site.layouts.base', ['isAccount' => true])

@section('content')

    <div class="container py-5">
        <div class="row my-shadow w-100 m-0 py-4 px-2 mb-5">
            <div class="col-md-6 oas-acp">
                <h4 class="accepted-orders">طلب تغطية </h4>
                <div><span><i class="fas fa-tags"></i></span> <span class="title-ce d-inline-block">{{$order->category->name}}</span></div>
            </div>
            <div class="col-md-6">
                <div class="text-left acp-od-m">
                    <div class="d-inline-block ml-2 text-center">
                        <span class="d-block acp-case  "> حالة الطلب   </span>
                        <span class="d-block text-muted  "><small> رقم الطلب</small>    </span>
                    </div>
                    <div class="d-inline-block text-center">
                        <span class="d-block acp-req"> <span>{{ $order->get_status() }}</span> </span>
                        <span class="d-block text-muted"> <small> 100{{$order->id}} </small> </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="my-shadow right-acp">
                    <div class="acp-title">
                        <h5><i class="far fa-file-alt"></i> بيانات الطلب</h5>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">
                        <button type="button" class="text-dark acp-widget d-inline-block" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="far fa-images"></i> <span>  صور المناسبة </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;">{{$order->images->count()}}</span>
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="min-width: 70%;margin: 0 auto;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <a href="{{route('downloadAllImages',$order)}}" class="btn btn-primary">تحميل كل الصور</a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            @if ($order->images->count() > 0)
                                                @foreach ($order->images as $img)
                                                    <div class="col-md-3 position-relative">
                                                        <a href="{{ request()->root() . '/' .$img->image }}" data-toggle="lightbox" data-gallery="example-gallery">
                                                            <img src="{{ request()->root() . '/' .$img->image }}" class="img-fluid">
                                                        </a>
                                                        <form class="position-absolute" style="bottom: 0;right: 5%;" method="post" action="{{route('DownloadFile')}}">
                                                            @csrf
                                                            <input type="hidden" name="file" value="{{$img->image}}">
                                                            <button type="submit" class="btn btn-success btn-sm">تحميل</button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-center">ال يتوفر أي أي صور </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="text-dark acp-widget d-inline-block" data-toggle="modal" data-target="#exampleModalCenter1">
                            <i class="far fa-images"></i> <span>  فيديو المناسبة </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;">{{$order->videos->count()}}</span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="min-width: 70%;margin: 0 auto" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            @if ($order->videos->count() > 0)
                                                @foreach ($order->videos as $video)
                                                    <div class="col-md-6">
                                                        <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                                                @php
                                                                    parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                                                @endphp
                                                                src="https://www.youtube.com/embed/{{  $output['v'] }}"
                                                                frameborder="0">

                                                        </iframe>
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
                    </div>
                    <div class="my-2">
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span>نوع المناسبة </span>
                            </div>
                            <div class="acp-yl text-center">
                                <span>{{$order->is_special?"خاصة":"عامة"}}</span>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span>  الوقت </span>
                            </div>
                            <div class="acp-yl text-center">
                                <small>{{$order->date}}</small> <span>{{$order->day}}</span>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span> المدينة والحي </span>
                            </div>
                            <div class="acp-yl text-center">
                                <span>{{$order->country->name}} - {{$order->city->name}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <h5 class="text-center font-weight-bold mt-2">العميل</h5>
                        <div class="d-flex">
                            <div class="acp-user-img">
                                <img class="w-100" src="{{$order->customer->user->image == null?'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png':asset('public/'.$order->customer->user->image)}}" alt=" ">
                            </div>
                            <div class="acp-cln-u">
                                <div class="acp-user text-center">{{$order->customer->user->name}}</div>
                                <div class="acp-location text-center">
                                    <small>السعودية</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hard-border"></div>
                    <div>
                        <h6 class="tagt">موظفى التغطية</h6>
                    </div>
                    @foreach($order->employees as $item)
                        <div class="d-flex justify-content-between">
                            <div class="grn-emptext-center">{{$item->name}}</div>
                            <div class="gry-emptext-center">{{$item->phone}}</div>
                        </div>
                    @endforeach
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter23">
                        <div class="acp-guid text-center" >
                            <i class="fas fa-question-circle"></i>
                            <h5>تعليمات</h5>
                        </div>
                    </a>
                    <div class="modal fade" id="exampleModalCenter23" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="exampleModalLongTitle">التعليمات</h5>
                                </div>
                                <div class="modal-body">
                                    {!! @App\Setting::first()->instruction !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="my-shadow py-2">
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
                </div>
                <div class="my-shadow mt-3">
                    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 px-3 border-bottom">
                        <h5>تفاصيل المشروع</h5>
                        @if(! auth()->guard('employee')->check())
                        <button type="button" class="text-dark acp-widget inv-acp d-inline-block" data-toggle="modal" data-target="#exampleModalCenter2">
                            <i class="far fa-images"></i> <span> فاتورة الطلب </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;">2</span>
                        </button>
                        @endif
                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div style="min-width: 70%;margin: 0 auto;" class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
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
                    </div>
                    <div class="pb-2 pt-3 px-3">
                        <p class="c-bol ">{{$order->comments->where('is_admin',0)->first()->body ?? "الرجاء اضافة تفاصيل المشروع من خلال تعليق"}}</p>
                    </div>
                </div>
                @foreach ($order->comments as $comment)
                    @if($comment != $order->comments->where('is_admin',0)->first())
                    <div class="my-shadow mt-3">
                        <div class="d-flex justify-content-between align-items-center pt-3 pb-2 px-3 border-bottom">
                            <h5>{{ $comment->is_admin ? 'الإدارة' : auth()->user()->name }}</h5>
                        </div>
                        <div class="pb-2 pt-3 px-3">
                            <p class="text-danger">{{ $comment->body }}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="my-shadow mt-3">
                    <div class="p-3">
                        @if(! auth()->guard('employee')->check())
                        <form action="{{ route('account.comments.store') }}" method="post" class="mt-3">
                            @csrf

                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <input type="hidden" name="is_admin" value="0">
                            <label for="">اضف ردا على هذه الرسالة</label>
                            <textarea class="form-control bg-white text-dark border" name="body" id="" cols="30" rows="7"></textarea>
                            <button class="btn btn-success my-2 "><i class="fab fa-telegram-plane"></i> اضف ردك</button>
                        </form>
                        @endif

                        <div class="p-3 my-2 text-danger acp-note">
                            <p class="mb-2">نرجو التقييد بالإتفاقية هنا واضاة اة ملاحظات كى يتم مراجعتها</p>
                            <p><small> اى اتفاقات خارجية اة مع الموظفين يعد مخالفة وخارج مسؤوليتنا</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
