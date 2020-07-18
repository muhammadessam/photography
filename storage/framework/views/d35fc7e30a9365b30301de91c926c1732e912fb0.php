<nav class="navbar navbar-expand-lg  py-2  bg-nav-c  ">
    <div class="container">
        <?php
            $setting = App\Setting::first();
        ?>
        <a class="navbar-brand buk-29" href="<?php echo e(route('home')); ?>"> <img src="<?php echo e($setting ->logo ? request()->root().'/'. $setting ->logo : asset('public/'.'images/logo.svg')); ?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="custom-bars-icon"></i>
        </button>

        <div class="collapse navbar-collapse bar-sm" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto cairo ml-2 kml-e">
                <li class="nav-item ml-1">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">الرئيسية</a>
                    <span class="d-block nav-bol"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                <?php $__currentLoopData = @App\Page::all()->where('place','header'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item ml-1">
                        <a class="nav-link" href="<?php echo e(route('page',$page->title)); ?>"><?php echo e($page->title); ?></a>
                        <span class="d-block nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item mx-1">
                    <a class="nav-link" href=" "> من نحن</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="<?php echo e(route('images')); ?>">معرض صور</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="<?php echo e(route('videos')); ?>">معرض الفيديو</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="<?php echo e(route('account.orders.create')); ?>">طلب خدمة</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>/#contact-form">اتصل بنا</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->nots->where('read',0)->count() > 0): ?>
                            <li class="nav-item mx-1">
                                <a class="nav-link position-relative d-inline-block" href="<?php echo e(route('nots.index')); ?>">
                                    <i class="fas fa-bell my-nfx"></i>
                                    <span class="btn btn-danger btn-sm not-num"><?php echo e(auth()->user()->nots->where('read',0)->count()); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="<?php echo e(route('account')); ?>">
                                <?php echo e(auth()->user()->name); ?>

                            </a>
                            <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                        </li>
                <?php endif; ?>
                <?php if(auth()->guard('employee')->check()): ?>
                    <?php if(auth()->guard('employee')->user()->nots->where('read',0)->count() > 0): ?>
                        <li class="nav-item mx-1">
                            <a class="nav-link position-relative d-inline-block" href="<?php echo e(route('nots.index')); ?>">
                                <i class="fas fa-bell my-nfx"></i>
                                <span class="btn btn-danger btn-sm not-num"><?php echo e(auth()->guard('employee')->user()->nots->where('read',0)->count()); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="<?php echo e(route('employee.account')); ?>">
                            <?php echo e(auth()->guard('employee')->user()->name); ?>

                        </a>
                        <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\xampp\htdocs\photos\resources\views/site/partials/header.blade.php ENDPATH**/ ?>