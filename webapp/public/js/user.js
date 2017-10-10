$('#createUserButton').click(function () {
    //alert($('input[name=companyName]').val());
    //alert($('input[name=phone]').val())
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var sexo = $('#sex').val();
    var tipo = $('#userType').val();
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
            'sex':sexo,
            'address':$('input[name=address]').val(),
            'email':$('input[name=email]').val(),
            'username':$('input[name=username]').val(),
            'password':$('input[name=password]').val(),
            'userType':tipo
        },
        success:function () {
            alert('Se guardaron los datos :)');
        }
    })

});

$('#EditUserButton').click(function () {
    var sexo = $('#sexEdit').val();
    var tipo = $('#userTypeEdit').val();
    $.ajax({
        type: 'POST',
        url: '/edituser',
        data:{
            '_token':$('input[name=_token]').val(),
            'id':$('#iduser').val(),
            'ci': $('#ciEdit').val(),
            'name': $('#nameEdit').val(),
            'lastName': $('#lastNameEdit').val(),
            'birthday':$('#birthdayEdit').val(),
            'phone':$('#phoneEdit').val(),
            'sex':sexo,
            'adress': $('#addressEdit').val(),
            'email':$('#emailEdit').val(),
            'username':$('#usernameEdit').val(),
            'password':$('#passwordEdit').val(),
            'userType':tipo
        },
        success:function () {
            alert('Se modificaron los datos con exito');
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

