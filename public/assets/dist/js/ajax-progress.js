$('#salvar').on('click', function(e){
    e.preventDefault();

    var id = $('#user_id').val();
    var url = '/projects/' + id + '/andamentos'

    var formData = $('#andamento').serialize();

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content'),
        }
    });

    $.ajax({
        type    :   'POST',
        url     :   url,
        dataType:   'JSON',
        data    :   formData,
    }).done(function(data){
        console.log('Success:', data);
    }).fail(function(data){
        console.log('Errooooouuu!', data);
    });

});
