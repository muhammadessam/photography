<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">ْ
                <h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    <?php $__currentLoopData = @App\AdminImage::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    <img class="img-thumbnail" width="100%" src="<?php echo e(asset($image->image)); ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/galary/images.blade.php ENDPATH**/ ?>