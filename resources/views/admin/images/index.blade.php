@extends('admin.layout.layout')
@section('content')
    <style>
        iframe {
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container pt-3">
        <div class="card">
            <div class="card-header row w-100 m-0">
                <h4 class="col-11 text-right">معرض الصور</h4>
                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i>
                </button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLongTitle">صورة جديد</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.images.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">الصورة</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_id">اختر القسم :</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            @foreach(\App\Category::all() as $item )
                                                <option {{old('category_id')==$item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                        <x-error name="category_id"></x-error>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">اضافة</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body my-m-img" id="images">
                <form action="{{route('admin.images.index')}}" method="get">
                    @csrf
                    <div class="form-group row justify-content-start" dir="rtl">
                        <label for="" class="m-2">اختر قسم</label>
                        <select name="cat_id" class="form-control col-6">
                            @foreach(@App\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success mr-2">بحث</button>
                        <a href="{{route('admin.images.index')}}"  class="btn btn-primary mr-2">كل الاقسام</a>
                    </div>
                </form>
                <div id="lightgallery">
                    <form action="{{route('admin.DeleteAll','admin_images')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">حذف المحدد</button>
                        <div class="row">
                            @foreach($images as $i => $image)
                                <div class="col-md-3 col-6 p-1">
                                    <div class="card bg-primary-gradient">
                                        <div class="card-header row w-100 m-0 justify-content-center">
                                            <h6 class="text-dark m-1">
                                                <input type="checkbox" id="item" class="custom-checkbox m-1" name="images[{{$i}}]" value="{{$image->id}}">
                                                {{$image->title}}
                                            </h6>
{{--                                            <form action="{{route('admin.images.destroy',$image)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-sm btn-danger delete-t">--}}
{{--                                                    <i class="fa fa-trash"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </div>
                                        <div class="card-body p-0">
                                            <a href="{{asset($image->image)}}" class="item">
                                                <img class="img-thumbnail" width="100%" src="{{asset($image->image)}}"
                                                     data-src="{{asset($image->image)}}"
                                                     style="height: 180px;object-fit: cover;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <nav aria-label="..." class="text-center d-flex align-items-center justify-content-center" dir="rtl">
            {{$images->links()}}
        </nav>
    </div>
@endsection
