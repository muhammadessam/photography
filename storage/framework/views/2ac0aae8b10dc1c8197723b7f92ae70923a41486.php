<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <div class="col-6">
                    <h3>الإشعارات</h3>
                </div>
            </div>
            <div class="card-body">
                <?php $__currentLoopData = auth()->guard('admin')->user()->nots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card p-2">
                        <div class="card-body">
                            <?php echo e($not->body); ?>

                            <?php
                                $not->read = 1;
                                $not->save();
                            ?>
                        </div>
                        <div class="card-footer text-left">
                            <?php echo e(\Carbon\Carbon::parse($not->created_at)->diffForHumans()); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/notifications/index.blade.php ENDPATH**/ ?>