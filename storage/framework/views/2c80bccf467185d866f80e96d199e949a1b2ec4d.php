
<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-5 justify-content-center">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info-gradient">
                        <div class="inner">
                            <h5>الطلبات</h5>

                            <p>المنتظرة <?php echo e(\App\Order::all()->where('status', 'waiting')->count()); ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('admin.orders.index')."?status=waiting"); ?>" class="small-box-footer">اعرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success-gradient">
                        <div class="inner">
                            <h5>الطلبات</h5>
                            <p>المقبولة <?php echo e(\App\Order::all()->where('status', 'accepted')->count()); ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('admin.orders.index')."?status=accepted"); ?>" class="small-box-footer">اعرض <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger-gradient">
                        <div class="inner">
                            <h5>الطلبات</h5>

                            <p>المرفوضة <?php echo e(\App\Order::all()->where('status', 'rejected')->count()); ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-"></i>
                        </div>
                        <a href="<?php echo e(route('admin.orders.index')."?status=rejected"); ?>" class="small-box-footer">اعرض<i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="text-align: right !important;">
                            <h3 class="card-title">الطلبات</h3>
                            <div class="card-tools">
                                <div class="my-btn">
                                    <a class="btn btn-success" href="<?php echo e(route('admin.orders.create')); ?>"><i class="fa fa-plus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto" style="overflow: auto">
                            <table id="cats" class="table table-striped table-responsive-lg bo-gal">
                                <thead>
                                <tr>
                                    <th class="text-center">رقم الطلب</th>
                                    <th class="text-center"> العميل</th>
                                    <th class="text-center">القسم</th>
                                    <th class="text-center">العنوان</th>
                                    <th class="text-center">الوقت</th>
                                    <th class="text-center">الحالة</th>
                                    <th class="text-center">المدينة</th>
                                    <th class="text-center">الحي</th>
                                    <th class="text-center"> المناسبة </th>
                                    <th class="text-center tik" > الختم علي الصور</th>
                                    <th class="text-center">عرض المناسبة </th>
                                    <th class="text-center">اجراء</th>
                                </tr>
                                </thead>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($item['id']); ?></td>
                                        <td class="text-center"><?php echo e($item->customer->user->name); ?></td>
                                        <td class="text-center"><?php echo e($item->category->name); ?></td>
                                        <td class="text-center"><?php echo e($item['address']); ?></td>
                                        <td class="text-center"><?php echo e($item['date']); ?></td>
                                        <td class="text-center"><?php echo e($item->get_status()); ?></td>
                                        <td class="text-center"><?php echo e($item->country ? $item->country->name : null); ?></td>
                                        <td class="text-center"><?php echo e($item->city ? $item->city->name : 'لا بيانات'); ?></td>
                                        <td class="text-center"><?php echo e($item['is_special'] ? 'خاصة':'عامة'); ?></td>
                                        <td class="text-center"><?php echo e($item['is_right_print']? 'نعم':'لا'); ?></td>
                                        <td class="text-center"><?php echo e($item['is_on_our_page'] ? 'نعم' :'لا'); ?></td>
                                        <td class="d-flex my-btn text-center justify-content-center">
                                            <a class="btn btn-secondary ml-2" href="<?php echo e(route('admin.add-order-bill', $item)); ?>" title="اضافة فاتورة"><i class="fa fa-plus-square-o"></i></a>
                                            <a class="btn btn-secondary ml-2" href="<?php echo e(route('admin.orders.show', $item)); ?>" title="معاينة الطلب"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary ml-2" href="<?php echo e(route('admin.orders.edit', $item)); ?>" title="التعديل "><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-info ml-2" title="التعليقات" href="<?php echo e(route('admin.order_comments', $item)); ?>"><i class="fa fa-comment"></i></a>
                                            <form action="<?php echo e(route('admin.orders.destroy', $item)); ?>" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-danger" type="submit" title="حذف"><i class="fa fa-trash"></i></button>
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
<?php $__env->startSection('javascript'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'cats']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'cats']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>