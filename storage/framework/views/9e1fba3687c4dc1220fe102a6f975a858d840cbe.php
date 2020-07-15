<?php $__env->startSection('content'); ?>
    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                الاشعارات
            </div>
            <div class="card-body">
                <div class="list-group">
                    <?php $__currentLoopData = auth()->user()->nots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/notifications/index.blade.php ENDPATH**/ ?>