<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class EstudianteModel extends Model
{
	var $e_cedula = "";
	var $e_nombre = "";
	var $e_apellido = "";
	var $e_lapso = "";
	var $e_decanato = "";
	var $e_carrera = "";
	var $e_semestre = "";
	var $e_status = "";
	
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
	public function getNombre(){
		return $this->e_nombre;
	}
	public function getApellido(){
		return $this->e_apellido;
	}
	public function getLapso(){
		return $this->e_lapso;
	}
	public function getDecanato(){
		return $this->e_decanato;
	}
	public function getCarrera(){
		return $this->e_carrera;
	}

	public function getSemestre(){
		return $this->e_semestre;
	}
	public function getStatus(){
		return $this->e_status;
	}
	//////
	// asignar atributo
	//////
	public function setCedula($e_cedula){
		$this->e_cedula = $e_cedula;
	}
	public function setNombre($e_nombre){
		$this->e_nombre = $e_nombre;
	}
	public function setApellido($e_apellido){
		$this->e_apellido = $e_apellido;
	}
	public function setLapso($e_lapso){
		$this->e_lapso = $e_lapso;
	}
	public function setDecanato($e_decanato){
		$this->e_decanato = $e_decanato;
	}
	public function setCarrera($e_carrera){
		$this->e_carrera = $e_carrera;
	}
	public function setSemestre($e_semestre){
		$this->e_semestre = $e_semestre;
	}
	public function setStatus($e_status){
		$this->e_status = $e_status;
	}
	///////
	// Métodos de la clase
	//////
///////
	// Métodos de la clase
	//////

	public function consultar_registro()
	{
		#esta sentencia debe ser cambiada de acuerdo a como 
		#esten distribuidos los datos del estudiante en la BD
		$sql = "SELECT * FROM estudiante 
						 WHERE e_cedula = $this->e_cedula and 
							   e_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
 			 $this->setNombre($row['e_nombre']);
 			 $this->setApellido($row['e_apellido']);
 			 $this->setLapso($row['e_lapso']);
			 $this->setDecanato($row['e_decanato']);
			 $this->setCarrera($row['e_carrera']);
			 $this->setSemestre($row['e_semestre']);
			 $this->setStatus($row['e_status']);
 			
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}


	public function incluir($c_codigo)
	{	

	  	$sql= "INSERT into estudiante_discapacidad (e_cedula, 
	  								c_codigo, 
	  								ed_status) 
	  				values ('".$this->e_cedula."',
	  					   '".$c_codigo."',
	  					   'a')";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}
	  	else{
	  		return false;
	  	}
	  	
	}

}