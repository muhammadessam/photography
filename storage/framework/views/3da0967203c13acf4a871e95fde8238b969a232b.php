<?php $__env->startSection('content'); ?>
    <style>
        iframe{
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container pt-3">
        <div class="card">
            <div class="card-header row w-100 m-0">
                <h4 class="col-11 text-right">معرض الفيديوهات</h4>
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i>
                </button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLongTitle">فيديو جديد</h5>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('admin.videos.store')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="video">رابط الفيديو Youtube</label>
                                        <textarea name="video" class="form-control" id="video" cols="30" rows="10"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">اضافة</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body my-m-img">
                <form action="<?php echo e(route('admin.DeleteAll','admin_videos')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-outline-danger">حذف المحدد</button>
                    <div class="row">
                        <?php $__currentLoopData = @App\AdminVideo::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-4 p-1">
                                <div class="card bg-primary-gradient">
                                    <div class="card-header row w-100 m-0">
                                        <input type="checkbox" id="item" class="custom-checkbox m-1" name="images[<?php echo e($i); ?>]" value="<?php echo e($video->id); ?>">







                                    </div>
                                    <div class="card-body text-dark">
                                            <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                            <?php
                                                parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                            ?>
                                            src="https://www.youtube.com/embed/<?php echo e($output['v']); ?>"
                                            frameborder="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/videos/index.blade.php ENDPATH**/ ?>