@extends('admin.layout.layout')
@section('content')
    <div class="container">
        <h3 class="col-12 text-center">المشرفين</h3>
        <div class="col-12 justify-content-start m-3">
            <a href="#" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
            </a>
        </div>
        <table id="admins" class="table table-bordered text-center">
            <thead>
            <td>الاسم</td>
            <td>البريد</td>
            <td>تحكم</td>
            </thead>
            @foreach(@App\Admin::all() as $admin)
                <tr>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>
                        <form action="{{route('admin.admins.destroy',$admin)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="#">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-warning" href="{{route('admin.permissions',$admin )}}">
                                <i class="fa fa-sticky-note"></i>
                            </a>
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if(@App\Admin::all()->count() == 0)
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
    <x-datatable id="admins"></x-datatable>
@endsection
