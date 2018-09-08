  $(document).ready(function(){ 
    $('#certificado .input-group.date').datepicker({
        format: "mm/yyyy",
        maxViewMode: 2,
        language: "es",
        autoclose: true
    });
});

function b_estudiante() {
	var datos = $('#estudiante').serialize();
	console.log(datos);
	$.ajax({
		url: "/uaed/estudiante/consultar_estudiante",
		type: "POST",
		data: datos,
		success: function(response) {
			if (response.indexOf("error:") != 0){
				console.log(response, "response");
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