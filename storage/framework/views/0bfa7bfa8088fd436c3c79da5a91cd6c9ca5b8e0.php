<?php $__env->startSection('content'); ?>
    <div class="container p-4">
        <h3 class="col-12 text-right">الاعدادات</h3>
    </div>
    <div class="card col-8" style="margin: 0 auto;">
        <div class="card-body">
            <form action="<?php echo e(route('admin.settings.update',$sets)); ?>" method="post" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="app_name">اسم الموقع</label>
                    <input type="text" id="app_name" name="app_name" value="<?php echo e($sets->app_name); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">رابط facebook</label>
                    <input type="text" id="facebook" name="facebook" value="<?php echo e($sets->facebook); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="twitter">رابط twitter</label>
                    <input type="text" id="twitter" name="twitter" value="<?php echo e($sets->twitter); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="youtube">رابط youtube</label>
                    <input type="text" id="youtube" name="youtube" value="<?php echo e($sets->youtube); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="instagram">رابط instagram</label>
                    <input type="text" id="instagram" name="instagram" value="<?php echo e($sets->instagram); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="linked">رابط linked in</label>
                    <input type="text" id="linked" name="linked" value="<?php echo e($sets->linked); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">رقم الهاتف</label>
                    <input type="text" id="phone" name="phone" value="<?php echo e($sets->phone); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">العنوان والبلد</label>
                    <input type="text" id="address" name="address" value="<?php echo e($sets->address); ?>" class="form-control">
                </div>
                <div class="col-12 row ">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="logo">شعار الموقع</label>
                            <input type="file" id="logo" onchange="PreviewImage()" name="logo1" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($sets->logo)); ?>" height="120px" id="logo_img" alt="">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="icon">ايقونة الموقع</label>
                            <input type="file" id="icon" accept=".ico" onchange="PreviewImage1()" name="icon1" class="form-control">
                        </div>
                        <img src="<?php echo e(asset($sets->icon)); ?>" height="120px" id="icon_img" alt="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="app_email">بريد الموقع</label>
                    <input type="text" id="app_email" name="app_email" value="<?php echo e($sets->app_email); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="close_msg">رسالة الاغلاق</label>
                    <textarea name="close_msg" id="mymce" class="form-control" cols="30" rows="10">
                        <?php echo e($sets->close_msg); ?>

                    </textarea>
                </div>
                <div class="form-group">
                    <label for="close_msg">تعليمات العميل</label>
                    <textarea name="instruction" id="mymce1" class="form-control" cols="30" rows="10">
                        <?php echo e($sets->instruction); ?>

                    </textarea>
                </div>






                <div class="row m-3">
                    <div class="custom-control custom-checkbox col-3">
                        <?php if($sets->is_closed): ?>
                            <input type="checkbox" name="is_closed" value="1" checked class="custom-control-input" id="is_closed">
                        <?php else: ?>
                            <input type="checkbox" name="is_closed" value="1" class="custom-control-input" id="is_closed">
                        <?php endif; ?>
                        <label class="custom-control-label" for="is_closed">اغلاق الموقع</label>
                    </div>
                    <div class="custom-control custom-checkbox col-3">
                        <?php if($sets->can_register): ?>
                            <input type="checkbox" name="can_register" value="1" checked class="custom-control-input" id="can_register">
                        <?php else: ?>
                            <input type="checkbox" name="can_register" value="1" class="custom-control-input" id="can_register">
                        <?php endif; ?>
                        <label class="custom-control-label" for="can_register">تشغيل التسجيل</label>
                    </div>
                    <div class="custom-control custom-checkbox col-3">
                        <?php if($sets->verify_email): ?>
                            <input type="checkbox" name="verify_email" value="1" checked class="custom-control-input" id="verify_email">
                        <?php else: ?>
                            <input type="checkbox" name="verify_email" value="1" class="custom-control-input" id="verify_email">
                        <?php endif; ?>
                        <label class="custom-control-label" for="verify_email">التفعيل بالبريد</label>
                    </div>








                    <button type="submit" class="btn btn-success btn-block mt-3">حفظ الاعدادات</button>
                </div>

            </form>
        </div>
    </div>
    <script type="text/javascript">

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("logo").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("logo_img").src = oFREvent.target.result;
            };
        };
        function PreviewImage1() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("icon").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("icon_img").src = oFREvent.target.result;
            };
        };

    </script>
    <script src="<?php echo e(asset('tinymce/tinymce.min.js')); ?>"></script>
    <script>
        tinymce.init({
            selector: "#mymce",
            height: 400,
            language: 'ar',
            directionality: 'rtl',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
        });
    </script>
    <script>
        tinymce.init({
            selector: "#mymce1",
            height: 400,
            language: 'ar',
            directionality: 'rtl',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>