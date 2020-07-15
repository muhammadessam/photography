@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <h3 class="col-12 text-center">رأي العملاء</h3>
        <a href="#" data-toggle="modal" data-target="#exampleModalCenter"
           class="btn btn-success">
            <i class="fa fa-plus"></i>
        </a>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <section class="card" id="add_opinion">
                            <h3 class="col-12 text-center pt-3 pb-3">اضف رأي</h3>
                            <form class="container" action="{{route('opinions.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">العميل</label>
                                    <select name="customer_id" class="form-control">
                                        @foreach(@App\Customer::all() as $customer)
                                            <option value="{{$customer->id}}">{{$customer->user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="body">الرأي</label>
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="5"></textarea>
                                </div>
                                <button class="btn btn-success" type="submit">ارسال</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <td>من</td>
                <td>الرأي</td>
                <td>الحالة</td>
                <td>تحكم</td>
            </tr>
            @foreach(@App\Opinion::all() as $op)
                <tr>
                    <td>
                        {{$op->customer->user->name}}
                    </td>
                    <td >
                        {{$op->body}}
                    </td>
                    <td class="{{$op->statue == "pending"?"bg-info":($op->statue == "accepted"?"bg-success":"bg-danger")}}">
                        {{$op->statue == "pending"?"بالانتظار":($op->statue == "accepted"?"مقبول":"مرفوض")}}
                    </td>
                    <td>
                        <form class="float-left" action="{{route('admin.opinions.destroy',$op)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="حذف" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            @if($op->statue == "pending")
                                <a class="btn btn-success" title="الموافقة" href="{{route('admin.opinion_accept',$op)}}"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning" title="الرفض" href="{{route('admin.opinion_refuse',$op)}}"><i class="fa fa-times"></i></a>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
