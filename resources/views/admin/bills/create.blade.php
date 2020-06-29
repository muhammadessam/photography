@extends('admin.layout.layout')

@section('content')
    <div class="row">

    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">اضافة فاتورة جديدة</h3>
                        <div class="card-tools">
                            <a class="btn btn-primary" href="{{route('admin.bills.index')}}"><i class="fa fa-list"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.bills.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    @if(isset($order))
                                        <div class="form-group">
                                            <label for="customer_id">اسم العميل</label>
                                            <input type="hidden" name="customer_id" class="form-control" id="customer_id"  value="{{$order->customer->id}}">
                                            <div class="form-control">{{$order->customer->user->name}}</div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="customer_id">اسم العميل</label>
                                            <select name="customer_id" id="customer_id" class="form-control">
                                                @foreach(\App\Customer::all() as $item)
                                                    <option {{old('customer_id')==$item['id'] ? 'selected' : ''}} value="{{$item['id']}}">{{$item->user['name']}}</option>
                                                @endforeach
                                            </select>
                                            <x-error name="customer_id"></x-error>
                                        </div>
                                    @endif

                                    @if(isset($order))
                                        <div class="form-group">
                                            <label for="order_id">رقم الطلب</label>
                                            <input type="hidden" name="order_id" class="form-control" id="order_id" value="{{$order->id}}">
                                            <div class="form-control">{{$order->id}}</div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="order_id">رقم الطلب</label>
                                            <select name="order_id" id="order_id" class="form-control">
                                                @foreach(\App\Order::all() as $item)
                                                    <option {{old('order_id')==$item['id'] ? 'selected' : ''}} value="{{$item['id']}}">{{$item->id}}</option>
                                                @endforeach
                                            </select>
                                            <x-error name="order_id"></x-error>
                                        </div>
                                    @endif


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
@endsection