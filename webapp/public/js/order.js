
$("#createOrderButton").click(function () {
    $.ajax({
        type: 'POST',
        url: '/',
        data:{
            '_token': $('input[name=_token]').val()
        }
    })
})