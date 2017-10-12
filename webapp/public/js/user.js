$('#createUserButton').click(function () {
    //alert($('input[name=companyName]').val());
    //alert($('input[name=phone]').val())
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var tipo = $('#userType1').val();
    $.ajax({
        type: 'POST',
        url: "/adduser",
        data:{
            '_token':$('input[name=_token]').val(),
            'ci':$('input[name=ci]').val(),
            'name':$('input[name=name]').val(),
            'lastName':$('input[name=lastName]').val(),
            'birthday':$('input[name=birthday]').val(),
            'phone':$('input[name=phone]').val(),
            'sex':$('select[name=sex]').val(),
            'address':$('input[name=address]').val(),
            'email':$('input[name=email]').val(),
            'username':$('input[name=username]').val(),
            'password':$('input[name=password]').val(),
            'userType':$('select[name=userType]').val()
        },
        success:function () {
            alert('Se guardaron los datos :)');
        }
    })

});

$('#EditUserButton').click(function () {
    $.ajax({
        type: 'PUT',
        url: '/edituser',
        data: $('#socio').serialize(),
        success:function () {
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

