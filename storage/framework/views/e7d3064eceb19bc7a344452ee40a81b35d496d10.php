<?php $__env->startSection('content'); ?>
    <div class="container pt-3 justify-content-center">
        <div class="card">
            <div class="card-header">
                تعديل مشرف
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.admins.update',$admin)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label>الاسم</label>
                        <input name="name" value="<?php echo e($admin->name); ?>" class="form-control">
                    </div>
                    <div>
                        <label>البريد</label>
                        <input name="email"  value="<?php echo e($admin->email); ?>" class="form-control">
                    </div>
                    <div>
                        <label>كلمة السر</label>
                        <input name="password" value="same"  type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/admins/edit.blade.php ENDPATH**/ ?>