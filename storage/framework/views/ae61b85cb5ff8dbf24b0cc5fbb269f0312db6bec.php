<?php $__env->startSection('content'); ?>
    <div class="row">

    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">تعديل فاتورة</h3>
                        <div class="card-tools">
                            <a class="btn btn-primary" href="<?php echo e(route('admin.bills.index')); ?>"><i class="fa fa-list"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.bills.update', $bill)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customer_id">اسم العميل</label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <?php $__currentLoopData = \App\Customer::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($bill['customer_id']==$item['id'] ? 'selected' : ''); ?> value="<?php echo e($item['id']); ?>"><?php echo e($item->user['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['name' => 'customer_id']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'customer_id']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    </div>

                                    <div class="form-group">
                                        <label for="order_id">رقم الطلب</label>
                                        <select name="order_id" id="order_id" class="form-control">
                                            <?php $__currentLoopData = \App\Order::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($bill['order_id']==$item['id'] ? 'selected' : ''); ?> value="<?php echo e($item['id']); ?>"><?php echo e($item->id); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['name' => 'order_id']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'order_id']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    </div>
                                    <div class="form-group">
                                        <label for="cat_id">القسم</label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($bill['cat_id']==$item['id'] ? 'selected' : ''); ?> value="<?php echo e($item['id']); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['name' => 'cat_id']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'cat_id']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    </div>
                                    <div class="form-group">
                                        <label for="price">المبلغ</label>
                                        <input type="number" step=".1" class="form-control" name="price" id="price" value="<?php echo e($bill['price']); ?>">
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['name' => 'price']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'price']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    </div>

                                    <div class="form-group">
                                        <label for="status">حالة الفاتورة</label>
                                        <select name="status" id="status" class="form-control">
                                            <option <?php echo e($bill['status']=='مسدد' ? 'selected':''); ?>value="مسدد">مسدد</option>
                                            <option <?php echo e($bill['status']=='غير مسدد' ? 'selected':''); ?>value="غير مسدد">غير مسدد</option>
                                            <option <?php echo e($bill['status']=='متبقي' ? 'selected':''); ?>value="متبقي">متبقي</option>
                                        </select>
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['name' => 'status']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'status']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    </div>
                                    <div class="form-group">
                                        <label for="remains">الباقي في حالة عدم سداد المبلغ كلية</label>
                                        <input type="number" step=".1" class="form-control" name="remains" id="remains" value="<?php echo e($bill['remains']); ?>">
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['name' => 'remains']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'remains']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> حفظ</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/bills/edit.blade.php ENDPATH**/ ?>