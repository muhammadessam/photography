<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="text-align: right !important;">
                            <h3 class="card-title">الخدمات</h3>
                            <div class="card-tools">
                                <div>
                                    <a class="btn btn-primary ml-2" href="<?php echo e(route('admin.services.create')); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="cats" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>عنوان الخدمة</th>
                                    <th>وصف الخدمة</th>
                                    <th>الأيقونة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($service->title); ?></td>
                                        <td><?php echo e($service->description); ?></td>
                                        <td><i class="fa fa-<?php echo e($service->icon); ?>"></i></td>
                                        <td class="d-flex">
                                            <a class="btn btn-primary ml-2" title="تعديل" href="<?php echo e(route('admin.services.edit', $service)); ?>"><i class="fa fa-edit"></i></a>
                                            <form action="<?php echo e(route('admin.services.destroy', $service)); ?>" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button title="حذف" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/services/index.blade.php ENDPATH**/ ?>