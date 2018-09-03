
//Función hecha por Guille para el entrar
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
				alert("Usuario o Contraseña incorrecta");
 			}
		}
	});
}
function Mostrar() {

	//Para el card del login
	var card1 = document.getElementById("card-1");
	//Para el card del registro
	var card2 = document.getElementById("card-2");
	//Para div de correo
	var correo = document.getElementById("correo");
	//Para ancor de "Volver"
	var volver = document.getElementById("volver");
	//Para contraseña
	var clave = document.getElementById("clave");
	//Para div floantes: cédula, confirmación de correo y clave
	var cedula = document.getElementById("cedula");
	var confem = document.getElementById("confirme");
	var confpa = document.getElementById("confirmp");
	//Para div de Usuario
	var usuario = document.getElementById("usuario");

	//Este jQuery trata de cambiar el evento del Botón Entrar por validar 
	/*$('#registro').on('click', function(){

		var form = document.login;

	if (form.u_password.value != form.cpass.value) {
		document.getElementById("alerta").innerHTML = '<div id="alerta" class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Las claves no coinciden</p></div> '
		form.cpass.value = "";
		form.cpass.focus();
		return false;
	}
	if (form.u_email.value != confem.value) {
		document.getElementById("alerta").innerHTML = '<div id="alerta" class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Los correos no coinciden</p></div> '
		confem.value = "";
		confem.focus();
		return false;
	}});*/

	//Divs que aparecen
	volver.style.display = 'block';
	card2.style.display = 'block';

	//Elementos que desaparecen
	card1.style.display = 'none';

	//Coloca los div en bloque y línea (juntos)
	//Usuario y Cédula
	usuario.style.display = 'inline-block';
	cedula.style.display = 'inline-block';
	//Correo y confirmación
	correo.style.display = 'inline-block';
	confem.style.display = 'inline-block';	
	//Clave y confirmación
	clave.style.display = 'inline-block';
	confpa.style.display = 'inline-block';
	//Márgenes de elementos
	cedula.style.marginLeft = '16.2%';
	confem.style.marginLeft = '16.2%';
	confpa.style.marginLeft = '16.2%';
	volver.style.marginLeft = '55%';
}

function Regresar() {

	//Para el card del login
	var c1 = document.getElementById("card-1");
	//Para el card del registro
	var c2 = document.getElementById("card-2");


	//Elementos que regresan
	c1.style.display = 'block';
	//Elementos que desaparecen
	c2.style.display = 'none';
}

function validadInputs() {

	var form = document.login;

	if (form.u_password.value != form.cpass.value) {
		document.getElementById("alerta").innerHTML = '<div id="alerta" class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Las claves no coinciden</p></div> '
		form.cpass.value = "";
		form.cpass.focus();
		return false;
	}
	if (form.u_email.value != confem.value) {
		document.getElementById("alerta").innerHTML = '<div id="alerta" class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><p>Los correos no coinciden</p></div> '
		confem.value = "";
		confem.focus();
		return false;
	}

}
