<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class TipodiscapacidadModel extends Model
{
	public $td_codigo = "";
  	public $td_nombre = "";
  	public $td_descrp = "";
  	public $td_status = "";



	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCodigo(){
		return $this->td_codigo;
	}

	public function getNombre(){
		return $this->td_nombre;
	}

	public function getDescrp(){
		return $this->td_descrp;
	}
	public function getStatus(){
		return $this->td_status;
	}

	//////
	// asignar atributo
	//////
	public function setCodigo($td_codigo){
		$this->td_codigo = $td_codigo;
	}
	public function setNombre($td_nombre){
		$this->td_nombre = $td_nombre;
	}
	public function setDescrp($td_descrp){
		$this->td_descrp = $td_descrp;
	}
	public function setStatus($td_status){
		$this->td_status = $td_status;
	}

	///////
	// Métodos de la clase
	//////

	public function consultar_todos()
	{
		
		$sql = "SELECT * FROM tipo_discapacidad 
						WHERE td_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta)){
 			$resultado[$indice] = array('td_codigo' => $row["td_codigo"], 
 										'td_nombre' => $row["td_nombre"],
 										'td_descrp' => $row["td_descrp"],
 										'td_status' => $row["td_status"]);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}

	public function consultar_registro()
	{
		
		$sql = "SELECT * FROM tipo_discapacidad 
						 WHERE td_codigo = '".$this->td_codigo."' and 
							   td_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['td_codigo']);
			 $this->setNombre($row['td_nombre']);
			 $this->setDescrp($row['td_descrp']);
			 $this->setStatus($row['td_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function consultar_nombre()
	{
		
		$sql = "SELECT * FROM tipo_discapacidad 
						 WHERE td_nombre = '".$this->td_nombre."'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['td_codigo']);
			 $this->setNombre($row['td_nombre']);
			 $this->setDescrp($row['td_descrp']);
			 $this->setStatus($row['td_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function obtenerCodigo(){
		return $this->getcodigonuevo("tipo_discapacidad","td_codigo");
	}

	public function incluir()
	{	

	  	$sql= "INSERT into tipo_discapacidad (td_nombre, 
	  								td_descrp, 
	  								td_status) 
	  				values ('".$this->td_nombre."',
	  					   '".$this->td_descrp."',
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
				$sql= "UPDATE tipo_discapacidad set td_nombre='".$nombre."',
										  td_descrp='".$descrp."' 
									where td_codigo='".$codigo."'";
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

		$sql= "UPDATE tipo_discapacidad set td_status='i'
							where td_codigo='".$this->td_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}
	
		public function activar(){

		$sql= "UPDATE tipo_discapacidad set td_status='a'
							where td_codigo='".$this->td_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}
}