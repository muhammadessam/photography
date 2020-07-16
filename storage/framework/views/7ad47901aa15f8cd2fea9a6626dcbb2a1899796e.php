<?php $__env->startSection('content'); ?>
    <style>
        iframe{
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container pt-3 ">
        <?php $__currentLoopData = $customer->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="col-12 text-right">
                        طلب رقم
                        <?php echo e($index + 1); ?>

                    </h4>
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#<?php echo e($index + 1); ?>ModalCenter">
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="<?php echo e($index + 1); ?>ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="exampleModalLongTitle">فيديو جديد</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('admin.customerVideo.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                        <div class="form-group">
                                            <label for="video">كود اليوتيوب</label>
                                            <textarea name="video" class="form-control" id="video" cols="30" rows="10"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">اضافة</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php $__currentLoopData = $order->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4">
                            <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                    <?php
                                        parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                    ?>
                                    src="https://www.youtube.com/embed/<?php echo e($output['v']); ?>"
                                    frameborder="0"></iframe>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/customers/videos.blade.php ENDPATH**/ ?>