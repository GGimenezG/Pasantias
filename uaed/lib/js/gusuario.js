var tabla;
var operacion = 0;

$(document).ready(function() {
    $('#tabla').DataTable();
} );
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

function onEliminar(id) {
    
    $.ajax({
        url: "/uaed/Home/borrar",
        type: "POST",
        data: {"cedula" : id},
        success: function(data) {
            console.log(data);
            if (data.indexOf("cedula:") != 0) {
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