<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="<?php echo e(route('admin.videos.update',['video' => $video])); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="form-group">
                <label for="">العنوان</label>
                <input name="title" value="<?php echo e($video->title); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">القسم</label>
                <select name="cat_id" class="form-control" id="">
                    <option value="<?php echo e($video->category->id); ?>"><?php echo e($video->category->name); ?></option>
                    <?php $__currentLoopData = @App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="video">رابط الفيديو Youtube</label>
                <textarea name="video" class="form-control" id="video" cols="30" rows="10"><?php echo e($video->video); ?></textarea>
            </div>
            <div>
                <label for="">رفع فيديو</label>
                <input type="file" name="local" class="form-control">
            </div>
            <button type="submit" class="btn btn-success btn-block">تعديل</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/videos/edit.blade.php ENDPATH**/ ?>