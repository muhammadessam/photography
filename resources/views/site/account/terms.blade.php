@extends('site.layouts.base')
@section('content')
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h3 class="col-12 text-center">
                    الشروط والاحكام
                </h3>
            </div>
            <div class="card-body">
                <p class="col-12">
                    هنا نص الشروط والاحكام
                </p>
            </div>
            <div class="card-footer">
                <a href="{{route('account.orders.create')}}">
                    اوافق علي الشروط والاحكام
                </a>
            </div>
        </div>
    </div>
@endsection
