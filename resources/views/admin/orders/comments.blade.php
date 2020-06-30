@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <h4 class="col-12 text-center my-4">
            التعليقات
            <span class="btn btn-danger btn-sm">{{$order->comments->count()}}</span>
        </h4>
        @foreach($order->comments as $comment)
            <div class="card {{$comment['is_admin']?'bg-primary':'bg-secondary'}}">
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
        <div>
            <form action="{{route('admin.comments.store')}}" method="post">
                @csrf
                <input type="hidden" name="order_id" value="{{$order->id}}">
                <input type="hidden" name="is_admin" value="1">
                <div class="form-group">
                    <label for="body">محتوي التعليق</label>
                    <textarea name="body" id="body" cols="30" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn-outline-success btn">ارسال</button>
            </form>
        </div>
    </div>
@endsection
