<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <div class="col-6">
                    <h3>الإشعارات</h3>
                </div>
            </div>
            <div class="card-body">
                <?php $__currentLoopData = auth()->guard('admin')->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('admin.notifications.types.'.snake_case(class_basename($notification->type)), $notification, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                               
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/notifications/index.blade.php ENDPATH**/ ?>