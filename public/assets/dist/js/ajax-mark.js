$('#digitalButton').on('click', function(event){
    event.preventDefault();

    var id = $('#project_id').val();
    var url = '/projects/'+ id + '/marks/digital';

    var formData = $('#digitalform').serialize();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type    :   'PATCH',
        url     :   url,
        data    :   formData,
    }).done(function(data){
        console.log('Success:', data);
    }).fail(function(data){
        console.log('Errooooouuu!', data);
    });
});
