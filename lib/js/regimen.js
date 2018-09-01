var tabla;
var operacion = 0;
$(document).ready(function() {
	tabla =
	$('#tabla').DataTable({
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
        }
	});
	$('#formRegimen').validate();
});

function onIncluir() {
	operacion=0;
	disableInputs(false);
	labelFloating(true);
	$('#dcodigo').removeClass('label-floating');
	codigo();
	//<?php header('location: /sis/regimen/codigo'); ?>
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
                url: "/sis/Regimen/codigo", //¿Ese archivo se llama así realmente?
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
		url: "/sis/Regimen/activar",
		type: "POST",
		data: datos,
		success: function(data) {
			if (data.indexOf("codigo:") != 0){
				console.log(data, "activar");
				var fila = JSON.parse(data);
				agregarFila(fila);
				mostrarMensajeExito("Régimen activado satisfactoriamente!!!");
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
	var datos = $('#formRegimen').serialize();
	console.log(datos, "agregar");
	$.ajax({
		url: "/sis/Regimen/registrar",
		type: "POST",
		data: datos,
		success: function(data) {
			if (data.indexOf("activar:") != 0){
				console.log("activar:", data);
				var fila = JSON.parse(data);
				agregarFila(fila);
				mostrarMensajeExito("Régimen activado satisfactoriamente!!!");
			}else if(data.indexOf("activar:") == 0){
				console.log("agregar", data);
				var fila = JSON.parse(data);
				agregarFila(fila);
				mostrarMensajeExito("Régimen incluido satisfactoriamente!!!");
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
	var datos = $("#formRegimen").serialize();
	console.log(datos);
	$.ajax({
		url: "/sis/Regimen/editar",
		type: "POST",
		data: datos,
		success: function(data) {
			if (data.indexOf("error:") != 0) {
				console.log(data);
				var cargo = JSON.parse(data);
				eliminarFila(cargo.codigo);
				agregarFila(cargo);
				mostrarMensajeExito("Regimen modificado satisfactoriamente!!!");
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
		url: "/sis/Regimen/borrar",
		type: "POST",
		data: {"codigo" : id},
		success: function(data) {
			console.log(data);
			if (data.indexOf("codigo:") != 0) {
				var codigo = JSON.parse(data);
				eliminarFila(codigo.codigo);
				mostrarMensajeExito('Regimen eliminado satisfactoriamente!!!');
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
