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
                    <h4 class="col-10 text-right">
                        طلب رقم
                        {{$index + 1}}
                    </h4>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#{{$index + 1}}ModalCenter">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="{{$index + 1}}ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header row">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="exampleModalLongTitle">صورة جديد</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('admin.customerImage.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                        <div class="form-group">
                                            <label for="image">الصورة</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">اضافة</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
