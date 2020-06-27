@extends('admin.layout.layout')
@section('content')
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="text-align: right !important;">
                            <h3 class="card-title">الاقسام</h3>
                            <div class="card-tools">
                                <div>
                                    <form class="form-inline" action="{{route('admin.categories.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل اسم القسم الجديد ...">
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
                            <table id="cats" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                @foreach(\App\Category::all() as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary ml-2" href="{{route('admin.categories.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('admin.categories.destroy', $item)}}" method="post">
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
@section('javascript')
    <x-datatable id="cats"></x-datatable>
@endsection