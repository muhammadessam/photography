@extends('site.layouts.base')
@section('content')
    <style>
        iframe{
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>معرض الفيديوهات</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    @foreach(@App\AdminVideo::all() as $video)
                        <div class="col-lg-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    @if($video->local == null)
                                        <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                                @php
                                                    parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                                @endphp
                                                src="https://www.youtube.com/embed/{{  $output['v'] }}"
                                                frameborder="0"></iframe>
                                    @else
                                        <video width="100%" height="250"  controls src="{{asset('public/'.$video->local)}}#t=3.0"></video>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

