@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <div class="card m-3">
            <div class="card-header">
                <h4 class="">انشاء سليدر</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">النص الاول</label>
                        <input type="text" class="form-control " name="primary_text">
                    </div>
                    <div class="form-group">
                        <label for="">النص الثانوي</label>
                        <input type="text" class="form-control " name="secondary_text">
                    </div>
                    <div class="form-group">
                        <label for="">الصورة</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">انشاء</button>
                </form>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>الصورة</th>
                        <th>النص الاول</th>
                        <th>النص الثانوي</th>
                        <th>تحكم</th>
                    </tr>
                    @foreach(@App\Slider::all() as $slider)
                        <tr>
                            <td>
                                <img height="220px" width="220px" src="{{asset('public/'.$slider->image)}}">
                            </td>
                            <td>{{$slider->primary_text}}</td>
                            <td>{{$slider->secondary_text}}</td>
                            <td>
                                <form action="{{route('admin.sliders.destroy',$slider)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example{{$slider->id}}">
                                    تعديل
                                </button>
                                <div class="modal fade" id="example{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.sliders.update',$slider)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group">
                                                        <label for="">النص الاول</label>
                                                        <input type="text" class="form-control " value="{{$slider->primary_text}}" name="primary_text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">النص الثانوي</label>
                                                        <input type="text" class="form-control "value="{{$slider->secondary_text}}"  name="secondary_text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">الصورة</label>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">تعديل</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
