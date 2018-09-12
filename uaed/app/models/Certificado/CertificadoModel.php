<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * 
 */
class CertificadoModel extends Model
{
	
	public $c_codigo = "";
	public $c_emision = "";
	public $c_vencimiento = "";
	public $c_status = "";

	function __construct()
	{
		parent::__construct();
	}

	public function getCodigo()
	{
		return $this->c_codigo;
	}

	public function getEmision()
	{
		return $this->c_emision;
	}

	public function getVencimiento()
	{
		return $this->c_vencimiento;
	}

	public function getStatus()
	{
		return $this->c_status;
	}

	//Setters:

	public function setCodigo ($c_codigo)
	{
		$this->c_codigo = $c_codigo;
	}

	public function setEmision ($c_emision)
	{
		$this->c_emision = $c_emision;
	}

	public function setVencimiento ($c_vencimiento)
	{
		$this->c_vencimiento = $c_vencimiento;
	}

	public function setStatus ($c_status)
	{
		$this->c_status = $c_status;
	}

	//Métodos:



	public function consultar_registro()
	{
		
		$sql = "SELECT * FROM certificado
						 WHERE c_codigo = $this->c_codigo and 
							   c_status = 'a'";
 		$consulta = $this->select($sql);
 
 		if($row = $this->hay_registro($consulta))
 		{
			 $this->setEmision($row['c_emision']);
			 $this->setVencimiento($row['c_vencimiento']);
			 $this->setStatus($row['c_status']);
 			return true;	
 		}
 		else
 		{
			return false;
 		}
	}

	public function incluir()
	{
	  	$sql= "INSERT into certificado (c_codigo, 
	  								c_emision,
	  								c_vencimiento, 
	  								c_status) 
	  				values ('$this->c_codigo',
	  						'$this->c_emision',
	  						'$this->c_vencimiento',
	  						'a')";
	  	$incluir=$this->ejecutar($sql);
	  	return $incluir;
	}


	public function modificar()
	{
		$sql= "UPDATE certificado set c_emision='$this->c_emision',
									  c_vencimiento='$this->c_vencimiento' 
								where c_codigo='$this->c_codigo'";
	  	if($this->ejecutar($sql)){
	  		return true;
	  	}else{
	  		return false;
	  	}
	}


	public function eliminar($c_codigo)
	{
		$sql= "UPDATE certificado set c_status='i',
							where c_codigo='$c_codigo'";
	  	$eliminar=$this->ejecutar($sql);
	  	return $elimiar;
	}

}