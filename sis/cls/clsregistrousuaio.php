<?php

 	$u_username = $_POST['u_username'];
	$u_password = $_POST['u_password'];
	$u_cedula = $_POST['u_cedula'];
 	$u_nombre = $_POST['u_nombre'];
	$u_tipo = $_POST['u_tipo'];

	require("clsconexion.php");
		$hash = password_hash($u_password, PASSWORD_BCRYPT);
 		$sql = "SELECT * FROM usuario WHERE u_username = '$u_username' and u_status='a' ";
 		$checkusuario = mysqli_query($mysqli,$sql);
 		$check_usuario = mysqli_num_rows($checkusuario);
 		
 		if ($check_usuario > 0)
 			{
 				echo ' <script language="javascript">alert("Atencion, ya existe el usuario, verifique sus datos");</script> ';
 				
 			}

 		else
 			{
 				$sql = "INSERT INTO usuario (u_cedula, 
 											u_nombre, 
 											u_tipo, 
 											u_username, 
 											u_password, 
 											u_status) 
 						VALUES ('$u_cedula',
 								'$u_nombre',
 								'$u_tipo',
 								'$u_username',
 								'$hash',
 								'a')";
 				mysqli_query($mysqli,$sql);
 				
 				echo ' <script language="javascript">alert("Usuario registrado con exito");</script> ';
				 echo "<script> location.href='../index.php' </script>";
 			}
 			
?>

<!-- <?php
	
// 	class clsregistro
//  {
//  	var $u_username = "";// $_POST['username'];
//  	var $u_password = "";//$_POST['password'];
//  	var $u_cedula = "";//$_POST['cedula'];
//  	var $u_nombre = "";//$_POST['nombre'];
//  	var $u_tipo = "";//$_POST['tipo'];

//  	var $objbd = "";

//  	function clslogin()
//  	{
//  		$this->objbd = new clsconexion();
//  	}

 	

 		



//  	function chequeo_usuario()
//  	{
//  		$this->u_username = $_POST['username'];
//  		$this->u_password = $_POST['password'];
//  		$this->u_cedula = $_POST['cedula'];
//  		$this->u_nombre = $_POST['nombre'];
//  		$this->u_tipo = $_POST['tipo'];
// echo "hola";
//  		$objbd = $this->objbd;

//  		$hash = password_hash($this->u_password, PASSWORD_BCRYPT);

//  		$sql = "SELECT * FROM usuario WHERE u_username = '$this->u_username' and u_status='a' ";
//  		$td = $objbd->select($sql);
//  		if ($row = $objbd->hay_registro($td))
//  			{
//  				echo ' <script language="javascript">alert("Atencion, ya existe el usuario, verifique sus datos");</script> ';
//  				$objbd->cerrarselect($td);
//  			}

//  		else
//  			{
//  				$sql = "INSERT INTO usuario (u_cedula, 
//  											u_nombre, 
//  											u_tipo, 
//  											u_username, 
//  											u_password, 
//  											u_status) 
//  						VALUES ('$this->u_cedula',
//  								'$this->u_nombre',
//  								'$this->u_tipo',
//  								'$this->u_username',
//  								'$hash',
//  								'a')";

//  				if($this->objbd->ejecutar($sql))
//  					{
//  						echo ' <script language="javascript">alert("Usuario registrado con exito");</script> ';
				 
//  					}
//  				else
//  					{
//  						echo "Error al crear el usuario." . $sql . "<br>" . $objbd->con->error;
//  					}
//  			}
//  	}
//  }
?> -->