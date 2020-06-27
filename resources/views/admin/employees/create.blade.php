@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <div class="card col-6" style="margin: 0 auto;">
            <div class="card-header">
                <h4 class="col-12 text-center"> انشاء موظف </h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.employees.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="exp">الخبرة</label>
                        <select name="exp" class="form-control" id="exp">
                            <option value="مبتدئ">مبتدئ</option>
                            <option value="متوسط">متوسط</option>
                            <option value="متقدم">متقدم</option>
                            <option value="محترف">محترف</option>
                            <option value="خبير">خبير</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success btn-block" value="حفظ" name="" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
