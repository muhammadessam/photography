@extends('site.layouts.base')
@section('content')
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                الاشعارات
            </div>
            <div class="card-body">
                <div class="list-group">
                    @if(auth()->guard('employee')->check())
                        @foreach(auth()->guard('employee')->user()->nots as $not)
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
                    @else
                        @foreach(auth()->user()->nots as $not)
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
