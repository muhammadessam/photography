<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin/dist/img/logo.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" dir="rtl">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link">
                        <i class="fas fa-tools nav-icon"></i>
                        <p>لوحة التحكم</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link" target="_blank">
                        <i class="fa fa-home nav-icon"></i>
                        <p>الواجهة الامامية</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.settings.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-gear"></i>
                        <p>
                            الاعدادات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.admins.index')}}" class="nav-link {{request()->routeIs('admin.admins.*') ? 'active':''}}">
                        <i class="nav-icon  fas fa-user-tie"></i>
                        <p>
                            المشرفين
                        </p>
                        <span class="btn btn-sm btn-outline-success">{{@App\Admin::all()->count()}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.categories.index')}}" class="nav-link {{request()->routeIs('admin.categories.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            الاقسام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.services.index')}}" class="nav-link {{request()->routeIs('admin.services.*') ? 'active':''}}">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>
                            الخدمات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.achievements.index')}}" class="nav-link {{request()->routeIs('admin.achievements.*') ? 'active':''}}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            الانجازات
                        </p>
                    </a>
                </li>
                <li class="nav-item">

                </li>
                <li class="nav-item has-treeview">
                    <a  class="nav-link dropdown-item">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            الموظفين
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.employees.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الكل</p>
                                <span class="btn btn-sm btn-outline-success">{{@App\Employee::all()->count()}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.Employee_Activate')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الفعالين</p>
                                <span class="btn btn-sm btn-outline-success">{{@App\Employee::all()->where('Statue','Activate')->count()}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.Employee_Activate')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الغير فعالين</p>
                                <span class="btn btn-sm btn-outline-success">{{@App\Employee::all()->where('Statue','Deactivate')->count()}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.customers.index')}}" class="nav-link {{request()->routeIs('admin.customers.*') ? 'active':''}}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            العملاء
                        </p>
                        <span class="btn btn-sm btn-outline-success">{{@App\Customer::all()->count()}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link {{request()->routeIs('admin.orders.*') ? 'active':''}}">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            الطلبات
                            <i class="right badge badge-danger">{{\App\Order::all()->count()}}</i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.bills.index')}}" class="nav-link {{request()->routeIs('admin.bills.*') ? 'active':''}}">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            الفواتير
                            <i class="right badge badge-danger">{{\App\Bill::all()->count()}}</i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.images.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-photo"></i>
                        <p>
                            معرض الصور
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.videos.index')}}" class="nav-link ">
                        <i class="nav-icon fa fa-video-camera"></i>
                        <p>
                            معرض الفيديو
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.page.index')}}" class="nav-link {{request()->routeIs('admin.page.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            الصفحات
                            <i class="right badge badge-danger">{{\App\Page::all()->count()}}</i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.country.index')}}" class="nav-link {{request()->routeIs('admin.country.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            المدن
                            <i class="right badge badge-danger">{{\App\Country::all()->count()}}</i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.contact.index')}}" class="nav-link {{request()->routeIs('admin.contact.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            اتصل بنا
                            <i class="right badge badge-danger">0</i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.opinions.index')}}" class="nav-link {{request()->routeIs('admin.opinions.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            ارإ العملاء
                            <i class="right badge badge-danger">
                                {{@App\Opinion::all()->where('statue','pending')->count()}}
                            </i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.sliders.index')}}" class="nav-link {{request()->routeIs('admin.opinions.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            السلايدر
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
