@extends('site.layouts.base')
@section('content')
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                الاشعارات
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($nots as $not)
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-end">
                                <small >{{\Carbon\Carbon::parse($not->created_at)->diffForHumans()}}</small>
                            </div>
                            <p class="mb-1">
                                {{$not->body}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
