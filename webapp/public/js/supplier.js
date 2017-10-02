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
            { defaultContent: "<button  id='orderModalButton' type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#orderModal'>Añadir producto</button>"}

        ],

    });
});


$('#createSupplierButton').click(function () {
    $.ajax({
        type: 'post',
        URL: '/supplier/addsupplier',
        data:{
            '_token': $('input[name=_token]').val(),
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