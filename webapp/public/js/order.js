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

$('#orderModalButton').click(function () {
/*
    $('#infoOrder').append("<h2>Producto:" + $('#product').val() +"</h2><br>"
        + "<h2>Proveedor:" + $('#supplier').val() +"</h2><br>"
        + "<h2>Precio:" + $('#priceProduct').val() +"</h2><br>"
        + "<h2>Cantidad:" + $('#quantityProduct').val() +"</h2><br>"

    );

    $('#productName').val($('#orderProduct').val());
    $('#productQuantity').val($('#orderQuantity').val());


});
*/
$('#createOrderButton').click(function () {

    var product = document.getElementById("orderProduct").getAttribute("class");
    var type = document.getElementById("productType").getAttribute("class");
    var quantity = document.getElementById("orderQuantity").getAttribute("class");
    var price = document.getElementById("orderPrice").getAttribute("class");

    var received = document.getElementById("quantityReceived").getAttribute("class");
    //alert(quantity);
    if(product==="form-control error" ||type==="form-control error" || quantity==="form-control error" || price==="form-control error" || received==="form-control error")
    {
      //  alert("No funciona asi bro disculpa");
       $.toaster({ priority : 'danger', title : 'Error', message : 'Existe algun campo erroneo'});

    }else{

        $.ajax({
            type:'post',
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
                $.toaster({ priority : 'success', title : 'Orden creada', message : 'Se creo la orden correctamente'});

            }
        })
    }




});
