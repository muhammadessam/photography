<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header"><h4>معرض الصور</h4>
            </div>
            <div class="card-body my-m-img">
                <div id="lightgallery">
                    <div class="row">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 p-1" >
                                <div class="card bg-primary-gradient">
                                    <div class="card-body  position-relative p-0">

                                        <a href="<?php echo e(asset($image->image)); ?>" class="item">
                                            <img class="img-thumbnail img-store" width="100%"
                                                 src="<?php echo e(asset($image->image)); ?>">
                                            <div class="overlay ov-kufi  r-img  ">
                                                <div
                                                        class="py-2 main-img d-flex justify-content-center align-items-center flex-column text-white">
                                                    <h5 class="text-center">
                                                        تنظيم معرض الصور
                                                    </h5>
                                                    <span class="d-inline-block my-2 touch-sm"></span>
                                                    <h6 class="text-center">تجهيزنا معرض لإحد العملاء</h6>
                                                    <i class="far fa-image sms-im"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <p class="mb-0"><strong>المشاهدات: </strong> <?php echo e($image->getViews()); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/site/gallery/images/index.blade.php ENDPATH**/ ?>