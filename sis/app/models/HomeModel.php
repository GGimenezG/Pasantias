<?php

/**
 * 
 */
class HomeModel extends Model
{
	// var $u_username = "";
 // 	var $u_password = "";
 	var $u_cedula = "";
  	var $u_nombre = "";
  	var $u_tipo = "";


	function __construct()
	{
		parent::__construct();
	}


	public function login($u_username, $u_password)
	{

		$sql = "SELECT * FROM usuario WHERE u_username = '$u_username' and u_status='a'" ;
 		$consulta = $bd->select($sql);
 
 		if($row = $bd->hay_registro($consulta))
 		{
 			if(password_verify($u_password,$row['u_password']))
 				{
 					 $this->u_cedula;
 					 $this->u_nombre;
 					 $this->u_tipo;
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