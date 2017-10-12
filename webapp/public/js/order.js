/*
$(document).ready(function() {
    $("#orderTable").DataTable({
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
*/
$('#orderModalButton').click(function () {
/*
    $('#infoOrder').append("<h2>Producto:" + $('#product').val() +"</h2><br>"
        + "<h2>Proveedor:" + $('#supplier').val() +"</h2><br>"
        + "<h2>Precio:" + $('#priceProduct').val() +"</h2><br>"
        + "<h2>Cantidad:" + $('#quantityProduct').val() +"</h2><br>"

    );
*/
    $('#productName').val($('#orderProduct').val());
    $('#productQuantity').val($('#orderQuantity').val());


});

$('#createOrderButton').click(function () {

    $.ajax({
        type:'POST',
        url:'/createOrder',
        data:{
            '_token': $('input[name=_token]').val(),
            'productName': $('#productName').val(),
            'orderQuantity': $('#orderQuantity').val(),
            'orderPrice': $('#orderPrice').val(),
            'productPrice': $('#productPrice').val(),
            'productType':$('#productType').val(),
            'supplier_id':$('#supplier').val()
        },
        success:function () {
            alert('Compra completa');
            $.toaster({ priority : 'success', title : 'Orden creada', message : 'Se creo la orden correctamente'});
        }
    })



});
