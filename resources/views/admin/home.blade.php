@extends('admin.layout.layout')
@section('content')
    <div class="container pt-3">
        <div class="row justify-content-around">
            <div class="card bg-success col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الموظفين
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        {{@App\Employee::all()->count()}}
                    </h5>
                </div>
            </div>
            <div class="card bg-warning col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        العملاء
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        {{@App\Customer::all()->count()}}
                    </h5>
                </div>
            </div>
            <div class="card bg-dark col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الاقسام
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        {{@App\Category::all()->count()}}
                    </h5>
                </div>
            </div>
        </div>
        <div class="row justify-content-around">

            <div class="card bg-danger col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الطلبات
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        {{@App\Employee::all()->count()}}
                    </h5>
                </div>
            </div>
            <div class="card bg-info col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الفواتير
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        {{@App\Customer::all()->count()}}
                    </h5>
                </div>
            </div>
            <div class="card bg-primary col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        اتصل بنا
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        {{@App\Category::all()->count()}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
