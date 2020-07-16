@extends('admin.layout.layout')
@section('content')
    <div class="container">
        <form action="{{route('admin.videos.update',['video' => $video])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="">العنوان</label>
                <input name="title" value="{{$video->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">القسم</label>
                <select name="cat_id" class="form-control" id="">
                    <option value="{{$video->category->id}}">{{$video->category->name}}</option>
                    @foreach(@App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="video">رابط الفيديو Youtube</label>
                <textarea name="video" class="form-control" id="video" cols="30" rows="10">{{$video->video}}</textarea>
            </div>
            <div>
                <label for="">رفع فيديو</label>
                <input type="file" name="local" class="form-control">
            </div>
            <button type="submit" class="btn btn-success btn-block">تعديل</button>
        </form>
    </div>
@endsection
