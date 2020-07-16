@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <form action="{{route('admin.images.update',$image)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="image">الصورة</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="title">العنوان</label>
                <input type="text" value="{{$image->title}}" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="customer_id">اختر القسم :</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach(\App\Category::all() as $item )
                        <option {{$image->category_id==$item['id'] ? 'selected':''}} value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                </select>
                <x-error name="category_id"></x-error>
            </div>
            <button type="submit" class="btn btn-success btn-block">اضافة</button>
        </form>
    </div>
@endsection
