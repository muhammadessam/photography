<script src="<?php echo e($cdn?? asset('public/'.'vendor/sweetalert/sweetalert.all.js')); ?>"></script>
<?php if(Session::has('alert.config')): ?>
    <?php if(config('sweetalert.animation.enable')): ?>
        <link rel="stylesheet" href="<?php echo e(config('sweetalert.animatecss')); ?>">
    <?php endif; ?>
    <script>
        Swal.fire(<?php echo Session::pull('alert.config'); ?>);
    </script>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\photos\resources\views/vendor/sweetalert/alert.blade.php ENDPATH**/ ?>
