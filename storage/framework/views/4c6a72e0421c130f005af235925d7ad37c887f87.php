<?php $__env->startSection('content'); ?>
    <div class="container pt-3">
        <div class="card m-3">
            <div class="card-header">
                <h4 class="">انشاء سليدر</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.sliders.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">النص الاول</label>
                        <input type="text" class="form-control " name="primary_text">
                    </div>
                    <div class="form-group">
                        <label for="">النص الثانوي</label>
                        <input type="text" class="form-control " name="secondary_text">
                    </div>
                    <div class="form-group">
                        <label for="">الصورة</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">انشاء</button>
                </form>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>الصورة</th>
                        <th>النص الاول</th>
                        <th>النص الثانوي</th>
                        <th>تحكم</th>
                    </tr>
                    <?php $__currentLoopData = @App\Slider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <img height="220px" width="220px" src="<?php echo e(asset($slider->image)); ?>">
                            </td>
                            <td><?php echo e($slider->primary_text); ?></td>
                            <td><?php echo e($slider->secondary_text); ?></td>
                            <td>
                                <form action="<?php echo e(route('admin.sliders.destroy',$slider)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/sliders/index.blade.php ENDPATH**/ ?>