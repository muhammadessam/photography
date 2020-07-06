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
                                <form action="{{route('admin.videos.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="video">رابط الفيديو Youtube</label>
                                        <textarea name="video" class="form-control" id="video" cols="30" rows="10"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">اضافة</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    @foreach(@App\AdminVideo::all() as $video)
                        <div class="col-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-header row w-100 m-0">
                                    <form action="{{route('admin.videos.destroy',$video)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body text-dark">
                                    {!! $video->video !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
