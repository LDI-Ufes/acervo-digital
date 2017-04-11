var style = "box-curso ";

var table = $('#projecttable').DataTable({
    ajax        :   "api/projects",
    responsive  :   true,
    columns     :   [
        {   data: {
                _: "course.tinyname",
            },
            className   :  'box-curso',
        },
        {   data: "title" },
        {   data: null,
            render: function(data){
                if (data.types.length == 0) {
                    return '<span >' + 'Sem tipos' + '</span>';
                }
                var str = data.types[0].name;
                var icons =  findIcon(data.types[0].name);
                for (var i = 1; i < data.types.length; i++) {
                    str += ', ' + data.types[i].name;
                    icons += ' ' + findIcon(data.types[i].name);
                }
                str += '.';
                return '<span style="display: none;">' + str + '</span>' + icons;
            }
        },
        {
            data: null,
            render: function(data){
                if (data.users.length == 0) {
                    return 'Sem usuários associados';
                }
                var usr = data.users;
                var str = usr[0].name;
                for (var i = 1; i < usr.length; i++) {
                    str += ', ' + usr[i].name;
                }
                str += '.';
                return str;
            }
        },
        {   data: {
                _:  "status.name",
        },},

        {   data: null,
            orderable: false,
            className:   'icone',
            render: function(data){
                    return  '<a href="/projects/'+ data.id +'/andamentos">' +
                                '<i class="fa fa-plus-circle" title="Visualizar projeto"></i>' +
                            '</a>';
                    }
        },
        {   data: null,
            orderable: false,
            className:   'icone',
            render: function(data){
                return  '<a href="/projects/marks/'+ data.id +'">' +
                            '<i class="fa fa-flag" title="Marcos"></i>' +
                        '</a>';
            }
        },
        {   data: null,
            orderable: false,
            className:   'icone',
            render: function(data){
                    return  '<a href="/projects/'+ data.id + '/edit">' +
                                '<i class="fa fa-edit" title="Editar config. do projeto"></i>' +
                            '</a>';
                    }
        },
        {   data: null,
            orderable: false,
            className:   'icone',
            defaultContent: '<a>' +
                                '<i class="fa fa-chevron-down details-control" title="Expandir"></i>' +
                            '</a>',
        }
    ],
    columnDefs  :   [{
        targets: 0,
        createdCell: function(td, cellData, rowData, row, col){
            var cls = cellData;
            $(td).text('');
            $(td).addClass(cls);

        }
    }],
    paging      :   false,
    language    :   {
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
    order: [[1, 'asc']],
});

$('#filter_global').on( 'keyup click', function () {
    table.search( this.value ).draw();
} );

$('#selectstatus').on('change', function () {
    table.column( 4 )
        .search( this.value )
        .draw();
} );

$('#selecttype').on('change', function () {
    table.column( 2 )
        .search( this.value )
        .draw();
} );

function findIcon(str){
    var icons;
    switch (str) {
        case "Moodle":
            icons = '<i class="fa fa-graduation-cap" title="Moodle"></i>';
            break;
        case "Vídeo":
            icons = '<i class="fa fa-video-camera" title="Vídeo"></i>';
            break;
        case "Web":
            icons = '<i class="fa fa-globe" title="Web"></i>';
            break;
        case "Interativo":
            icons = '<i class="fa fa-gamepad" title="Interativo"></i>';
            break;
        case "Livro Digital":
            icons = '<i class="fa fa-tablet" title="Livro Digital"></i>';
            break;
        case "Livro Impresso":
            icons = '<i class="fa fa-book" title="Livro Impresso"></i>';
            break;
    }
    return icons;
}

function formatDate(date){
    var str = date;
    str = str.split(" ");
    var newDate = str[0].split("-");
    newDate = newDate[2] + '/' + newDate[1] + '/' + newDate[0];

    return newDate;
}

function formatName(data){
    var usr = data.users;
    var str = usr[0].name;
    for (var i = 1; i < usr.length; i++) {
        str += ', ' + usr[i].name;
    }
    str += '.';
    return str;
}

function formatType(data){
    var type = data.types;
    var str = type[0].name;
    var icons =  findIcon(type[0].name);
    for (var i = 1; i < type.length; i++) {
        str += ', ' + type[i].name;
        icons += ' ' + findIcon(type[i].name);
    }
    str += '.';
    return str;
}
function format ( d ) {
    // var str = d.entrance_date;
    // str = str.split(" ");
    // var date = str[0].split("-");
    // date = date[2]+'/'+date[1]+'/'+date[0];

    return  '<div class="row">' +
                '<ul style="list-style:none;padding:0;">' +
                    '<div class="col-md-4">' +
                        '<li><b>Nome do projeto:</b> '+ d.title +'</li>' +
                        '<li><b>Professor:</b> '+ d.teacher.name +'</li>' +
                        '<li><b>Curso:</b> '+ d.course.name +'</li>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<li><b>Início</b> '+ formatDate(d.start) +'</li>' +
                        '<li><b>Prazo:</b> '+ formatDate(d.deadline) +'</li>' +
                        '<li><b>Apoio:</b> '+ formatName(d) +'</li>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                        '<li><b>Tipo do Projeto:</b> '+ formatType(d) +'</li>' +
                        // '<li><b>Complementares:</b> Ilustração</li>' +
                    '</div>' +
                '</ul>' +
            '</div>';
}

$('#projecttable tbody').on('click', '.details-control', function () {
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
} );
