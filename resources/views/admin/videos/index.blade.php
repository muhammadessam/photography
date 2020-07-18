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
            <div class="card-header row w-100 m-0">
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
                                <form action="{{route('admin.videos.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">العنوان</label>
                                        <input name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">القسم</label>
                                        <select name="cat_id" class="form-control" id="">
                                            @foreach(@App\Category::all() as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">رابط الفيديو Youtube</label>
                                        <textarea name="video" class="form-control" id="video" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
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
            <div class="card-body my-m-img">
                <form action="{{route('admin.videos.index')}}" method="get">
                    @csrf
                    <div class="form-group row justify-content-start" dir="rtl">
                        <label for="" class="m-2">اختر قسم</label>
                        <select name="cat_id" class="form-control col-6">
                            @foreach(@App\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success mr-2">بحث</button>
                        <a href="{{route('admin.videos.index')}}"  class="btn btn-primary mr-2">كل الاقسام</a>
                    </div>
                </form>
                <form action="{{route('admin.DeleteAll','admin_videos')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">حذف المحدد</button>
                    <div class="row">
                        @foreach($videos as $i => $video)
                            <div class="col-4 p-1">
                                <div class="card bg-primary-gradient">
                                    <div class="card-header row w-100 m-0 justify-content-center">
                                        <input type="checkbox" id="item" class="custom-checkbox m-2" name="images[{{$i}}]" value="{{$video->id}}">
                                        <h5 class="text-dark p-1">{{$video->title}}</h5>
                                        <a href="{{route('admin.videos.edit',$video)}}" class="btn btn-outline-primary btn-sm" >
                                            <i class="fa fa-edit"></i>
                                        </a>
{{--                                        <form action="{{route('admin.videos.destroy',$video)}}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" class="btn btn-sm btn-outline-danger">--}}
{{--                                                <i class="fa fa-trash"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </div>
                                    <div class="card-body text-dark">
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
                    {{$videos->links()}}
                </form>
            </div>
        </div>
    </div>
@endsection
