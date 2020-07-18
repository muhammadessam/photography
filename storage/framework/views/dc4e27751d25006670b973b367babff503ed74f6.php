<?php $__env->startSection('content'); ?>
    <style>
        iframe {
            width: 100%;
            border-radius: 12px;
        }
    </style>
    <div class="container pt-3">
        <div class="card">
            <div class="card-header row w-100 m-0">
                <h4 class="col-11 text-right">معرض الصور</h4>
                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i>
                </button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLongTitle">صورة جديد</h5>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('admin.images.store')); ?>" method="post"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="image">الصورة</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_id">اختر القسم :</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('category_id')==$item['id'] ? 'selected':''); ?> value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error','data' => ['name' => 'category_id']]); ?>
<?php $component->withName('error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'category_id']); ?> <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">اضافة</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body my-m-img" id="images">
                <form action="<?php echo e(route('admin.images.index')); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row justify-content-start" dir="rtl">
                        <label for="" class="m-2">اختر قسم</label>
                        <select name="cat_id" class="form-control col-6">
                            <?php $__currentLoopData = @App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button type="submit" class="btn btn-success mr-2">بحث</button>
                        <a href="<?php echo e(route('admin.images.index')); ?>"  class="btn btn-primary mr-2">كل الاقسام</a>
                    </div>
                </form>
                <div id="lightgallery">
                    <form action="<?php echo e(route('admin.DeleteAll','admin_images')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-outline-danger">حذف المحدد</button>
                        <div class="row">
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 col-6 p-1">
                                    <div class="card bg-primary-gradient">
                                        <div class="card-header row w-100 m-0 justify-content-center">
                                            <h6 class="text-dark m-1">
                                                <input type="checkbox" id="item" class="custom-checkbox m-1" name="images[<?php echo e($i); ?>]" value="<?php echo e($image->id); ?>">
                                                <?php echo e($image->title); ?>

                                            </h6>
                                            <a href="<?php echo e(route('admin.images.edit',$image)); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>







                                        </div>
                                        <div class="card-body p-0">
                                            <a href="<?php echo e(asset('public/'.$image->image)); ?>" class="item">
                                                <img class="img-thumbnail" width="100%" src="<?php echo e(asset('public/'.$image->image)); ?>"
                                                     data-src="<?php echo e(asset('public/'.$image->image)); ?>"
                                                     style="height: 180px;object-fit: cover;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <nav aria-label="..." class="text-center d-flex align-items-center justify-content-center" dir="rtl">
            <?php echo e($images->links()); ?>

        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/images/index.blade.php ENDPATH**/ ?>
