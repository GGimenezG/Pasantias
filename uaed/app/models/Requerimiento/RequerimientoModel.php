<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');

class RequerimientoModel extends Model
{
	public $r_codigo = "";
  	public $r_nombre = "";
  	public $r_descrp = "";
  	public $r_status = "";



	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCodigo(){
		return $this->r_codigo;
	}

	public function getNombre(){
		return $this->r_nombre;
	}

	public function getDescrp(){
		return $this->r_descrp;
	}
	public function getStatus(){
		return $this->r_status;
	}

	//////
	// asignar atributo
	//////
	public function setCodigo($r_codigo){
		$this->r_codigo = $r_codigo;
	}
	public function setNombre($r_nombre){
		$this->r_nombre = $r_nombre;
	}
	public function setDescrp($r_descrp){
		$this->r_descrp = $r_descrp;
	}
	public function setStatus($r_status){
		$this->r_status = $r_status;
	}

	///////
	// Métodos de la clase
	//////

	public function consultar_todos()
	{
		
		$sql = "SELECT * FROM requerimiento 
						WHERE r_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta)){
 			$resultado[$indice] = array('r_codigo' => $row["r_codigo"], 
 										'r_nombre' => $row["r_nombre"],
 										'r_descrp' => $row["r_descrp"],
 										'r_status' => $row["r_status"]);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}



	public function consultar_registro()
	{
		
		$sql = "SELECT * FROM requerimiento 
						 WHERE r_codigo = '".$this->r_codigo."' and 
							   r_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['r_codigo']);
			 $this->setNombre($row['r_nombre']);
			 $this->setDescrp($row['r_descrp']);
			 $this->setStatus($row['r_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function consultar_nombre()
	{
		
		$sql = "SELECT * FROM requerimiento 
						 WHERE r_nombre = '".$this->r_nombre."'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['r_codigo']);
			 $this->setNombre($row['r_nombre']);
			 $this->setDescrp($row['r_descrp']);
			 $this->setStatus($row['r_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function obtenerCodigo(){
		return $this->getcodigonuevo("requerimiento","r_codigo");
	}

	public function incluir()
	{	

	  	$sql= "INSERT into requerimiento (r_nombre, 
	  								r_descrp, 
	  								r_status) 
	  				values ('".$this->r_nombre."',
	  					   '".$this->r_descrp."',
	  					   'a')";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}
	  	else{
	  		return false;
	  	}
	  	// return $incluir;
	}

	public function incluir_estudiante_requerimiento()
	{	

	  	$sql= "INSERT into estudiante_requerimiento (e_cedula, 
	  												 r_codigo, 
	  												 er_status) 
	  				values ('".$this->e_cedula."',
	  					   '".$this->r_codigo."',
	  					   'a')";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}
	  	else{
	  		return false;
	  	}
	  	// return $incluir;
	}

	public function modificar()
	{
		$codigo = $this->getCodigo();
		$nombre = $this->getNombre();
		$descrp = $this->getDescrp();
		if($this->consultar_registro()){
			if($nombre == $this->getNombre() && $descrp = $this->getDescrp()){
				return false;
			}else{
				$sql= "UPDATE requerimiento set r_nombre='".$nombre."',
										  r_descrp='".$descrp."' 
									where r_codigo='".$codigo."'";
		  		if($this->ejecutar($sql)){
		  			$this->consultar_registro();
		  			return true;
		  		}else{
		  			return false;
		  		}		  						
			}
		}
	}

	public function eliminar(){

		$sql= "UPDATE requerimiento set r_status='i'
							where r_codigo='".$this->r_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}
	
		public function activar(){

		$sql= "UPDATE requerimiento set r_status='a'
							where r_codigo='".$this->r_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}
}