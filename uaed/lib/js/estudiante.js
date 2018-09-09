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
		
		$.ajax({
			url: "/uaed/estudiante/consultar_estudiante",
			type: "POST",
			data: datos,
			success: function(response) {
				if (response.indexOf("error:") != 0){
					var estudiante = JSON.parse(response);
					$('#e_nombre').val(estudiante.e_nombre);
					$('#e_decanato').val(estudiante.e_decanato);
					$('#e_carrera').val(estudiante.e_carrera);
					$('#e_semestre').val(estudiante.e_semestre);
					
				}else {
					alert('error');
				}
			},
			error: function(jqXHR, estado, error) {
				mostrarMensajeError(error);
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
				if (data.indexOf("error:") != 0){
					var fila = JSON.parse(data);
					agregarFila(fila);
					
				}else {
					alert('error');
				}
				
				},
			error: function(jqXHR, estado, error) {
				mostrarMensajeError(error);
			},
			timeout: 10000
		});

	}

}

function agregarFila(fila) {
	var duracion;
	if(fila.d_duracion!=null){
		$('#tablaD > tbody').append('<tr><td><span id="t_tipo">'+fila.td_nombre+'</span></td>'+
							        '<td><span id="t_grado">'+fila.g_nombre+'</span></td>'+
							        '<td><span id="t_regimen">'+fila.rg_nombre+'</span></td>'+
							        '<td><span id="t_duracion">'+fila.d_duracion+'</span></td></tr>');
	}else{
		$('#tablaD > tbody').append('<tr><td><span id="t_tipo">'+fila.td_nombre+'</span></td>'+
							        '<td><span id="t_grado">'+fila.g_nombre+'</span></td>'+
							        '<td><span id="t_regimen">'+fila.rg_nombre+'</span></td></tr>');	
	}

	

	// tablaD.row.add( [
 //        '<td><span id="t_tipo">'+fila.td_nombre+'</span></td>',
 //        '<td><span id="t_grado">'+fila.g_nombre+'</span></td>',
 //        '<td><span id="t_regimen">'+fila.rg_nombre+'</span></td>',
 //        '<td><span id="t_duracion">'+fila.d_duracion+'</span></td>'
 //    ] ).draw();
	// $('[data-toggle="confirmation"]').confirmation('hide');
}