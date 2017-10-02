$(document).ready(function() {
    $('#mainTable').DataTable({
        ajax: {
            url: '/catalog/dataTable',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'description' },
        ]
    });
});

$(document).ready(function() {
    $('#orderTable').DataTable({
        ajax: {
            url: '/order/dataTable',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'description' },
        ]
    });
});

$(document).ready(function() {
    $('#taskTable').DataTable({
        ajax: {
            url: '/taskAsignment/dataTable',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'task' },
            { data: 'dateBegin' }
        ]
    });
});



