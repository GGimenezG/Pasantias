<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class DiscapacidadModel extends Model
{	
	var $d_codigo = "";
	var $e_cedula = "";
	var $td_codigo = "";
	var $g_codigo = "";
	var $rg_codigo = "";
	var $d_duracion = "" ;
	var $d_status = "";
	
	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCodigo(){
		return $this->d_codigo;
	}	
	public function getCedula(){
		return $this->e_cedula;
	}
	public function getTipo(){
		return $this->td_codigo;
	}
	public function getGrado(){
		return $this->g_codigo;
	}
	public function getRegimen(){
		return $this->rg_codigo;
	}

	public function getDuracion(){
		if(!$this->d_duracion==""){
			return $this->d_duracion;
		}else{
			return NULL;
		}
	}
	public function getStatus(){
		return $this->d_status;
	}
	//////
	// asignar atributo
	//////
	public function setCedula($e_cedula){
		$this->e_cedula = $e_cedula;
	}
	public function setTipo($td_codigo){
		$this->td_codigo = $td_codigo;
	}
	public function setGrado($g_codigo){
		$this->g_codigo = $g_codigo;
	}
	public function setRegimen($rg_codigo){
		$this->rg_codigo = $rg_codigo;
	}
	public function setDuracion($d_duracion){
		$this->d_duracion = $d_duracion;
	}
	public function setStatus($d_status){
		$this->d_status = $d_status;
	}
	public function setCodigo($d_codigo){
		$this->d_codigo = $d_codigo;
	}	
	
	///////
	// Métodos de la clase
	//////
	
	///////
	// Métodos de la clase
	//////
	
	public function consultar_discapacidad()
	{

		$sql = "SELECT d_codigo,
					   td_nombre, 
					   g_nombre, 
					   rg_nombre, 
					   d_duracion FROM discapacidad d 
										   			  INNER JOIN tipo_discapacidad td 
										   			  ON d.td_codigo = td.td_codigo 
										   			  INNER JOIN grado g 
										   			  ON d.g_codigo = g.g_codigo 
										   			  INNER JOIN regimen rg 
										   			  ON d.rg_codigo = rg.rg_codigo 
					   			  WHERE d.e_cedula = $this->e_cedula and
							  			d.d_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta)){
 			  if($row["d_duracion"] == "0000-00-00" || $row["d_duracion"] == "1970-01-01" || $row["d_duracion"] == NULL){
                $fecha = "-";
              }else{
                $fecha = date("d-m-Y", strtotime($row["d_duracion"]));
              }
 			$resultado[$indice] = array('d_codigo' => $row["d_codigo"],
 										'td_nombre' => $row["td_nombre"], 
 										'g_nombre' => $row["g_nombre"],
 										'rg_nombre' => $row["rg_nombre"],
 										'd_duracion' => $fecha);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}

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


	public function incluir()
	{	

	  	$sql= "INSERT into discapacidad (e_cedula, 
	  									 td_codigo, 
	  									 g_codigo,
	  									 rg_codigo,
	  									 d_duracion,
	  									 d_status) 
	  				values ('$this->e_cedula',
	  						'$this->td_codigo',
	  						'$this->g_codigo',
	  						'$this->rg_codigo',
							'".$this->getDuracion()."',
	  					   'a')";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}
	  	else{
	  		return false;
	  	}
	  	
	}

	public function obtenerCodigo(){
		return $this->getcodigonuevo("discapacidad","d_codigo");
	}

	public function eliminar(){

		$sql= "UPDATE discapacidad set d_status='i'
							where d_codigo='".$this->d_codigo."'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  		
		}else{
			return false;
		}
	}	

}