
function onEntrar(){
  if (validar()) {
    onEnviar();
  }
}



function onEnviar(){
    
	/*if($("#usuario").val()=="gerente")
        window.location.href="Gerente";
    else if($("#usuario").val()=="administrador")
        window.location.href="administrador";
    else if($("#usuario").val()=="usuario")
        window.location.href="Empleado.html";*/
    
	$.ajax({
		url: "ControladorIndex",
		type: "POST",
		data: $("#login-nav").serialize(),
		success: function(response) {
			if (response.indexOf("error:") != 0) {
				var respuesta = JSON.parse(response);
                if(respuesta.acceso=="Gerente")
                 window.location.href="Gerente"
                 else if(respuesta.acceso=="Administrador")
                 window.location.href="Administrador"
                 else
                  window.location.href="perfil?id="+respuesta.codigo;
				alert("Bienvenido");
               
			}
			else {
				alert("Usuario o clave incorrecta");
 			}
		}
	});
}

function validar() {
	mensaje = "";
	inputs = ["usuario", "clave"];
	mensajes = ["el usuario", "la clave"];
	for (i=0; i<inputs.length; i++) {
		if (!$('#'+inputs[i]).val() || parseInt($('#'+inputs[i]).val()) <= 0) {
			alert("Debe indicar: "+mensajes[i]+ " y " + mensajes[i+1]);
      return false;
		}
	}
	return true;
}
