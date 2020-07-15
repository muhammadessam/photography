<?php $__env->startSection('content'); ?>
    <div class="">
        <header>
            <div id="fr-car" class="owl-carousel owl-theme" dir="ltr">
                <?php $__currentLoopData = @App\Slider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="car-img">
                    <img src="<?php echo e(asset($slider->image)); ?>" alt="">
                    <div class="container">
                        <div class="header-content text-white">
                            <h3 class="text-center mb-1"><?php echo e($slider->primary_text); ?></h3>
                            <h1 class="text-center"><?php echo e($slider->secondary_text); ?></h1>
                            <div class="mt-3 mb-4 text-center tnb">
                                <span class="d-inline-block line"></span>
                            </div>
                            <?php if(auth()->guard()->guest()): ?>
                                <div class="text-center"><a href="<?php echo e(route('register')); ?>" class="text-white ml-2">التسجيل</a> | <a href="<?php echo e(route('login')); ?>" class="text-white mr-2">الدخول</a></div>
                            <?php endif; ?>                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </header>

        <section class="about">
            <div class="container">
                <div class="dif">
                    <h4 class="text-center font-weight-bold">من نحن</h4>
                    <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
                </div>
                <div>
                    <p class="text-justify text-center my-3">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم
                        تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما،
                        عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع
                        مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات</p>
                </div>
            </div>
        </section>

        <section class="services mt-5 py-3 mb-4">
            <div class="container">
                <div class="dif">
                    <h4 class="text-center font-weight-bold">خدماتنا</h4>
                    <span class="d-block text-center"> <img src="./images/flower.svg" alt=""></span>
                </div>
                <div class="row mt-4">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 mb-3">
                            <div class="text-center my-shadow p-3 position-relative ready">
                                <div class="overlay ov-kufi py-2 ">
                                    <P class="py-2"><?php echo e($service->description); ?></P>
                                </div>
                                <div class="services-icons text-center"><i class="fa fa-<?php echo e($service->icon); ?> icon-color"></i></div>
                                <h5 class="icon-color font-weight-bold"><?php echo e($service->title); ?></h5>
                                <p class="mt-3"><?php echo e($service->description); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>


        <section class="my-5 py-5 numbers">
            <div class="container">
                <div class="row mt-4 text-white">
                    <?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="text-center  p-3">
                                <div class="services-icons text-center"><i class="fa fa-<?php echo e($achievement->icon); ?>"></i></div>
                                <h2 class=" font-weight-bold"><span class="counter" data-counter-time="2000" data-counter-delay="10"><?php echo e($achievement->number); ?></span>
                                </h2>
                                <h5 class="mt-3"><?php echo e($achievement->title); ?></h5>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>







        <section class="photos">
            <div class="container">
                <div class=" text-center photos-controls">
                    <button id="current" class="btn   bg-btn-color  border ">كل الصور </button>
                    <button id="completed" class="btn      border "> الفيديو</button>
                    <button id="withdraw" class="btn    border   ">اختارنا لكم</button>
                </div>
                <div class="my-shadow my-3 p-2 galary-list cairo">
                    <div class="">
                        <div class="current galary-status">
                            <div>
                                <div id="nd-car" class="owl-carousel owl-galary owl-theme" dir="ltr">
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="o-img">
                                            <div class="position-relative ready  d-inline-block">
                                                <img src="<?php echo e(request()->root() . '/' .$image->image); ?>" alt="">
                                                <div class="overlay ov-kufi  r-img  ">
                                                    <div
                                                        class="py-2 main-img d-flex justify-content-center align-items-center flex-column text-white">
                                                        <h5 class="text-center">
                                                            <?php echo e($image->category ? $image->category->name : ''); ?>

                                                        </h5>
                                                        <span class="d-inline-block my-2 touch-sm"></span>
                                                        <h6 class="text-center"><?php echo e($image->title ? $image->title : ''); ?></h6>
                                                        <i class="far fa-image sms-im"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="completed galary-status d-none">
                            <div class="row">
                                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6">
                                        <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                            <?php
                                                parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                            ?>
                                            src="https://www.youtube.com/embed/<?php echo e($output['v']); ?>"
                                            frameborder="0"></iframe>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="withdraw galary-status d-none  ">
                            <div class="row">

                            <?php if($videos->count() > 0): ?>
                                <div class="col-md-6">
                                    <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                        <?php
                                            parse_str( parse_url($videos->random()->video, PHP_URL_QUERY), $output );
                                        ?>
                                        src="https://www.youtube.com/embed/<?php echo e($output['v']); ?>"
                                        frameborder="0"></iframe>
                                </div>
                            <?php endif; ?>

                            <?php if($images->count() > 0): ?>
                                <div class="col-md-6"><img class="img-fluid" src="<?php echo e(request()->root() . '/' .$images->random()->image); ?>" alt=""></div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>




        <section>
            <div class="about-us text-white py-5">
                <div class="container text-center">
                    <div id="td-car" class="owl-carousel owl-theme" dir="ltr">
                        <?php $__currentLoopData = @App\Opinion::all()->where('statue','accepted'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class=" " dir="rtl">
                            <h3 class="font-weight-bold mb-3">قالوا عنا</h3>
                            <div class="clientopp">
                                <div class="row firsttest">
                                    <div class=" position-relative col-12">
                                        <p class="text-center client col-12">
                                            <?php echo e($op->body); ?>

                                        </p>
                                        <div class="arrow"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center lasttest mt-2 d-flex justify-content-center align-items-center">

                                <h5 class="person_name"><?php echo e($op->customer->user->name); ?></h5>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
        </section>
        <section class="contact py-5 text-white">
            <div class="container pb-5">
                <h3 class="font-weight-bold mb-5 text-center ">تواصل معنا</h3>
                <div class="row">

                    <div class="col-md-6">
                        <?php if($setting->phone): ?>
                            <div class="info-data">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span class="contact-icon">
                                        <i class="fas fa-mobile-alt"></i>
                                        </span>
                                    </div>
                                    <div class="det-d">
                                        <span class="d-block"> رقم الجوال</span>
                                        <span class="d-block" dir="ltr"> <?php echo e($setting->phone); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="info-data">
                            <?php if($setting->address): ?>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                    <div class="det-d">
                                        <span class="d-block"> الموقع</span>
                                        <span class="d-block" dir="ltr"><?php echo e($setting->address); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="info-data">
                            <div class="d-flex align-items-center">
                                <div>
                                    <span class="contact-icon">
                                      <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <div class="det-d">
                                    <span class="d-block"> البريد الإلكتروني</span>
                                    <span class="d-block" dir="ltr"> <?php echo e($setting->app_email); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <ul class="navbar-nav p-0 social-links ">
                                <li class="nav-item">
                                    <?php echo $setting->facebook ? '<a class="nav-link d-inline-block " href="'. $setting->facebook .'"><i class="fab fa-facebook-f"></i></a>' : null; ?>

                                    <?php echo $setting->twitter ? '<a class="nav-link d-inline-block " href="'. $setting->twitter .'"><i class="fab fa-twitter"></i></a>' : null; ?>

                                    <?php echo $setting->instagram ? '<a class="nav-link d-inline-block " href="'. $setting->instagram .'"><i class="fab fa-instagram"></i></a>' : null; ?>


                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6" id="contact-form">
                        <?php if(session()->has('msg')): ?>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="alert alert-success"><?php echo e(session()->get('msg')); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('contact.store')); ?>" method="POST"
                            <div class="row">
                                <div class="col-md-6 mb-2 pl-1 med-1">
                                    <input placeholder="الإسم" type="text" name="name" class="form-control ">
                                </div>
                                <div class="col-md-6 mb-2 pr-1 med-2">
                                    <input placeholder="البريد الإلكترونى" type="text" name="email" class="form-control ">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input placeholder="الهاتف" type="text" name="phone" class="form-control ">
                                </div>
                                <div class="col-12">
                                    <textarea placeholder="الرسالة" class="form-control " name="msg" id="" cols="30" rows="7"></textarea>
                                </div>
                                <?php echo NoCaptcha::display(); ?>

                                <div class="text-left col-12 my-2">
                                    <?php echo e(csrf_field()); ?>

                                    <button class="contact-btn" type="submit">إرسال</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php echo NoCaptcha::renderJs(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/site/home/index.blade.php ENDPATH**/ ?>