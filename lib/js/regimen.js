var tabla;
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
	disableInputs(false);
	labelFloating(true);
	$('#dcodigo').removeClass('label-floating');
	update();
	//<?php header('location: /sis/regimen/codigo'); ?>
	$('#descrp').val("");
	$('#nombre').val("");
	$('#btnGuardar').prop('disabled', false);
	$('#limpiar').prop('disabled', false);
	$('#cerrar').prop('disabled', false);

}

function onModificar(id) {
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
		if ($('#idString').val().length > 0 ) {
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

function update() 
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
                    //Si se espera más de una fila hay que leer datos en un bucle
                    //txtHTML=datos.ID+"<br />"+datos.nombre ;

                    txtHTML=datos;


                    // $.each(datos, function(i, object) {
                    //     $.each(object, function(property, value) {
                    //         txtHTML +=property + "=" + value+"<br />";
                    //         //Prueba
                    //         console.log(property + "=" + value+"<br />");
                    //     });
                    //     txtHTML +="<hr />";   
                    // });

                 }else{

                    txtHTML=datos.error;
                    
                 }
                 console.log(txtHTML);
                 $('#codigo').val(txtHTML);
            });

            //fail se lanzará cuando la petición Ajax falle      
            request.fail(function( jqXHR, textStatus ) 
            {
                alert( "Falló la petición Ajax: " + textStatus );
                //Paramos el timer
               
            });

    }



/***/
function codigo(){
	$.ajax({
		url: '/sis/app/controllers/Regimen/rutinaCodigo.php',
		type: 'POST',
		data: '',
		dataType: 'JSON',
		success: function(data)
			{
			var codigo = data[0];
			$('#codigo').html(codigo);
		}
		
	});
}


function onAgregar() {
	$.ajax({
		url: "ControladorCargos",
		type: "POST",
		data: $("#formCargo").serialize(),
		success: function(response) {
			if (response.indexOf("error:") != 0) {
				var cargo = JSON.parse(response);
				agregarFila(cargo);
				mostrarMensajeExito("Cargo incluido satisfactoriamente!!!");
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

function onEditar() {
	$.ajax({
		url: "ControladorCargos",
		type: "PUT",
		data: $("#formCargo").serialize(),
		success: function(response) {
			if (response.indexOf("error:") != 0) {
				var cargo = JSON.parse(response);
				eliminarFila(cargo.codigo);
				agregarFila(cargo);
				mostrarMensajeExito("Cargo modificado satisfactoriamente!!!");
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
		url: "ControladorCargos",
		type: "DELETE",
		data: {"id":id},
		success: function(response) {
			if (response == "ok") {
				eliminarFila(id);
				mostrarMensajeExito('Cargo eliminado satisfactoriamente!!!');
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

function agregarFila(cargo) {
	tabla.row.add( [
        '<td>'+cargo.codigo+'</td>',
        '<td><span id="nombre'+cargo.idString+'">'+cargo.nombre+'</span></td>',
        '<td><a class="btn btn-success btn-raised btn-sm" data-toggle="modal" data-target="#ventana" onclick="onConsultar(\''+cargo.idString+'\');"><i class="glyphicon glyphicon-eye-open"></i></a></td>',
        '<td><a class="btn btn-warning btn-raised btn-sm" data-toggle="modal" data-target="#ventana" onclick="onModificar(\''+cargo.idString+'\');"><i class="glyphicon glyphicon-edit"></i></a></td>',
        '<td><a id="btnEliminar'+cargo.idString+'" class="btn btn-danger btn-raised btn-sm" data-toggle="confirmation" data-title="¿Estas seguro?" data-singleton="true" data-popout="true" data-href="javascript:onEliminar(\''+cargo.idString+'\');" data-btn-ok-label="Si" data-btn-ok-icon="glyphicon glyphicon-share-alt" data-btn-ok-class="btn btn-success btn-raised btn-sm" data-btn-cancel-label="No" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-btn-cancel-class="btn btn-danger btn-raised btn-sm"> <i class="glyphicon glyphicon-trash"></i></a></td>'
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
	$('#mensajes').
	append('<div class="navbar-btn alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Exito:&nbsp;</strong>'+mensaje+'</div>').fadeOut(3000);
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
	append('<div class="navbar-btn alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error:&nbsp;</strong>'+mensaje+'</div>').fadeOut(3000);
}
