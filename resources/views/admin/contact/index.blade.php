@extends('admin.layout.layout')
@section('content')
    <div class="content">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <div class="col-6">
                    <h3>اتصل بنا</h3>
                </div>
            </div>
            <div class="card-body overflow-auto">
                <table id="contact" class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>الايميل</th>
                        <th>الرسالة</th>
                        <th>ادارة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Contact::all() as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->msg}}</td>
                            <td class="row d-flex justify-content-around">
                                <div class=""><a class="btn btn-info" href="{{route('admin.contact.show', $item)}}"><i class="fa fa-eye"></i></a></div>
                                <div class=""><a class="btn btn-primary" href="{{route('admin.showReplyForm', $item)}}"><i class="fa fa-send"></i></a></div>
                                <div class="">
                                    <form action="{{route('admin.contact.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="contact"></x-datatable>
@endsection
