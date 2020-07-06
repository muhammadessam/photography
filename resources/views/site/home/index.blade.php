@extends('site.layouts.base')
@section('content')
    <div class="">
        <header>
            <div id="fr-car" class="owl-carousel owl-theme" dir="ltr">
                <div class="car-img">
                    <img src="./images/header_1.png" alt="">
                    <div class="container">
                        <div class="header-content text-white">
                            <h3 class="text-center mb-1">مرحباً بكم في</h3>
                            <h1 class="text-center">توثيق لخدمات التصوير</h1>
                            <div class="mt-3 mb-4 text-center tnb">
                                <span class="d-inline-block line"></span>
                            </div>
                            <div class="text-center"><a href="{{ route('register') }}" class="text-white ml-2">التسجيل</a> | <a href="{{ route('login') }}" class="text-white mr-2">الدخول</a></div>
                        </div>
                    </div>
                </div>
                <div class="car-img">
                    <img src="./images/header_2.png" alt="">
                    <div class="container">
                        <div class="header-content text-white">
                            <h3 class="text-center mb-1"> اهلا وسهلا بكم في</h3>
                            <h1 class="text-center">توثيق لخدمات التصوير</h1>
                            <div class="mt-3 mb-4 text-center tnb">
                                <span class="d-inline-block line"></span>
                            </div>
                            <div class="text-center"><a href="{{ route('register') }}" class="text-white ml-2">التسجيل</a> | <a href="{{ route('login') }}" class="text-white mr-2">الدخول</a></div>
                        </div>
                    </div>
                </div>
                <div class="car-img">
                    <img src="./images/header_3.png" alt="">
                    <div class="container">
                        <div class="header-content text-white">
                            <h3 class="text-center mb-1">مرحباً بكم في</h3>
                            <h1 class="text-center">توثيق لخدمات التصوير</h1>
                            <div class="mt-3 mb-4 text-center tnb">
                                <span class="d-inline-block line"></span>
                            </div>
                            <div class="text-center"><a href="{{ route('register') }}" class="text-white ml-2">التسجيل</a> | <a href="{{ route('login') }}" class="text-white mr-2">الدخول</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="about">
            <div class="container">
                <div class="dif">
                    <h4 class="text-center font-weight-bold">من نحن</h4>
                    <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
                </div>
                <div>
                    <p class="text-justify text-center my-3">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم
                        تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما،
                        عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع
                        مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات</p>
                </div>
            </div>
        </section>

        <section class="services mt-5 py-3 mb-4">
            <div class="container">
                <div class="dif">
                    <h4 class="text-center font-weight-bold">خدماتنا</h4>
                    <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div class="text-center my-shadow p-3 position-relative ready">
                            <div class="overlay ov-kufi py-2 ">
                                <P class="py-2">
                                    هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض
                                    النوادر أو الكلمات العشوائية
                                </P>
                            </div>
                            <div class="services-icons text-center"><i class="icofont-jewlery icon-color"></i></div>
                            <h5 class="icon-color font-weight-bold">تصوير حفلات الزواج</h5>
                            <p class="mt-3">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="text-center my-shadow p-3 position-relative ready">
                            <div class="overlay ov-kufi py-2 ">
                                <P class="py-2">
                                    هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض
                                    النوادر أو الكلمات العشوائية
                                </P>
                            </div>
                            <div class="services-icons text-center"><i class="icofont-ui-camera icon-color"></i></div>
                            <h5 class="icon-color font-weight-bold">تصوير المناسبات</h5>
                            <p class="mt-3">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="text-center my-shadow p-3 position-relative ready">
                            <div class="overlay ov-kufi py-2 ">
                                <P class="py-2">
                                    هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض
                                    النوادر أو الكلمات العشوائية
                                </P>
                            </div>
                            <div class="services-icons text-center"><i class="icofont-birthday-cake icon-color"></i></div>
                            <h5 class="icon-color font-weight-bold">فوتوسيشن</h5>
                            <p class="mt-3">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="my-5 py-5 numbers">
            <div class="container">
                <div class="row mt-4 text-white">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center  p-3">
                            <div class="services-icons text-center"><i class="icofont-jewlery "></i></div>
                            <h2 class=" font-weight-bold">
              <span class="counter" data-counter-time="2000" data-counter-delay="10">
                {{ 0 }}
              </span>
                            </h2>
                            <h5 class="mt-3">الخدمات المقدمة</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center  p-3">
                            <div class="services-icons text-center"><i class="icofont-ui-camera "></i></div>
                            <h2 class=" font-weight-bold">
              <span class="counter" data-counter-time="2000" data-counter-delay="10">
                {{ $clientCount }}
              </span>
                            </h2>
                            <h5 class="mt-3">
                                العملاء
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center  p-3">
                            <div class="services-icons text-center"><i class="icofont-birthday-cake "></i></div>
                            <h2 class=" font-weight-bold"><span class="counter" data-counter-time="2000" data-counter-delay="10">
                             {{ $orders->count() }}
              </span></h2>
                            <h5 class="mt-3">كل الطلبات</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="text-center  p-3">
                            <div class="services-icons text-center"><i class="icofont-birthday-cake "></i></div>
                            <h2 class=" font-weight-bold"><span class="counter" data-counter-time="2000" data-counter-delay="10">
                            {{ $orders->where('status', 'final')->count() }}
              </span></h2>
                            <h5 class="mt-3">خدمات منجزة</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>







        <section class="photos">
            <div class="container">
                <div class=" text-center photos-controls">
                    <button id="current" class="btn   bg-btn-color  border ">كل الصور </button>
                    <button id="completed" class="btn      border "> الفيديو</button>
                    <button id="withdraw" class="btn    border   ">اختارنا لكم</button>
                </div>
                <div class="my-shadow my-3 p-2 galary-list cairo">
                    <div class="">
                        <div class="current galary-status">
                            <div>
                                <div id="nd-car" class="owl-carousel owl-galary owl-theme" dir="ltr">
                                    <div class="o-img">

                                        <div class="position-relative ready  d-inline-block">
                                            <img src="./images/img_1.png" alt="">
                                            <div class="overlay ov-kufi  r-img  ">
                                                <div
                                                    class="py-2 main-img d-flex justify-content-center align-items-center flex-column text-white">
                                                    <h5 class="text-center">
                                                        تنظيم معرض الصور
                                                    </h5>
                                                    <span class="d-inline-block my-2 touch-sm"></span>
                                                    <h6 class="text-center">تجهيزنا معرض لإحد العملاء</h6>
                                                    <i class="far fa-image sms-im"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-img">
                                        <div class="position-relative ready  d-inline-block">
                                            <img src="./images/img_2.png" alt="">
                                            <div class="overlay ov-kufi  r-img  ">
                                                <div
                                                    class="py-2 main-img d-flex justify-content-center align-items-center flex-column text-white">
                                                    <h5 class="text-center">
                                                        تنظيم معرض الصور
                                                    </h5>
                                                    <span class="d-inline-block my-2 touch-sm"></span>
                                                    <h6 class="text-center">تجهيزنا معرض لإحد العملاء</h6>
                                                    <i class="far fa-image sms-im"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-img">
                                        <div class="position-relative ready  d-inline-block">
                                            <img src="./images/img_3.png" alt="">
                                            <div class="overlay ov-kufi  r-img  ">
                                                <div
                                                    class="py-2 main-img d-flex justify-content-center align-items-center flex-column text-white">
                                                    <h5 class="text-center">
                                                        تنظيم معرض الصور
                                                    </h5>
                                                    <span class="d-inline-block my-2 touch-sm"></span>
                                                    <h6 class="text-center">تجهيزنا معرض لإحد العملاء</h6>
                                                    <i class="far fa-image sms-im"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="completed galary-status d-none">

                            <div class="position-relative ready  d-inline-block">
                                <img src="./images/img_2.png" alt="">
                                <div class="overlay ov-kufi  r-img  ">
                                    <div class="py-2 main-img d-flex justify-content-center align-items-center flex-column text-white">
                                        <h5 class="text-center">
                                            تنظيم معرض الصور
                                        </h5>
                                        <span class="d-inline-block my-2 touch-sm"></span>
                                        <h6 class="text-center">تجهيزنا معرض لإحد العملاء</h6>
                                        <i class="far fa-image sms-im"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="withdraw galary-status d-none">

                            <div class="position-relative ready  d-inline-block">
                                <img src="./images/img_3.png" alt="">
                                <div class="overlay ov-kufi  r-img  ">
                                    <div class="py-2 main-img d-flex justify-content-center align-items-center flex-column text-white">
                                        <h5 class="text-center">
                                            تنظيم معرض الصور
                                        </h5>
                                        <span class="d-inline-block my-2 touch-sm"></span>
                                        <h6 class="text-center">تجهيزنا معرض لإحد العملاء</h6>
                                        <i class="far fa-image sms-im"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>




        <section>
            <div class="about-us text-white py-5">
                <div class="container text-center">
                    <div id="td-car" class="owl-carousel owl-theme" dir="ltr">
                        @foreach(@App\Opinion::all() as $op)
                        <div class=" " dir="rtl">
                            <h3 class="font-weight-bold mb-3">قالوا عنا</h3>
                            <div class="clientopp">
                                <div class="row firsttest">
                                    <div class=" position-relative col-12">
                                        <p class="text-center client col-12">
                                            {{$op->body}}
                                        </p>
                                        <div class="arrow"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center lasttest mt-2 d-flex justify-content-center align-items-center">
{{--                                <img class="person-img" src="./images/person.png" alt="clients" />--}}
                                <h5 class="person_name">{{$op->customer->user->name}}</h5>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
        </section>
        @auth
            @if(auth()->user()->customer != null)
                <section class="card">
                    <h3 class="col-12 text-center pt-3 pb-3">اضف رأي</h3>
                    <form class="container" action="{{route('opinions.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="body">الرأي</label>
                            <textarea class="form-control" name="body" id="body" cols="30" rows="5"></textarea>
                        </div>
                        <button class="btn btn-success" type="submit">ارسال</button>
                    </form>
                </section>
            @endif
        @endauth
        <section class="contact py-5 text-white">
            <div class="container">
                <h3 class="font-weight-bold mb-5 text-center ">تواصل معنا</h3>
                <div class="row">

                    <div class="col-md-6">
                        <div class="info-data">
                            <div class="d-flex align-items-center">
                                <div>
                <span class="contact-icon">
                  <i class="fas fa-mobile-alt"></i>
                </span>
                                </div>
                                <div class="det-d">
                                    <span class="d-block"> رقم الجوال</span>
                                    <span class="d-block" dir="ltr"> +97100000000</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-data">
                            <div class="d-flex align-items-center">
                                <div>
                <span class="contact-icon">
                  <i class="fas fa-map-marker-alt"></i>
                </span>
                                </div>
                                <div class="det-d">
                                    <span class="d-block"> الموقع</span>
                                    <span class="d-block" dir="ltr">المملكة العربية السعودية | الرياض</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-data">
                            <div class="d-flex align-items-center">
                                <div>
                <span class="contact-icon">
                  <i class="fas fa-envelope"></i>
                </span>
                                </div>
                                <div class="det-d">
                                    <span class="d-block"> البريد الإلكتروني</span>
                                    <span class="d-block" dir="ltr"> {{ $setting->app_email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <ul class="navbar-nav p-0 social-links ">
                                <li class="nav-item">
                                    {!! $setting->facebook ? '<a class="nav-link d-inline-block " href="'. $setting->facebook .'"><i class="fab fa-facebook-f"></i></a>' : null !!}
                                    {!! $setting->twitter ? '<a class="nav-link d-inline-block " href="'. $setting->twitter .'"><i class="fab fa-twitter"></i></a>' : null !!}
                                    {!! $setting->instagram ? '<a class="nav-link d-inline-block " href="'. $setting->instagram .'"><i class="fab fa-instagram"></i></a>' : null !!}

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6 mb-2 pl-1 med-1">
                                    <input placeholder="الإسم" type="text" class="form-control ">
                                </div>
                                <div class="col-md-6 mb-2 pr-1 med-2">
                                    <input placeholder="البريد الإلكترونى" type="text" class="form-control ">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input placeholder="الموضوع" type="text" class="form-control ">
                                </div>
                                <div class="col-12">
                                    <textarea placeholder="الرسالة" class="form-control " name="" id="" cols="30" rows="7"></textarea>
                                </div>
                                <div class="text-left col-12 my-2">
                                    <button class="contact-btn">إرسال</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
