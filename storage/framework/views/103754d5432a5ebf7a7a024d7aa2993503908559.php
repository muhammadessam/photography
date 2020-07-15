<?php $__env->startSection('content'); ?>
    <div class="container pt-3">
        <h3 class="col-12 text-center">رأي العملاء</h3>
        <table class="table table-bordered text-center">
            <tr>
                <td>من</td>
                <td>الرأي</td>
                <td>الحالة</td>
                <td>تحكم</td>
            </tr>
            <?php $__currentLoopData = @App\Opinion::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($op->customer->user->name); ?>

                    </td>
                    <td >
                        <?php echo e($op->body); ?>

                    </td>
                    <td class="<?php echo e($op->statue == "pending"?"bg-info":($op->statue == "accepted"?"bg-success":"bg-danger")); ?>">
                        <?php echo e($op->statue == "pending"?"بالانتظار":($op->statue == "accepted"?"مقبول":"مرفوض")); ?>

                    </td>
                    <td>
                        <form class="float-left" action="<?php echo e(route('admin.opinions.destroy',$op)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" title="حذف" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            <?php if($op->statue == "pending"): ?>
                                <a class="btn btn-success" title="الموافقة" href="<?php echo e(route('admin.opinion_accept',$op)); ?>"><i class="fa fa-check"></i></a>
                                <a class="btn btn-warning" title="الرفض" href="<?php echo e(route('admin.opinion_refuse',$op)); ?>"><i class="fa fa-times"></i></a>
                            <?php endif; ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/opinions/index.blade.php ENDPATH**/ ?>