<?php $__env->startSection('content'); ?>
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h3 class="col-12 text-center">
                    الشروط والاحكام
                </h3>
            </div>
            <div class="card-body">
                <p class="col-12">
                    هنا نص الشروط والاحكام
                </p>
            </div>
            <div class="card-footer">
                <a href="<?php echo e(route('account.orders.create')); ?>">
                    اوافق علي الشروط والاحكام
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/account/terms.blade.php ENDPATH**/ ?>