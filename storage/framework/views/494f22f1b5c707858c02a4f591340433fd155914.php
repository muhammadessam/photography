<?php $__env->startSection("content"); ?>
    <div class="container pt-3">
        <div class="card" id="root">
            <div class="card-header">
                ارسال رسالة واتسابْ
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>الرسالة</label>
                    <textarea rows="20" v-model="msg" class="form-control">
                    </textarea>
                </div>
                <a :href='"https://wa.me/"+phone+"?text="+Encoding(msg)'
                   target="_blank" class="btn btn-success">ارسال</a>
            </div>
        </div>
    </div>
    <script>
        const App = new Vue({
            el:"#root",
            data:{
                msg:"",
                phone:"<?php echo e($phone); ?>",
            },
            methods:{
                /**
                 * @return  {string}
                 */
                Encoding(msg){
                    return encodeURI(msg);
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\photos\resources\views/admin/whatsapp/index.blade.php ENDPATH**/ ?>