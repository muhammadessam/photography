<?php $__env->startSection('content'); ?>
    <div class="container pt-3">
        <div class="card col-4" style="margin: 0 auto;">
            <div class="card-header">
                <h3 class="col-12 text-center">الصلاحيات</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.update_perms',$admin)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="admins">المشرفين</label>
                        <select name="admins" class="form-control" id="admins">
                            <?php if($permissions['admins']): ?>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            <?php else: ?>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employees">الموظفين</label>
                        <select name="employees" class="form-control" id="employees">
                            <?php if($permissions['employees']): ?>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            <?php else: ?>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customers">العملاء</label>
                        <select name="customers" class="form-control" id="customers">
                            <?php if($permissions['customers']): ?>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            <?php else: ?>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories">الاقسام</label>
                        <select name="categories" class="form-control" id="categories">
                            <?php if($permissions['categories']): ?>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            <?php else: ?>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="settings">الاعدادات</label>
                        <select name="settings" class="form-control" id="settings">
                            <?php if($permissions['settings']): ?>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            <?php else: ?>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orders">الطلبات</label>
                        <select name="orders" class="form-control" id="orders">
                            <?php if($permissions['orders']): ?>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            <?php else: ?>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bills">الفواتير</label>
                        <select name="bills" class="form-control" id="bills">
                            <?php if($permissions['bills']): ?>
                                <option value="1">نعم</option>
                                <option value="0">لا</option>
                            <?php else: ?>
                                <option value="0">لا</option>
                                <option value="1">نعم</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>