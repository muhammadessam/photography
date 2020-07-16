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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example<?php echo e($slider->id); ?>">
                                    تعديل
                                </button>
                                <div class="modal fade" id="example<?php echo e($slider->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('admin.sliders.update',$slider)); ?>" method="post" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <div class="form-group">
                                                        <label for="">النص الاول</label>
                                                        <input type="text" class="form-control " value="<?php echo e($slider->primary_text); ?>" name="primary_text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">النص الثانوي</label>
                                                        <input type="text" class="form-control "value="<?php echo e($slider->secondary_text); ?>"  name="secondary_text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">الصورة</label>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">تعديل</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/sliders/index.blade.php ENDPATH**/ ?>