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
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_id">العميل</label>
                                        <div class="form-control">{{$order->customer->user->name}}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">القسم</label>
                                        <div class="form-control">{{$order->category->name}}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">الحالة</label>
                                        <div class="form-control">{{$order->get_status()}}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">الوقت</label>
                                        <div class="form-control">{{$order['date']}}</div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="address">العنوان :</label>
                                        <div class="form-control">{{$order['address']}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">نوع المناسبة خاصة / عام :</label>
                                        <div class="form-control">{{$order['is_special'] ? 'خاصة':'عامة'}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">اضافة حقوقنا علي التصميم :</label>
                                        <div class="form-control">{{$order['is_right_print'] ? 'نعم':'لا'}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">عرض المناسبة علي صفحاتنا :</label>
                                        <div class="form-control">{{$order['is_on_our_page'] ? 'نعم':'لا'}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الموظفين المخصوصين بهذا العمل</h3>
                            <div class="card-tools">
                                <form action="{{route('admin.order-add-employee', $order)}}" method="post" class="form-inline">
                                    @csrf
                                    <div class="form-group">
                                        <select class="form-control" name="employee_id" id="employee_id">
                                            @foreach(\App\Employee::all() as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-plus-circle"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="employees" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>اسم الموظف</th>
                                    <th>التقييم</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                @foreach($order->employees as $item)
                                    <tr>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item->orders()->find($order)->pivot->stars}}</td>
                                        <td class="d-flex">
                                            <form class="ml-1" action="{{route('admin.order-remove-employee', [$order, $item])}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
                                                @csrf
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                            <form action="{{route('admin.order-employee-star', [$order, $item])}}" class="form-inline" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" name="star" id="" class="form-control @error('star') is-invalid @enderror" placeholder="اضف تقيم من 1 الي 5 ">
                                                </div>
                                                <button type="submit" class="mr-1 btn btn-primary"><i class="fa fa-plus-circle"></i></button>
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
    <x-datatable id="employees"></x-datatable>
@endsection