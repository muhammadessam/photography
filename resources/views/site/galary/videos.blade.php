@extends('site.layouts.base')
@section('content')
    <style>
        iframe{
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>معرض الفيديوهات</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    @foreach(@App\AdminVideo::all() as $video)
                        <div class="col-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    {!! $video->video !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
