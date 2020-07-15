<?php $__env->startSection('content'); ?>
    <div class="container pt-3">
        <div class="row justify-content-around">
            <div class="card bg-success col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الموظفين
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        <?php echo e(@App\Employee::all()->count()); ?>

                    </h5>
                </div>
            </div>
            <div class="card bg-warning col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        العملاء
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        <?php echo e(@App\Customer::all()->count()); ?>

                    </h5>
                </div>
            </div>
            <div class="card bg-dark col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الاقسام
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        <?php echo e(@App\Category::all()->count()); ?>

                    </h5>
                </div>
            </div>
        </div>
        <div class="row justify-content-around">

            <div class="card bg-danger col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الطلبات
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        <?php echo e(@App\Order::all()->count()); ?>

                    </h5>
                </div>
            </div>
            <div class="card bg-info col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        الفواتير
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        <?php echo e(@App\Customer::all()->count()); ?>

                    </h5>
                </div>
            </div>
            <div class="card bg-primary col-3">
                <div class="card-header">
                    <h4 class="col-12 text-center">
                        اتصل بنا
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="col-12 text-center">
                        <?php echo e(@App\Category::all()->count()); ?>

                    </h5>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/home.blade.php ENDPATH**/ ?>