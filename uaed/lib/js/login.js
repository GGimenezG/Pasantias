function Mostrar() {

	//Para div de correo
	var correo = document.getElementById("email");
	//Para sección de "¿No estás registrado?"
	var noregis = document.getElementById("noRegistrado");
	//Para ancor de "Volver"
	var volver = document.getElementById("volver");
	//Para contraseña
	var clave = document.getElementById("pass");
	//Para nuevos div floantes: cédula, confirmación de correo y clave
	var cedula = document.getElementById("ced");
	var confem = document.getElementById("confirme");
	var confpa = document.getElementById("confirmp");
	//Para div de Usuario
	var usuario = document.getElementById("user");
	//Para div de "¿Olvidó su contraseña?"
	var forgot = document.getElementById("forgot");


	//jQuery para cambiar los valores del h3 y el button de entrar
	$('#inicio').text('Registro');
	$('#registro').text('Registrarse');

	//Divs que aparecen
	correo.style.display = 'block';
	volver.style.display = 'block';
	//Elementos que desaparecen
	noregis.style.display = 'none';
	forgot.style.display = 'none';
	//Coloca los div en bloque y línea (juntos)
	//Usuario y Cédula
	usuario.style.display = 'inline-block';
	ced.style.display = 'inline-block';
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

	//Para div de correo
	var correo = document.getElementById("email");
	//Para sección de "¿No estás registrado?"
	var noregis = document.getElementById("noRegistrado");
	//Para ancor de "Volver"
	var volver = document.getElementById("volver");
	//Para contraseña
	var clave = document.getElementById("pass");
	//Para nuevos div floantes: cédula, confirmación de correo y clave
	var cedula = document.getElementById("ced");
	var confem = document.getElementById("confirme");
	var confpa = document.getElementById("confirmp");
	//Para div de Usuario
	var usuario = document.getElementById("user");
	//Para div de "¿Olvidó su contraseña?"
	var forgot = document.getElementById("forgot");

	//Devuelve a sus valores iniciales el h3 y el button
	$('#inicio').text('Iniciar Sesión');
	$('#registro').text('Entrar');

	//Inputs que desaparecen
	correo.style.display = 'none';
	ced.style.display = 'none';
	confpa.style.display = 'none';
	confem.style.display = 'none';
	//Regresa inputs a su estado original
	usuario.style.display = 'block';
	clave.style.display = 'block';
	//Elementos que regresan
	noregis.style.display = 'block';
	forgot.style.display = 'block';
	//Elementos que desaparecen
	volver.style.display = 'none';
}