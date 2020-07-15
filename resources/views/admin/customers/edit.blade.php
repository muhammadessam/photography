@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <div class="card col-6" style="margin: 0 auto;">
            <div class="card-header">
                <h4 class="col-12 text-center"> تعديل عميل </h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.customers.update',$customer)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" value="{{$customer->user->name}}" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد</label>
                        <input type="email" class="form-control" value="{{$customer->user->email}}" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="city">المدينة</label>
                        <input type="text" class="form-control" value="{{$customer->city}}" name="city" id="city">
                    </div>
                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        <input type="text" class="form-control" value="{{$customer->phone}}" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="">الصورة الشخصية</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success btn-block" value="حفظ" name="" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
