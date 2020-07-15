@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <div class="card col-6" style="margin: 0 auto;">
            <div class="card-header">
                <h4 class="col-12 text-center"> تعديل موظف </h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.employees.update',$employee)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" value="{{$employee->name}}" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد</label>
                        <input type="email" class="form-control" value="{{$employee->email}}" name="email" id="email">
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة السر</label>
                        <input type="password" class="form-control" value="same" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="exp">الخبرة</label>
                        <select name="exp" class="form-control" id="exp">
                            <option value="{{$employee->exp}}">{{$employee->exp}}</option>
                            <option value="مبتدئ">مبتدئ</option>
                            <option value="متوسط">متوسط</option>
                            <option value="متقدم">متقدم</option>
                            <option value="محترف">محترف</option>
                            <option value="خبير">خبير</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cat_id">القسم</label>
                        <select name="cat_id" class="form-control" id="cat_id">
                            <option value="{{$employee->category->id}}">{{$employee->category->name}}</option>
                            @foreach(@App\Category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        <input type="text" class="form-control" value="{{$employee->phone}}" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="nationality">الجنسية</label>
                        <input type="text" class="form-control" name="nationality" id="nationality" value="{{$employee->nationality}}">
                    </div>
                    <div class="form-group">
                        <label for="is_available">الحالة</label>
                        <select name="is_available" class="form-control" id="exp">
                            <option {{$employee->is_available ? 'selected' : ''}} value="1">نعم</option>
                            <option {{!$employee->is_available ? 'selected' : ''}} value="0">لا</option>
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
