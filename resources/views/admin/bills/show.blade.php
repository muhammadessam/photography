@extends('admin.layout.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>
                        فاتورة
                    </h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">رقم الفاتورة</label>
                                <div class="form-control">
                                    {{$bill->id}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">الملبغ</label>
                                <div class="form-control">
                                    {{$bill->price}}
                                </div>
                            </div>
                            @if($bill->status == 'متبقي')
                                <div class="form-group">
                                    <label for="name">الباقي</label>
                                    <div class="form-control">
                                        {{$bill->remains}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">القسم</label>
                                <div class="form-control">
                                    {{$bill->category->name}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">الحالة</label>
                                <div class="form-control">
                                    {{$bill->status}}
                                </div>
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
                    <h3 class="card-title">
                        العميل
                    </h3>
                </div>
                <div class="card-body">
                    <table id="customers" class="table table-bordered text-center">
                        <thead class="thead-light" style="background-color: white;">
                        <td>الاسم</td>
                        <td>الهاتف</td>
                        <td>البريد</td>
                        <td>المدينة</td>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$bill->customer->user->name}}</td>
                            <td>{{$bill->customer->phone}}</td>
                            <td>{{$bill->customer->user->email}}</td>
                            <td>{{$bill->customer->city}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="text-align: right !important;">
                    <h3 class="card-title">الطلب الخاص بالفاتورة</h3>
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
                        </tr>
                        </thead>
                        <tr>
                            <td>{{$bill->order['id']}}</td>
                            <td>{{$bill->order->customer->user->name}}</td>
                            <td>{{$bill->order->category->name}}</td>
                            <td>{{$bill->order['address']}}</td>
                            <td>{{$bill->order['date']}}</td>
                            <td>{{$bill->order->get_status()}}</td>
                            <td>{{$bill->order['is_special'] ? 'خاصة':'عامة'}}</td>
                            <td>{{$bill->order['is_right_print']? 'نعم':'لا'}}</td>
                            <td>{{$bill->order['is_on_our_page'] ? 'نعم' :'لا'}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection