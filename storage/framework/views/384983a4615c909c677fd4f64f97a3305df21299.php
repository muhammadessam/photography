<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="col-12 text-center">المشرفين</h3>
        <div class="col-12 justify-content-start m-3">
            <a href="<?php echo e(route('admin.admins.create')); ?>" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
            </a>
        </div>
        <table id="admins" class="table table-bordered text-center">
            <thead>
            <td>الاسم</td>
            <td>البريد</td>
            <td>تحكم</td>
            </thead>
            <?php $__currentLoopData = @App\Admin::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($admin->name); ?></td>
                    <td><?php echo e($admin->email); ?></td>
                    <td>
                        <a class="btn btn-primary" title="تعديل" href="<?php echo e(route('admin.admins.edit',$admin)); ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-warning" title="الصلاحيات" href="<?php echo e(route('admin.permissions',$admin )); ?>">
                            <i class="fa fa-sticky-note"></i>
                        </a>
                        <button type="button" title="حذف" class="btn btn-danger" data-toggle="modal" data-target="#example<?php echo e($admin->id); ?>">
                            <i class="fa fa-trash"></i>
                        </button>
                        <div class="modal fade" id="example<?php echo e($admin->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        هل انت متأكد من الحذف ؟
                                    </div>
                                    <div class="modal-footer">
                                        <form action="<?php echo e(route('admin.admins.destroy',$admin)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button title="حذف" class="btn btn-danger" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(@App\Admin::all()->count() == 0): ?>
                <tr>
                    <th colspan="5">
                        <h4 class="col-12 text-center"> لم يسجل </h4>
                    </th>
                </tr>
            <?php endif; ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'admins']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'admins']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/admins/index.blade.php ENDPATH**/ ?>