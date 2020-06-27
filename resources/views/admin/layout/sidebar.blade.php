<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admin/dist/img/logo.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            الرئيسية
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.home')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>الداش بورد</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link" target="_blank">
                                <i class="far fa-circle nav-icon"></i>
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
                    <a href="{{route('admin.categories.index')}}" class="nav-link {{request()->routeIs('admin.categories.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            الاقسام
                        </p>
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
                    <a href="{{route('admin.employees.index')}}" class="nav-link {{request()->routeIs('admin.employees.*') ? 'active':''}}">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>
                            الموظفين
                        </p>
                        <span class="btn btn-sm btn-outline-success">{{@App\Employee::all()->count()}}</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


{{--<!-- Main Sidebar Container -->--}}
{{--<aside class="main-sidebar sidebar-dark-primary elevation-4">--}}
{{--    <!-- Brand Logo -->--}}
{{--    <a href="{{route('admin.home')}}" class="brand-link">--}}
{{--        <img src="{{asset('admin/dist/img/const-tech.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
{{--        <span class="brand-text font-weight-light">Const-Tech</span>--}}
{{--    </a>--}}

{{--    <!-- Sidebar -->--}}
{{--    <div class="sidebar">--}}

{{--    </div>--}}
{{--    <!-- /.sidebar -->--}}
{{--</aside>--}}
