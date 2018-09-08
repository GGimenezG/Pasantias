<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class TipoarticuloModel extends Model
{

	public $ta_codigo = "";
	public $ta_nombre = "";
	public $ta_descrp = "";
	public $ta_status = "";


	function __construct()
	{
		parent::__construct();
	}

	public function getCodigo(){
		return $this->ta_codigo;
	}

	public function getNombre(){
		return $this->ta_nombre;
	}

	public function getDescrp(){
		return $this->ta_codigo;
	}

	public function getStatus(){
		return $this->ta_status;
	}

	public function setCodigo(){
		$this->ta_codigo = $ta_codigo;
	}

	public function setNombre(){
		$this->ta_nombre = $ta_nombre;
	}

	public function setDescrp(){
		$this->ta_descrp = $ta_descrp;
	}

	public function setStatus(){
		$this->ta_status = $ta_status;
	}

	//Métodos:

	public function consultar_todos()
	{
		
		$sql = "SELECT * FROM tipo_articulo 
						WHERE ta_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta))
 		{
 			$resultado[$indice] = array('ta_codigo' => $row["ta_codigo"], 
 										'ta_nombre' => $row["ta_nombre"],
 										'ta_descrp' => $row["ta_descrp"],
 										'ta_status' => $row["ta_status"]);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}

	public function consultar_registro($ta_codigo)
	{
		
		$sql = "SELECT * FROM tipo_articulo
						 WHERE ta_codigo = '$ta_codigo' and 
							   ta_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['ta_codigo']);
			 $this->setNombre($row['ta_nombre']);
			 $this->setDescrip($row['ta_descrp']);
			 $this->setStatus($row['ta_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function incluir()
	{
	  	$sql= "INSERT into tipo_articulo (ta_codigo, 
	  								ta_nombre,
	  								ta_descrp,
	  								ta_status) 
	  				values ($this->ta_codigo,
	  						$this->ta_nombre,
	  						$this->ta_descrp,
	  						'A');
	  						";
	  	$incluir=$this->ejecutar($sql);
	  	return $incluir;
	}


	public function modificar($ta_codigo,$ta_nombre,$ta_descrp)
	{
		$this->consultar_registro($ta_codigo);
		if ($ta_nombre==$this->getNombre() and $ta_descrp==$this->getDescrip())
		{
			return false;
		}
		else
		{
			$sql= "UPDATE tipo_articulo set ta_nombre='$ta_nombre',
									  ta_descrp='$ta_descrp',
								where ta_codigo='$ta_codigo'";
	  		$modificar=$this->ejecutar($sql);
	  		return $modificar;
		}

	}

	public function eliminar($ta_codigo)
	{
		$sql= "UPDATE tipo_articulo set ta_status='i',
							where ta_codigo='$ta_codigo'";
	  	$eliminar=$this->ejecutar($sql);
	  	return $elimiar;
	}


}