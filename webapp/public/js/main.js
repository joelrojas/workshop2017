$(document).ready(function() {
    $("#mainTable").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('api.catalogs.index') }}",
        "columns": [
            { data: 'id' },
            { data: 'name' },
            { data: 'description' },
        ]
    });
});
