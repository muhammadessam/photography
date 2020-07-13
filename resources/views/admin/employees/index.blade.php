@extends('admin.layout.layout')
@section('content')
    <div class="row">

    </div>
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="card col-3 p-2 bg-success">
                <a href="{{route('admin.Employee_Activate')}}">
                    <h3 class="col-12 text-center">
                        الموظفين الفعالين
                        <br>
                        {{@App\Employee::all()->where('Statue','Activate')->count()}}
                    </h3>
                </a>
            </div>
            <div class="card col-3 p-2 bg-danger">
                <a href="{{route('admin.Employee_Deactivate')}}">
                    <h3 class="col-12 text-center">
                        الموظفين الغير فعالين
                        <br>
                        {{@App\Employee::all()->where('Statue','Deactivate')->count()}}
                    </h3>
                </a>
            </div>
            <div class="card col-3 p-2 bg-warning">
                <a href="{{route('admin.employees.index')}}">
                    <h3 class="col-12 text-center">
                        الموظفين
                        <br>
                        {{@App\Employee::all()->count()}}
                    </h3>
                </a>
            </div>
        </div>
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
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->exp}}</td>
                            <td>{{$employee->category->name}}</td>
                            <td>{{$employee->is_available ? 'متاح':'مشغول'}}</td>
                            <td>{{$employee->nationality}}</td>
                            <td class="d-flex">
                                <a title="مشاهدة" href="{{route('admin.employees.show', $employee)}}" class="btn btn-success ml-1"><i class="fa fa-eye"></i></a>
                                <a title="تعديل" class="btn btn-primary ml-1" href="{{route('admin.employees.edit',$employee)}}"><i class="fa fa-edit"></i></a>
                                <a title="الطلبات" class="btn btn-warning ml-1" href="{{route('admin.emp_orders',$employee)}}">
                                    <i class="fa fa-first-order"></i>
                                    <span class="badge-danger badge">{{$employee->orders->count()}}</span>
                                </a>
                                <button title="حذف" type="button" class="btn btn-danger" data-toggle="modal" data-target="#example{{$employee->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <div class="modal fade" id="example{{$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                هل انت متأكد من الحذف ؟
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('admin.employees.destroy',$employee)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
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
@section('javascript')
    <x-datatable id="employees"></x-datatable>
@endsection
