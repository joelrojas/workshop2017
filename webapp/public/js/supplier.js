
$(document).ready(function() {
    var table = $('#supplierTable').DataTable({
        ajax: {
            url: '/supplier/dataTable',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'companyName' },
            { data: 'productSupplied' },
            { data: 'contactName'},
            { defaultContent: "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#SupplierModalEdit'>Editar</button>" + " "+ "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#SupplierModalDelete'>Eliminar</button>"}
        ],

    });

    $('#supplierTable tbody').on( 'click', 'button', function () {

        var data = table.row( $(this).parents('tr') ).data();
        $('#idsupplier').val(data['id']);

        $('#productEdit').val(data['productSupplied']);

        $('#companyNameEdit').val(data['companyName']);
        $('#contactNameEdit').val(data['address']);
        //$('#description').val($(this).data('description'));
        $('#addressEdit').val(data['address']);
        $('#phoneEdit').val(data['phono']);
    } );

    $('#supplierTable tbody').on( 'click', 'button', function () {

        var data = table.row( $(this).parents('tr') ).data();
        $('#idsupplier').val(data['id']);

        $('#productEdit').val(data['productSupplied']);

        $('#companyNameEdit').val(data['companyName']);
        $('#contactNameEdit').val(data['contactName']);
        //$('#description').val($(this).data('description'));
        $('#addressEdit').val(data['address']);
        $('#phoneEdit').val(data['phono']);
    } );


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
            $.toaster({ priority : 'success', title : 'Proveedor creado', message : 'Se guardaron los datos correctamente'});
        }
    })

    });

$('#EditSupplierButton').click(function () {

    $.ajax({
        type: 'POST',
        url: '/editsupplier',
        data:{
            '_token': $('input[name=_token]').val(),
            'id':$('#idsupplier').val(),
            'companyName': $('#companyNameEdit').val(),
            'contactName': $('#contactNameEdit').val(),
            'address': $('#addressEdit').val(),
            'productSupplied':$('#productEdit').val(),
            'phono':$('#phoneEdit').val()
        },
        success:function () {
            $.toaster({ priority : 'success', title : 'Modificado', message : 'Se modificaron los datos correctamente'});
        }
    })

});

$('#SupplierModalDelete').click(function () {
   $('#providerName').val('¿Desea eliminar a este proveedor?');
});
$('#DeleteSupplierButton').click(function () {

    $.ajax({
        type: 'POST',
        url: '/deletesupplier',
        data:{
            '_token': $('input[name=_token]').val(),
            'id':$('#idsupplier').val()
        },
        success:function () {
            alert('Se eliminaron los datos con exito');
        }
    })

});

