<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class HomeModel extends Model
{
	private $u_username = "";
  	private $u_password = "";
  	private $u_correo = "";
 	private $u_cedula = "";
  	private $u_nombre = "";
  	private $u_tipo = "";


	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getUsername(){
		return $this->u_username;
	}

	public function getPassword(){
		return $this->u_password;
	}

	public function getCorreo(){
		return $this->u_correo;
	}

	public function getCedula(){
		return $this->u_cedula;
	}

	public function getNombre(){
		return $this->u_nombre;
	}

	public function getTipo(){
		return $this->u_tipo;
	}

	//////
	// asignar atributo
	//////
	public function setUsername($u_username){
		$this->u_username = $u_username;
	}
	public function setNombre($u_nombre){
		$this->u_nombre = $u_nombre;
	}
	public function setPassword($u_password){
		$this->u_password = $u_password;
	}
	public function setCorreo($u_correo){
		$this->u_correo = $u_correo;
	}
	public function setCedula($u_cedula){
		$this->u_cedula = $u_cedula;
	}
	public function setTipo($u_tipo){
		$this->u_tipo = $u_tipo;
	}




	public function verificar()
	{
		
		$sql = "SELECT * FROM usuario WHERE u_username = '$this->u_username'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
 			if(password_verify($this->u_password,$row['u_password']))
 				{
 					 $this->setCedula($row['u_cedula']);
 					 $this->setNombre($row['u_nombre']);
 					 $this->setCorreo($row['u_correo']);
 					 $this->setTipo($row['u_tipo']);
 					 return true;
 				} 
 			else 
 				{
 					return false;
 				}
 		}
 		else
 		{
			return false;
 		}
	}

	public function chequear(){
		$sql = "SELECT * FROM usuario WHERE u_username = '$this->u_username' or u_correo = '$this->u_correo' and u_status='a' ";
		$checkusuario = $this->select($sql);
 		$check_usuario = $this->num_registros($checkusuario);
 		if ($check_usuario == 0){
 			return true;
 		}else{
 			return false;
 		}
	}

	public function registrar(){
		$hash = password_hash($this->u_password, PASSWORD_BCRYPT);
 		$sql = "INSERT INTO usuario (u_cedula, 
									u_nombre, 
									u_tipo, 
									u_username, 
									u_password,
									u_correo, 
									u_status) 
				VALUES ('$this->u_cedula',
						'$this->u_nombre',
						'$this->u_tipo',
						'$this->u_username',
						'$hash',
						'$this->u_correo',
						'a')";
		if($this->ejecutar($sql)){
			return true;
		}else{
			return false;
		}
		
	}

}