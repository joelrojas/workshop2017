
$("#crpbutton").click(function() {
    //var e = document.getElementsByName("multiple[]");
    var packdes = "";
    var values  = $('#multiple').val();

    for(var i in values) {
        packdes+=""+values[i]+",";  // (o el campo que necesites)
    }

    $.ajax({
        type: 'post',
        url: '/addPack',
        data: {
            '_token': $('input[name=_token]').val(),
            'pack': $('input[name=packc]').val(),
            'price': $('input[name=pricec]').val(),
            'description': packdes
        },
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.title);
                $('.error').text(data.errors.description);
            } else {
                $('.error').remove();
                $('#packtable').append("<tr class='item" + data.id_pack + "'>" +
                    "<td>" + data.id_pack + "</td>" +
                    "<td>" + data.pack + "</td><td>" + data.price + "</td>" +
                    "<td>" + data.description + "</td>" +
                    "<td><button class='btn btn-warning btn-detail edit-pack' data-idpack='" + data.id_pack + "' data-pack='" + data.pack + "' data-price='" + data.price + "'><i class='material-icons dp48'>settings</i></button> <button class='waves-effect waves-light btn red delete-pack' data-idpack='" + data.id_pack + "' data-pack='" + data.pack + "' data-price='" + data.price + "'><i class='material-icons dp48'>delete</i></button></td></tr>"
                    + swal("Buen trabajo!", "Se creo correctamente el paquete!", "success"));
            }
        },
    });
    $('#title').val('');
    $('#description').val('');
});

$("#createOrderButton").click(function () {
    $.ajax({
        type: 'POST',
        url: '/',
        data:{
            '_token': $('input[name=_token]').val()
        }
    })
})