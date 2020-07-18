<nav class="navbar navbar-expand-lg  py-4  bg-nav-c  ">
    <div class="container">
        <a class="navbar-brand buk-29" href="#"> <img src="<?php echo e(asset('public/'.'images/logo.svg')); ?>" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="custom-bars-icon"></i>
        </button>

        <div class="collapse navbar-collapse bar-sm" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto cairo ml-2">
                <li class="nav-item ml-1">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">الرئيسية</a>
                    <span class="d-block nav-bol"><i class="fas fa-ellipsis-h"></i></span>
                </li>
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
                    <a class="nav-link" href=" ">طلب خدمة</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>

                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href=" ">اتصل بنا</a>
                    <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->customer != null): ?>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="<?php echo e(route('account.bills')); ?>">فواتيري</a>
                            <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="<?php echo e(route('nots.index')); ?>">
                                الاشعارات
                                <span class="btn btn-danger btn-sm"><?php echo e(auth()->user()->nots->where('read',0)->count()); ?></span>
                            </a>
                            <span class="d-block nav-bol nav-hid"><i class="fas fa-ellipsis-h"></i></span>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\xampp\htdocs\photos\resources\views/site/partials/main-header.blade.php ENDPATH**/ ?>
