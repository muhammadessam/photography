@extends('admin.layout.layout')
@section('content')
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل</h3>
                </div>
                <div class="card-body">
                    <form class="form-inline" action="{{route('admin.country.update', $country)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="ادخل اسم القسم الجديد ..." value="{{$country['name']}}">
                            <x-error name="name"></x-error>
                        </div>
                        <div class="form-group mr-2">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection