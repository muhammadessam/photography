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
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            الرئيسية
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.home')}}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>الداش بورد</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link" target="_blank">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>الواجهة الامامية</p>
                            </a>
                        </li>
                    </ul>
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
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>
                            المشرفين
                        </p>
                        <span class="btn btn-sm btn-outline-success">{{@App\Admin::all()->count()}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.employees.index')}}" class="nav-link {{request()->routeIs('admin.employees.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>
                            الموظفين
                        </p>
                        <span class="btn btn-sm btn-outline-success">{{@App\Employee::all()->count()}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.customers.index')}}" class="nav-link {{request()->routeIs('admin.customers.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>
                            العملاء
                        </p>
                        <span class="btn btn-sm btn-outline-success">{{@App\Customer::all()->count()}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders.index')}}" class="nav-link {{request()->routeIs('admin.orders.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-first-order"></i>
                        <p>
                            الطلبات
                            <i class="right badge badge-danger">{{\App\Order::all()->count()}}</i>
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
                    <a href="{{route('admin.categories.index')}}" class="nav-link {{request()->routeIs('admin.categories.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            الاقسام
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
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
