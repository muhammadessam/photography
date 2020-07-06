@extends('site.layouts.base')

@section('content')
<section class="my-5 register">
    <div class="container">
        <div class="my-shadow py-4">
        <div class="dif">
            <h4 class="text-center font-weight-bold">مرحبا بك يا <span class="c-bol">{{ explode(' ', auth()->user()->name)[0] }}</span></h4>
            <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
        </div>

        <div class="my-4 kufi">
            <div class=" control-actions">
            <div class=" dde  row ">
                <div class="col-6 col-md-4">
                    <a href="" class="position-relative saad border pt-3 pb-1 px-1  ">
                        <div class="">
                            <div class="text-center">
                                <i class="fas fa-user icon-f"></i>
                            </div>
                            <div>
                                <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >تعديل بياناتى</small></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                <a href="{{ route('account.orders') }}" class="position-relative saad border pt-3 pb-1 px-1  ">

                    <div class="">
                    <div class="text-center">
                        <i class="fas fa-birthday-cake icon-f"></i>
                    </div>
                    <div>
                        <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >مناسباتى</small></h5>
                    </div>
                    </div>
                </a>
                </div>
                <div class="col-4">

                <a href="{{ route('account.orders.create') }}" class="position-relative saad border pt-3 pb-1 px-1  ">
                    <div class="">
                    <div class="text-center">
                        <i class="far fa-plus-square icon-f"></i>
                    </div>
                    <div>
                        <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >طلب مناسبة جديدة</small></h5>
                    </div>
                    </div>
                </a>
                </div>
                <div class="col-4">
                <a href="{{route('account.bills')}}" class="position-relative saad border pt-3 pb-1 px-1  ">
                    <div class="">
                    <div class="text-center">
                        <i class="fas fa-file-invoice-dollar  icon-f"></i>
                    </div>
                    <div>
                        <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >الفواتير </small></h5>
                    </div>
                    </div>
                </a>
                </div>
                <div class="col-4 col-md-4">
                <a href="" class="position-relative saad border pt-3 pb-1 px-1  ">
                    <div class="">
                    <div class="text-center">
                        <i class="fas fa-question-circle  icon-f"></i>
                    </div>
                    <div>
                        <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >أضف رأيك</small></h5>
                    </div>
                    </div>
                </a>
                </div>
                <div class="col-4 col-md-4">
                    <a href="" class="position-relative saad border pt-3 pb-1 px-1  ">
                        <div class="">
                            <div class="text-center">
                                <i class="fas fa-sign-out-alt  icon-f"></i>
                            </div>
                            <div>
                                <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >تسجيل الخروج</small></h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            </div>
        </div>

        </div>
    </div>
    </section>

@endsection
