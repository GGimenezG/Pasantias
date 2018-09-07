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
                className: 'green glyphicon glyphicon-file',
                title: 'Listado datos maestros de los Grados de discapacidad activos',
                filename: 'Listado Grados',
                exportOptions:
                    {
                        columns: [0, 1, 2]
                    }
            },
            {
                extend: 'excel',
                className: 'green glyphicon glyphicon-list-alt',
                title: 'Listado datos maestros de los Grados de discapacidad activos',
                filename: 'Listado Grados',
                exportOptions:
                    {
                        columns: [0, 1, 2]
                    }
            },
            {
                extend: 'copy',
                className: 'green glyphicon glyphicon-duplicate',
                exportOptions:
                    {
                        columns: [0, 1, 2]
                    }
            },
            {
                extend: 'print',
                className: 'green glyphicon glyphicon-print',
                title: 'Listado datos maestros de los Grados de discapacidad activos',
                text: 'Listado Grados',
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


	$('#formGrados').validate();
});

function onIncluir() {
	operacion=0;
	disableInputs(false);
	labelFloating(true);
	$('#dcodigo').removeClass('label-floating');
	codigo();
	//<?php header('location: /uaed/Grados/codigo'); ?>
	$('#descrp').val("");
	$('#nombre').val("");
	$('#btnGuardar').prop('disabled', false);
	$('#limpiar').prop('disabled', false);
	$('#cerrar').prop('disabled', false);

}

function onModificar(id) {
	operacion=1;
	disableInputs(false);
	labelFloating(false);
	$('#codigo').val(id);
	$('#nombre').val($("#nombre"+id).text());
	$('#descrp').val($("#descrp"+id).text());
	$('#btnGuardar').prop('disabled', false);
	$('#limpiar').prop('disabled', true);
	$('#cerrar').prop('disabled', false);

}

function onConsultar(id) {
	labelFloating(false);
	onModificar(id);
	disableInputs(true);
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

/****/

function codigo() 
    { 
        //Almacenamos la petición ajax en la variable request
        var request = $.ajax
            ({
                url: "/uaed/Grados/codigo", //¿Ese archivo se llama así realmente?
                method: "POST"
                
            });
	        //Usamos request y evaluamos usando done y fail, es lo recomendado por jQuery
            //done se lanzará cuando la petición Ajax tenga éxito
            request.done(function( datos ) 
            {
            		console.log(datos);
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

function activar(datos){
	$.ajax({
		url: "/uaed/Grados/activar",
		type: "POST",
		data: datos,
		success: function(data) {
			if (data.indexOf("codigo:") != 0){
				console.log(data, "activar");
				var fila = JSON.parse(data);
				agregarFila(fila);
				mostrarMensajeExito("Grados activado satisfactoriamente!!!");
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


function onAgregar() {
	var datos = $('#formGrados').serialize();
	console.log(datos, "agregar");
	$.ajax({
		url: "/uaed/Grados/registrar",
		type: "POST",
		data: datos,
		success: function(data) {
			if (data.indexOf("activar:") != 0){
				console.log("activar:", data);
				var fila = JSON.parse(data);
				agregarFila(fila);
				mostrarMensajeExito("Grados activado satisfactoriamente!!!");
			}else if(data.indexOf("activar:") == 0){
				console.log("agregar", data);
				var fila = JSON.parse(data);
				agregarFila(fila);
				mostrarMensajeExito("Grados incluido satisfactoriamente!!!");
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

function onEditar() {
	var datos = $("#formGrados").serialize();
	console.log(datos);
	$.ajax({
		url: "/eaed/Grados/editar",
		type: "POST",
		data: datos,
		success: function(data) {
			if (data.indexOf("error:") != 0) {
				console.log(data);
				var cargo = JSON.parse(data);
				eliminarFila(cargo.codigo);
				agregarFila(cargo);
				mostrarMensajeExito("Grados modificado satisfactoriamente!!!");
			}
			else {
				mostrarMensajeError(response.substring(6));
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

function onEliminar(id) {
	
	$.ajax({
		url: "/uaed/Grados/borrar",
		type: "POST",
		data: {"codigo" : id},
		success: function(data) {
			console.log(data);
			if (data.indexOf("codigo:") != 0) {
				var codigo = JSON.parse(data);
				eliminarFila(codigo.codigo);
				mostrarMensajeExito('Grados eliminado satisfactoriamente!!!');
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

function agregarFila(fila) {
	tabla.row.add( [
        '<td><span id="codigo'+fila.codigo+'">'+fila.codigo+'</span></td>',
        '<td><span id="nombre'+fila.codigo+'">'+fila.nombre+'</span></td>',
        '<td><span id="descrp'+fila.codigo+'">'+fila.descrp+'</span></td>',
        '<td><a class="btn btn-success btn-raised btn-sm" data-toggle="modal" data-target="#ventana" onclick="onConsultar(\''+fila.codigo+'\');"><i class="fa fa-eye fa-lg"></i></a></td>',
        '<td><a class="btn btn-warning btn-raised btn-sm" data-toggle="modal" data-target="#ventana" onclick="onModificar(\''+fila.codigo+'\');"><i class="fa fa-edit fa-lg"></i></a></td>',
        '<td><a id="btnEliminar'+fila.codigo+'" class="btn btn-danger btn-raised btn-sm" data-toggle="confirmation" data-title="¿Estas seguro?" data-singleton="true" data-popout="true" data-href="javascript:onEliminar(\''+fila.codigo+'\');" data-btn-ok-label="Si" data-btn-ok-icon="fa fa-check" data-btn-ok-class="btn btn-success btn-raised btn-sm" data-btn-cancel-label="No" data-btn-cancel-icon="fa fa-ban" data-btn-cancel-class="btn btn-danger btn-raised btn-sm"> <i class="fa fa-trash fa-lg"></i></a></td>'
    ] ).draw();
	$('[data-toggle="confirmation"]').confirmation('hide');
}

function colocarPuntosMiles(num) {
	num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
	num = num.split('').reverse().join('').replace(/^[\.]/,'');
	return num;
}

function colocarPuntosMilesYComaDecimal(numero) {
	console.log("numero: "+numero);
	if (numero.toString().indexOf('.') >= 0) {
		num = numero.toString().replace('.', ',');
	}
	else {
		num = numero.toString()+ ",00";
	}
	console.log("num: "+num);
	index = num.indexOf(',');
	entera = colocarPuntosMiles(num.substr(0, index));
	decimal = num.substring(index);
	decimal += (decimal.length==3)?"":"0";
	console.log("entera: "+entera+" - decimal: "+decimal);
	return entera+decimal;
}

function eliminarFila(id) {
	fila = $('#btnEliminar'+id).closest("tr")[0];
	$(fila).addClass('selected');
	tabla.row('.selected').remove().draw( false );
}

function disableInputs(value) {
	$('#nombre').prop('disabled', value);
	$('#btnGuardar').prop('disabled', value);
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
