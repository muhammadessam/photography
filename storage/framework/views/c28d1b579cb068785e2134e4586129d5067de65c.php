<?php $__env->startSection('content'); ?>


    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong> ارسال الرد الي: </strong>
                <p><?php echo e($contact->email); ?></p>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.sendReply', $contact)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="from-group">
                        <label for="msg">الرد</label>
                        <textarea class="form-control" name="msg" id="msg" cols="30" rows="10"></textarea>
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['f' => 'msg']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['f' => 'msg']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/contact/reply.blade.php ENDPATH**/ ?>