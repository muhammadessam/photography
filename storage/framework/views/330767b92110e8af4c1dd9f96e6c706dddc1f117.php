<?php $__env->startSection('content'); ?>
    <style>
        iframe{
            width: 100%;
            border-radius: 10px;
        }
    </style>
<section class="my-5 mb-5">
    <div class="container">
        <div class="my-shadow py-4">
            <div class="dif">
                <h4 class="text-center font-weight-bold">مناسباتى</h4>
                <span class="d-block text-center"> <img src="<?php echo e(asset('images/flower.svg')); ?>" alt=""></span>
            </div>
            <?php if(session()->has('msg')): ?>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="alert alert-success"><?php echo e(session()->get('msg')); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="bg-white border par-tb mt-5">
                <?php if($orders->count() > 0): ?>
                    <table class="table mb-5 py-5 border-top-0">
                        <thead>
                            <tr>
                                <th> تاريخ الطلب</th>
                                <th> موعد المناسبة</th>
                                <th> قسم</th>
                                <th> مدينة</th>
                                <th> حالة الطلب</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white border">
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td  class="border-bottom font-weight-bold  "><?php echo e($order->created_at->toDateString()); ?></td>
                                    <td  class="border-bottom font-weight-bold  "><?php echo e($order->date->toDateTimeString()); ?></td>
                                    <td  class="border-bottom font-weight-bold  "><?php echo e($order->category->name); ?></td>
                                    <td  class="border-bottom font-weight-bold  "><?php echo e($order->city->name); ?></td>
                                    <td  class="border-bottom font-weight-bold  "><?php echo e($order->get_status()); ?></td>
                                    <td>
                                        <?php if(auth()->guard('employee')->check()): ?>
                                            <a href="<?php echo e(route('employee.account.orders.show', ['id' => $order->id])); ?>" class="c-bol" >  <i class="fas fa-eye"></i> مشاهدة</a>
                                            <?php if($order->status != "final"): ?>
                                                <a href="<?php echo e(route('makeFinal', $order)); ?>" class="c-bol" >  <i class="fas fa-check"></i>اَنجز</a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                        <!-- Button trigger modal -->
                                        <a  class="m-2 c-bol" href="<?php echo e(route('account.orders.show', ['id' => $order->id, 'tab' => 'images'])); ?>"><i class="fa fa-image"></i> <?php echo e($order->images_count); ?></a>
                                        <!-- Button trigger modal -->
                                        <a  class="m-2 c-bol" href="<?php echo e(route('account.orders.show', ['id' => $order->id, 'tab' => 'videos'])); ?>"><i class="fa fa-camera"></i> <?php echo e($order->videos_count); ?></a>
                                        <a href="<?php echo e(route('account.orders.show', ['id' => $order->id])); ?>" class="c-bol" >  <i class="fas fa-eye"></i> مشاهدة</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    <?php else: ?>
                        <p class="text-center">لا توجد طلبات</p>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.base', ['isAccount' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/site/account/orders/index.blade.php ENDPATH**/ ?>