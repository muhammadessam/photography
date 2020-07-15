
<?php $__env->startSection('content'); ?>
    <div class="container pt-3">
        <h4 class="col-12 text-center my-4">
            التعليقات
            <span class="btn btn-danger btn-sm"><?php echo e($order->comments->count()); ?></span>
        </h4>
        <?php $__currentLoopData = $order->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card <?php echo e($comment['is_admin']?'bg-primary':'bg-secondary'); ?>">
                <div class="card-header">
                    <h5>
                        <?php echo e($comment['is_admin']?'الادارة':'العميل'); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <p>
                        <?php echo e($comment['body']); ?>

                    </p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($order->comments->count() == 0): ?>
            <div class="card bg-dark-gradient p-3">
                <h4 class="col-12 text-center">لا يوجد تعليقات</h4>
            </div>
        <?php endif; ?>
        <div>
            <form action="<?php echo e(route('admin.comments.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                <input type="hidden" name="is_admin" value="1">
                <div class="form-group">
                    <label for="body">محتوي التعليق</label>
                    <textarea name="body" id="body" cols="30" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn-outline-success btn">ارسال</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/orders/comments.blade.php ENDPATH**/ ?>