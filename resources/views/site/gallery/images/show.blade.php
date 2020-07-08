@extends('site.layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header"><h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                        <div class="col-12">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    <img class="img-thumbnail " width="100%" src="{{asset($image->image)}}" />
                                </div>
                                <div class="card-footer">
                                    <p><strong>المشاهدات: </strong> {{ $image->getViews() }} | <strong>الحجم: </strong> {{ formatSizeUnits(filesize($image->image)) }}</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
