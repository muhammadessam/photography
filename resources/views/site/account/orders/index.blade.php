@extends('site.layouts.base', ['isAccount' => true])

@section('content')
    <style>
        iframe{
            width: 100%;
            border-radius: 10px;
        }
    </style>
<section class="my-5">
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
                                    <td  class="border-bottom font-weight-bold  ">
                                        <a href="" class="c-bol" >  <i class="fas fa-eye"></i> مشاعدة</a>
                                        <!-- Button trigger modal -->
                                        <a  class="m-2 c-bol" href="#" data-toggle="modal" data-target="#images-{{$order->id}}">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="images-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog " style="min-width: 70%;" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @foreach($order->images as $image)
                                                                <div class="col-4">
                                                                    <img class="img-thumbnail" width="100%" src="{{asset($image->image)}}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @if($order->images->count() == 0)
                                                            <h3 class="col-12 mt-4 text-center">لا يوجد</h3>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <a  class="m-2 c-bol" href="#" data-toggle="modal" data-target="#vidoes-{{$order->id}}">
                                            <i class="fa fa-camera"></i>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="vidoes-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog " style="min-width: 70%;" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @foreach($order->videos as $video)
                                                                <div class="col-4">
                                                                    {!! $video->video !!}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        @if($order->videos->count() == 0)
                                                            <h3 class="col-12 mt-4 text-center">لا يوجد</h3>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
