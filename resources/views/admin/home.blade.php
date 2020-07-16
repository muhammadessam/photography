@extends('admin.layout.layout')
@section('content')
    <div class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2 mt-5 justify-content-center">
                <div class="col-xl-3 col-md-6">
                    <!-- small box -->
                    <div class="">
                        <a href="{{route('admin.bills.index')}}" class="small-box text-white  bg-success-gradient h-100  small-box   d-flex align-items-center d-block">
                            <div class="inner">
                                <h5> الفواتير المسددة</h5>
                                <h4 class="mt-4">{{\App\Bill::all()->where('status', 'مسدد')->pluck('price')->sum()}}</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- small box -->
                    <div class="  ">
                        <a href="{{route('admin.bills.index')}}" class="small-box  text-white bg-danger-gradient text-white bg-info-gradient  h-100  small-box   d-flex align-items-center d-block">
                            <div class="inner">
                                <h5> الفواتير الغير مسددة</h5>
                                <h4 class="mt-4">{{\App\Bill::all()->where('status', 'غير مسدد')->pluck('price')->sum()}}</h4>
                            </div>
                            <div class="icon">
                                <i class="fa fa-dollar"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <!-- small box -->
                    <div class="small-box  ">
                        <a href="{{route('admin.bills.index')}}" class=" text-white bg-info-gradient  h-100  small-box   d-flex align-items-center d-block">
                            <div class="inner">
                                <h5> الباقي في الفواتير</h5>
                                <h4 class="mt-4">{{\App\Bill::all()->where('status', 'متبقي')->pluck('remains')->sum()}}</h4>
                            </div>
                            <div class="icon">
                                <i class="fas fa-folder-open"></i>
                            </div>
                        </a>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container py-3 ">
        <div class="row ">
            <div class="" style="height: 2px; width: 100%; background-color: rgba(128, 128, 128, 0.18)"></div>
        </div>
    </div>
    <div class="container pt-3">
        <div class="row ">
            <!-- ./col -->
            <div class="col-md-4 col-lg-3  col-sm-6  animated bounceInDown">
                <a href="{{route('admin.orders.index')}}" class="d-block">

                    <!-- small box -->
                    <div class="info-box bg-danger">

                        <div class="info-box-content">
                            <h4 class="info-box-text">الطلبات
                            </h4>
                            <h4 class="info-box-number">
                                {{@App\Order::all()->count()}}
                            </h4>


                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-boxes fa-2x "></i>
                    </span>

                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-md-4 col-lg-3  col-sm-6  animated bounceInDown">
                <a href="{{route('admin.customers.index')}}">

                    <div class="info-box bg-success">

                        <div class="info-box-content">
                            <h4 class="info-box-text">العملاء</h4>
                            <h4 class="info-box-number">
                                {{@App\Customer::all()->count()}}
                            </h4>
                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-users fa-2x"></i>
                    </span>

                    </div>
                </a>

            </div>
            <!-- ./col -->
            <div class="col-md-4 col-lg-3  col-sm-6  animated bounceInUp">
                <a href="{{route('admin.categories.index')}}">

                    <div class="info-box  bg-primary">
                        <div class="info-box-content">
                            <h4 class="info-box-text">الاقسام</h4>
                            <h4 class="info-box-number">
                                {{@App\Category::all()->count()}}
                            </h4>
                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-th-large fa-2x "></i>
                    </span>
                    </div>
                </a>

            </div>
            <div class="col-md-4 col-lg-3  col-sm-6  animated bounceInUp">
                <a href="{{route('admin.bills.index')}}">
                    <div class="info-box  bg-fawater">
                        <div class="info-box-content ">
                            <h4 class="info-box-text ">الفواتير</h4>
                            <h4 class="info-box-number">
                                {{@App\Customer::all()->count()}}
                            </h4>
                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-file-invoice-dollar fa-2x"></i>
                    </span>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-md-4 col-lg-3 col-sm-6  animated bounceInUp">
                <a href="{{route('admin.employees.index')}}">
                    <div class="info-box bg-info">
                        <div class="info-box-content">
                            <h4 class="info-box-text">الموظفين</h4>
                            <h4 class="info-box-number">
                                {{@App\Employee::all()->count()}}
                            </h4>
                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-user-tie fa-2x "></i>
                    </span>
                    </div>
                </a>
            </div>

            <!-- ./col -->
            <div class="col-md-4 col-lg-3 col-sm-6  animated bounceInUp">
                <a href="{{route('admin.opinions.index')}}">
                    <div class="info-box bg-warning">
                        <div class="info-box-content">
                            <h4 class="info-box-text"> اراء العملاء</h4>
                            <h4 class="info-box-number">
                                {{@App\Opinion::all()->count()}}
                            </h4>
                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-comment-alt fa-2x "></i>
                    </span>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-md-4 col-lg-3 col-sm-6  animated bounceInDown">
                <a href="{{route('admin.country.index')}}">
                    <!-- small box -->
                    <div class="info-box bg-danger">
                        <div class="info-box-content">
                            <h4 class="info-box-text">المدن
                            </h4>
                            <h4 class="info-box-number">
                                {{@App\Country::all()->count()}}
                            </h4>
                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-city fa-2x "></i>
                    </span>
                    </div>
                </a>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-md-4 col-lg-3 col-sm-6  animated bounceInDown">
                <a href="{{route('admin.contact.index')}}">
                    <div class="info-box bg-info-gradient">
                        <div class="info-box-content">
                            <h4 class="info-box-text">اتصل بنا</h4>
                            <h4 class="info-box-number">
                                {{@App\Customer::all()->count()}}
                            </h4>
                        </div>
                        <span class="info-box-icon">
                        <i class="fas fa-phone-alt fa-2x"></i>
                    </span>
                    </div>
                </a>
            </div>

        </div>


    </div>
@endsection
