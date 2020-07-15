<?php $__env->startSection('content'); ?>
    <div class="row">

    </div>
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="card col-3 p-2 bg-success">
                <a href="<?php echo e(route('admin.Employee_Activate')); ?>">
                    <h3 class="col-12 text-center">
                        الموظفين الفعالين
                        <br>
                        <?php echo e(@App\Employee::all()->where('Statue','Activate')->count()); ?>

                    </h3>
                </a>
            </div>
            <div class="card col-3 p-2 bg-danger">
                <a href="<?php echo e(route('admin.Employee_Deactivate')); ?>">
                    <h3 class="col-12 text-center">
                        الموظفين الغير فعالين
                        <br>
                        <?php echo e(@App\Employee::all()->where('Statue','Deactivate')->count()); ?>

                    </h3>
                </a>
            </div>
            <div class="card col-3 p-2 bg-warning">
                <a href="<?php echo e(route('admin.employees.index')); ?>">
                    <h3 class="col-12 text-center">
                        الموظفين
                        <br>
                        <?php echo e(@App\Employee::all()->count()); ?>

                    </h3>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">الموظفين</h3>
                <div class="card-tools">
                    <a href="<?php echo e(route('admin.employees.create')); ?>" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="card-body" style="overflow: auto">
                <table id="employees" class="table table-bordered text-center">
                    <thead>
                    <td>الاسم</td>
                    <td>الهاتف</td>
                    <td>البريد</td>
                    <td>الخبرة</td>
                    <td>القسم</td>
                    <td>حالة العمل</td>
                    <td>الحالة العامة</td>
                    <td>الجنسية</td>
                    <td>تحكم</td>
                    </thead>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($employee->name); ?></td>
                            <td><?php echo e($employee->phone); ?></td>
                            <td><?php echo e($employee->email); ?></td>
                            <td><?php echo e($employee->exp); ?></td>
                            <td><?php echo e($employee->category->name); ?></td>
                            <td><?php echo e($employee->is_available ? 'متاح':'مشغول'); ?></td>
                            <td class="<?php echo e($employee->Statue == "Activate"? 'bg-success':'bg-danger'); ?>"><?php echo e($employee->Statue == "Activate"? 'مفعل':'غير مفعل'); ?></td>
                            <td><?php echo e($employee->nationality); ?></td>
                            <td class="d-flex">
                                <a title="مشاهدة" href="<?php echo e(route('admin.employees.show', $employee)); ?>" class="btn btn-success ml-1"><i class="fa fa-eye"></i></a>
                                <a title="تعديل" class="btn btn-primary ml-1" href="<?php echo e(route('admin.employees.edit',$employee)); ?>"><i class="fa fa-edit"></i></a>
                                <a title="الطلبات" class="btn btn-warning ml-1" href="<?php echo e(route('admin.emp_orders',$employee)); ?>">
                                    <i class="fa fa-first-order"></i>
                                    <span class="badge-danger badge"><?php echo e($employee->orders->count()); ?></span>
                                </a>
                                <a href="<?php echo e(route('admin.Employee_ChangeStatue',$employee)); ?>" class="btn btn-sm btn-dark">
                                    تغيير الحالة
                                </a>
                                <button title="حذف" type="button" class="btn btn-danger" data-toggle="modal" data-target="#example<?php echo e($employee->id); ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <div class="modal fade" id="example<?php echo e($employee->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                هل انت متأكد من الحذف ؟
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?php echo e(route('admin.employees.destroy',$employee)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/employees/index.blade.php ENDPATH**/ ?>