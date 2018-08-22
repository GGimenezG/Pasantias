<?php

/**
 * 
 */
class HomeModel extends Model
{
	// var $u_username = "";
 // 	var $u_password = "";
 	public $u_cedula = "";
  	public $u_nombre = "";
  	public $u_tipo = "";


	function __construct()
	{
		parent::__construct();
	}

	public function verificar($u_username, $u_password)
	{
		
		$sql = "SELECT * FROM usuario WHERE u_username = '$u_username'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
 			if(password_verify($u_password,$row['u_password']))
 				{
 					 $this->u_cedula = $row['u_cedula'];
 					 $this->u_nombre = $row['u_nombre'];
 					 $this->u_tipo = $row['u_tipo'];
 					 return $consulta;
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

}