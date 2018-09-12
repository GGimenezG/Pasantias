  $(document).ready(function(){ 
    $('#estudiante .input-group.date').datepicker({
        format: "dd-mm-yyyy",
        maxViewMode: 2,
        language: "es",
        autoclose: true
    });
});

//valida que los select hallan sido seleccionados
 function validar_s_discD(){
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
 function validar_s_discR(){
 	var val1 = $('#r_codigo').val();

 	if(val1 == -1 ){
 		 Snarl.addNotification({
	        title: 'ERROR:',
	        text: 'Debe seleccionar el requerimiento para continuar',
	        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
	        
	    });

 		return true;

 	}
 }
 function reiniciar_discD(){
 	$('#td_codigo').val(-1);
 	$('#g_codigo').val(-1);
 	$('#rg_codigo').val(-1);
 	$('#d_duracion').val("");
 }
  function reiniciar_discR(){
 	$('#r_codigo').val(-1);
 }
  function reiniciar_campos(){
	$('#e_cedula').val(null)
	$('#e_nombre').val(null);
	$('#e_apellido').val(null);
	$('#e_lapso').val(null);	
	$('#e_decanato').val(null);
	$('#e_carrera').val(null);
	$('#e_semestre').val(null);
	$('#certificado').removeClass('form-static-label');
	$('#c_codigo').val(null);
	$('#c_emision').val(null);
	$('#c_vencimiento').val(null);
	$('#tablaD > tbody > tr').remove();
	$('#tablaR > tbody > tr').remove();
	reiniciar_discD();
	reiniciar_discR();
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
 function validar_c_codigo(){
 	var cod = $('#c_codigo').val();

 	if (cod=="") {
 		 Snarl.addNotification({
	        title: 'ERROR:',
	        text: 'El campo código no puede estar en blanco',
	        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
	        
	    }); 		
 		return true;
 	}else if (cod =="0") {
 		 Snarl.addNotification({
	        title: 'ERROR:',
	        text: 'El campo código no ser 0',
	        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
	        
	    }); 		
 		return true; 		
 	}

 }

 function llenar_campos_estudiante(estudiante){
	$('#e_nombre').val(estudiante.e_nombre);
	$('#e_apellido').val(estudiante.e_apellido);
	$('#e_lapso').val(estudiante.e_lapso);	
	$('#e_decanato').val(estudiante.e_decanato);
	$('#e_carrera').val(estudiante.e_carrera);
	$('#e_semestre').val(estudiante.e_semestre);
	$('#certificado').addClass('form-static-label');
	$('#c_codigo').val(estudiante.c_codigo);
	$('#c_emision').val(estudiante.c_emision);
	$('#c_vencimiento').val(estudiante.c_vencimiento);
	$('#tablaD > tbody > tr').remove();
	if(estudiante.discapacidad){
		for (var i = 0; i < estudiante.discapacidad.length; i+=1){
			agregarFilaD(estudiante.discapacidad[i]);
		}			
	}
	$('#tablaR > tbody > tr').remove();
	if(estudiante.requerimiento){
		for (var i = 0; i < estudiante.requerimiento.length; i+=1){
			agregarFilaR(estudiante.requerimiento[i]);
		}			
	}

 }
  function llenar_campos_certificado(estudiante){
	$('#e_cedula').val(estudiante.e_cedula);
	$('#e_apellido').val(estudiante.e_apellido);
	$('#e_lapso').val(estudiante.e_lapso);
	$('#e_nombre').val(estudiante.e_nombre);
	$('#e_decanato').val(estudiante.e_decanato);
	$('#e_carrera').val(estudiante.e_carrera);
	$('#e_semestre').val(estudiante.e_semestre);
	$('#certificado').addClass('form-static-label');
	$('#c_emision').val(estudiante.c_emision);
	$('#c_vencimiento').val(estudiante.c_vencimiento);
	$('#tablaD > tbody > tr').remove();
	if(estudiante.discapacidad){
		for (var i = 0; i < estudiante.discapacidad.length; i+=1){
			agregarFilaD(estudiante.discapacidad[i]);
		}			
	}
	$('#tablaR > tbody > tr').remove();
	if(estudiante.requerimiento){
		for (var i = 0; i < estudiante.requerimiento.length; i+=1){
			agregarFilaR(estudiante.requerimiento[i]);
		}			
	}	

 }
 function imprimir(){
 	var datos = $('#e_cedula').serialize();
		console.log(datos);
		$.ajax({
			url: "/uaed/estudiantePDF/estudiante",
			type: "POST",
			data: datos,
			success: function(response) {
				
			
			},
			timeout: 10000
		});	
 }

function b_certificado() {
	if(!validar_c_codigo()){
		var datos = $('#c_codigo').serialize();
		console.log(datos);
		$.ajax({
			url: "/uaed/estudiante/consultar_certificado",
			type: "POST",
			data: datos,
			success: function(response) {
				console.log(response);
				var estudiante = JSON.parse(response);
				if (!estudiante.error){
									
					llenar_campos_certificado(estudiante);
					
				}else {
					var cod = $('#c_codigo').val();
			 		 Snarl.addNotification({
				        title: 'Aviso:',
				        text: estudiante.error+' Certificado: '+cod,
				        icon: '<i class="fa fa-info-circle fa-lg"></i>'
				        
				    });
					reiniciar_campos();			 		 
				}
			},
			timeout: 10000
		});
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
				var estudiante = JSON.parse(response);
				if (!estudiante.error){
									
					llenar_campos_estudiante(estudiante);
					
				}else {
					var ced = $('#e_cedula').val();
			 		 Snarl.addNotification({
				        title: 'Aviso:',
				        text: estudiante.error+' Cédula: '+ced,
				        icon: '<i class="fa fa-info-circle fa-lg"></i>'
				        
				    });
			 		 reiniciar_campos();
				}
			},
			timeout: 10000
		});
	}

}

