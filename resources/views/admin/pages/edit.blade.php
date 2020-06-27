@extends('admin.layout.layout')
@section('content')
    <div class="content ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>اضافة صفحة جديدة</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.page.update', $page)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="title">الاسم</label>
                                <input class="form-control" type="text" name="title" id="title"
                                       value="{{$page->title}}">
                                @error('title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="place">فعال</label>
                                <select class="form-control" style="width: 100%" name="is_active" id="is_active">
                                    <option value="1" {{$page->is_active ? 'selected' :''}}>فعال</option>
                                    <option value="0" {{!$page->is_active ? 'selected' :''}}>غير فعال</option>
                                </select>
                                @error('place')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="place">المكان</label>
                                <select class="form-control" style="width: 100%" name="place" id="place">
                                    <option value="header" {{$page->place=='header' ? 'selected' :''}}>الهيدر</option>
                                    <option value="footer" {{$page->place=='footer' ? 'selected' :''}}>الفوتر</option>
                                </select>
                                @error('place')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="place">المحتوي</label>
                                <textarea name="content" id="mymce">{{$page->content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">انشاء</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: "#mymce",
            height: 400,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
        });
    </script>
@endsection
