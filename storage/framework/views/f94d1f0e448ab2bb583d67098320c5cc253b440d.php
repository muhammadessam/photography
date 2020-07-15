<?php $attributes = $attributes->exceptProps(['id' => 'table']); ?>
<?php foreach (array_filter((['id' => 'table']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<script>
    $('#<?php echo e($id); ?>').DataTable({
        "language": {
            "url": "<?php echo e(asset('admin/plugins/datatables/extensions/i18n/Arabic.json')); ?>"
        },
        "info": false,
        "pagingType": "full_numbers",
        "paging": false,
        "lengthMenu": [10, 25, 50, 75, 100],
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "autoWidth": true,
    });
</script>
<style>
    #<?php echo e($id); ?>_filter {
        float: left;
    }
</style>
<?php /**PATH /home/abcconsttech/public_html/photography/resources/views/components/datatable.blade.php ENDPATH**/ ?>