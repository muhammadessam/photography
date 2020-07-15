<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between">
                <div class="col-6">
                    <h3>اتصل بنا</h3>
                </div>
            </div>
            <div class="card-body overflow-auto">
                <table id="contact" class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>الايميل</th>
                        <th>الرسالة</th>
                        <th>ادارة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = \App\Contact::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->phone); ?></td>
                            <td><?php echo e($item->email); ?></td>
                            <td><?php echo e($item->msg); ?></td>
                            <td class="row d-flex justify-content-around">
                                <div class=""><a class="btn btn-info" href="<?php echo e(route('admin.contact.show', $item)); ?>"><i class="fa fa-eye"></i></a></div>
                                <div class=""><a class="btn btn-primary" href="<?php echo e(route('admin.showReplyForm', $item)); ?>"><i class="fa fa-send"></i></a></div>
                                <div class="">
                                    <form action="<?php echo e(route('admin.contact.destroy', $item)); ?>" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'contact']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'contact']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/contact/index.blade.php ENDPATH**/ ?>