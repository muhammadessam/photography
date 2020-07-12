@extends('site.layouts.base', ['isAccount' => true])

@section('content')

    <div class="container py-5">
        <div class="row my-shadow w-100 m-0 py-4 px-2 mb-5">
            <div class="col-md-6 oas-acp">
                <h4 class="accepted-orders">طلب تغطية زواج ومناسبة خاصة بى</h4>
                <div><span><i class="fas fa-tags"></i></span> <span class="title-ce d-inline-block">زواجات</span></div>
            </div>
            <div class="col-md-6">
                <div class="text-left acp-od-m">
                    <div class="d-inline-block ml-2 text-center">
                        <span class="d-block acp-case  "> حالة الطلب   </span>
                        <span class="d-block text-muted  "><small> رقم الطلب</small>    </span>
                    </div>
                    <div class="d-inline-block text-center">
                        <span class="d-block acp-req"> مفعل </span>
                        <span class="d-block text-muted"> <small> 454512 </small> </span>
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
                        <a href="" class="text-dark acp-widget d-inline-block"><i class="far fa-images"></i> <span>  صور المناسبة </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;">2</span>
                        </a>
                        <a href="" class="text-dark acp-widget d-inline-block"><i class="far fa-images"></i> <span>  فيديو المناسبة </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;">2</span>
                        </a>
                    </div>
                    <div class="my-2">
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span>نوع المناسبة </span>
                            </div>
                            <div class="acp-yl text-center">
                                <span>خاصة</span>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span>  الوقت </span>
                            </div>
                            <div class="acp-yl text-center">
                                <small><span>١٠/٩/٢٠٢٠</span> <span class="">11:30:56</span></small> <span>السبت</span>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span> المدينة والحي </span>
                            </div>
                            <div class="acp-yl text-center">
                                <span>الرياض - العزازية</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <h5 class="text-center font-weight-bold mt-2">العميل</h5>
                        <div class="d-flex">
                            <div class="acp-user-img">
                                <img class="w-100" src="" alt=" ">
                            </div>
                            <div class="acp-cln-u">
                                <div class="acp-user text-center"> Mohamed Salah</div>
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
                    <div class="d-flex justify-content-between">
                        <div class="grn-emptext-center">خالد العلى</div>
                        <div class="gry-emptext-center">٠١٢٣٤٥٦٧٨٩</div>
                    </div>
                    <div class="hard-border"></div>
                    <div class="d-flex justify-content-between">
                        <div class="grn-emptext-center">خالد العلى</div>
                        <div class="gry-emptext-center">٠١٢٣٤٥٦٧٨٩</div>
                    </div>
                    <div class="acp-guid text-center">
                        <i class="fas fa-question-circle"></i>
                        <h5>تعليمات</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="my-shadow py-2">
                    <div class="row mt-5">
                        <div class=" col-sm-12">
                            <div class="order-status px-5">
                                <div class="timeline d-flex justify-content-between">
                                    <div class="step "></div>
                                    <div class="step"></div>
                                    <div class="step active"></div>
                                    <div class="step"></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>طلب جديد</span>
                                    <span>تحت المراجعة</span>
                                    <span>تم قبول الطلب</span>
                                    <span>تم انجاز</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-shadow mt-3">
                    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 px-3 border-bottom">
                        <h5>تفاصيل المشروع</h5>
                        <a href="" class="text-dark acp-widget inv-acp d-inline-block"><i class="far fa-images"></i> <span> فاتورة الطلب </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;">2</span>
                        </a>
                    </div>
                    <div class="pb-2 pt-3 px-3">
                        <p class="c-bol ">ارغب فى عمل تصوير وتغطية خاصة بي يوم الاحد مع امكانية التواصل للأهمية</p>
                    </div>
                </div>
                <div class="my-shadow mt-3">
                    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 px-3 border-bottom">
                        <h5>الإدارة</h5>
                    </div>
                    <div class="pb-2 pt-3 px-3">
                        <p class="text-danger">يمكن تنفيذ طلبك الرجاء سداد الفاتورة بعد ذالك سيتم اعتماد طلبك</p>
                    </div>
                </div>
                <div class="my-shadow mt-3">
                    <div class="p-3">
                        <label for="">اضف ردا على هذه الرسالة</label>
                        <textarea class="form-control bg-white border" name="" id="" cols="30" rows="7"></textarea>
                        <button class="btn btn-success my-2 "><i class="fab fa-telegram-plane"></i> اضف ردك</button>

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
