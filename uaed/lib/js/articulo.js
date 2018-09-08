var tabla;
var operacion = 0;
$(document).ready(function() {
	tabla =
	$('#tabla').DataTable({
		dom: 'Blfrtip',
        buttons:
        [
            {
                extend: 'pdf',                   
                className: 'green fa fa-file',
                title: ' Listado de datos de Artículos Disponibles',
                filename: 'Listado de Artículos',
                exportOptions:
                    {
                        columns: [0, 1, 2, 3, 4]
                    }
            },
            {
                extend: 'excel',
                className: 'green fa fa-list-alt',
                title: ' Listado de datos de Artículos Disponibles',
                filename: 'Listado de Artículos',
                exportOptions:
                    {
                        columns: [0, 1, 2, 3, 4]
                    }
            },
            {
                extend: 'copy',
                className: 'green fa fa-copy',
                exportOptions:
                    {
                        columns: [0, 1, 2]
                    }
            },
            {
                extend: 'print',
                className: 'green fa fa-print',
                title: ' Listado de datos de Artículos Disponibles',
                text: 'Listado de Artículos',
                exportOptions:
                    {
                       columns: [0, 1, 2]
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
            {  "width": "15%", "targets": 4 },
            {  "width": "15%", "targets": 5 }
        ],
	});


	$('#formArticulo').validate();
});

function onIncluir() {
	operacion=0;
	disableInputs(false);
	labelFloating(true);
	//codigo();
	//<?php header('location: /sis/regimen/codigo'); ?>
    $('#nombre').val('');
	$('#descrp').val('');
    $('#cant').val('');
    disableButtons(true);
    //Si presiona una tecla, habilita los botones de guardar y limpiar
    $('#formArticulo').keypress(function() {
        disableButtons(false);
    });
    //Para mostrar el texto Registrar
    $('#registro-modal').text('Registrar Artículo');

}

function onModificar(id) {
	operacion=1;
	disableInputs(false);
	labelFloating(false);
    $('#codigo').val(id);
    $('#codigo').prop('disabled', true);
	$('#nombre').val($("#nombre"+id).text());
	$('#descrp').val($("#descrp"+id).text());
    $('#cant').val($("#descrp"+id).text());
    disableButtons(true);
    //Si presiona una tecla, habilita los botones de guardar y limpiar
    $('#formArticulo').keypress(function() {
        disableButtons(false);
    });
    $('#registro-modal').text('Modificar Artículo');

}

function onConsultar(id) {

    $('#registro-modal').text('Consultar Artículo');
	labelFloating(false);
	disableInputs(true);
    //onModificar(id);
	$('#btnGuardar').prop('disabled', true);
	$('#limpiar').prop('disabled', true);
	$('#cerrar').prop('disabled', false);
}

function onGuardar() {
	if (validar()) {
		if (operacion==1) {
			onEditar();
		}
		else {
			onAgregar();
		}
	}
}

function validar() {
	mensaje = "";
	inputs = ["nombre"];
	mensajes = ["el nombre"];
	for (i=0; i<inputs.length; i++) {
		if (!$('#'+inputs[i]).val() || parseInt($('#'+inputs[i]).val()) <= 0) {
			mensaje += (mensaje.length>0?", ":"")+mensajes[i];
		}
	}
	if (mensaje.length > 0) {
		$('#mensajesError').
		append('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Debe indicar:&nbsp;</strong>'+mensaje+'</div>').fadeOut(5000);
		return false;
	}
	return true;
}

function onLimpiar() {
    $('#codigo').val('');
    $('#nombre').val('');
    $('#descrp').val('');
    $('#cant').val('');
    //$('#tdisc').val('');
    $('#tdisc').prop('selectedIndex',0);
    disableButtons(true);

}


function eliminarFila(id) {
    tabla = $('#tabla').Datatable();
    fila = $('#btnEliminar'+id).closest("tr")[0];
    $(fila).addClass('selected');
    tabla.row('.selected').remove().draw( false );
}

function disableInputs(value) {
    $('#codigo').prop('disabled',value);
    $('#nombre').prop('disabled', value);
    $('#descrp').prop('disabled', value);
    $('#cant').prop('disabled', value);
    $('#tdisc').prop('disabled', value);
    //$('#btnGuardar').prop('disabled', value);
}

function disableButtons(value) {
    $('#btnGuardar').prop('disabled', value);
    $('#limpiar').prop('disabled', value);
}

function mostrarMensajeExito(mensaje) {
    $('#mensajes').append('<div class="navbar-btn alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Exito:&nbsp;</strong>'+mensaje+'</div>').fadeOut(6000);
}

function labelFloating(value){
    if(value){ // si es verdadero
        if($('div').hasClass('form-group')){ // si tiene la etiqueta div tiene la clase form-group
         $('div').addClass('label-floating'); //agregar la clase label-floating a la etiqueta div
        }
    }

     if(!value){
        if($('div').hasClass('label-floating')){ // si tiene la etiqueta div tiene la clase form-group label-floating
            $('div').removeClass('label-floating'); //removeer la clase label-floating a la etiqueta div
     }
    }

}

function mostrarMensajeError(mensaje) {
    $('#mensajes').
    append('<div class="navbar-btn alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error:&nbsp;</strong>'+mensaje+'</div>').fadeOut(6000);
}

function codigo() 
    { 
        //Almacenamos la petición ajax en la variable request
        var request = $.ajax
            ({
                url: "/uaed2/Articulo/codigo", //¿Ese archivo se llama así realmente?
                method: "POST"
                
            });
            //Usamos request y evaluamos usando done y fail, es lo recomendado por jQuery
            //done se lanzará cuando la petición Ajax tenga éxito
            request.done(function( datos ) 
            {
                    //console.log(datos);
                // Creamos una variable y evaluamos datos
                var txtHTML="";
                if (!datos.error)
                {
                    
                    txtHTML=datos;

                 }else{

                    txtHTML=datos.error;
                    
                 }
                 
                 $('#codigo').val(txtHTML);
            });

            //fail se lanzará cuando la petición Ajax falle      
            request.fail(function( jqXHR, textStatus ) 
            {
                alert( "Falló la petición Ajax: " + textStatus );
                //Paramos el timer
               
            });

    }
