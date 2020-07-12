@extends('site.layouts.base')
@section('content')
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                الاشعارات
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach(auth()->user()->notifications as $notification)
                        @include('site.notifications.types.'.snake_case(class_basename($notification->type)), $notification)   
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
