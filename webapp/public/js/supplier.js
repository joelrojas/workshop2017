$(document).ready(function() {
    $('#supplierTable').DataTable({
        ajax: {
            url: '/supplier/dataTable',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'companyName' },
            { data: 'contactName' },
            { data: 'productSupplied' }
        ],

    });
});


$('#createSupplierButton').click(function () {
    //alert($('input[name=companyName]').val());
    //alert($('input[name=phone]').val())
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: "/addsupplier",
        data:{
            '_token':$('input[name=_token]').val(),
            'companyName':$('input[name=companyName]').val(),
            'contactName':$('input[name=contactName]').val(),
            'address':$('input[name=address]').val(),
            'productSupplied':$('input[name=product]').val(),
            'phono':$('input[name=phone]').val()
        },
        success:function () {
            alert('Se guardaron los datos :)');
        }
    })

    })