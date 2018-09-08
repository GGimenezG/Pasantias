<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Estudiante/EstudianteModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Tipodiscapacidad/TipodiscapacidadModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Discapacidad/DiscapacidadModel.php';
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
  private $tdiscapacidad;
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
    $this->discapacidad = new DiscapacidadModel();
    $this->tdiscapacidad = new TipodiscapacidadModel();
    $this->requerimiento = new RequerimientoModel();
    $this->certificado = new CertificadoModel();
    $this->regimen = new RegimenModel();
    $this->grado = new GradoModel();
    $this->registros=$this->getParams();
    }
 }
  public function getParams(){
  
  $tdiscapacidad = $this->tdiscapacidad->consultar_todos();
  $requerimiento = $this->requerimiento->consultar_todos();
  $regimen = $this->regimen->consultar_todos();
  $grado = $this->grado->consultar_todos();

  $array = array('discapacidad' => $tdiscapacidad,
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
 
  } 

  public function codigo(){
  	$codigo = $this->model->obtenerCodigo(); 
  	echo $codigo;
  }

  //muestra los datos del estudiante al hacer click en el acordion de estudiante
  public function consultar_estudiante(){
    $estudiante = $this->estudiante;
    if (isset($_POST['e_cedula'])) {
      $estudiante->setCedula($_POST['e_cedula']);

      if ($estudiante->consultar_registro()) {
          $response = array('e_nombre' => $estudiante->getNombre(),
                            'e_decanato' => $estudiante->getDecanato(),
                            'e_carrera' => $estudiante->getCarrera(),
                            'e_semestre' => $estudiante->getSemestre());
          $arrayName = array('hola' => 'hola' );
          echo json_encode($response, JSON_UNESCAPED_UNICODE);        
      }else{
          $response = array('error' => 'Error al recibir datos');
          echo json_encode($response);        
      }
    }
  }

  public function registrar_discapacidad(){
    $discapacidad = $this->discapacidad;
    $tdiscapacidad = $this->tdiscapacidad;
    $requerimiento = $this->requerimiento;
    $regimen = $this->regimen;
    $grado = $this->grado;  

    if(isset($_POST['td_codigo']) && isset($_POST['g_codigo']) && isset($_POST['rg_codigo']) && isset($_POST['e_cedula'])){
      //hacemos el registro del nuevo tipo de discapacidad asociado a un estudiante
      $discapacidad->setRegimen($_POST['rg_codigo']);
      $discapacidad->setGrado($_POST['g_codigo']);
      $discapacidad->setTipo($_POST['td_codigo']);
      $discapacidad->setDuracion($_POST['d_duracion']);
      if ($discapacidad->incluir()) {
        //retornamos el array con los datos necesarios para insertarlos en la tabla
        $regimen->setCodigo($_POST['rg_codigo']);
        $grado->setCodigo($_POST['g_codigo']);
        $tdiscapacidad->setCodigo($_POST['td_codigo']);
        if ($regimen->consultar_registro() && $grado->consultar_registro() && $tdiscapacidad->consultar_registro()) {
          //constuimos el array
          $response = array('td_nombre' => $tdiscapacidad->getNombre(),
                            'g_nombre' => $grado->getNombre(),
                            'rg_nombre' => $regimen->getNombre(),
                            'd_duracion' => $discapacidad->getDuracion());
          echo json_encode($response);
        }
        else{
          $response = array('error' => 'Error al recibir datos');
          echo json_encode($response);
        }

      }else{
          $response = array('error' => 'Error al incluir datos');
          echo json_encode($response);
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