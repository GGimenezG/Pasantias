<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class EstudianteDiscapacidadModel extends Model
{
	var $e_cedula = "";
	var $c_codigo = "";
	var $ed_status = "";
	
	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCedula(){
		return $this->e_cedula;
	}
	public function getCodigo(){
		return $this->c_codigo;
	}

	public function getStatus(){
		return $this->ed_status;
	}
	//////
	// asignar atributo
	//////
	public function setCedula($e_cedula){
		$this->e_cedula = $e_cedula;
	}
	public function setCodigo($c_codigo){
		$this->c_codigo = $c_codigo;
	}
	
	public function setStatus($ed_status){
		$this->ed_status = $ed_status;
	}
	///////
	// Métodos de la clase
	//////


	public function consultar_estudiante()
	{

		$sql = "SELECT * FROM estudiante_discapacidad 
						 WHERE e_cedula = $this->e_cedula and 
							   ed_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
 			 $this->setCodigo($row['c_codigo']);
			 $this->setStatus($row['ed_status']);
 			
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function consultar_certificado()
	{

		$sql = "SELECT * FROM estudiante_discapacidad 
						 WHERE c_codigo = $this->c_codigo and 
							   ed_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
 			 $this->setCedula($row['e_cedula']);
			 $this->setStatus($row['ed_status']);
 			
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}
		

	public function incluir()
	{	

	  	$sql= "INSERT into estudiante_discapacidad (e_cedula, 
	  								c_codigo, 
	  								ed_status) 
	  				values ('$this->e_cedula',
	  					   '$this->c_codigo',
	  					   'a')";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}
	  	else{
	  		return false;
	  	}
	  	
	}

}