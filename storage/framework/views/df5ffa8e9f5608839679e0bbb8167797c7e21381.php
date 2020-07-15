<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php echo $page->content; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/page.blade.php ENDPATH**/ ?>