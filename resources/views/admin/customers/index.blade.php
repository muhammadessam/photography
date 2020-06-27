@extends('admin.layout.layout')
@section('content')
    <div class="container">
        <h3 class="col-12 text-center">العملاء</h3>
        <div class="col-12 justify-content-start m-3">
            <a href="{{route('admin.customers.create')}}" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
            </a>
        </div>
        <table id="customers" class="table table-bordered text-center">
            <thead>
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
                    <a class="btn btn-primary" href="{{route('admin.customers.edit')}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{route('admin.customers.destroy')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
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
    <x-datatable id="customers"></x-datatable>
@endsection
