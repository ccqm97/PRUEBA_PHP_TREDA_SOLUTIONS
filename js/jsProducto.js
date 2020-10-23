$("#adminProducto").addClass("nav-item active");
$("#editProducto").hide();

$("#bntCancel").click(function(){
    $("#createProducto").show();
    $("#editProducto").hide();
});

function validarSoloNumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

$.post(baseUrl+"index.php/Controller/obtenerTiendas",
  {},
  function(data){
    var tienda = JSON.parse(data);
    $.each(tienda,function(i,item){
      $('#Id_Tienda').append('<option value="'+item.ID+'">'+item.Nombre+'</option>');
      $('#Id_Tienda_e').append('<option value="'+item.ID+'">'+item.Nombre+'</option>');
    });
  }
);

$('#formCrearProducto').submit(function(e){
    e.preventDefault(); 
        $.ajax({
            url: baseUrl+'index.php/Controller/crearProducto',
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
                if (data=="existe") {
                    new PNotify({
                        title: 'El producto ya esta registrado',
                        text: "Se encontro un producto con el SKU que desea asignar." ,
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }else{
                    alert("Se creó el producto correctamente")
                    location.reload();
                }
                
            }
        });
});

$('#TableProductos').DataTable({
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
        "url":baseUrl+"index.php/Controller/obtenerProductos",
        "type":"POST",
        dataSrc: ''
    },
    'columns':[
        {data: 'SKU'},
        {data: 'nombreProducto'},
        {data: 'Descripcion'},
        {data: 'Valor'},
        {data: 'Nombre'},
        {data: 'imagen'},
        {"orderable": true,
            render:function(data,type,row){
                return    '<div class="btn-group btn-group-xs">'+                            
                            '</button>'+ 
                                '<button type="button" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Editar Elemento" onClick="modificarProducto(\''+row.SKU+'\')" title="Modificar"><i class="fa fa-edit"></i>'+
                                ''+
                            '</button>'+
                            '<button type="button"  style="background-color:red" data-toggle="tooltip" data-placement="top" title="Eliminar Elemento" class="btn btn-success " onClick="borrarProducto(\''+row.SKU+'\')" title="Eliminar"><i class="fa fa-trash"></i>'+
                                ''+
                            '</button>'+
                        '</div>';
            }        
        }
    
    ],
    "columnDefs":[
        {
            "targets":[5],
             "data":"imagen",
             "render": function(data, type, row){
                return "<img src='"+baseUrl+"img/ProductosImg/"+data+"'  width='200' height='100'>";                 
             } 
         }
         
         ],
});


var idProductoAux = 0;

/**Muestra el panel de edicion y le carga la informacion del objeto seleccionado */
function modificarProducto(idProducto) {
    $("#SKU_OLD").val(idProducto);

    $("#Nombre_e").val("");
    $("#SKU_e").val("");
    $("#Descripcion_e").val("");
    $("#Valor_e").val("");
    $("#Id_Tienda_e").val("");
    $("#imagen_e").val("");

    $("#createProducto").hide();
    $("#editProducto").show();
    $('html, body').animate({
        scrollTop: $("#editProducto").offset().top
    }, 1500);
    $.post(baseUrl+"index.php/Controller/obtenerProductoPorSKU",
        {ID : idProducto},
        function(data){
            var producto = JSON.parse(data);
            $.each(producto,
                function(i,item){
                    $("#Nombre_e").val(item.nombreProducto);
                    $("#SKU_e").val(item.SKU);
                    $("#Descripcion_e").val(item.Descripcion);
                    $("#Valor_e").val(item.Valor);
                    $("#Id_Tienda_e").val(item.ID);
                }
            );

        }
    );
}

$('#formEditProducto').submit(function(e){
    e.preventDefault();
        $.ajax({
            url: baseUrl+'index.php/Controller/modificarProducto',
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
                if (data=="existe") {
                    new PNotify({
                        title: 'El producto ya esta registrado',
                        text: "Se encontro un producto con el SKU que desea asignar." ,
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }else{
                    alert("Se actalizo el producto correctamente");
                    $("#createProducto").show();
                    $("#editProducto").hide();
                    location.reload();
                }
                
            }
        });
});

function borrarProducto(idProducto) {
    $.post(baseUrl+"index.php/Controller/borrarProducto",
        { ID:idProducto},
        function(data){
            if (data==1) {
                var oTable = $('#TableProductos').DataTable( ); //actualizar datatable
                oTable.ajax.reload();
                new PNotify({
                    title: 'Se borró el producto',
                    text: "Se ha borrado la información del producto correctamente." ,
                    type: 'success',
                    styling: 'bootstrap3'
                });
            }else{
                alert("error al borrar la tienda")
            }
        
        }
    );
}
