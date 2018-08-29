<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Regimen/RegimenModel.php';
/**
* CONTROLADOR Menu administrador
*/
class RegimenController extends Controller
{
  private $model;
  private $registros;

  public function __construct()
  {
    $this->model = new RegimenModel();

    $this->registros=$this->model->consultar_todos();

 }

  public function exec()
  {
 

  	$params=$this->registros;
    $this->render(__CLASS__,$params);

    
  } 

  public function codigo(){
  	$codigo = $this->model->obtenerCodigo(); 
  	echo $codigo;
  }

  public function registrar(){
  	 if(isset($_POST["nombre"])){
  	 	$this->model->setCodigo($_POST['codigo']);
  	 	$this->model->setNombre($_POST['nombre']);
  		$this->model->setDescrp($_POST['descrp']);
  		if($this->model->incluir()){
  			$response = array('codigo' => $this->model->getCodigo(),
  							  'nombre' => $this->model->getNombre(),
  							  'descrp' => $this->model->getDescrp());
  			echo json_encode($response);
  		}
  		else{
  			// $response = array('codigo' => $this->model->getCodigo(),
  			// 				  'nombre' => $this->model->getNombre(),
  			// 				  'descrp' => $this->model->getDescrp());
  			// echo json_encode($response);  			
  			$response = array('error' => 'Error al incluir');
  			echo json_encode($response);
  		}

  	 }  
  	// $this->model->setNombre($request_params['nombre']);
  	// $this->model->setDescrp($request_params['descrp']);
  	// $incluir=$this->model->incluir();
  	// var_dump($incluir);
  	// return json_encode($incluir);
  }
}