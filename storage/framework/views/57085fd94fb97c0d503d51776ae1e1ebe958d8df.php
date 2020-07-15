<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">ْ
                <h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    <a href="<?php echo e(route('images.show', ['id' => $image->id ])); ?>"><img class="img-thumbnail" width="100%" height="150px" src="<?php echo e(asset($image->image)); ?>"></a>
                                </div>
                                <div class="card-footer">
                                    <p><strong>المشاهدات: </strong> <?php echo e($image->getViews()); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/gallery/images/index.blade.php ENDPATH**/ ?>