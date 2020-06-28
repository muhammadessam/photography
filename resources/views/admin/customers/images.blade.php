@extends('admin.layout.layout')
@section('content')
    <style>
        iframe{
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container pt-3 ">
        @foreach($customer->orders as $index=>$order)
            <div class="card">
                <div class="card-header">
                    <h4 class="col-12 text-right">
                        طلب رقم
                        {{$index + 1}}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($order->images as $image)
                            <div class="col-4">
                                <img class="img-thumbnail" width="100%" src="{{asset($image->image)}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
