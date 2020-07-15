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
            <div class="card-body my-m-img">
                <div id="lightgallery">

                    <div class="row">
                        @foreach(@App\AdminImage::all() as $image)
                            <div class="col-md-3 col-6 p-1">
                                <div class="card bg-primary-gradient">
                                    <div class="card-header row w-100 m-0">
                                        <form action="{{route('admin.images.destroy',$image)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete-t">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
                </div>
            </div>
        </div>

        <nav aria-label="..." class="text-center d-flex align-items-center justify-content-center" dir="rtl">
            <ul class="pagination p-0 text-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">السابق</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">التالى</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
