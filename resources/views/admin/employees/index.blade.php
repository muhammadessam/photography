@extends('admin.layout.layout')
@section('content')
    <div class="container">
        <h3 class="col-12 text-center">الموظفين</h3>
        <div class="col-12 justify-content-start m-3">
            <a href="{{route('admin.employees.create')}}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
            </a>
        </div>
        <table id="employees" class="table table-bordered text-center">
            <thead>
                <td>الاسم</td>
                <td>الهاتف</td>
                <td>البريد</td>
                <td>الخبرة</td>
                <td>القسم</td>
                <td>تحكم</td>
            </thead>
            @foreach(@App\Employee::all() as $employee)
            <tr>
                <td>{{$employee->name}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->exp}}</td>
                <td>{{$employee->category->name}}</td>
                <td>
                    <form action="{{route('admin.employees.destroy',$employee)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{route('admin.employees.edit',$employee)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @if(@App\Employee::all()->count() == 0)
                <tr>
                    <th colspan="5">
                        <h4 class="col-12 text-center"> لم يسجل </h4>
                    </th>
                </tr>
            @endif
        </table>
    </div>
@endsection
@section('javascript')
    <x-datatable id="employees"></x-datatable>
@endsection
