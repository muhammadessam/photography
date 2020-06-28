@extends('admin.layout.layout')
@section('content')
    <style>
        iframe{
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container pt-3">
        <div class="card">
            <div class="card-header row">
                <h4 class="col-11 text-right">معرض الفيديوهات</h4>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i>
                </button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLongTitle">فيديو جديد</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.videos.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="video">كود اليوتيوب</label>
                                        <textarea name="video" class="form-control" id="video" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_id">العميل</label>
                                        <select class="form-control" name="customer_id" id="customer_id">
                                            <option value="">الرجاء الاختيار</option>
                                            @foreach(@App\Customer::all() as $c)
                                            <option value="{{$c->id}}">{{$c->user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="order_id">المناسبة</label>
                                        <select class="form-control" name="order_id" id="order_id">
                                        </select>
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
                    @foreach(@App\Video::all() as $video)
                        <div class="col-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-header row">
                                    <h6 class="col-10 text-center">
                                        {{$video->order->customer->user->name}}
                                    </h6>
                                    <form action="{{route('admin.videos.destroy',$video)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    {!! $video->video !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#customer_id").change(function(){
                var selected = $(this).children("option:selected").val();
                $.get("../api/customer/"+selected+"/orders", function(data, status){
                    var count = 0;
                    for(var i = 0 ; i < data.length;i++){
                        var o = new Option("", data[i].id);
                        count++;
                        $(o).html("  طلب رقم "+count+"");
                        $("#order_id").append(o);
                    }
                });
            });
        });
    </script>
@endsection
