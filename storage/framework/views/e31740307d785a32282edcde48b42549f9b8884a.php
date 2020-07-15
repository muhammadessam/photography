<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="<?php echo e(route('admin.showReplyForm', $contact)); ?>"> <i class="fa fa-send"></i></a>
                        <a class="btn btn-primary" href="<?php echo e(route('admin.contact.index')); ?>"> <i class="fa fa-list-ul"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="contact-wd p-3">
            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">الإسم </label>
                <div class="form-control"><?php echo e($contact['name']); ?></div>
            </div>

            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">الجوال</label>
                <div class="form-control"><?php echo e($contact['phone']); ?></div>
            </div>

            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">البريد الإلكترونى</label>
                <div class="form-control">
                    <?php echo e($contact['email']); ?>

                </div>
            </div>
            <div class="form-group " dir="ltr">
                <label for="" class="font-weight-bold">الرسالة</label>
                <div class="d-flex justify-content-start align-items-center">
                    <textarea class="form-control text-right py-4" name="msg" rows="4" placeholder="نص الرسالة"><?php echo e($contact['msg']); ?></textarea>
                </div>
            </div>
            <div>
                <button class="btn bg-green text-white btn-lg px-4"><i class="fab fa-telegram-plane"></i> إرسال</button>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/contact/show.blade.php ENDPATH**/ ?>