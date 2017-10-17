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

$('#PdfButton').click(function () {
    $.ajax({
        type: 'GET',
        url: '/download-pdf',
        data: $('#fechas').serialize(),
        success:function () {
        }
    })
});



$('#SupplierModalDelete').click(function () {
    $('#task').val('¿Desea eliminar a esta tarea?');
});
$('#DeleteTaskButton').click(function () {

    $.ajax({
        type: 'POST',
        url: '/deletetask',
        data:{
            '_token': $('input[name=_token]').val(),
            'idtask':$('#idtask').val()
        },
        success:function () {
            alert('Se eliminaron los datos con exito');
        }
    })

});