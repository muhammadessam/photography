@extends('admin.layout.layout')
@section('content')
    <div class="row">

    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الفواتير</h3>
                    <div class="card-tools">
                        <a class="btn btn-success" href="{{route('admin.bills.create')}}"><i class="fa fa-plus-circle"></i></a>
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
                        @foreach(\App\Bill::all() as $item)
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
    </div>
@endsection
@section('javascript')
    <x-datatable id="bills"></x-datatable>
@endsection