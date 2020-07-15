@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3 justify-content-center">
        <div class="card">
            <div class="card-header">
                انشاء مشرف
            </div>
            <div class="card-body">
                <form action="{{route('admin.admins.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>الاسم</label>
                        <input name="name" class="form-control">
                    </div>
                    <div>
                        <label>البريد</label>
                        <input name="email"  class="form-control">
                    </div>
                    <div>
                        <label>كلمة السر</label>
                        <input name="password"  type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
