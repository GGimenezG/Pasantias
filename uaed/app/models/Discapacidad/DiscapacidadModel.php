<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class DiscapacidadModel extends Model
{
	var $e_cedula = 0;
	var $td_codigo = 0;
	var $g_codigo = 0;
	var $rg_codigo = 0;
	var $d_duracion = "" ;
	var $d_status = "";
	
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
		return $this->d_duracion;
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
	
	///////
	// Métodos de la clase
	//////
	
	///////
	// Métodos de la clase
	//////
	
	public function consultar_discapacidad()
	{

		$sql = "SELECT td_nombre, 
					   g_nombre, 
					   rg_nombre, 
					   d_duracion FROM discapacidad d 
										   			  INNER JOIN tipo_discapacidad td 
										   			  ON d.td_codigo = td.td_codigo 
										   			  INNER JOIN grado g 
										   			  ON d.g_codigo = g.g_codigo 
										   			  INNER JOIN regimen rg 
										   			  ON d.rg_codigo = rg.rg_codigo 
					   			  WHERE d.e_cedula = $this->e_cedula,
							  			d.d_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta)){
 			$resultado[$indice] = array('td_nombre' => $row["td_nombre"], 
 										'g_nombre' => $row["g_nombre"],
 										'rg_nombre' => $row["rg_nombre"],
 										'd_duracion' => $row["d_duracion"]);
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
	  				values ($this->e_cedula,
	  						'$this->td_codigo',
	  						'$this->g_codigo',
	  						'$this->rg_codigo',
							$this->d_duracion,
	  					   'a')";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}
	  	else{
	  		return false;
	  	}
	  	
	}

}