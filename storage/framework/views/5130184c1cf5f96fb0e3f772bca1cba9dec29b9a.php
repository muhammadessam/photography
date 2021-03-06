<?php $__env->startSection('content'); ?>
    <div class="container pt-3">
        <div class="card col-6" style="margin: 0 auto;">
            <div class="card-header">
                <h4 class="col-12 text-center"> انشاء موظف </h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.employees.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">الهاتف</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="exp">الخبرة</label>
                        <select name="exp" class="form-control" id="exp">
                            <option value="مبتدئ">مبتدئ</option>
                            <option value="متوسط">متوسط</option>
                            <option value="متقدم">متقدم</option>
                            <option value="محترف">محترف</option>
                            <option value="خبير">خبير</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cat_id">القسم</label>
                        <select name="cat_id" class="form-control" id="cat_id">
                            <?php $__currentLoopData = @App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nationality">الجنسية</label>
                        <input type="text" class="form-control" name="nationality" id="nationality">
                    </div>
                    <div class="form-group">
                        <label for="is_available">الحالة</label>
                        <select name="is_available" class="form-control" id="is_available">
                            <option value="1">نعم</option>
                            <option value="0">لا</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-success btn-block" value="حفظ" name="" id="">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/employees/create.blade.php ENDPATH**/ ?>