<?php $__env->startSection('content'); ?>
    <div class="container pt-3 justify-content-center">
        <div class="card">
            <div class="card-header">
                انشاء مشرف
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.admins.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>الاسم</label>
                        <input name="name" class="form-control">
                    </div>
                    <div>
                        <label>البريد</label>
                        <input name="email"  class="form-control">
                    </div>
                    <div>
                        <label>كلمة السر</label>
                        <input name="password"  type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/admins/create.blade.php ENDPATH**/ ?>