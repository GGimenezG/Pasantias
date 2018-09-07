<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class TiporequerimientoModel extends Model
{
	public $tr_codigo = "";
  	public $tr_nombre = "";
  	public $tr_descrp = "";
  	public $tr_status = "";



	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCodigo(){
		return $this->tr_codigo;
	}

	public function getNombre(){
		return $this->tr_nombre;
	}

	public function getDescrp(){
		return $this->tr_descrp;
	}
	public function getStatus(){
		return $this->tr_status;
	}

	//////
	// asignar atributo
	//////
	public function setCodigo($tr_codigo){
		$this->tr_codigo = $tr_codigo;
	}
	public function setNombre($tr_nombre){
		$this->tr_nombre = $tr_nombre;
	}
	public function setDescrp($tr_descrp){
		$this->tr_descrp = $tr_descrp;
	}
	public function setStatus($tr_status){
		$this->tr_status = $tr_status;
	}

	///////
	// Métodos de la clase
	//////

	public function consultar_todos()
	{
		
		$sql = "SELECT * FROM tipo_requerimiento 
						WHERE tr_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta)){
 			$resultado[$indice] = array('tr_codigo' => $row["tr_codigo"], 
 										'tr_nombre' => $row["tr_nombre"],
 										'tr_descrp' => $row["tr_descrp"],
 										'tr_status' => $row["tr_status"]);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}

	public function consultar_registro()
	{
		
		$sql = "SELECT * FROM tipo_requerimiento 
						 WHERE tr_codigo = '".$this->tr_codigo."' and 
							   tr_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['tr_codigo']);
			 $this->setNombre($row['tr_nombre']);
			 $this->setDescrp($row['tr_descrp']);
			 $this->setStatus($row['tr_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function consultar_nombre()
	{
		
		$sql = "SELECT * FROM tipo_requerimiento 
						 WHERE tr_nombre = '".$this->tr_nombre."'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['tr_codigo']);
			 $this->setNombre($row['tr_nombre']);
			 $this->setDescrp($row['tr_descrp']);
			 $this->setStatus($row['tr_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function obtenerCodigo(){
		return $this->getcodigonuevo("tipo_requerimiento","tr_codigo");
	}

	public function incluir()
	{	

	  	$sql= "INSERT into tipo_requerimiento (tr_nombre, 
	  								tr_descrp, 
	  								tr_status) 
	  				values ('".$this->tr_nombre."',
	  					   '".$this->tr_descrp."',
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
				$sql= "UPDATE tipo_requerimiento set tr_nombre='".$nombre."',
										  tr_descrp='".$descrp."' 
									where tr_codigo='".$codigo."'";
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

		$sql= "UPDATE tipo_requerimiento set tr_status='i'
							where tr_codigo='".$this->tr_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}
	
		public function activar(){

		$sql= "UPDATE tipo_requerimiento set tr_status='a'
							where tr_codigo='".$this->tr_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}
}