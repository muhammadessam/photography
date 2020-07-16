<?php $__env->startSection('content'); ?>
<section class="my-5 register">
    <div class="container pt-5">
      <div class="my-shadow py-4 mx-auto mt-5" style="max-width: 500px" >
        <div class="dif">
          <h4 class="text-center font-weight-bold">الدخول</h4>
          <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
        </div>

        <div class="  main-login">
          <div class="  login-cont">
            <div class=" login-div login-div2">
              <div class="">
                <div class=" content-log">
                  <div class="mt-4">
                    <div class="row m-0 p-0">
                      <div class="col-12" >
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('login')); ?>" >
                      <div class="row m-0 p-0">
                        <div class="form-group col-md-12 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الإيميل:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="email" name="email" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-12 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الرقم السرى:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="password" name="password" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-12 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold "><input type="checkbox">   تذكرنى </div>

                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                          <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">دخول</button>
                      </div>
                      <div class="col-12 mt-2">
                        <a href="<?php echo e(route('password.request')); ?>" class="c-bol "> هل نسيت كلمة السر</a>
                          <br>
                        <a href="<?php echo e(route('EmployeeLoginForm')); ?>" class="c-bol "> تسجيل دخول الموظف</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/site/auth/login.blade.php ENDPATH**/ ?>