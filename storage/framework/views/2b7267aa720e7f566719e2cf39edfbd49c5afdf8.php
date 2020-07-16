<?php $__env->startSection('content'); ?>
    <div class="container pt-3">
        <div class="card col-6" style="margin: 0 auto;">
            <div class="card-header">
                <h4 class="col-12 text-center"> انشاء عميل </h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.customers.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة السر</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="city">المدينة</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="">الصورة الشخصية</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success btn-block" value="حفظ" name="" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/customers/create.blade.php ENDPATH**/ ?>