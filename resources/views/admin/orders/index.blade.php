@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-5">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h3>الطلبات</h3>

                            <p>المنتظرة {{\App\Order::all()->where('status', 'waiting')->count()}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.orders.index')."?status=waiting"}}" class="small-box-footer">اعرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h3>الطلبات</h3>
                            <p>المكتملة {{\App\Order::all()->where('status', 'final')->count()}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.orders.index')."?status=final"}}" class="small-box-footer">اعرض <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h3>الطلبات</h3>

                            <p>المرفوضة {{\App\Order::all()->where('status', 'rejected')->count()}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-"></i>
                        </div>
                        <a href="{{route('admin.orders.index')."?status=rejected"}}" class="small-box-footer">اعرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="text-align: right !important;">
                            <h3 class="card-title">الطلبات</h3>
                            <div class="card-tools">
                                <div>
                                    <a class="btn btn-success" href="{{route('admin.orders.create')}}"><i class="fa fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto">
                            <table id="cats" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>رقم الطلب</th>
                                    <th>اسم العميل</th>
                                    <th>القسم</th>
                                    <th>العنوان</th>
                                    <th>الوقت</th>
                                    <th>الحالة</th>
                                    <th>نوع المناسبة خاصة/عامة</th>
                                    <th>اضافة الختم علي الصور</th>
                                    <th>عرض المناسبة علي الصفحة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item->customer->user->name}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>{{$item['address']}}</td>
                                        <td>{{$item['date']}}</td>
                                        <td>{{$item->get_status()}}</td>
                                        <td>{{$item['is_special'] ? 'خاصة':'عامة'}}</td>
                                        <td>{{$item['is_right_print']? 'نعم':'لا'}}</td>
                                        <td>{{$item['is_on_our_page'] ? 'نعم' :'لا'}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-secondary ml-2" href="{{route('admin.orders.show', $item)}}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary ml-2" href="{{route('admin.orders.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-info ml-2" title="التعليقات" href="{{route('admin.order_comments', $item)}}"><i class="fa fa-comment"></i></a>
                                            <form action="{{route('admin.orders.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
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
@section('javascript')
    <x-datatable id="cats"></x-datatable>
@endsection
