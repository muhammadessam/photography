@extends('admin.layout.layout')
@section('content')
    <div class="content">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <div class="col-6">
                    <h3>الإشعارات</h3>
                </div>
            </div>
            <div class="card-body">
                @foreach (auth()->guard('admin')->user()->notifications as $notification)
                    @include('admin.notifications.types.'.snake_case(class_basename($notification->type)), $notification)                               
                @endforeach
            </div>
        </div>
    </div>
@endsection