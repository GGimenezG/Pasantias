<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 *  
 */
class PerfilModel extends Model
{
	public $u_cedula = "";
  	public $u_nombre = "";
  	public $u_tipo = "";
  	public $u_username = "";
  	public $u_password = "";
  	public $u_correo = "";
  	public $u_status ="";



	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCedula(){
		return $this->u_cedula;
	}

	public function getNombre(){
		return $this->u_nombre;
	}

	public function getTipo(){
		return $this->u_tipo;
	}

	public function getUsername(){
		return $this->u_username;
	}

	public function getPassword(){
		return $this->u_password;
	}

	public function getCorreo(){
		return $this->u_correo;
	}

	public function getStatus(){
		return $this->u_status;
	}


	//////
	// asignar atributo
	//////
	public function setCedula($u_cedula){
		$this->u_cedula = $u_cedula;
	}

	public function setNombre($u_nombre){
		$this->u_nombre = $u_nombre;
	}

	public function setTipo($u_tipo){
		$this->u_tipo = $u_tipo;
	}

	public function setUsername($u_username){
		$this->u_username = $u_username;
	}

	public function setPassword($u_password){
		$this->u_password = $u_password;
	}

	public function setCorreo($u_correo){
		$this->u_correo = $u_correo;
	}

	public function setStatus($u_status){
		$this->u_status = $u_status;
	}


	///////
	// Métodos de la clase
	//////

	public function consultartodos(){
		$sql = "SELECT * FROM usuario
						WHERE u_status = 'a'";
		$consulta = $this->select($sql);
		$indice = 0;
		while ($row = $this->registros($consulta)) {
			$resultado[$indice] = array('u_cedula' => $row["u_cedula"],
										'u_nombre' => $row["u_nombre"],
										'u_tipo' => $row["u_tipo"],
										'u_username' => $row["u_username"],
										'u_password' => $row["u_password"],
										'u_correo' => $row["u_correo"],
										'u_status' => $row ["u_status"]);
			$indice = $indice + 1;
		}
		return $resultado;
	}

	public function consultar(){
		$sql = "SELECT * FROM usuario
						WHERE u_cedula = '".$this->u_cedula."' and
							  u_status = 'a'";
		$consulta = $this->select($sql);

		if($row = $this->hay_registro($consulta))
		{
			$this->setCedula($row['u_cedula']);
			$this->setNombre($row['u_nombre']);
			$this->setTipo($row['u_tipo']);
			$this->setUsername($row['u_username']);
			$this->setPassword($row['u_password']);
			$this->setCorreo($row['u_correo']);
			$this->setStatus($row['u_status']);
			return true;
		}
		else{
			return false;
		}
	}


	public function consultar_nombre(){
		$sql = "SELECT * FROM usuario
						WHERE u_nombre = '".$this->u_nombre."'";
		$consulta = $this->select($sql);

		if($row = $this->hay_registro($consulta))
		{
			$this->setCedula($row['u_cedula']);
			$this->setNombre($row['u_nombre']);
			$this->setTipo($row['u_tipo']);
			$this->setUsername($row['u_username']);
			$this->setPassword($row['u_password']);
			$this->setCorreo($row['u_correo']);
			$this->setStatus($row['u_status']);
			return true;
		}
		else{
			return false;
		}
	}



	public function consultar_nombre_validado(){
		$sql = "SELECT * FROM usuario
						WHERE u_nombre = '".$this->u_nombre."'
						and u_status = 'a'";
		$consulta = $this->select($sql);

		if($row = $this->hay_registro($consulta))
		{
			$this->setCedula($row['u_cedula']);
			$this->setNombre($row['u_nombre']);
			$this->setTipo($row['u_tipo']);
			$this->setUsername($row['u_username']);
			$this->setPassword($row['u_password']);
			$this->setCorreo($row['u_correo']);
			$this->setStatus($row['u_status']);
			return true;
		}
		else{
			return false;
		}
	}


	public function consultar_usuario(){
		$sql = "SELECT * FROM usuario
						WHERE u_username = '".$this->u_username."'";
		$consulta = $this->select($sql);

		if($row = $this->hay_registro($consulta))
		{
			$this->setCedula($row['u_cedula']);
			$this->setNombre($row['u_nombre']);
			$this->setTipo($row['u_tipo']);
			$this->setUsername($row['u_username']);
			$this->setPassword($row['u_password']);
			$this->setCorreo($row['u_correo']);
			$this->setStatus($row['u_status']);
			return true;
		}
		else{
			return false;
		}
	}

	public function consultar_usuario_validado(){
		$sql = "SELECT * FROM usuario
						WHERE u_username = '".$this->u_username."' and
						u_status = 'a'";
		$consulta = $this->select($sql);

		if($row = $this->hay_registro($consulta))
		{
			$this->setCedula($row['u_cedula']);
			$this->setNombre($row['u_nombre']);
			$this->setTipo($row['u_tipo']);
			$this->setUsername($row['u_username']);
			$this->setPassword($row['u_password']);
			$this->setCorreo($row['u_correo']);
			$this->setStatus($row['u_status']);
			return true;
		}
		else{
			return false;
		}
	}


	public function obtener_cedula(){
		return $this->getcedulanueva("usuario","u_cedula");
	}

	public function obterner_username(){
		return $this->getusernuevo("usuario","u_username");
	}


	public function incluir(){
		$sql = "INSERT INTO usuario (u_cedula, 
									u_nombre, 
									u_tipo, 
									u_username, 
									u_password, 
									u_correo, 
									u_status)
					values ('".$this->u_cedula."',
					 		'".$this->u_nombre."', 
					 		'".$this->u_tipo."', 
					 		'".$this->u_username."', 
					 		'".$this->u_password."',
					 		'".$this->u_correo."',
					 		'a')";
		if($this->ejecutar($sql)){
			return true;
		}
		else{
			return false;
		}
	}


	public function modificar()
	{
		$cedula = $this->getCedula();
		$username = $this->getUsername();
		$password = $this->getPassword();
		$correo = $this->getCorreo();

		if($this->consultar()){
			if($username == $this->getUsername() && $password == $this->getPassword() && $correo == $this->getCorreo())
			{
				return false;
			}
			else{
				$sql = "UPDATE usuario set u_username = '".$username."', u_password = '".$password."', u_correo = '".$correo."' where u_cedula ='".$cedula."'";

				if($this->ejecutar($sql)){
					$this->consultar();
					return true;
				}
				else{
					return false;
				}
			}
		}
	}

	public function eliminar(){
		$sql = "UPDATE usuario set u_status = 'i'
							WHERE u_cedula = '".$this->u_cedula."'";
		if($this->ejecutar($sql)){
			return true;
		}
		else{
			return false;
		}
	}


	public function activar(){
		$sql = "UPDATE usuario set u_status = 'a'
							where u_cedula = '".$this->u_cedula."'";
		if($this->ejecutar($sql)){
			return true;
		}
		else{
			return false;
		}
	}
}