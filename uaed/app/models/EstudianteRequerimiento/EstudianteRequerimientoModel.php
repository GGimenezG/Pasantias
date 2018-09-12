<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class EstudianteRequerimientoModel extends Model
{
	var $er_codigo = "";
	var $e_cedula = "";
	var $r_codigo = "";
	var $er_status = "";
	
	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCodigo(){
		return $this->er_codigo;
	}
	public function getCedula(){
		return $this->e_cedula;
	}
	public function getRequerimietno(){
		return $this->r_codigo;
	}

	public function getStatus(){
		return $this->er_status;
	}
	//////
	// asignar atributo
	//////
	public function setCedula($e_cedula){
		$this->e_cedula = $e_cedula;
	}
	public function setRequerimiento($r_codigo){
		$this->r_codigo = $r_codigo;
	}
	public function setCodigo($er_codigo){
		$this->er_codigo = $er_codigo;
	}
	
	public function setStatus($er_status){
		$this->er_status = $er_status;
	}
	///////
	// Métodos de la clase
	//////


	public function consultar_estudiante()
	{

		$sql = "SELECT * FROM estudiante_requerimiento 
						 WHERE e_cedula = $this->e_cedula and 
							   er_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function consultar_requerimiento()
	{

		$sql = "SELECT * FROM estudiante_discapacidad 
						 WHERE r_codigo = $this->r_codigo and 
							   er_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
 			 $this->setCedula($row['r_cedula']);
			 $this->setStatus($row['er_status']);
 			
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function consultar_requerimiento_estudiante()
	{

		$sql = "SELECT er_codigo, r_nombre FROM estudiante_requerimiento er 
													   			  INNER JOIN requerimiento r 
													   			  ON er.r_codigo = r.r_codigo 
					   			WHERE er.e_cedula = $this->e_cedula and
							  	      er.er_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta)){
 			$resultado[$indice] = array('er_codigo' => $row["er_codigo"],
 										'r_nombre' => $row["r_nombre"]);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}
		

	public function incluir()
	{	

	  	$sql= "INSERT into estudiante_requerimiento (e_cedula, 
	  								r_codigo, 
	  								er_status) 
	  				values ('$this->e_cedula',
	  					   '$this->r_codigo',
	  					   'a')";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}
	  	else{
	  		return false;
	  	}
	  	
	}
	public function obtenerCodigo(){
		return $this->getcodigonuevo("estudiante_requerimiento","er_codigo");
	}

	public function eliminar(){

		$sql= "UPDATE estudiante_requerimiento set er_status='i'
							where er_codigo='".$this->er_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}	

}