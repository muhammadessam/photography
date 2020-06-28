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
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="col-6"><h3>الصفحات الحالية</h3></div>
                        <div class="col-6 text-left"><a href="{{route('admin.page.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a></div>
                    </div>
                    <div class="card-body">
                        <table id="pages" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>اسم الصفحة</th>
                                <th>العنوان</th>
                                <th>رابط الصفحة</th>
                                <th>فعالة</th>
                                <th>المكان</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Page::all() as $page)
                                <tr>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->slug}}</td>
                                    <td>{{url($page->slug)}}</td>
                                    <td>{{$page->is_active? "فعالة":"غير فعالة"}}</td>
                                    <td>{{$page->place=="header"? "الهيدر":"الفوتر"}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.page.edit', $page)}}" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a>
{{--                                        <a target="_blank" blank href="{{route('loadPage', $page->slug)}}" class="btn btn-primary ml-2"><i--}}
{{--                                                class="fa fa-eye"></i></a>--}}
                                        <form action="{{route('admin.page.destroy', $page)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                            </button>
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

@endsection
@section('javascript')
    <x-datatable id="pages"></x-datatable>
@endsection
