@extends('admin.layout.layout')
@section('content')
    <div class="row">

    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">الموظفين</h3>
                <div class="card-tools">
                    <a href="{{route('admin.employees.create')}}" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="card-body" style="overflow: auto">
                <table id="employees" class="table table-bordered text-center">
                    <thead>
                    <td>الاسم</td>
                    <td>الهاتف</td>
                    <td>البريد</td>
                    <td>الخبرة</td>
                    <td>القسم</td>
                    <td>الحالة</td>
                    <td>الجنسية</td>
                    <td>تحكم</td>
                    </thead>
                    @foreach(@App\Employee::all() as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->exp}}</td>
                            <td>{{$employee->category->name}}</td>
                            <td>{{$employee->is_available ? 'متاح':'مشغول'}}</td>
                            <td>{{$employee->nationality}}</td>
                            <td class="d-flex">
                                <a href="{{route('admin.employees.show', $employee)}}" class="btn btn-success ml-1"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary ml-1" href="{{route('admin.employees.edit',$employee)}}"><i class="fa fa-edit"></i></a>
                                <form action="{{route('admin.employees.destroy',$employee)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="employees"></x-datatable>
@endsection
