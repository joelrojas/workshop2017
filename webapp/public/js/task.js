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
        type: 'PUT',
        url: '/edittask',
        data: $('#socioOne').serialize(),
        success:function () {
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