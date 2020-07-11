@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3 justify-content-center">
        <div class="card">
            <div class="card-header">
                تعديل مشرف
            </div>
            <div class="card-body">
                <form action="{{route('admin.admins.update',$admin)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>الاسم</label>
                        <input name="name" value="{{$admin->name}}" class="form-control">
                    </div>
                    <div>
                        <label>البريد</label>
                        <input name="email"  value="{{$admin->email}}" class="form-control">
                    </div>
                    <div>
                        <label>كلمة السر</label>
                        <input name="password" value="same"  type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
