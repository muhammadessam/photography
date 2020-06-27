@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <div class="card col-4" style="margin: 0 auto;">
            <div class="card-header">
                <h3 class="col-12 text-center">الصلاحيات</h3>
            </div>
            <div class="card-body">
                <form action="{{route('admin.update_perms',$admin)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="admins">المشرفين</label>
                        <select name="admins" class="form-control" id="admins">
                            @if($permissions['admins'])
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            @else
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employees">الموظفين</label>
                        <select name="employees" class="form-control" id="employees">
                            @if($permissions['employees'])
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            @else
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customers">العملاء</label>
                        <select name="customers" class="form-control" id="customers">
                            @if($permissions['customers'])
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            @else
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories">الاقسام</label>
                        <select name="categories" class="form-control" id="categories">
                            @if($permissions['categories'])
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            @else
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="settings">الاعدادات</label>
                        <select name="settings" class="form-control" id="settings">
                            @if($permissions['settings'])
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            @else
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orders">الطلبات</label>
                        <select name="orders" class="form-control" id="orders">
                            @if($permissions['orders'])
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            @else
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bills">الفواتير</label>
                        <select name="bills" class="form-control" id="bills">
                            @if($permissions['bills'])
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            @else
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
