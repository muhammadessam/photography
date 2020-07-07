@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="text-align: right !important;">
                            <h3 class="card-title">الخدمات</h3>
                            <div class="card-tools">
                                <div>
                                    <a class="btn btn-primary ml-2" href="{{route('admin.services.create')}}"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="cats" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>عنوان الخدمة</th>
                                    <th>وصف الخدمة</th>
                                    <th>الأيقونة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{$service->title}}</td>
                                        <td>{{$service->description}}</td>
                                        <td><i class="fa fa-{{$service->icon}}"></i></td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary ml-2" href="{{route('admin.services.edit', $service)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('admin.services.destroy', $service)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
