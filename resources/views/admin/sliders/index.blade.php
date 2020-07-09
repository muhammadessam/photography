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
                        <th>تحكم</th>
                    </tr>
                    @foreach(@App\Slider::all() as $slider)
                        <tr>
                            <td>
                                <img height="220px" src="{{asset($slider->image)}}">
                            </td>
                            <td>
                                <form action="{{route('admin.sliders.destroy',$slider)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
