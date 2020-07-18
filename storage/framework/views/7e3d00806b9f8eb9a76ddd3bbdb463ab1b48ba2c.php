<?php $__env->startSection('content'); ?>
<section class="my-2 mt-4 register">
    <div class="container">
        <div class="my-shadow py-4 mb-5">
        <div class="dif">
            <h4 class="text-center font-weight-bold">مرحبا بك يا <span class="c-bol"><?php echo e(auth()->guard('employee')->user()->name ?? explode(' ', auth()->user()->name)[0]); ?></span></h4>
            <span class="d-block text-center"> <img src="<?php echo e(asset('public/'.'images/flower.svg')); ?>" alt=""></span>
        </div>
        <?php if(auth()->guard('employee')->check()): ?>
                <div class="my-4 kufi">
                    <div class=" control-actions">
                        <div class=" dde  row ">
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(route('employee.account.edit')); ?>" class="position-relative saad border pt-3 pb-1 px-1  ">
                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-user icon-f blue-icon"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >تعديل بياناتى</small></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(route('employee.account.orders')); ?>" class="row position-relative saad border pt-3 pb-1 px-1  ">

                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-birthday-cake icon-f blue-icon"></i>
                                        </div>
                                        <div class="">
                                            <h5 class="text-center  manage  c-bol  "><small class="font-weight-bold" >طلباتى</small></h5>
                                        </div>
                                    </div>
                                    <span class="btn btn-sm" style="background-color: #dc3545;color: white;"><?php echo e(auth()->guard('employee')->user()->orders->count()); ?></span>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(route('account_logout')); ?>"  class="position-relative saad border pt-3 pb-1 px-1">
                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-sign-out-alt  icon-f text-danger"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >تسجيل الخروج</small></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
        <?php else: ?>
                <div class="my-4 kufi">
                    <div class=" control-actions">
                        <div class=" dde  row ">
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(route('account.edit')); ?>" class="position-relative saad border pt-3 pb-1 px-1  ">
                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-user icon-f blue-icon"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >تعديل بياناتى</small></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(route('account.orders')); ?>" class="row position-relative saad border pt-3 pb-1 px-1  ">

                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-birthday-cake icon-f blue-icon"></i>
                                        </div>
                                        <div class="">
                                            <h5 class="text-center  manage  c-bol  "><small class="font-weight-bold" >طلباتى</small></h5>
                                        </div>
                                    </div>
                                    <span class="btn btn-sm" style="background-color: #dc3545;color: white;"><?php echo e(auth()->user()->customer->orders->count()); ?></span>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">

                                <a href="<?php echo e(route('account.orders.create')); ?>" class="position-relative saad border pt-3 pb-1 px-1  ">
                                    <div class="">
                                        <div class="text-center">
                                            <i class="far fa-plus-square icon-f  green-icon"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >طلب تغطية جديدة</small></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(route('account.bills')); ?>" class="position-relative saad border pt-3 pb-1 px-1  ">
                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-file-invoice-dollar  icon-f blue-icon"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >الفواتير </small></h5>
                                        </div>
                                    </div>
                                    <span class="btn btn-sm " style="background-color: #dc3545;color: white;"><?php echo e(auth()->user()->customer->bills->count()); ?></span>
                                </a>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter"
                                   class="position-relative saad border pt-3 pb-1 px-1  ">
                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-question-circle  icon-f blue-icon"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >أضف رأيك</small></h5>
                                        </div>
                                    </div>
                                </a>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php if(auth()->guard()->check()): ?>
                                                    <?php if(auth()->user()->customer != null): ?>
                                                        <section class="card" id="add_opinion">
                                                            <h3 class="col-12 text-center pt-3 pb-3">اضف رأي</h3>
                                                            <form class="container" action="<?php echo e(route('opinions.store')); ?>" method="post">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="form-group">
                                                                    <label for="body">الرأي</label>
                                                                    <textarea class="form-control" name="body" id="body" cols="30" rows="5"></textarea>
                                                                </div>
                                                                <button class="btn btn-success" type="submit">ارسال</button>
                                                            </form>
                                                        </section>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <a href="<?php echo e(route('account_logout')); ?>"  class="position-relative saad border pt-3 pb-1 px-1">
                                    <div class="">
                                        <div class="text-center">
                                            <i class="fas fa-sign-out-alt  icon-f text-danger"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-center  manage  c-bol "><small class="font-weight-bold" >تسجيل الخروج</small></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
        <?php endif; ?>


        </div>
    </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $('.logout').on('click', function (e) {
            e.preventDefault()
            console.log('logging out...');
            $.post("/logout", {
                _token: "<?php echo e(csrf_token()); ?>",
            }).done(function () {
                location.reload();
            }).fail(function () {
                location.reload();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/site/account/index.blade.php ENDPATH**/ ?>
