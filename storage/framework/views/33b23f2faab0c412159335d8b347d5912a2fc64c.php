<?php $__env->startSection('content'); ?>

    <section class="my-5 register">
        <div class="container p-4">
            <div class="my-shadow py-4">
                <div class="dif">
                    <h4 class="text-center font-weight-bold">طلب مناسبة</h4>
                    <span class="d-block text-center"> <img src="<?php echo e(asset('public/'.'images/flower.svg')); ?>" alt=""></span>
                </div>
                <div class="row mt-5">
                    <div class=" col-sm-12">
                        <div class="order-status px-5">
                            <div class="timeline d-flex justify-content-between">
                                <div class="step active"></div>
                                <div class="step"></div>
                                <div class="step"></div>
                                <div class="step"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>طلب جديد</span>
                                <span>تحت المراجعة</span>
                                <span>تم قبول الطلب</span>
                                <span>تم انجاز</span>
                            </div>
                        </div>
                    </div>
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
                                            </div>
                                        </div>
                                        <div>
                                            <form class="" action="<?php echo e(route('account.orders.store')); ?>" method="POST">
                                                <div class="row m-0 p-0">
                                                    <div class="form-group col-md-6 ">
                                                        <div class="row w-100 m-0 p-0">
                                                            <div class="pr-0 col-sm-12 mb-2 invoice-label c-bol font-weight-bold label-touch color-qq">
                                                                <i class="fas fa-map-marked-alt"></i> عنوان المناسبة:
                                                            </div>
                                                            <div class="pl-0 col-sm-12 pr-0 ">
                                                                <input type="text"
                                                                       name="address"
                                                                       class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="row w-100 m-0 p-0">
                                                            <div class="col-12 p-0">
                                                                <div class="form-group text-right">
                                                                    <label class="font-weight-bold color-qq"
                                                                           for="section_input"><i
                                                                                class="fas fa-th-large"></i> القسم:
                                                                    </label>
                                                                    <select name="cat_id" class="form-control py-0 "
                                                                            id="section_input">
                                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($cat->id); ?>" <?php echo e(old('cat_id') == $cat->id ? 'selected' : null); ?>><?php echo e($cat->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="row w-100 m-0 p-0">
                                                            <div class="col-12 p-0">
                                                                <div class="form-group text-right">
                                                                    <label class="font-weight-bold color-qq"
                                                                           for="section_input"><i
                                                                                class="fas fa-city"></i> المدينة:
                                                                    </label>
                                                                    <select name="country_id" class="form-control py-0 "
                                                                            id="section_input">
                                                                        <?php $__currentLoopData = @App\Country::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_id') == $city->id ? 'selected' : null); ?>><?php echo e($city->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="row w-100 m-0 p-0">
                                                            <div class="col-12 p-0">
                                                                <div class="form-group text-right">
                                                                    <label class="font-weight-bold color-qq"
                                                                           for="section_input"><i
                                                                                class="fas fa-building"></i>الحي:
                                                                    </label>
                                                                    <select name="city_id" class="form-control py-0 "
                                                                            id="section_input">
                                                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_id') == $city->id ? 'selected' : null); ?>><?php echo e($city->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group text-right">
                                                            <label class="font-weight-bold color-qq" for=""><i
                                                                        class="fas fa-birthday-cake"></i> نوع المناسبة:
                                                            </label>
                                                            <div class="d-block d-flex">
                                                                <div>
                                                                    <div class="ml-4"><input name="is_special"
                                                                                             type="radio" class="ml-2"
                                                                                             id="special"
                                                                                             value="1"><label
                                                                                for="special"> خاص</label></div>
                                                                </div>
                                                                <div>
                                                                    <div><input name="is_special" type="radio"
                                                                                class="ml-2" id="public"
                                                                                value="0"><label
                                                                                for="public">عام</label></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group text-right">
                                                            <label class="font-weight-bold color-qq" for=""><i
                                                                        class="fas fa-copyright"></i> اضافة حقوقنا على
                                                                التصميم: </label>
                                                            <div class="d-block d-flex">
                                                                <div>
                                                                    <div class="ml-4"><input name="is_right_print"
                                                                                             type="radio" value="1"
                                                                                             class="ml-2"
                                                                                             id="yes_right"><label
                                                                                for="yes_right"> نعم</label></div>
                                                                </div>
                                                                <div>
                                                                    <div><input name="is_right_print" type="radio"
                                                                                class="ml-2" value="0"
                                                                                id="no_right"><label
                                                                                for="no_right">لا</label></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group text-right">
                                                            <label class="font-weight-bold color-qq" for=""><i
                                                                        class="fas fa-eye"></i> عرض المناسبة على صفحتنا:
                                                            </label>
                                                            <div class="d-block d-flex">
                                                                <div>
                                                                    <div class="ml-4"><input name="is_on_our_page"
                                                                                             type="radio" value="1"
                                                                                             class="ml-2"
                                                                                             id="yes_cle"><label
                                                                                for="yes_cle"> نعم</label></div>
                                                                </div>
                                                                <div>
                                                                    <div><input name="is_on_our_page" type="radio"
                                                                                value="0" class="ml-2"
                                                                                id="no_cle"><label
                                                                                for="no_cle">لا</label></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group text-right">
                                                            <label class="font-weight-bold mb-0 color-qq" for=""><i
                                                                        class="fas fa-calendar-alt"></i> وقت المناسبة:
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 ">
                                                        <div class="row w-100 m-0 p-0">
                                                            <div class="pr-0 col-sm-12 mb-2  c-bol font-weight-bold color-qq ">
                                                                التاريخ:
                                                            </div>
                                                            <div class="pl-0 col-sm-12 pr-0 ">
                                                                <input required type="datetime-local" name="date"
                                                                       class="form-control" id="datepicker">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-right col-md-6">
                                                        <label class="font-weight-bold color-qq" for="section_input">اليوم: </label>
                                                        <select name="day" id="day" class="form-control" required>
                                                            <option value="السبت">السبت</option>
                                                            <option value="الاحد">الاحد</option>
                                                            <option value="الاثنين">الاثنين</option>
                                                            <option value="الثلاثاء">الثلاثاء</option>
                                                            <option value="الاربعاء">الاربعاء</option>
                                                            <option value="الخميس">الخميس</option>
                                                            <option value="الجمعة">الجمعة</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit"
                                                                class="btn btn-block font-weight-bold  mb-3 text-white bg-nav-c save-invoice py-2">
                                                            ارسال
                                                        </button>
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

<?php echo $__env->make('site.layouts.base', ['isAccount' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/site/account/orders/create.blade.php ENDPATH**/ ?>
