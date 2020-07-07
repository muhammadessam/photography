@extends('site.layouts.base', ['isAccount' => true])

@section('content')
    <style>
        iframe{
            width: 100%;
            border-radius: 10px;
        }
    </style>
<section class="my-5 mb-5">
    <div class="container">
        <div class="my-shadow py-4">
            <div class="dif">
                <h4 class="text-center font-weight-bold">مناسباتى</h4>
                <span class="d-block text-center"> <img src="{{ asset('images/flower.svg') }}" alt=""></span>
            </div>
            @if(session()->has('msg'))
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="alert alert-success">{{ session()->get('msg') }}</div>
                    </div>
                </div>
            @endif
            <div class="bg-white border par-tb mt-5">
                @if($orders->count() > 0)
                    <table class="table mb-2 border-top-0">
                        <thead>
                            <tr>
                                <th> تاريخ الطلب</th>
                                <th> موعد المناسبة</th>
                                <th> قسم</th>
                                <th> مدينة</th>
                                <th> حالة الطلب</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white border">
                            @foreach ($orders as $order)
                                <tr>
                                    <td  class="border-bottom font-weight-bold  ">{{ $order->created_at->toDateString() }}</td>
                                    <td  class="border-bottom font-weight-bold  ">{{ $order->date->toDateTimeString() }}</td>
                                    <td  class="border-bottom font-weight-bold  ">{{ $order->category->name }}</td>
                                    <td  class="border-bottom font-weight-bold  ">{{ $order->city->name }}</td>
                                    <td  class="border-bottom font-weight-bold  ">{{ $order->get_status()}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a  class="m-2 c-bol" href="{{ route('account.orders.show', ['id' => $order->id, 'tab' => 'images']) }}"><i class="fa fa-image"></i> {{ $order->images_count }}</a>
                                        <!-- Button trigger modal -->
                                        <a  class="m-2 c-bol" href="{{ route('account.orders.show', ['id' => $order->id, 'tab' => 'videos']) }}"><i class="fa fa-camera"></i> {{ $order->videos_count }}</a>
                                        <a href="{{ route('account.orders.show', ['id' => $order->id]) }}" class="c-bol" >  <i class="fas fa-eye"></i> مشاهدة</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <p class="text-center">لا توجد طلبات</p>
                    @endif
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
