<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>
                        الموظف
                    </h3>
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
                                        <label for="name">الاسم</label>
                                        <div class="form-control">
                                            <?php echo e($employee->name); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">البريد الاكتروني</label>
                                        <div class="form-control">
                                            <?php echo e($employee->email); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">الهاتف</label>
                                        <div class="form-control">
                                            <?php echo e($employee->phone); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">الحالة</label>
                                        <div class="form-control">
                                            <?php echo e($employee->is_available ? 'متاح' : 'مشغول'); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">القسم</label>
                                        <div class="form-control">
                                            <?php echo e($employee->category->name); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">الخبرة</label>
                                        <div class="form-control">
                                            <?php echo e($employee->exp); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">الجنسية</label>
                                        <div class="form-control">
                                            <?php echo e($employee->nationality); ?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">التقييم</label>
                                        <div class="form-control">
                                            <?php echo e($employee->orders->pluck('pivot')->flatten()->pluck('stars')->sum() / $employee->orders->count() ?? 1); ?>

                                        </div>
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
                            <h3 class="card-title">الطلبات الخاصة بهذا الموظف</h3>
                        </div>
                        <div class="card-body">
                            <table id="cats" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>اسم العميل</th>
                                    <th>القسم</th>
                                    <th>العنوان</th>
                                    <th>الوقت</th>
                                    <th>الحالة</th>
                                    <th>نوع المناسبة خاصة/عامة</th>
                                    <th>اضافة الختم علي الصور</th>
                                    <th>عرض المناسبة علي الصفحة</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <?php $__currentLoopData = $employee->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->customer->user->name); ?></td>
                                        <td><?php echo e($item->category->name); ?></td>
                                        <td><?php echo e($item['address']); ?></td>
                                        <td><?php echo e($item['date']); ?></td>
                                        <td><?php echo e($item->get_status()); ?></td>
                                        <td><?php echo e($item['is_special'] ? 'خاصة':'عامة'); ?></td>
                                        <td><?php echo e($item['is_right_print']? 'نعم':'لا'); ?></td>
                                        <td><?php echo e($item['is_on_our_page'] ? 'نعم' :'لا'); ?></td>
                                        <td class="d-flex">
                                            <a class="btn btn-secondary ml-2" href="<?php echo e(route('admin.orders.show', $item)); ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary ml-2" href="<?php echo e(route('admin.orders.edit', $item)); ?>"><i class="fa fa-edit"></i></a>
                                            <form action="<?php echo e(route('admin.employee-remove-order', [$employee, $item])); ?>" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
     <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable','data' => ['id' => 'cats']]); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'cats']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/employees/show.blade.php ENDPATH**/ ?>