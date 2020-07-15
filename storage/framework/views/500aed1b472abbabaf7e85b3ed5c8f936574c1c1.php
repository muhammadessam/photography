<nav class="navbar navbar-expand-lg  py-4  bg-nav-c  ">
    <div class="container">
        <a class="navbar-brand buk-29" href="./index.html"> <img src="./images/logo.svg" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="custom-bars-icon"></i>
        </button>

        <div class="collapse navbar-collapse bar-sm" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto cairo ml-2">
            <li class="nav-item ml-1">>
            <a class="nav-link" href="<?php echo e(route('account')); ?>">الرئيسية</a>
            <span class="d-block nav-bol"><i class="fas fa-ellipsis-h"></i></span>
            </li>
            <li class="nav-item mx-1">
            <a class="nav-link" href=" "><i class="fas fa-bell"></i> الإشعارات</a>
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
                <?php endif; ?>
            <?php endif; ?>
        </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\xampp\htdocs\photos\resources\views/site/partials/account-header.blade.php ENDPATH**/ ?>