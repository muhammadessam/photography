@extends('admin.layout.layout')
@section('content')
    <div class="container">
        <h3 class="col-12 text-center">المشرفين</h3>
        <div class="col-12 justify-content-start m-3">
            <a href="{{route('admin.admins.create')}}" class="btn btn-success">
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
                        <a class="btn btn-primary" title="تعديل" href="{{route('admin.admins.edit',$admin)}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-warning" title="الصلاحيات" href="{{route('admin.permissions',$admin )}}">
                            <i class="fa fa-sticky-note"></i>
                        </a>
                        <button type="button" title="حذف" class="btn btn-danger" data-toggle="modal" data-target="#example{{$admin->id}}">
                            <i class="fa fa-trash"></i>
                        </button>
                        <div class="modal fade" id="example{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <form action="{{route('admin.admins.destroy',$admin)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button title="حذف" class="btn btn-danger" type="submit">
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
