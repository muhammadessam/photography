<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('public/'.'admin/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('public/'.'admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('public/'.'admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/'.'admin/plugins/datatables/dataTables.bootstrap4.js')); ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo e(asset('public/'.'admin/plugins/morris/morris.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('public/'.'admin/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo e(asset('public/'.'admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/'.'admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('public/'.'admin/plugins/knob/jquery.knob.js')); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo e(asset('public/'.'admin/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- datepicker -->
<script src="<?php echo e(asset('public/'.'admin/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap WYSIHTML5 --><!-- jQuery -->

<script src="<?php echo e(asset('public/'.'admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('public/'.'admin/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('public/'.'admin/plugins/fastclick/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('public/'.'admin/dist/js/adminlte.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@1.7.2/dist/js/lightgallery.min.js"></script>


 <!-- Pop up images library -->
<!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
<script src="<?php echo e(asset('public/'.'admin/dist/js/custom.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#lightgallery').lightGallery();
    });
</script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="<?php echo e(asset('public/'.'admin/dist/js/lightgallery-all.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/'.'admin/dist/js/jquery.mousewheel.min.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#lightgallery').lightGallery();
    });
</script>





<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->

<?php echo $__env->yieldContent('javascript'); ?>
<?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/layout/footer.blade.php ENDPATH**/ ?>
