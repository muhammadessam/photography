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
                        <div class="card-header">
                            <h3 class="card-title">المدن</h3>
                            <div class="card-tools">
                                <div>
                                    <form class="form-inline" action="{{route('admin.country.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل اسم المدينة الجديد ...">
                                            <x-error name="name"></x-error>
                                        </div>
                                        <div class="form-group mr-2">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="countries" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Country::all() as $item)
                                        <tr>
                                            <td>{{$item['name']}}</td>
                                            <td class="d-flex">
                                                <a class="btn btn-primary ml-2" title="مشاهدة" href="{{route('admin.country.show', $item)}}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-primary ml-2" title="تعديل"  href="{{route('admin.country.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('admin.country.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button title="حذف" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="countries"></x-datatable>
@endsection
