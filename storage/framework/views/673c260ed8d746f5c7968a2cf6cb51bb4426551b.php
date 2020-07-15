<?php $__env->startSection('content'); ?>
<section class="my-5">
    <div class="container main-edit">
      <div class="my-shadow py-4">
        <div class="dif">
          <h4 class="text-center font-weight-bold">تعدبل بياناتي</h4>
          <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
        </div>
        <?php if(session()->has('msg')): ?>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="alert alert-success"><?php echo e(session()->get('msg')); ?></div>
                </div>
            </div>
        <?php endif; ?>
      <?php if(auth()->guard('employee')->check()): ?>
          <div class="mt-4 p-3">
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
                  </div>
              </div>
              <form action="<?php echo e(route('employees.update',$employee)); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                  <div class="form-group">
                      <label for="name">الاسم</label>
                      <input type="text" class="form-control" value="<?php echo e($employee->name); ?>" name="name" id="name">
                  </div>
                  <div class="form-group">
                      <label for="email">البريد</label>
                      <input type="email" class="form-control" value="<?php echo e($employee->email); ?>" name="email" id="email">
                  </div>
                  <div class="form-group">
                      <label for="password">كلمة السر</label>
                      <input type="password" class="form-control" name="password" value="same" id="password">
                  </div>
                  <div class="form-group">
                      <label for="exp">الخبرة</label>
                      <select name="exp" class="form-control" id="exp">
                          <option value="<?php echo e($employee->exp); ?>"><?php echo e($employee->exp); ?></option>
                          <option value="مبتدئ">مبتدئ</option>
                          <option value="متوسط">متوسط</option>
                          <option value="متقدم">متقدم</option>
                          <option value="محترف">محترف</option>
                          <option value="خبير">خبير</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="cat_id">القسم</label>
                      <select name="cat_id" class="form-control" id="cat_id">
                          <option value="<?php echo e($employee->category->id); ?>"><?php echo e($employee->category->name); ?></option>
                          <?php $__currentLoopData = @App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="phone">الهاتف</label>
                      <input type="text" class="form-control" value="<?php echo e($employee->phone); ?>" name="phone" id="phone">
                  </div>
                  <div class="form-group">
                      <label for="image">الصورة الشخصية</label>
                      <input type="file" class="form-control" name="image" id="image">
                  </div>

                  <div class="form-group">
                      <input type="submit" class="btn btn-outline-success btn-block" value="حفظ" name="" id="">
                  </div>
              </form>
          </div>
      <?php else: ?>

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
                      </div>
                  </div>
                  <form method="POST" action="<?php echo e(route('customers.update',auth()->user()->customer)); ?>" enctype="multipart/form-data">
                      <?php echo method_field('PATCH'); ?>
                      <div class="row m-0 p-0">
                          <div class="form-group col-md-6 ">
                              <div class="row w-100 m-0 p-0">
                                  <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الإسم :</div>
                                  <div class="pl-0 col-sm-12 pr-0 "> <input type="text" name="name" class="form-control" value="<?php echo e(auth()->user()->name); ?>" required></div>
                              </div>
                          </div>
                          <div class="form-group col-md-6 ">
                              <div class="row w-100 m-0 p-0">
                                  <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">البريد الإلكترونى:
                                  </div>
                                  <div class="pl-0 col-sm-12 pr-0 "> <input type="email" name="email" class="form-control" value="<?php echo e(auth()->user()->email); ?>" required></div>
                              </div>
                          </div>
                          <div class="form-group col-md-6 ">
                              <div class="row w-100 m-0 p-0">
                                  <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">كلمة مرور جديدة:</div>
                                  <div class="pl-0 col-sm-12 pr-0 "> <input type="password" value="same" name="password" class="form-control"></div>
                              </div>
                          </div>
                          <div class="form-group col-md-6 ">
                              <div class="row w-100 m-0 p-0">
                                  <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">رقم الهاتف:</div>
                                  <div class="pl-0 col-sm-12 pr-0 "> <input type="number" name="phone" value="<?php echo e(auth()->user()->customer->phone ? auth()->user()->customer->phone : ''); ?>" class="form-control"></div>
                              </div>
                          </div>
                          <div class="form-group col-md-6 ">
                              <div class="row w-100 m-0 p-0">
                                  <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">أعد ادخال كلمة مرور:</div>
                                  <div class="pl-0 col-sm-12 pr-0 "> <input type="password" value="same" name="password_confirmation" class="form-control" ></div>
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                              <div class="row w-100 m-0 p-0">
                                  <div class="w-100">
                                      <div class="form-group text-right">
                                          <label class="font-weight-bold" for="city">المدينة: </label>
                                          <select name="city" class="form-control py-0 w-100 " id="city">
                                              <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($city->name); ?>" <?php echo e(auth()->user()->customer->city == $city->name ? 'selected' : null); ?>><?php echo e($city->name); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group col-md-6 ">
                              <div class="row w-100 m-0 p-0">
                                  <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold ">الصورة الشخصية:</div>
                                  <div class="pl-0 col-sm-12 pr-0 "> <input type="file" name="image" class="form-control" ></div>
                              </div>
                          </div>
                      </div>
                      <div class="col-12 mb-5">
                          <?php echo e(csrf_field()); ?>

                          <button type="submit" class="btn btn-block font-weight-bold  text-white bg-nav-c save-invoice py-2">حفظ</button>
                      </div>
                  </form>
              </div>
          <?php endif; ?>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/account/edit.blade.php ENDPATH**/ ?>