function Agregar_D() {
	$('#agregarD').on('click', function(e){
	    var $link = $(e.target);
	    e.preventDefault();
	    if(!$link.data('lockedAt') || +new Date() - $link.data('lockedAt') > 300) {
	        AgregarDiscapacidad();
	    }
	    $link.data('lockedAt', +new Date());
	});	
}

function Agregar_R() {
	$('#agregarR').on('click', function(e){
	    var $link = $(e.target);
	    e.preventDefault();
	    if(!$link.data('lockedAt') || +new Date() - $link.data('lockedAt') > 300) {
	        AgregarRequerimiento();
	    }
	    $link.data('lockedAt', +new Date());
	});	
}

function AgregarDiscapacidad(){
			var datos = $('#estudiante').serialize();
			if(!validar_s_discD()){
				$.ajax({
					url: "/uaed/estudiante/registrar_discapacidad",
					type: "POST",
					data: datos,
					success: function(data) {
						console.log(data);
						var respuesta = JSON.parse(data);
						if (!respuesta.error){
							var fila = respuesta;
							agregarFilaD(fila);
							reiniciar_discD();					
							
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
function AgregarRequerimiento(){
			var datos = {e_cedula: $('#e_cedula').val(), r_codigo: $('#r_codigo').val()};
			console.log(datos);
			if(!validar_s_discR()){
				$.ajax({
					url: "/uaed/estudiante/registrar_requerimiento",
					type: "POST",
					data: datos,
					success: function(data) {
						console.log(data);
						var respuesta = JSON.parse(data);
						if (!respuesta.error){
							var fila = respuesta;
							agregarFilaR(fila);
							reiniciar_discR();					
							
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
function Certificado(){
	var val1 = $('#e_cedula').val();
	var val2 = $('#c_codigo').val();
	var val3 = $('#c_emision').val();
	var val4 = $('#c_vencimiento').val();
	if(val1 != "" && val2!="" && val3!="" && val4!=""){
		Agregar_estudiante_certificado();
	}else{
		Snarl.addNotification({
			title: 'ERROR:',
			text: 'La cédula del estudiante, el codigo, fecha de emisión y vencimiento del certificado no pueden estar vacios.',
			icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
		});			
	}
}

function Agregar_estudiante_certificado(){
			var datos = {e_cedula: $('#e_cedula').val(), 
						 c_codigo: $('#c_codigo').val(),
						 c_emision: $('#c_emision').val(),
						 c_vencimiento: $('#c_vencimiento').val()};
			console.log(datos);
			
			$.ajax({
				url: "/uaed/estudiante/incluir_estudiante_disc",
				type: "POST",
				data: datos,
				success: function(data) {
					console.log(data,"response");
					var respuesta = JSON.parse(data);
					if (!respuesta.error){
				 		 Snarl.addNotification({
					        title: 'MENSAJE:',
					        text: respuesta.success,
					        icon: '<i class="fa fa-info-circle fa-lg"></i>'
					        
					    });					
						
					}else {
				 		 Snarl.addNotification({
					        title: 'ERROR:',
					        text: respuesta.error,
					        icon: '<i class="fa fa-exclamation-triangle fa-lg"></i>'
					        
					    });					
					}
					
				},

				timeout: 10000
			});

				
}

function agregarFilaD(fila) {

		$('#tablaD > tbody').append('<tr id="cod'+fila.d_codigo+'" name="cod'+fila.d_codigo+'"><td><span id="t_tipo">'+fila.td_nombre+'</span></td>'+
							        '<td><span id="t_grado">'+fila.g_nombre+'</span></td>'+
							        '<td><span id="t_regimen">'+fila.rg_nombre+'</span></td>'+
							        '<td><span id="t_duracion">'+fila.d_duracion+'</span></td>'+
							        '<td><button type="button" '+
							        			 'class="btn btn-danger waves-effect"'+
												 'onclick="ConfirmDeleteD('+fila.d_codigo+');">Eliminar'+
                                                 '</button></td></tr>');
}

function agregarFilaR(fila) {

		$('#tablaR > tbody').append('<tr id="cod'+fila.er_codigo+'" name="cod'+fila.er_codigo+'">'+
									'<td><span>'+fila.r_nombre+'</span></td>'+
							        '<td><button type="button" '+
							        			 'class="btn btn-danger waves-effect"'+
												 'onclick="ConfirmDeleteR('+fila.er_codigo+');">Eliminar'+
                                                 '</button></td></tr>');
}

function ConfirmDeleteD(id){
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

					if (!cod.error){
						
						$('#tablaD > tbody > tr#cod'+cod.success).remove();
						$('#cod'+cod.success).remove();
						
					}else {
				 		 Snarl.addNotification({
					        title: 'ERROR:',
					        text: cod.error,
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
function ConfirmDeleteR(id){
$.confirm({
    title: 'Confirmación',
    content: '¿Está seguro que desea eliminar este registro?',
    buttons: {
        confirm: function () {
        	var datos = {codigo: id};
        	console.log(datos);
			$.ajax({
				url: "/uaed/estudiante/eliminar_requerimiento",
				type: "POST",
				data: datos,
				success: function(data) {
					console.log(data);					
					var cod = JSON.parse(data);

					if (!cod.error){
						
						$('#tablaR > tbody > tr#cod'+cod.success).remove();
						$('#cod'+cod.success).remove();
						
					}else {
				 		 Snarl.addNotification({
					        title: 'ERROR:',
					        text: cod.error,
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
