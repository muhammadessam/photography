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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الفواتير</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h3 class="card-title">اضافة فاتورة جديدة</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <form action="{{route('admin.bills.store')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="customer_id" value="{{$order->customer->id}}">
                                                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="cat_id">القسم</label>
                                                                                <select name="cat_id" id="cat_id" class="form-control">
                                                                                    @foreach(\App\Category::all() as $item)
                                                                                        <option {{old('cat_id')==$item['id'] ? 'selected' : ''}} value="{{$item['id']}}">{{$item->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <x-error name="cat_id"></x-error>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="price">المبلغ</label>
                                                                                <input type="number" step=".1" class="form-control" name="price" id="price" value="{{old('price')}}">
                                                                                <x-error name="price"></x-error>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="status">حالة الفاتورة</label>
                                                                                <select name="status" id="status" class="form-control">
                                                                                    <option {{old('status')=='مسدد' ? 'selected':''}}value="مسدد">مسدد</option>
                                                                                    <option {{old('status')=='غير مسدد' ? 'selected':''}}value="غير مسدد">غير مسدد</option>
                                                                                    <option {{old('status')=='متبقي' ? 'selected':''}}value="متبقي">متبقي</option>
                                                                                </select>
                                                                                <x-error name="status"></x-error>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="remains">الباقي في حالة عدم سداد المبلغ كلية</label>
                                                                                <input type="number" step=".1" class="form-control" name="remains" id="remains" value="{{old('remains')}}">
                                                                                <x-error name="remains"></x-error>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> حفظ</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-responsive-lg" id="bills">
                                <thead>
                                <tr>
                                    <th>رقم الفاتورة</th>
                                    <th>اسم العميل</th>
                                    <th>رقم الطلب</th>
                                    <th>القسم</th>
                                    <th>المبلغ</th>
                                    <th>الحالة</th>
                                    <th>القيمة المتبقة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->bills as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item->customer->user->name}}</td>
                                        <td>{{$item->order->id}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->remains}}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-info ml-1" href="{{route('admin.bills.show', $item)}}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-warning ml-1" href="{{route('admin.bills.edit', $item)}}"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('admin.bills.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card col-12">
                    <div class="card-header">
                        <h4 class="col-12 text-right">
                            التعليقات
                            <span class="btn btn-danger btn-sm">{{$order->comments->count()}}</span>
                        </h4>
                    </div>
                    <div class="card-body">
                        @foreach($order->comments as $comment)
                            <div class="card col-12 {{$comment['is_admin']?'bg-primary':'bg-secondary'}}">
                                <div class="card-header">
                                    <h5>
                                        {{$comment['is_admin']?'الادارة':'العميل'}}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                        {{$comment['body']}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        @if($order->comments->count() == 0)
                            <div class="card bg-dark-gradient p-3">
                                <h4 class="col-12 text-center">لا يوجد تعليقات</h4>
                            </div>
                        @endif
                        <div class="col-12">
                            <form class="col-12" action="{{route('admin.comments.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <input type="hidden" name="is_admin" value="1">
                                <div class="form-group">
                                    <label for="body">محتوي التعليق</label>
                                    <textarea name="body" id="body" cols="30" class="form-control" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn-outline-success btn">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="employees"></x-datatable>
    <x-datatable id="bills"></x-datatable>
@endsection
