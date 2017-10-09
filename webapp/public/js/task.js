/**
 * Created by hp on 04/10/2017.
 */
$(document).on('click', '.edit-modal', function() {
    // $('#id').val($(this).data('id'));
    // $('#email').val($(this).data('email'));
    // $('#password').val($(this).data('password'));
    // $('#role').val($(this).data('role'));
    $('#id').val($(this).data('id'));
    $('#name').val($(this).data('name'));
    $('#last_name').val($(this).data('last_name'));
    $('#phone').val($(this).data('phone'));
    $('#sex').val($(this).data('sex'));
    $('#nationality').val($(this).data('nationality'));
    $('#modal1').openModal(true);
});

$('.modal-footer').on('click', '.edit', function() {
    $.ajax({
        type: 'post',
        url: '/editUser',
        data: {
            '_token': $('input[name=_token]').val(),
            // 'id':           $("#id").val(),
            // 'email':        $('#d').val(),
            // 'password':     $("#password").val(),
            // 'role':         $("#role").val(),
            'id_person':    $("#id_person").val(),
            'name':         $("#name").val(),
            'last_name':    $("#last_name").val(),
            'phone':        $("#phone").val(),
            'sex':          $('#sex').val(),
            'nationality':  $('#nationality').val()
        },
        success: function(data) {
            $('.item' + data.id_person).replaceWith("" +
                "<tr class='item" + data.id_person + "'>" +
                "<td>" + data.id_person + "</td>" +
                "<td>" + data.name + "</td>" +
                "<td>" + data.last_name + "</td>" +
                "<td>" + data.phone + "</td>" +
                "<td>" + data.nationality + "</td>" +
                "<td>" +
                "<button class='waves-effect waves-light btn edit-modal' data-id_person='" + data.id_person + "' data-name='" + data.name + "' data-last_name='" + data.last_name + "' data-phone='" + data.phone +"' data-sex='"+ data.sex+"' data-nationality='"+data.nationality+"'>" +
                "<i class='material-icons dp48'>settings</i></button> " +
                "<button class='waves-effect waves-light btn red delete-modal' data-id='" + data.id + "' data-id_person='" + data.id_person + "' data-name='" + data.name + "'><i class='material-icons dp48'>delete</i></button></td>" +
                "</tr>");

            swal("Buen trabajo!", "Se realizo correctame los cambios.!", "success")
        }
    });
});
// add function


$('#createTaskButton').click(function () {
    //alert($('input[name=companyName]').val());
    //alert($('input[name=phone]').val())
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var values = $('#multiple').val();


    $.ajax({
        type: 'POST',
        url: "/addtask",
        data:{
            '_token':$('input[name=_token]').val(),
            'date':$('input[name=date]').val(),
            'dateEnd':$('input[name=dateEnd]').val(),
            'dateBegin':$('input[name=dateBegin]').val(),
            'users_id':$('input[name=id-person]').val(),
            'tasks_id':values
        },
        success:function () {
            alert('Se guardaron los datos :)');
        }
    })

});

$('#EditTaskButton').click(function () {

    $.ajax({
        type: 'POST',
        url: '/edittask',
        data:{
            '_token': $('input[name=_token]').val(),
            'id':$('#idtask').val(),
            'date': $('#date').val(),
            'dateEnd': $('#dateEnd').val(),
            'dateBegin': $('#dateBegin').val(),
            'users_id':$('#id-person').val(),
            'tasks_id':$('#multiple').val()
        },
        success:function () {
            alert('Se modificaron los datos con exito');
        }
    })

});



//delete function
$(document).on('click', '.create-modal', function() {
    $('#modal2').openModal(true);
});

$('.modal-footer').on('click', '.delete', function() {
    $.ajax({
        type: 'post',
        url: '/deleteUser',
        data: {
            '_token': $('input[name=_token]').val(),
            'id':           $("#id").val(),
            'id_person': $('#id_person').val(),
        },
        success: function(data) {
            $('.item' + $('#id_person').val()).remove();
            swal("Eliminado!", "Se ha eliminado correctamente", "success");
        }
    });
});