<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Estudiante/EstudianteModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Tipodiscapacidad/TipodiscapacidadModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Requerimiento/RequerimientoModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Certificado/CertificadoModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Regimen/RegimenModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Grado/GradoModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR Menu administrador
*/
class EstudianteController extends Controller
{
  private $estudiante;
  private $discapacidad;
  private $requerimiento;
  private $certificado;
  private $regimen;
  private $grado;

  private $registros;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if ($this->session->getStatus() === 1 || empty($this->session->get('u_tipo'))) {
      header('location: '.FOLDER_PATH.'/errorlogin'); //hay que hacer pagina de redireccion al login
    } elseif ($this->session->get('u_tipo')=="administrador") {
      header('location: '.FOLDER_PATH.'/erroraccess');
    } else {
      
    $this->estudiante = new EstudianteModel();
    $this->discapacidad = new TipodiscapacidadModel();
    $this->requerimiento = new RequerimientoModel();
    $this->certificado = new CertificadoModel();
    $this->regimen = new RegimenModel();
    $this->grado = new GradoModel();
    $this->registros=$this->getParams();
    }
 }
  public function getParams(){
  
  $discapacidad = $this->discapacidad->consultar_todos();
  $requerimiento = $this->requerimiento->consultar_todos();
  $regimen = $this->regimen->consultar_todos();
  $grado = $this->grado->consultar_todos();

  $array = array('discapacidad' => $discapacidad,
                 'requerimiento' => $requerimiento,
                 'regimen' => $regimen,
                 'grado' => $grado);
  return $array;
  }

  public function exec()
  {
    $session = array('u_nombre' => $this->session->get('u_nombre'),
                     'u_cedula' => $this->session->get('u_cedula'),
                     'u_tipo' => $this->session->get('u_tipo'));
   	$params=$this->registros;
    $this->render(__CLASS__,$params,$session);
    var_dump($params);
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