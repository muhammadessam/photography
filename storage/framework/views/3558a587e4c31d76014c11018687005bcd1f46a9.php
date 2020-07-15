<?php $__env->startSection('content'); ?>

    <div class="row">

    </div>

    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="card col-3 p-2 bg-success">
                <a href="<?php echo e(route('admin.Customer_Activate')); ?>">
                    <h3 class="col-12 text-center">
                        العملاء الفعالين
                        <br>
                        <?php echo e(@App\Customer::all()->where('statue','Activate')->count()); ?>

                    </h3>
                </a>
            </div>
            <div class="card col-3 p-2 bg-danger">
                <a href="<?php echo e(route('admin.Customer_Deactivate')); ?>">
                    <h3 class="col-12 text-center">
                        العملاء الغير فعالين
                        <br>
                        <?php echo e(@App\Customer::all()->where('statue','Deactivate')->count()); ?>

                    </h3>
                </a>
            </div>
            <div class="card col-3 p-2 bg-warning">
                <a href="<?php echo e(route('admin.customers.index')); ?>">
                    <h3 class="col-12 text-center">
                        العملاء
                        <br>
                        <?php echo e(@App\Customer::all()->count()); ?>

                    </h3>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">العملاء</h3>
                        <div class="card-tools row">
                            <a href="<?php echo e(route('admin.customers.create')); ?>" class="btn btn-success">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                            <a class="btn btn-warning" href="<?php echo e(route('admin.export')); ?>"><i class="fa fa-file-excel-o"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="customers" class="table table-bordered text-center">
                            <thead class="thead-light" style="background-color: white;">
                            <td>الاسم</td>
                            <td>الهاتف</td>
                            <td>البريد</td>
                            <td>المدينة</td>
                            <td>الحالة</td>
                            </thead>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($customer->user->name); ?></td>
                                    <td><?php echo e($customer->phone); ?></td>
                                    <td><?php echo e($customer->user->email); ?></td>
                                    <td><?php echo e($customer->city); ?></td>
                                    <td class="<?php echo e($customer->statue == "Activate"?'bg-success':"bg-danger"); ?>">
                                        <?php echo e($customer->statue == "Activate"?'مفعل':"غير مفعل"); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <a class="btn btn-primary" href="<?php echo e(route('admin.customers.edit',$customer)); ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.customer_orders',$customer)); ?>" class="btn btn-sm btn-success">
                                            الطلبات
                                            <span class="btn btn-sm btn-danger"><?php echo e($customer->orders->count()); ?></span>
                                        </a>
                                        <a href="<?php echo e(route('admin.customer_bills',$customer)); ?>" class="btn btn-sm btn-success">
                                            الفواتير
                                            <span class="btn btn-sm btn-danger"><?php echo e($customer->bills->count()); ?></span>
                                        </a>
                                        <a href="<?php echo e(route('admin.customer_images',$customer)); ?>" class="btn btn-sm btn-success">
                                            الصور
                                        </a>
                                        <a href="<?php echo e(route('admin.customer_videos',$customer)); ?>" class="btn btn-sm btn-success">
                                            الفيديو
                                        </a>
                                        <a href="<?php echo e(route('admin.Customer_ChangeStatue',$customer)); ?>" class="btn btn-sm btn-dark">
                                            تغيير الحالة
                                        </a>
                                        <a href="<?php echo e(route('admin.send_whatsapp',$customer)); ?>" class="btn btn-outline-success">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example<?php echo e($customer->id); ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <div class="modal fade" id="example<?php echo e($customer->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                        <form action="<?php echo e(route('admin.customers.destroy',$customer->user)); ?>" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button class="btn btn-danger" type="submit">
                                                                حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(@App\Customer::all()->count() == 0): ?>
                                <tr>
                                    <th colspan="5">
                                        <h4 class="col-12 text-center"> لم يسجل </h4>
                                    </th>
                                </tr>
                            <?php endif; ?>
                        </table>
                        <?php echo e($customers->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/customers/index.blade.php ENDPATH**/ ?>