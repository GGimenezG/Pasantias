var tabla;
var operacion = 0;
$(document).ready(function(){
    $('#tabla').DataTable();
});
/*$(document).ready(function() {
	tabla =
	$('#tabla').DataTable({
		dom: 'Blfrtip',
        buttons:
        [
            {
                extend: 'pdf',                   
                className: 'green glyphicon glyphicon-file',
                title: 'Usuarios',
                filename: 'Listado Usuarios',
                exportOptions:
                    {
                        columns: [0, 1, 2, 3]
                    }
            },
            {
                extend: 'excel',
                className: 'green glyphicon glyphicon-list-alt',
                title: 'Usuarios',
                filename: 'Listado Usuarios',
                exportOptions:
                    {
                        columns: [0, 1, 2, 3]
                    }
            },
            {
                extend: 'copy',
                className: 'green glyphicon glyphicon-duplicate',
                exportOptions:
                    {
                        columns: [0, 1, 2, 3]
                    }
            },
            {
                extend: 'print',
                className: 'green glyphicon glyphicon-print',
                title: 'Usuarios',
                text: 'Listado Usuarios',
                exportOptions:
                    {
                       columns: [0, 1, 2, 3]
                    }
            }
        ],
     responsive: true,	
		"language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
        		"first":    "Primero",
        		"last":     "Ultimo",
        		"next":     "Siguiente",
        		"previous": "Anterior"
        	}
        },
        columnDefs: [
            { "font-size": "1.2em","width": "5%", "targets": 0 },
            { "width": "15%", "targets": 1 },
            {  "width": "30%", "targets": 2 },
            {  "width": "15%", "targets": 3 },
            {  "width": "15%", "targets": 4 }
        ],
	});


	$('#formTiporequerimiento').validate();
});*/

function onGuardar() {
    if (validar())
        {
            onAgregar();
        }
    }

function onEliminar(id) {
    
    $.ajax({
        url: "/uaed/Home/borrar",
        type: "POST",
        data: {"cedula" : id},
        success: function(data) {
            console.log(data);
            if (data.indexOf("codigo:") != 0) {
                var cedula = JSON.parse(data);
                eliminarFila(cedula.cedula);
                mostrarMensajeExito('Usuario eliminado satisfactoriamente!!!');
            }
            else {
                mostrarMensajeError(response);
            }
        },
        error: function(jqXHR, estado, error) {
            mostrarMensajeError(error);
        },
        timeout: 10000
    });

}

function onEditar() {
    var datos = $("Perfil").serialize();
    console.log(datos);
    $.ajax({
        url: "/eaed/Home/editar",
        type: "POST",
        data: datos,
        success: function(data) {
            if (data.indexOf("error:") != 0) {
                console.log(data);
                var cedula = JSON.parse(data);
                eliminarFila(cedula.cedula);
                agregarFila(cedula);
                mostrarMensajeExito("Usuario modificado satisfactoriamente!!!");
            }
            else {
                mostrarMensajeError(response.substring(6));
            }
        },
        error: function(jqXHR, estado, error) {
            mostrarMensajeError(error);
        },
        /*complete: function(jqXHR, estado) {
            $('#ventana').modal('hide');
        },*/
        timeout: 10000
    });
}

function onAgregar() {
    var datos = $('').serialize();
    console.log(datos, "agregar");
    $.ajax({
        url: "/uaed/Tiporequerimiento/registrar",
        type: "POST",
        data: datos,
        success: function(data) {
            if (data.indexOf("activar:") != 0){
                console.log("activar:", data);
                var fila = JSON.parse(data);
                agregarFila(fila);
                mostrarMensajeExito("Tipo de requerimiento activado satisfactoriamente!!!");
            }else if(data.indexOf("activar:") == 0){
                console.log("agregar", data);
                var fila = JSON.parse(data);
                agregarFila(fila);
                mostrarMensajeExito("Tipo de requerimiento incluido satisfactoriamente!!!");
            }else if (data.indexOf("error:") != 0){
                mostrarMensajeError(data["error"]);
            }
            
            },
        error: function(jqXHR, estado, error) {
            mostrarMensajeError(error);
        },
        complete: function(jqXHR, estado) {
            $('#ventana').modal('hide');
        },
        timeout: 10000
    });
}
