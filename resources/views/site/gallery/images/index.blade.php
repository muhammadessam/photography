@extends('site.layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header"><h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div id="lightgallery">
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-md-4 p-1" >
                                <div class="card bg-primary-gradient">
                                    <div class="card-body  position-relative p-0">

                                        <a href="{{asset('public/'.$image->image)}}" class="item">
                                            <img class="img-thumbnail img-store" width="100%"
                                                 src="{{asset('public/'.$image->image)}}">
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
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <p class="mb-0"><strong>المشاهدات: </strong> {{ $image->getViews() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
