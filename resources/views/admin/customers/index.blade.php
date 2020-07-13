@extends('admin.layout.layout')
@section('content')

    <div class="row">

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">العملاء</h3>
                        <div class="card-tools row">
                            <a href="{{route('admin.customers.create')}}" class="btn btn-success">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                            <a class="btn btn-warning" href="{{ route('admin.export') }}"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="customers" class="table table-bordered text-center">
                            <thead class="thead-light" style="background-color: white;">
                            <td>الاسم</td>
                            <td>الهاتف</td>
                            <td>البريد</td>
                            <td>المدينة</td>
                            <td>تحكم</td>
                            </thead>
                            @foreach(@App\Customer::all() as $customer)
                                <tr>
                                    <td>{{$customer->user->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->user->email}}</td>
                                    <td>{{$customer->city}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('admin.customers.edit',$customer)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.customer_orders',$customer)}}" class="btn btn-sm btn-success">
                                            الطلبات
                                            <span class="btn btn-sm btn-danger">{{$customer->orders->count()}}</span>
                                        </a>
                                        <a href="{{route('admin.customer_bills',$customer)}}" class="btn btn-sm btn-success">
                                            الفواتير
                                            <span class="btn btn-sm btn-danger">{{$customer->bills->count()}}</span>
                                        </a>
                                        <a href="{{route('admin.customer_images',$customer)}}" class="btn btn-sm btn-success">
                                            الصور
                                        </a>
                                        <a href="{{route('admin.customer_videos',$customer)}}" class="btn btn-sm btn-success">
                                            الفيديو
                                        </a>
                                        <a href="{{route('admin.send_whatsapp',$customer)}}" class="btn btn-outline-success">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example{{$customer->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="example{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        هل انت متأكد من الحذف ؟
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('admin.customers.destroy',$customer->user)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">
                                                                حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if(@App\Customer::all()->count() == 0)
                                <tr>
                                    <th colspan="5">
                                        <h4 class="col-12 text-center"> لم يسجل </h4>
                                    </th>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="customers"></x-datatable>
@endsection
