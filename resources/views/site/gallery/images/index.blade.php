@extends('site.layouts.base')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">ْ
                <h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    <a href="{{ route('images.show', ['id' => $image->id ]) }}"><img class="img-thumbnail" width="100%" height="150px" src="{{asset($image->image)}}"></a>
                                </div>
                                <div class="card-footer">
                                    <p><strong>المشاهدات: </strong> {{ $image->getViews() }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
