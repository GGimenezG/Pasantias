  $(document).ready(function(){ 
    $('#estudiante .input-group.date').datepicker({
        format: "dd-mm-yyyy",
        maxViewMode: 2,
        language: "es",
        autoclose: true
    });
});

//valida que los select hallan sido seleccionados
 function validar_s_disc(){
 	var val1 = $('#td_codigo').val();
 	var val2 = $('#g_codigo').val();
 	var val3 = $('#rg_codigo').val();

 	if(val1 == -1 || val2 == -1 || val3 == -1){
 		 Snarl.addNotification({
	        title: 'ERROR:',
	        text: 'Debe seleccionar el tipo, grado y régimen de la discapacidad para continuar',
	        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
	        
	    });

 		return true;

 	}
 }

 function reiniciar_disc(){
 	$('#td_codigo').val(-1);
 	$('#g_codigo').val(-1);
 	$('#rg_codigo').val(-1);
 	$('#d_duracion').val("");
 }

 function validar_e_cedula(){
 	var ced = $('#e_cedula').val();
 	if (ced=="") {
 		 Snarl.addNotification({
	        title: 'ERROR:',
	        text: 'El campo cédula no puede estar en blanco',
	        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
	        
	    }); 		
 		return true;
 	}
 }

function b_estudiante() {
	if(!validar_e_cedula()){
		var datos = $('#e_cedula').serialize();
		console.log(datos);
		$.ajax({
			url: "/uaed/estudiante/consultar_estudiante",
			type: "POST",
			data: datos,
			success: function(response) {
				console.log(response);
				if (response.error != ""){
					var estudiante = JSON.parse(response);
					$('#e_nombre').val(estudiante.e_nombre);
					$('#e_decanato').val(estudiante.e_decanato);
					$('#e_carrera').val(estudiante.e_carrera);
					$('#e_semestre').val(estudiante.e_semestre);
					$('#certificado').addClass('form-static-label');
					$('#c_codigo').val(estudiante.c_codigo);
					$('#c_emision').val(estudiante.c_emision);
					$('#c_vencimiento').val(estudiante.c_vencimiento);
					$('#tablaD > tbody > tr').remove();
					var disc = estudiante.discapacidad;
					for (var i = 0; i < disc.length; i+=1){
						agregarFila(disc[i]);
					}
					
				}else {
					var error = JSON.parse(response);
			 		 Snarl.addNotification({
				        title: 'Aviso:',
				        text: 'Estudiante no encontrado: '+error.error,
				        icon: '<i class="fa fa-comment  fa-lg"></i>'
				        
				    });
				}
			},
			timeout: 10000
		});
	}

}

function Agregar_D() {
	var datos = $('#estudiante').serialize();
	if(!validar_s_disc()){
		$.ajax({
			url: "/uaed/estudiante/registrar_discapacidad",
			type: "POST",
			data: datos,
			success: function(data) {
				console.log(data);
				var respuesta = JSON.parse(data);
				if (!respuesta.error){
					var fila = respuesta;
					agregarFila(fila);
					reiniciar_disc();					
					
				}else {
			 		 Snarl.addNotification({
				        title: 'ERROR:',
				        text: 'No se ha podido añadir una nueva discapacidad: '+respuesta.error,
				        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
				        
				    });					
				}
				
			},

			timeout: 10000
		});

	}

}

function agregarFila(fila) {

		$('#tablaD > tbody').append('<tr id="cod'+fila.d_codigo+'" name="cod'+fila.d_codigo+'"><td><span id="t_tipo">'+fila.td_nombre+'</span></td>'+
							        '<td><span id="t_grado">'+fila.g_nombre+'</span></td>'+
							        '<td><span id="t_regimen">'+fila.rg_nombre+'</span></td>'+
							        '<td><span id="t_duracion">'+fila.d_duracion+'</span></td>'+
							        '<td><button type="button" '+
							        			 'class="btn btn-danger waves-effect"'+
												 'onclick="ConfirmDelete('+fila.d_codigo+');">Eliminar'+
                                                 '</button></td></tr>');
}

function ConfirmDelete(id){
$.confirm({
    title: 'Confirmación',
    content: '¿Está seguro que desea eliminar este registro?',
    buttons: {
        confirm: function () {
        	var datos = {codigo: id};
        	console.log(datos);
			$.ajax({
				url: "/uaed/estudiante/eliminar_discapacidad",
				type: "POST",
				data: datos,
				success: function(data) {
					console.log(data);					
					var cod = JSON.parse(data);

					if (data.error != ""){
						console.log("elimina", cod.success);
						$('#tablaD > tbody > tr#cod'+cod.success).remove();
						$('#cod'+cod.success).remove();
						
					}else {
				 		 Snarl.addNotification({
					        title: 'ERROR:',
					        text: datos,
					        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
					        
					    });					
					}
					
				},

				timeout: 10000
			});            
        },
        cancel: function () {
           
        }
    }
});

}

