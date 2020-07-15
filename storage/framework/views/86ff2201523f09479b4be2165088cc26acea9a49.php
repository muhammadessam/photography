<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_id">العميل</label>
                                        <div class="form-control"><?php echo e($order->customer->user->name); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">القسم</label>
                                        <div class="form-control"><?php echo e($order->category->name); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">الحالة</label>
                                        <div class="form-control"><?php echo e($order->get_status()); ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="customer_id">الوقت</label>
                                        <div class="form-control"><?php echo e($order['date']); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">المدينة :</label>
                                        <div class="form-control"><?php echo e($order->country ? $order->country->name : 'لم يتم تحديد'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">الحي :</label>
                                        <div class="form-control"><?php echo e($order->city->name); ?></div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="address">العنوان :</label>
                                        <div class="form-control"><?php echo e($order['address']); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">نوع المناسبة خاصة / عام :</label>
                                        <div class="form-control"><?php echo e($order['is_special'] ? 'خاصة':'عامة'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">اضافة حقوقنا علي التصميم :</label>
                                        <div class="form-control"><?php echo e($order['is_right_print'] ? 'نعم':'لا'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">عرض المناسبة علي صفحاتنا :</label>
                                        <div class="form-control"><?php echo e($order['is_on_our_page'] ? 'نعم':'لا'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_special">اليوم :</label>
                                        <div class="form-control"><?php echo e($order->day); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الموظفين المخصوصين بهذا العمل</h3>
                            <div class="card-tools">
                                <form action="<?php echo e(route('admin.order-add-employee', $order)); ?>" method="post" class="form-inline">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <select class="form-control" name="employee_id" id="employee_id">
                                            <?php $__currentLoopData = \App\Employee::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary mr-1" type="submit"><i class="fa fa-plus-circle"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="employees" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>اسم الموظف</th>
                                    <th>التقييم</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <?php $__currentLoopData = $order->employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item['name']); ?></td>
                                        <td><?php echo e($item->orders()->find($order)->pivot->stars); ?></td>
                                        <td class="d-flex">
                                            <form class="ml-1" action="<?php echo e(route('admin.order-remove-employee', [$order, $item])); ?>" method="post" onsubmit="return confirm('هل انت متاكد؟')">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                            <form action="<?php echo e(route('admin.order-employee-star', [$order, $item])); ?>" class="form-inline" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <input type="text" name="star" id="" class="form-control <?php $__errorArgs = ['star'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="اضف تقيم من 1 الي 5 ">
                                                </div>
                                                <button type="submit" class="mr-1 btn btn-primary"><i class="fa fa-plus-circle"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الفواتير</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h3 class="card-title">اضافة فاتورة جديدة</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <form action="<?php echo e(route('admin.bills.store')); ?>" method="post">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="customer_id" value="<?php echo e($order->customer->id); ?>">
                                                                    <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="cat_id">القسم</label>
                                                                                <select name="cat_id" id="cat_id" class="form-control">
                                                                                    <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option <?php echo e(old('cat_id')==$item['id'] ? 'selected' : ''); ?> value="<?php echo e($item['id']); ?>"><?php echo e($item->name); ?></option>
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
                                                                                <input type="number" step=".1" class="form-control" name="price" id="price" value="<?php echo e(old('price')); ?>">
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
                                                                                    <option <?php echo e(old('status')=='مسدد' ? 'selected':''); ?>value="مسدد">مسدد</option>
                                                                                    <option <?php echo e(old('status')=='غير مسدد' ? 'selected':''); ?>value="غير مسدد">غير مسدد</option>
                                                                                    <option <?php echo e(old('status')=='متبقي' ? 'selected':''); ?>value="متبقي">متبقي</option>
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
                                                                                <input type="number" step=".1" class="form-control" name="remains" id="remains" value="<?php echo e(old('remains')); ?>">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-responsive-lg" id="bills">
                                <thead>
                                <tr>
                                    <th>رقم الفاتورة</th>
                                    <th>اسم العميل</th>
                                    <th>رقم الطلب</th>
                                    <th>القسم</th>
                                    <th>المبلغ</th>
                                    <th>الحالة</th>
                                    <th>القيمة المتبقة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $order->bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item['id']); ?></td>
                                        <td><?php echo e($item->customer ? $item->customer->user->name : 'غير موجود'); ?></td>
                                        <td><?php echo e($item->order->id); ?></td>
                                        <td><?php echo e($item->category->name); ?></td>
                                        <td><?php echo e($item->price); ?></td>
                                        <td><?php echo e($item->status); ?></td>
                                        <td><?php echo e($item->remains); ?></td>
                                        <td class="d-flex">
                                            <a class="btn btn-info ml-1" href="<?php echo e(route('admin.bills.show', $item)); ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-warning ml-1" href="<?php echo e(route('admin.bills.edit', $item)); ?>"><i class="fa fa-edit"></i></a>
                                            <form action="<?php echo e(route('admin.bills.destroy', $item)); ?>" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card col-12">
                    <div class="card-header">
                        <h4 class="col-12 text-right">
                            التعليقات
                            <span class="btn btn-danger btn-sm"><?php echo e($order->comments->count()); ?></span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = $order->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card col-12 <?php echo e($comment['is_admin']?'bg-primary':'bg-secondary'); ?>">
                                <div class="card-header">
                                    <h5>
                                        <?php echo e($comment['is_admin']?'الادارة':'العميل'); ?>

                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p>
                                        <?php echo e($comment['body']); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($order->comments->count() == 0): ?>
                            <div class="card bg-dark-gradient p-3">
                                <h4 class="col-12 text-center">لا يوجد تعليقات</h4>
                            </div>
                        <?php endif; ?>
                        <div class="col-12">
                            <form class="col-12" action="<?php echo e(route('admin.comments.store')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                <input type="hidden" name="is_admin" value="1">
                                <div class="form-group">
                                    <label for="body">محتوي التعليق</label>
                                    <textarea name="body" id="body" cols="30" class="form-control" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn-outline-success btn">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'employees']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'employees']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'bills']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'bills']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>