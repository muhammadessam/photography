@extends('site.layouts.base')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">ْ
                <h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    @foreach(@App\AdminImage::all() as $image)
                        <div class="col-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    <img class="img-thumbnail" width="100%" src="{{asset($image->image)}}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
