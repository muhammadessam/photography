<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo e(asset('public/'.'admin/dist/img/logo.jpeg')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" dir="rtl">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.home')); ?>" class="nav-link">
                        <i class="fas fa-tools nav-icon"></i>
                        <p>لوحة التحكم</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>" class="nav-link" target="_blank">
                        <i class="fa fa-home nav-icon"></i>
                        <p>الواجهة الامامية</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.settings.index')); ?>" class="nav-link">
                        <i class="nav-icon fa fa-gear"></i>
                        <p>
                            الاعدادات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.admins.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.admins.*') ? 'active':''); ?>">
                        <i class="nav-icon  fas fa-user-tie"></i>
                        <p>
                            المشرفين
                        </p>
                        <span class="btn btn-sm btn-outline-success"><?php echo e(@App\Admin::all()->count()); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.categories.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.categories.*') ? 'active':''); ?>">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            الاقسام
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.services.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.services.*') ? 'active':''); ?>">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>
                            الخدمات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.achievements.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.achievements.*') ? 'active':''); ?>">
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
                            <a href="<?php echo e(route('admin.employees.index')); ?>" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الكل</p>
                                <span class="btn btn-sm btn-outline-success"><?php echo e(@App\Employee::all()->count()); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.Employee_Activate')); ?>" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الفعالين</p>
                                <span class="btn btn-sm btn-outline-success"><?php echo e(@App\Employee::all()->where('Statue','Activate')->count()); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.Employee_Activate')); ?>" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الغير فعالين</p>
                                <span class="btn btn-sm btn-outline-success"><?php echo e(@App\Employee::all()->where('Statue','Deactivate')->count()); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a  class="nav-link dropdown-item">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            العملاء
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.customers.index')); ?>" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الكل</p>
                                <span class="btn btn-sm btn-outline-success"><?php echo e(@App\Customer::all()->count()); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.Customer_Activate')); ?>" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الفعالين</p>
                                <span class="btn btn-sm btn-outline-success"><?php echo e(@App\Customer::all()->where('statue','Activate')->count()); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.Customer_Activate')); ?>" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>الغير فعالين</p>
                                <span class="btn btn-sm btn-outline-success"><?php echo e(@App\Customer::all()->where('statue','Deactivate')->count()); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.orders.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.orders.*') ? 'active':''); ?>">
                        <i class="nav-icon fas fa-truck-loading"></i>
                        <p>
                            الطلبات
                            <i class="right badge badge-danger"><?php echo e(\App\Order::all()->where('status','waiting')->count()); ?></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.bills.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.bills.*') ? 'active':''); ?>">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            الفواتير
                            <i class="right badge badge-danger"><?php echo e(\App\Bill::all()->count()); ?></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.images.index')); ?>" class="nav-link">
                        <i class="nav-icon fa fa-photo"></i>
                        <p>
                            معرض الصور
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.videos.index')); ?>" class="nav-link ">
                        <i class="nav-icon fa fa-video-camera"></i>
                        <p>
                            معرض الفيديو
                            <i class="right badge badge-danger"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.page.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.page.*') ? 'active':''); ?>">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            الصفحات
                            <i class="right badge badge-danger"><?php echo e(\App\Page::all()->count()); ?></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.country.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.country.*') ? 'active':''); ?>">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            المدن
                            <i class="right badge badge-danger"><?php echo e(\App\Country::all()->count()); ?></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.contact.*') ? 'active':''); ?>">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            اتصل بنا
                            <i class="right badge badge-danger">0</i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.opinions.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.opinions.*') ? 'active':''); ?>">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            ارإ العملاء
                            <i class="right badge badge-danger">
                                <?php echo e(@App\Opinion::all()->where('statue','pending')->count()); ?>

                            </i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.sliders.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.opinions.*') ? 'active':''); ?>">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            السلايدر
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="<?php echo e(route('admin.logout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-block row">
                            <i class="nav-icon fa fa-power-off"></i>
                            <p>
                                تسجيل الخروج
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>
