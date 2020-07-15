
<?php $__env->startSection('content'); ?>
    <style>
        iframe{
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>معرض الفيديوهات</h4>
            </div>
            <div class="card-body my-m-img">
                <div class="row">
                    <?php $__currentLoopData = @App\AdminVideo::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 p-1">
                            <div class="card bg-primary-gradient">
                                <div class="card-body p-0">
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
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/gallery/videos.blade.php ENDPATH**/ ?>