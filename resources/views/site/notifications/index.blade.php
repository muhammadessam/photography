@extends('site.layouts.base')
@section('content')
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                الاشعارات
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach(auth()->user()->notifications as $not)
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-end">
                                <small >{{$not->created_at->diffForHumans()}}</small>
                            </div>
                            <a href="{{ route('account.orders.show', ['id' => $not->data['order']['id'], 'tab' => 'comments'] ).'#comment'.$not->data['comment']['id'] }}" class="mb-1">
                                {{$not->data['body']}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
