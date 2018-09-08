<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class ArticuloModel extends Model
{
	
	public $a_codigo = "";
	public $a_nombre = "";
	public $a_descrp = "";
	public $a_cantidad = "";
	public $a_tipoart = "";
	public $a_status = "";

	function __construct()
	{
		parent::__construct();
	}

	public function getCodigo()
	{
		return $this->a_codigo;
	}

	public function getNombre()
	{
		return $this->a_nombre;
	}

	public function getDescrip()
	{
		return $this->a_descrp;
	}

	public function getCant()
	{
		return $this->a_cantidad;
	}

	public function getTipo()
	{
		return $this->a_tipoart;
	}

	public function getStatus()
	{
		return $this->a_status;
	}

	//Setters:

	public function setCodigo ($a_codigo)
	{
		$this->a_codigo = $a_codigo;
	}

	public function setNombre ($a_nombre)
	{
		$this->a_nombre = $a_nombre;
	}

	public function setDescrip ($a_descrp)
	{
		$this->a_descrp = $a_descrp;
	}

	public function setCant($a_cantidad)
	{
		$this->a_cantidad = $a_cantidad;
	}

	public function setTipo($a_tipoart)
	{
		$this->a_tipoart = $a_tipoart;
	}

	public function setStatus ($a_status)
	{
		$this->a_status = $a_status;
	}

	//Métodos:

	public function consultar_todos()
	{
		
		$sql = "SELECT * FROM articulo 
						WHERE a_status = 'a'";
 		$consulta = $this->select($sql);
 		$indice = 0;
 		while($row = $this->registros($consulta))
 		{
 			$resultado[$indice] = array('a_codigo' => $row["a_codigo"], 
 										'a_nombre' => $row["a_nombre"],
 										'a_descrp' => $row["a_descrp"],
 										'a_cantidad' => $row["a_cantidad"],
 										'a_tipoart' => $row["a_tipoart"],
 										'a_status' => $row["a_status"]);
 			$indice = $indice + 1;
 		}
 		return $resultado;
 		
	}

	public function consultar_registro($a_codigo)
	{
		
		$sql = "SELECT * FROM articulo
						 WHERE a_codigo = '$a_codigo' and 
							   a_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setCodigo($row['a_codigo']);
			 $this->setNombre($row['a_nombre']);
			 $this->setDescrip($row['a_descrp']);
			 $this->setCant($row['a_cantidad']);
			 $this->setTipo($row['a_tipoart']);
			 $this->setStatus($row['a_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function incluir()
	{
	  	$sql= "INSERT into articulo (a_codigo, 
	  								a_nombre,
	  								a_descrp,
	  								a_cantidad,
	  								a_tipoart, 
	  								a_status) 
	  				values ($this->a_codigo,
	  						$this->a_nombre,
	  						$this->a_descrp,
	  						$this->a_cantidad,
	  						$this->a_tipoart,
	  						'A');
	  						";
	  	$incluir=$this->ejecutar($sql);
	  	return $incluir;
	}


	public function modificar($a_codigo,$a_nombre,$a_descrp, $a_cantidad, $a_tipoart)
	{
		$this->consultar_registro($a_codigo);
		if ($a_nombre==$this->getNombre() and $a_descrp==$this->getDescrip() and $a_cantidad==$this->getCant() and $a_tipoart==$this->getTipo())
		{
			return false;
		}
		else
		{
			$sql= "UPDATE articulo set a_nombre='$a_nombre',
									  a_descrp='$a_descrp',
									  a_cantidad='$a_cantidad',
									  a_tipoart='$a_tipoart' 
								where a_codigo='$a_codigo'";
	  		$modificar=$this->ejecutar($sql);
	  		return $modificar;
		}

	}

	public function eliminar($a_codigo)
	{
		$sql= "UPDATE articulo set a_status='i',
							where a_codigo='$a_codigo'";
	  	$eliminar=$this->ejecutar($sql);
	  	return $elimiar;
	}

}