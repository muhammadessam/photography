<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-5 justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h6>اجمالي الفواتير المسددة</h6>
                            <p><?php echo e(\App\Bill::all()->where('status', 'مسدد')->pluck('price')->sum()); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h6>اجمالي الفواتير الغير مسددة</h6>
                            <p><?php echo e(\App\Bill::all()->where('status', 'غير مسدد')->pluck('price')->sum()); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h6>اجمالي الباقي في الفواتير</h6>
                            <p><?php echo e(\App\Bill::all()->where('status', 'متبقي')->pluck('remains')->sum()); ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-"></i>
                        </div>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">الفواتير</h3>
                    <div class="card-tools">
                        <a class="btn btn-success" href="<?php echo e(route('admin.bills.create')); ?>"><i class="fa fa-plus-circle"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive-lg" id="bills">
                        <thead>
                        <tr>
                            <th>رقم الفاتورة</th>
                            <th>اسم العميل</th>
                            <th>رقم الطلب</th>
                            <th>القسم</th>
                            <th>المبلغ</th>
                            <th>الحالة</th>
                            <th>القيمة المتبقة</th>
                            <th>اجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = \App\Bill::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item['id']); ?></td>
                                <td><?php echo e($item->customer->user->name); ?></td>
                                <td><?php echo e($item->order->id); ?></td>
                                <td><?php echo e($item->category->name); ?></td>
                                <td><?php echo e($item->price); ?></td>
                                <td><?php echo e($item->status); ?></td>
                                <td><?php echo e($item->remains); ?></td>
                                <td class="d-flex">
                                    <a class="btn btn-info ml-1" title="مشاهدة" href="<?php echo e(route('admin.bills.show', $item)); ?>"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-warning ml-1" title="تعديل" href="<?php echo e(route('admin.bills.edit', $item)); ?>"><i class="fa fa-edit"></i></a>
                                    <form action="<?php echo e(route('admin.bills.destroy', $item)); ?>" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" title="حذف" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/bills/index.blade.php ENDPATH**/ ?>