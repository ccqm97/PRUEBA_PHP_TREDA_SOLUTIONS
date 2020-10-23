$("#adminTienda").addClass("nav-item active");
$("#editTienda").hide();

$("#bntCancel").click(function(){
    $("#createTienda").show();
    $("#editTienda").hide();
});

$("#formCrearTienda").on('submit', function(evt){
    evt.preventDefault();
/**Se mandan los datos mediante el POST al controller */
$.post(baseUrl+"index.php/Controller/crearTienda",
    {Nombre:$("#NOMBRE_TIENDA").val(),
    Fecha_de_apertura:$("#Fecha_de_apertura").val()},			
        function(data){
            if (data) {
                var oTable = $('#TableTiendas').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                $("#NOMBRE_TIENDA").val("");
                $("#Fecha_de_apertura").val("");
                new PNotify({
                    title: 'Guardó Exitosamente',
                    text: "La tienda ha sido guardada." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            } else {
                alert("No Guardó")
            }
        }
);
$("#NOMBRE_TIENDA").val("");
$("#Fecha_de_apertura").val("");
});


/**Se carga la libreria datatable y se le ingresan los valores obtenidos mediate el ajax */
$('#TableTiendas').DataTable({
    "language": {
        "emptyTable":     "No hay tiendas registradas.",
        "info":         "Mostrando del _START_ al _END_ de _TOTAL_ resultados ",
        "infoEmpty":      "Mostrando 0 registros de un total de 0.",
        "infoFiltered":     "(filtrados de un total de _MAX_ registros)",
        "infoPostFix":      "(actualizados)",
        "lengthMenu":     "Mostrar _MENU_ registros",
        "loadingRecords":   "Cargando...",
        "processing":     "Procesando...",
        "search":     "Buscar",
        "searchPlaceholder":    "Dato para buscar",
        "zeroRecords":      "No se han encontrado coincidencias.",
        "paginate": {
        "first":      "Primera",
        "last":       "Última",
        "next":       "Siguiente",
        "previous":     "Anterior",
        "print": "Imprimir"
        },
        "aria": {
        "sortAscending":  "Ordenación ascendente",
        "sortDescending": "Ordenación descendente"
        }
    },
    'destroy': true,
    "processing": true,
    'paging'   : true,
    'info' : true,
    'lengthChange': false,
    'filter' : true,
    'responsive' : true,
    'search' : true,
    'stateSave' : false,
    'ajax' : {
        "url":baseUrl+"index.php/Controller/obtenerTiendas",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'ID'},
        {data: 'Nombre'},
        {data: 'Fecha_de_apertura'},
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Editar Elemento" onClick="modificarTienda('+row.ID+')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" class="btn btn-success " onClick="borrarTienda('+row.ID+')" title="Eliminar"><i class="fa fa-trash"></i>'+
                                ''+
                            '</button>'+
                        '</div>';
            }        
        }
    
    ]
});

var idTiendaAux = 0;

/**Muestra el panel de edicion y le carga la informacion del objeto seleccionado */
function modificarTienda(idTienda) {
    idTiendaAux = idTienda;
    $("#createTienda").hide();
    $("#editTienda").show();
    $.post(baseUrl+"index.php/Controller/obtenerTiendaPorId",
        {ID : idTienda},
        function(data){
            var estacion = JSON.parse(data);
            $.each(estacion,
                function(i,item){
                    $("#NOMBRE_TIENDA_E").val(item.Nombre);
                    $("#Fecha_de_apertura_E").val(item.Fecha_de_apertura);
                }
            );

        }
    );
}

/**
 * Se le manda al controlador la información a actualizar
 */
$("#formEditTienda").on('submit', 
        function(evt){
            evt.preventDefault(); 
            $.post(baseUrl+"index.php/Controller/modificarTienda",
                {   ID:idTiendaAux,
                    Nombre:$("#NOMBRE_TIENDA_E").val(),
                    Fecha_de_apertura:$("#Fecha_de_apertura_E").val(),
                },
                function(data){
                    if (data==1) {
                        var oTable = $('#TableTiendas').DataTable( ); //actualizar datatable
                        oTable.ajax.reload();
                        $("#editTienda").hide();
                        $("#createTienda").show();
                        $("#NOMBRE_TIENDA_E").val("");
                        $("#Fecha_de_apertura_E").val("");
                        
                        $("#NOMBRE_TIENDA_E").val(""),
                         $("#Fecha_de_apertura_E").val(""),
                        new PNotify({
                            title: 'Se actualizó la tienda',
                            text: "Se ha modificado la informacón de la tienda correctamente." ,
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        
                    } else{
                        alert("Error al modificar la tienda")
                    }
                }
            );
        }
);
/** Se le manda el controlador el id del objeto seleccionado el cual va a ser borrado logicamente cambiando
          el valor de su estado */
function borrarTienda(idTienda) {
    $.post(baseUrl+"index.php/Controller/borrarTienda",
    { ID:idTienda},
    function(data){
        if (data==1) {
            var oTable = $('#TableTiendas').DataTable( ); //actualizar datatable
            oTable.ajax.reload();
            new PNotify({
                title: 'Se borró la tienda',
                text: "Se ha borrado la información de la tienda correctamente." ,
                type: 'success',
                styling: 'bootstrap3'
            });
        }else{
            alert("error al borrar la tienda")
        }
       
    }
);
}