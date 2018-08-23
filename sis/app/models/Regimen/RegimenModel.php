<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * 
 */
class RegimenModel extends Model
{
	public $rg_codigo = "";
  	public $rg_nombre = "";
  	public $rg_descrp = "";
  	public $rg_status = "";

	function __construct()
	{
		parent::__construct();
	}

	///////
	// obtener atributo
	///////
	public function getCodigo(){
		return $this->rg_codigo;
	}

	public function getNombre(){
		return $this->rg_nombre;
	}

	public function getDescrp(){
		return $this->rg_descrp;
	}
	public function getStatus(){
		return $this->rg_status;
	}

	//////
	// asignar atributo
	//////
	public function setCodigo($rg_codigo){
		$this->rg_codigo = $rg_codigo;
	}
	public function setNombre($rg_nombre){
		$this->rg_nombre = $rg_nombre;
	}
	public function setDescrp($rg_descrp){
		$this->rg_descrp = $rg_descrp;
	}
	public function setStatus($rg_status){
		$this->rg_status = $rg_status;
	}

	///////
	// Métodos de la clase
	//////

	public function consultar_todos()
	{
		
		$sql = "SELECT * FROM regimen 
						WHERE rg_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta)){
 			$resultado[$indice] = array('rg_codigo' => $row["rg_codigo"], 
 												'rg_nombre' => $row["rg_nombre"],
 												'rg_descrp' => $row["rg_descrp"],
 												'rg_status' => $row["rg_status"]);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}

	public function consultar_registro($rg_codigo)
	{
		
		$sql = "SELECT * FROM regimen 
						 WHERE rg_codigo = '$rg_codigo' and 
							   rg_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['rg_codigo']);
			 $this->setNombre($row['rg_nombre']);
			 $this->setDescrp($row['rg_descrp']);
			 $this->setStatus($row['rg_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function incluir()
	{
	  	$sql= "INSERT into regimen (rg_nombre, 
	  								rg_descrp, 
	  								rg_status) 
	  				values ($this->rg_nombre,
	  						$this->rg_descrp,
	  						'A');
	  						";
	  	$incluir=$this->ejecutar($sql);
	  	return $incluir;
	}

	public function modificar($rg_codigo,$rg_nombre,$rg_descrp)
	{
		$this->consultar_registro($rg_codigo);
		if ($rg_nombre==$this->getNombre() and $rg_descrp==$this->getDescrp()){
			return false;
		}
		else{
			$sql= "UPDATE regimen set rg_nombre='$rg_nombre',
									  rg_descrp='$rg_descrp' 
								where rg_codigo='$rg_codigo'";
	  		$modificar=$this->ejecutar($sql);
	  		return $modificar;
		}

	}

		public function eliminar($rg_codigo)
	{
		$sql= "UPDATE regimen set rg_status='i',
							where rg_codigo='$rg_codigo'";
	  	$eliminar=$this->ejecutar($sql);
	  	return $elimiar;
	}

	
}