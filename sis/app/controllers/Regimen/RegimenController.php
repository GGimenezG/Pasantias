<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Regimen/RegimenModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR Menu administrador
*/
class RegimenController extends Controller
{
  private $model;
  private $registros;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if ($this->session->getStatus() === 1 || empty($this->session->get('u_tipo'))) {
      exit('Debe iniciar session'); //hay que hacer pagina de redireccion al login
    } elseif ($this->session->get('u_tipo')=="administrador") {
      exit('usuario no permitido');
    } else {
      
    $this->model = new RegimenModel();
    $this->registros=$this->model->consultar_todos();
    }
 }

  public function exec()
  {
    $session = array('u_nombre' => $this->session->get('u_nombre'),
                     'u_cedula' => $this->session->get('u_cedula'),
                     'u_tipo' => $this->session->get('u_tipo'));
   	$params=$this->registros;
    $this->render(__CLASS__,$params,$session);
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
  		
        if($this->model->consultar_nombre()){
          $this->model->activar();
            $response = array('activar' => 'activar',
                              'codigo' => $this->model->getCodigo(),
                              'nombre' => $this->model->getNombre(),
                              'descrp' => $this->model->getDescrp());
          echo json_encode($response);
        }else{
          if($this->model->incluir()){
            $response = array('codigo' => $this->model->getCodigo(),
                              'nombre' => $this->model->getNombre(),
                              'descrp' => $this->model->getDescrp());
            echo json_encode($response);
          }
          else{

            $response = array('error' => 'Error al incluir');
            echo json_encode($response);
          }
        }
      }  
  }

  public function editar(){
     
     if(isset($_POST["nombre"])){
        $this->model->setCodigo($_POST['codigo']);
        $this->model->setNombre($_POST['nombre']);
        $this->model->setDescrp($_POST['descrp']);
        
        if ($this->model->modificar()) {
            $response = array('codigo' => $this->model->getCodigo(),
                              'nombre' => $this->model->getNombre(),
                              'descrp' => $this->model->getDescrp());
            echo json_encode($response);          
        }else{
          $response = array('error' => 'Error al modificar registros.');
          echo json_encode($response);          
        }
      }
  }  
  
  public function borrar(){

     if(isset($_POST["codigo"])){
      $this->model->setCodigo($_POST['codigo']);
      if($this->model->eliminar()){
        $response = array('codigo' => $this->model->getCodigo());
        echo json_encode($response);
      }
      else{

        $response = array('error' => 'Error al incluir');
        echo json_encode($response);
      }
     }  
  }
}