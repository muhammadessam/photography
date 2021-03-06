@props(['id' => 'table'])

<script>
    $('#{{$id}}').DataTable({
        "language": {
            "url": "{{asset('public/'.'admin/plugins/datatables/extensions/i18n/Arabic.json')}}"
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
    #{{$id}}_filter {
        float: left;
    }
</style>
