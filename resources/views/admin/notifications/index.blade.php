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
                @foreach(auth()->guard('admin')->user()->nots as $not)
                    <div class="card p-2">
                        <div class="card-body">
                            {{$not->body}}
                            @php
                                $not->read = 1;
                                $not->save();
                            @endphp
                        </div>
                        <div class="card-footer text-left">
                            {{\Carbon\Carbon::parse($not->created_at)->diffForHumans()}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
