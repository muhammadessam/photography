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
                @foreach (auth()->guard('admin')->user()->notifications as $not)
                    <a href="{{ route('admin.order_comments',['order' => $not->data['order']['id']]) }}" class="d-flex justify-content-between px-4">
                        <span>{{ $not->data['body'] }}</span>
                        @if ($not->unread())
                        <i class="fas fa-envelope"></i>
                    @else
                        <i class="fas fa-envelope-open"></i>
                    @endif
                    </a>
                               
                @endforeach
            </div>
        </div>
    </div>
@endsection