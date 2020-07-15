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
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="col-6"><h3>الصفحات الحالية</h3></div>
                        <div class="col-6 text-left"><a href="<?php echo e(route('admin.page.create')); ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a></div>
                    </div>
                    <div class="card-body">
                        <table id="pages" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>اسم الصفحة</th>
                                <th>العنوان</th>
                                <th>رابط الصفحة</th>
                                <th>فعالة</th>
                                <th>المكان</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = \App\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($page->title); ?></td>
                                    <td><?php echo e($page->slug); ?></td>
                                    <td><?php echo e(url($page->slug)); ?></td>
                                    <td><?php echo e($page->is_active? "فعالة":"غير فعالة"); ?></td>
                                    <td><?php echo e($page->place=="header"? "الهيدر":"الفوتر"); ?></td>
                                    <td class="d-flex">
                                        <a href="<?php echo e(route('admin.page.edit', $page)); ?>" title="تعديل" class="btn btn-warning ml-2"><i class="fa fa-edit"></i></a>


                                        <form action="<?php echo e(route('admin.page.destroy', $page)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" title="حذف" class="btn btn-danger"><i class="fa fa-trash"></i>
                                            </button>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'pages']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'pages']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>