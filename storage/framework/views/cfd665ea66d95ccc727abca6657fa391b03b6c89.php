<?php $__env->startSection('content'); ?>
<section class="my-5 register">
    <div class="container">
      <div class="my-shadow py-4">
        <div class="dif">
          <h4 class="text-center font-weight-bold">التسجيل</h4>
          <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
        </div>

        <div class="  main-login">
          <div class="  login-cont">
            <div class=" login-div login-div2">
              <div class="">
                <div class=" content-log">
                  <div class="mt-4">
                    <div class="row m-0 p-0">
                      <div class="col-12">
                          <?php if($errors->any()): ?>
                              <div class="alert alert-danger">
                                  <ul>
                                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li><?php echo e($error); ?></li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </ul>
                              </div>
                          <?php endif; ?>
                          <?php if(App\Setting::first()->is_closed): ?>
                              <div class="alert alert-danger">
                              <p><?php echo e(App\Setting::first()->close_msg ? App\Setting::first()->close_msg : 'الموقع متوقف'); ?></p>
                              </div>
                          <?php endif; ?>
                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                      <div class="row m-0 p-0">
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الإسم الكريم:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">البريد الإلكترونى:
                            </div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">رقم الهاتف:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="number" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 ">
                          <div class="row w-100 m-0 p-0">
                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الرقم السرى:</div>
                            <div class="pl-0 col-sm-12 pr-0 "> <input type="password" name="password" class="form-control" required></div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="row w-100 m-0 p-0">
                            <div class="">
                              <div class="form-group text-right">
                                <label class="font-weight-bold" for="city_id">المدينة: </label>
                                <select name="city" class="form-control py-0 " id="city">
                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->name); ?>" <?php echo e(old('city') == $city->name ? 'selected' : null); ?>><?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                          <?php echo NoCaptcha::display(); ?>

                      </div>
                      <div class="col-12">
                          <?php echo e(csrf_field()); ?>

                        <button type="submit"  <?php echo e(! App\Setting::first()->can_register ? 'disabled' : ''); ?> class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">تسجيل</button>
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
<?php echo NoCaptcha::renderJs(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/auth/register.blade.php ENDPATH**/ ?>