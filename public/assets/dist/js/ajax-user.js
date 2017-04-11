alteraDesativa();//chamada da função declarada a porterior.

function deleteUser(event){

    event.preventDefault();

    swal({
        title: "APAGAR USUARIO?",
        text: "Tem certeza que deseja apaga este usuário,não será possível recuperá-lo.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true,
        animation: 'slide-from-bottom',
    },
    function(isConfirm){
        if (isConfirm) {
            $('#deletarUsuario').submit();
        }
    });
}


function cancelEdit(){
    window.history.back();
}

function disableUser(event){
    event.preventDefault();
    var url = $('#desativarUsuario').attr('action');
    var status = $('#desativar').val();
    var title;
    if (status == 1) {
        title = 'DESATIVAR USUÁRIO?';
    } else {
        title = 'ATIVAR USUÁRIO?';
    }

    swal({
        title: title,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ok",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true,
        animation: 'slide-from-bottom',
    },
    function(isConfirm){
        if (isConfirm) {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                type    :   'PUT',
                url     :   url,
                dataType:   'JSON',
                error   :   function( data ) {
                    swal("Erro!", "Houve um erro na tentativa de desativar este usuário. " + user_id, "error");
                    console.log('Error: ', data);
                },
                success :   function( data) {
                    console.log(data);
                    if (data.active === true ) {
                        swal("Ativado!", "Este usuário foi desativado." + data.active, "success");
                        $('#desativar').val('1');
                    } else {
                        swal("Desativado!", "Este usuário foi desativado." + data.active, "success");
                        $('#desativar').val('0');
                    }
                    alteraDesativa();
                }
            });
        }
    });
}

function alteraDesativa(){
    var mode = $('#desativar').val();
    if (mode == '0'){
        $('#desativar').removeClass("btn-warning").addClass("btn-primary");
    } else if(mode == '1'){
        $('#desativar').removeClass("btn-primary").addClass("btn-warning");
    }
}

var table = $('#usertable').DataTable({
    "responsive": true,
    "ajax"      :   "/api/users",
    "columns"   :   [
        {
            "data": null,
            "render": function(data){
                return "" + data.name + " " + data.surname + "";
            }
        },
        {"data": "email"},
        {"data": "role"},
        {"data": "area"},
        {
            "data": null,
            "className": "icone",
            "orderable":  false,
            "render": function(data){
                return '<a href="users/' + data.id + '/edit">' +
                            '<i class="fa fa-edit" title="Editar"></i>' +
                        '</a>';
            }
        },
        {
            "className":      'icone',
            "orderable":      false,
            "data":           null,
            "render":   function(data){

                return '<a>' +
                            '<i id="pm' + data.id + '" class="fa fa-chevron-down details-control" title="Mais"></i>' +
                        '</a>';
            }
        }
    ],
    "paging"    : false,
    "language"  : {
        "sProcessing": "Processando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "Não foram encontrados resultados",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
        "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
        "sInfoPostFix": "",
        "sSearch": "Procurar:",
        "sUrl": "",
        "oPaginate": {
            "sFirst": "Primeiro",
            "sPrevious": "Anterior",
            "sNext": "Seguinte",
            "sLast": "Último"
        }
    },
    "order": [[0, 'asc']],
});

/* Função que mostra os detalhes do usuário */
function format ( d ) {
    var str = d.entrance_date;
    str = str.split(" ");
    var date = str[0].split("-");
    date = date[2]+'/'+date[1]+'/'+date[0];

    return  '<div class"row">' +
                '<div class="col-md-3">' +
                    '<label>Nome:</label> <span>'+ d.name + ' ' + d.surname + '</span><br/>'+
                    '<label>E-mail: </label> <span>'+ d.email +'</span><br/>' +
                    '<label>Telefone: </label> <span>' + d.phone +'</span> <br/>' +
                '</div>'+
                '<div class="col-md-3">' +
                    '<label>Entrada: </label> <span>'+ date +'</span> <br/>' +
                    '<label>Função: </label> <span>' + d.role +'</span> <br/>' +
                    '<label>Área de atuação: </label> <span>' + d.area + '</span> <br/>' +
                '</div>'+
                '<div class="col-md-6">' +
                    '<label>CPF: </label> <span>' + d.cpf +'</span> <br/>' +
                    '<label>Endereço: </label> <span>' + d.address +'</span> <br/>' +
                '</div>' +
            '</div>';
}

/* Script para escutar os clicks de details-control */
$('#usertable tbody').on('click', '.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row( tr );

    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
        $(this).removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }
    else {
        // Open this row
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
        $(this).removeClass('fa-chevron-down').addClass('fa-chevron-up');
    }

});

$('#filter_global').on( 'keyup click', function () {
    table.search( this.value ).draw();
} );

$('#selectarea').on('change', function () {
    table.column( 3 )
        .search( this.value )
        .draw();
} );

$('#selectrole').on('change', function () {
    table.column( 2 )
        .search( this.value )
        .draw();
} );
