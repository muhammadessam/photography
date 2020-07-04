@extends('site.layouts.base')
@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الفواتير</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive-lg" id="bills">
                        <thead>
                        <tr>
                            <th>رقم الفاتورة</th>
                            <th>رقم الطلب</th>
                            <th>القسم</th>
                            <th>المبلغ</th>
                            <th>الحالة</th>
                            <th>القيمة المتبقة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{{$item->order->id}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->remains}}</td>
                            </tr>
                        @endforeach
                        @if($bills->count() == 0)
                            <tr>
                                <td colspan="6">
                                    <h4 class="col-12 text-center">لا يوجد</h4>
                                </td>
                            </tr>
                        @endif
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

