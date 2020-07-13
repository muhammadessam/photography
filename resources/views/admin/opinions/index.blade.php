@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <h3 class="col-12 text-center">رأي العملاء</h3>
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
