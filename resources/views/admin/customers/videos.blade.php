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
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#{{$index + 1}}ModalCenter">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="{{$index + 1}}ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="exampleModalLongTitle">فيديو جديد</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('admin.customerVideo.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                        <div class="form-group">
                                            <label for="video">كود اليوتيوب</label>
                                            <textarea name="video" class="form-control" id="video" cols="30" rows="10"></textarea>
                                        </div>
                                        <div>
                                            <label for="">رفع فيديو</label>
                                            <input type="file" name="local" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">اضافة</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.DeleteAll','videos')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">حذف المحدد</button>
                        <div class="row">
                            @foreach($order->videos as $i => $video)
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <input type="checkbox" id="item" class="custom-checkbox m-1" name="images[{{$i}}]" value="{{$video->id}}">
                                    </div>
                                    <div class="card-body">
                                        @if($video->local == null)
                                        <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                                @php
                                                    parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                                @endphp
                                                src="https://www.youtube.com/embed/{{  $output['v'] }}"
                                            frameborder="0"></iframe>
                                        @else
                                            <video width="100%" height="250"  controls src="{{asset('public/'.$video->local)}}#t=3.0"></video>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
