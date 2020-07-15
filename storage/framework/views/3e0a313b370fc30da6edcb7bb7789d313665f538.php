<a href="<?php echo e(route('admin.orders.show',['order' => $notification->data['order']['id'], 'notif_id' => $notification->id])); ?>" class="d-flex justify-content-between px-4">
        <span><?php echo e($notification->data['body']); ?></span>
    <?php if($notification->unread()): ?>
        <i class="fas fa-envelope"></i>
    <?php else: ?>
        <i class="fas fa-envelope-open"></i>
    <?php endif; ?>
    </a><?php /**PATH /home/abcconsttech/public_html/photography/resources/views/admin/notifications/types/new_order.blade.php ENDPATH**/ ?>