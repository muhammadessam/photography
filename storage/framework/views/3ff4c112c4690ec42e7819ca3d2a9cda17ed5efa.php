<?php $__env->startSection('content'); ?>

    <div class="container py-5">
        <div class="row my-shadow w-100 m-0 py-4 px-2 mb-5">
            <div class="col-md-6 oas-acp">
                <h4 class="accepted-orders">طلب تغطية </h4>
                <div><span><i class="fas fa-tags"></i></span> <span class="title-ce d-inline-block"><?php echo e($order->category->name); ?></span></div>
            </div>
            <div class="col-md-6">
                <div class="text-left acp-od-m">
                    <div class="d-inline-block ml-2 text-center">
                        <span class="d-block acp-case  "> حالة الطلب   </span>
                        <span class="d-block text-muted  "><small> رقم الطلب</small>    </span>
                    </div>
                    <div class="d-inline-block text-center">
                        <span class="d-block acp-req"> <span><?php echo e($order->get_status()); ?></span> </span>
                        <span class="d-block text-muted"> <small> 100<?php echo e($order->id); ?> </small> </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="my-shadow right-acp">
                    <div class="acp-title">
                        <h5><i class="far fa-file-alt"></i> بيانات الطلب</h5>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">
                        <button type="button" class="text-dark acp-widget d-inline-block" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="far fa-images"></i> <span>  صور المناسبة </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;"><?php echo e($order->images->count()); ?></span>
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="min-width: 70%;margin: 0 auto;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <?php if($order->images->count() > 0): ?>
                                                <?php $__currentLoopData = $order->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-3 position-relative">
                                                        <a href="<?php echo e(request()->root() . '/' .$img->image); ?>" data-toggle="lightbox" data-gallery="example-gallery">
                                                            <img src="<?php echo e(request()->root() . '/' .$img->image); ?>" class="img-fluid">
                                                        </a>
                                                        <form class="position-absolute" style="bottom: 0;right: 5%;" method="post" action="<?php echo e(route('DownloadFile')); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="file" value="<?php echo e($img->image); ?>">
                                                            <button type="submit" class="btn btn-success btn-sm">تحميل</button>
                                                        </form>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p class="text-center">ال يتوفر أي أي صور </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="text-dark acp-widget d-inline-block" data-toggle="modal" data-target="#exampleModalCenter1">
                            <i class="far fa-images"></i> <span>  فيديو المناسبة </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;"><?php echo e($order->videos->count()); ?></span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="min-width: 70%;margin: 0 auto" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <?php if($order->videos->count() > 0): ?>
                                                <?php $__currentLoopData = $order->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-6">
                                                        <iframe id="ytplayer" type="text/html" width="100%" height="250"
                                                                <?php
                                                                    parse_str( parse_url($video->video, PHP_URL_QUERY), $output );
                                                                ?>
                                                                src="https://www.youtube.com/embed/<?php echo e($output['v']); ?>"
                                                                frameborder="0">

                                                        </iframe>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p class="text-center">لا توجد فيديوهات </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span>نوع المناسبة </span>
                            </div>
                            <div class="acp-yl text-center">
                                <span><?php echo e($order->is_special?"خاصة":"عامة"); ?></span>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span>  الوقت </span>
                            </div>
                            <div class="acp-yl text-center">
                                <small><?php echo e($order->date); ?></small> <span><?php echo e($order->day); ?></span>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="acp-bl text-center">
                                <span> المدينة والحي </span>
                            </div>
                            <div class="acp-yl text-center">
                                <span><?php echo e($order->country->name); ?> - <?php echo e($order->city->name); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <h5 class="text-center font-weight-bold mt-2">العميل</h5>
                        <div class="d-flex">
                            <div class="acp-user-img">
                                <img class="w-100" src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png" alt=" ">
                            </div>
                            <div class="acp-cln-u">
                                <div class="acp-user text-center"><?php echo e($order->customer->user->name); ?></div>
                                <div class="acp-location text-center">
                                    <small>السعودية</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hard-border"></div>
                    <div>
                        <h6 class="tagt">موظفى التغطية</h6>
                    </div>
                    <?php $__currentLoopData = $order->employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-between">
                            <div class="grn-emptext-center"><?php echo e($item->name); ?></div>
                            <div class="gry-emptext-center"><?php echo e($item->phone); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter23">
                        <div class="acp-guid text-center" >
                            <i class="fas fa-question-circle"></i>
                            <h5>تعليمات</h5>
                        </div>
                    </a>
                    <div class="modal fade" id="exampleModalCenter23" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h5 class="modal-title" id="exampleModalLongTitle">التعليمات</h5>
                                </div>
                                <div class="modal-body">
                                    <?php echo @App\Setting::first()->instruction; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="my-shadow py-2">
                    <div class="row mt-5">
                        <div class=" col-sm-12">
                            <?php if($order->status  != 'rejected'): ?>
                                <div class="order-status px-5">
                                    <div class="timeline d-flex justify-content-between">
                                        <div class="step"></div>
                                        <div class="step <?php echo e($order->status == 'waiting' || $order->status == 'billed' ? 'active' : ''); ?>"></div>
                                        <div class="step <?php echo e($order->status == 'accepted' ? 'active' : ''); ?>"></div>
                                        <div class="step <?php echo e($order->status == 'final' ? 'active' : ''); ?>"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>طلب جديد</span>
                                        <span>تحت المراجعة</span>
                                        <span>تم قبول الطلب</span>
                                        <span>تم انجاز</span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-danger px-5" role="alert">
                                    <h4 class="alert-heading">مرفوض</h4>
                                    <p>تم رفض هذا الطلب منل قبل الإدارة</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="my-shadow mt-3">
                    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 px-3 border-bottom">
                        <h5>تفاصيل المشروع</h5>
                        <button type="button" class="text-dark acp-widget inv-acp d-inline-block" data-toggle="modal" data-target="#exampleModalCenter2">
                            <i class="far fa-images"></i> <span> فاتورة الطلب </span>
                            <span class="btn btn-sm rd-bdg " style="background-color: #dc3545;color: white;">2</span>
                        </button>
                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div style="min-width: 70%;margin: 0 auto;" class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped table-bordered table-responsive-lg" id="bills">
                                            <thead>
                                            <tr>
                                                <th>رقم الفاتورة</th>
                                                <th>القسم</th>
                                                <th>المبلغ</th>
                                                <th>الحالة</th>
                                                <th>القيمة المتبقة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $order->bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($bill->id); ?></td>
                                                    <td><?php echo e($bill->category->name); ?></td>
                                                    <td><?php echo e($bill->price); ?></td>
                                                    <td><?php echo e($bill->status); ?></td>
                                                    <td><?php echo e($bill->remains); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($order->bills->count() == 0): ?>
                                                <tr>
                                                    <td colspan="6">
                                                        <h4 class="col-12 text-center">لا توجد فواتير </h4>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-2 pt-3 px-3">
                        <p class="c-bol "><?php echo e($order->comments->where('is_admin',0)->first()->body ?? "الرجاء اضافة تفاصيل المشروع من خلال تعليق"); ?></p>
                    </div>
                </div>
                <?php $__currentLoopData = $order->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($comment != $order->comments->where('is_admin',0)->first()): ?>
                    <div class="my-shadow mt-3">
                        <div class="d-flex justify-content-between align-items-center pt-3 pb-2 px-3 border-bottom">
                            <h5><?php echo e($comment->is_admin ? 'الإدارة' : auth()->user()->name); ?></h5>
                        </div>
                        <div class="pb-2 pt-3 px-3">
                            <p class="text-danger"><?php echo e($comment->body); ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="my-shadow mt-3">
                    <div class="p-3">
                        <form action="<?php echo e(route('account.comments.store')); ?>" method="post" class="mt-3">
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                            <input type="hidden" name="is_admin" value="0">
                            <label for="">اضف ردا على هذه الرسالة</label>
                            <textarea class="form-control bg-white text-dark border" name="body" id="" cols="30" rows="7"></textarea>
                            <button class="btn btn-success my-2 "><i class="fab fa-telegram-plane"></i> اضف ردك</button>
                        </form>


                        <div class="p-3 my-2 text-danger acp-note">
                            <p class="mb-2">نرجو التقييد بالإتفاقية هنا واضاة اة ملاحظات كى يتم مراجعتها</p>
                            <p><small> اى اتفاقات خارجية اة مع الموظفين يعد مخالفة وخارج مسؤوليتنا</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', ['isAccount' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/account/orders/show.blade.php ENDPATH**/ ?>