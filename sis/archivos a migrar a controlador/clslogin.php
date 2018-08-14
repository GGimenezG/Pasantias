<?php
session_start();
?>

<?php
	
	require_once("clsconexion.php");
 	
 	class clslogin
 	{
	 	var $u_username = "";
	 	var $u_password = "";
	 	var $u_cedula = "";
	 	var $u_nombre = "";
	 	var $u_tipo = "";
	 	var $bd = "";

	 	function clslogin()
		{
		  $this->bd= new clsconexion();
		  login();
		}	
	 	
	 	function login()
	 	{
	 		$this->u_username = $_POST['u_username'];
	 		$this->u_password = $_POST['u_password'];
	 		$this->u_cedula = "";
	 		$this->u_nombre = "";
	 		$this->u_tipo = "";
	 		$bd=$this->bd;

	 		$sql = "SELECT * FROM usuario WHERE u_username = '$this->u_username' and u_status='a'" ;
	 		$consulta = $bd->select($sql);
	 		//$td = $objbd->select($sql);
	 		//if($row = $objbd->hay_registro($tb))
	 		if($row = $bd->hay_registro($consulta))
	 		{
	 			if(password_verify($this->u_password,$row['u_password']))
	 				{
	 					$_SESSION['loggedin'] = true;
	 					$_SESSION['username'] = $row['u_username'];
	 					$_SESSION['nombre'] = $row['u_nombre'];
	 					$_SESSION['stat'] = time();
	 					$_SESSION['expire'] = $_SESSION['stat'] + (5*60); //crear una sesion de 5 minutos
	 					$_SESSION['tipo'] = $row['u_tipo'];
						echo '<script>alert("Bienvenido, $_SESSION["nombre"]") </script>';
	 					if($_SESSION['tipo']=='administrador')
	 						{
	 							echo "<script> location.href='../indexadmin.php' </script>";
	 						}
	 					elseif ($_SESSION['tipo']=='encargado') {
	 						echo "<script> location.href='../indexencargado.php' </script>";
	 					}
	 					elseif ($_SESSION['tipo']=='secretaria') {
	 						echo "<script> location.href='../indexsecretaria.php' </script>";
	 					}
	 					
	 					
	 					//echo "Bienvenido! " . $_SESSION['username'];
	    				//echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
	 				} 
	 			else 
	 				{
	 					echo '<script>alert("Usuario invalido") </script>';
	 					echo "<script> location.href='../index.php' </script>";
	 				}
	 		}
	 		else
	 		{
				echo '<script>alert("Usuario invalido") </script>';
				echo "<script> location.href='../index.php' </script>";
	 		}
	 	}

 	}

 ?>	
	
