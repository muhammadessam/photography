@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-5 justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h5>الطلبات</h5>

                            <p>المنتظرة {{\App\Order::all()->where('status', 'waiting')->count()}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.orders.index')."?status=waiting"}}" class="small-box-footer">اعرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h5>الطلبات</h5>
                            <p>المقبولة {{\App\Order::all()->where('status', 'accepted')->count()}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('admin.orders.index')."?status=accepted"}}" class="small-box-footer">اعرض <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h5>الطلبات</h5>

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
    <div class="container-fluid ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="text-align: right !important;">
                            <h3 class="card-title">الطلبات</h3>
                            <div class="card-tools">
                                <div class="my-btn">
                                    <a class="btn btn-success" href="{{route('admin.orders.create')}}"><i class="fa fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto" style="overflow: auto">
                            <table id="cats" class="table table-striped table-responsive-lg bo-gal">
                                <thead>
                                <tr>
                                    <th class="text-center">رقم الطلب</th>
                                    <th class="text-center"> العميل</th>
                                    <th class="text-center">القسم</th>
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">الوقت</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">المدينة</th>
                                    <th class="text-center">الحي</th>
                                    <th class="text-center"> المناسبة </th>
                                    <th class="text-center tik" > الختم علي الصور</th>
                                    <th class="text-center">عرض المناسبة </th>
                                    <th class="text-center">اجراء</th>
                                </tr>
                                </thead>
                                @foreach($orders as $item)
                                    <tr>
                                        <td class="text-center">{{$item['id']}}</td>
                                        <td class="text-center">{{$item->customer->user->name}}</td>
                                        <td class="text-center">{{$item->category->name}}</td>
                                        <td class="text-center">{{$item['address']}}</td>
                                        <td class="text-center">{{$item['date']}}</td>
                                        <td class="text-center">{{$item->get_status()}}</td>
                                        <td class="text-center">{{$item->country ? $item->country->name : null}}</td>
                                        <td class="text-center">{{$item->city ? $item->city->name : 'لا بيانات'}}</td>
                                        <td class="text-center">{{$item['is_special'] ? 'خاصة':'عامة'}}</td>
                                        <td class="text-center">{{$item['is_right_print']? 'نعم':'لا'}}</td>
                                        <td class="text-center">{{$item['is_on_our_page'] ? 'نعم' :'لا'}}</td>
                                        <td class="d-flex my-btn text-center justify-content-center">
                                            <a class="btn btn-secondary ml-2" href="{{route('admin.add-order-bill', $item)}}" title="اضافة فاتورة"><i class="fa fa-plus-square-o"></i></a>
                                            <a class="btn btn-secondary ml-2" href="{{route('admin.orders.show', $item)}}" title="معاينة الطلب"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary ml-2" href="{{route('admin.orders.edit', $item)}}" title="التعديل "><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-info ml-2" title="التعليقات" href="{{route('admin.order_comments', $item)}}"><i class="fa fa-comment"></i></a>
                                            <form action="{{route('admin.orders.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit" title="حذف"><i class="fa fa-trash"></i></button>
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
