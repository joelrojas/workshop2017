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

$('#orderModalButton').click(function () {

    $('#infoOrder').append("<h2>Producto:" + $('#product').val() +"</h2><br>"
        + "<h2>Proveedor:" + $('#supplier').val() +"</h2><br>"
        + "<h2>Precio:" + $('#priceProduct').val() +"</h2><br>"
        + "<h2>Cantidad:" + $('#quantityProduct').val() +"</h2><br>"

    );



});

$('#createOrderButton').click(function () {

    $.ajax({
        type:'POST',
        url:'/createOrder',
        data:{
            '_token': $('input[name=_token]').val(),
            'id':$('#supplier').val(),
            'product': $('#product').val(),
            'priceProduct': $('#priceProduct').val(),
            'quantityProduct': $('#quantityProduct').val()
        },
        success:function () {
            alert('Compra completa');
        }
    })



});
