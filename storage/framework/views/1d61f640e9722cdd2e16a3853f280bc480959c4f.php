<?php $__env->startSection('content'); ?>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الفواتير</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive-lg" id="bills">
                        <thead>
                        <tr>
                            <th>رقم الفاتورة</th>
                            <th>رقم الطلب</th>
                            <th>القسم</th>
                            <th>المبلغ</th>
                            <th>الحالة</th>
                            <th>القيمة المتبقة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item['id']); ?></td>
                                <td><?php echo e($item->order->id); ?></td>
                                <td><?php echo e($item->category->name); ?></td>
                                <td><?php echo e($item->price); ?></td>
                                <td><?php echo e($item->status); ?></td>
                                <td><?php echo e($item->remains); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($bills->count() == 0): ?>
                            <tr>
                                <td colspan="6">
                                    <h4 class="col-12 text-center">لا يوجد</h4>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'bills']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'bills']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/home/bills.blade.php ENDPATH**/ ?>