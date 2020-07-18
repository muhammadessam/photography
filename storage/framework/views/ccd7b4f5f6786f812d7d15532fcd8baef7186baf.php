<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header"><h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                        <div class="col-12">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
                                    <img class="img-thumbnail " width="100%" src="<?php echo e(asset('public/'.$image->image)); ?>" />
                                </div>
                                <div class="card-footer">
                                    <p><strong>المشاهدات: </strong> <?php echo e($image->getViews()); ?> | <strong>الحجم: </strong> <?php echo e(formatSizeUnits(filesize($image->image))); ?></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/site/gallery/images/show.blade.php ENDPATH**/ ?>
