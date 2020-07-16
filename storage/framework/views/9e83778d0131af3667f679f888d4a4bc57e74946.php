<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="<?php echo e(asset(@App\Setting::first()->icon)); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('webProject/icofont/css/icofont.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
        

        <link rel="stylesheet" href="<?php echo e(asset('css/lightgallery.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
        <title><?php echo e(@App\Setting::first()->app_name); ?></title>



    </head>
    <body>
        <?php echo $__env->make('site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('site.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
        <script src="<?php echo e(asset('js/jquery.countup.min.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
        <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="<?php echo e(asset('js/lightgallery-all.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.mousewheel.min.js')); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#lightgallery').lightGallery();
            });
        </script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        <?php echo $__env->yieldContent('js'); ?>
    </body>

</html>

<?php /**PATH D:\xampp\htdocs\photos\resources\views/site/layouts/base.blade.php ENDPATH**/ ?>