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


	public function verificar($u_username, $u_password)
	{
		$sql = "SELECT * FROM usuario WHERE u_username = '$u_username'" ;
 		$consulta = $this->bd->select($sql);
 
 		if($row = $this->bd->hay_registro($consulta))
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