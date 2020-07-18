<footer class="mt-3">
    <div class="bg-light-color">
        <div class=" last-footer container ">
            <div class="row p-1">
                <?php $__currentLoopData = @App\Page::all()->where('place','footer'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <a class="list-link text-white" href="<?php echo e(route('page',$page->title)); ?>"><?php echo e($page->title); ?></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="copy-rights d-flex align-items-center">
                <a href="https://www.const-tech.com.sa/" target="_black" class="text-white mb-0">جميع الحقوق محفوظة © لـ <span
                        class="site-nv">توثيق لخدمات التصوير</span> 2020 م </a>
            </div>
                <div>
                    <a href="https://www.const-tech.com.sa/" target="_black"><img class="c-logo" src="<?php echo e(asset('public/'.'images/company-logo.svg')); ?>"
                                                                                alt=""></a>
                </div>

        </div>
    </div>
</footer>
<?php /**PATH D:\xampp\htdocs\photos\resources\views/site/partials/footer.blade.php ENDPATH**/ ?>
