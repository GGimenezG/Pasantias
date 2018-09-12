<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Estudiante/EstudianteModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/EstudianteDiscapacidad/EstudianteDiscapacidadModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/EstudianteRequerimiento/EstudianteRequerimientoModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Tipodiscapacidad/TipodiscapacidadModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Discapacidad/DiscapacidadModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Requerimiento/RequerimientoModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Certificado/CertificadoModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Regimen/RegimenModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Grado/GradoModel.php';
require_once ROOT . FOLDER_PATH . '/fpdf/fpdf.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR Menu administrador
*/
class EstudianteController extends Controller
{
  private $estudiante;
  private $estudiante_discapacidad;
  private $estudiante_requerimiento;  
  private $discapacidad;
  private $tdiscapacidad;
  private $requerimiento;
  private $certificado;
  private $regimen;
  private $grado;
  private $pdf;

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
    $this->estudiante_discapacidad = new EstudianteDiscapacidadModel();
    $this->estudiante_requerimiento = new EstudianteRequerimientoModel();
    $this->discapacidad = new DiscapacidadModel();
    $this->tdiscapacidad = new TipodiscapacidadModel();
    $this->requerimiento = new RequerimientoModel();
    $this->certificado = new CertificadoModel();
    $this->regimen = new RegimenModel();
    $this->grado = new GradoModel();
    $this->pdf = new FPDF();
    $this->registros=$this->getParams();
    }
 }

  //metodo para llenar los select al cargar la vista
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
    $estudiante_discapacidad = $this->estudiante_discapacidad;
    $estudiante_requerimiento = $this->estudiante_requerimiento;
    $certificado = $this->certificado;
    $discapacidad = $this->discapacidad;

    //comprobamos que la cedula se pase como parametro POST
    if (isset($_POST['e_cedula'])) {
      // hacemos los set de cedula correspondiente en los modelos estudiante y estudiante_discapacidad
      $estudiante->setCedula($_POST['e_cedula']);
      $estudiante_discapacidad->setCedula($_POST['e_cedula']);
      $estudiante_requerimiento->setCedula($_POST['e_cedula']);
      // comprobamos que el estudiante exista en la BD
      if ($estudiante->consultar_registro()) {
          // consultamos si el estudiante ya esta registrado con alguna discapacidad
          if($estudiante_discapacidad->consultar_estudiante()){
            $certificado->setCodigo($estudiante_discapacidad->getCodigo());
            // Consultamos los datos del certificado
            if($certificado->consultar_registro()){
              if($certificado->getCodigo() == 0){
                //si el estudiante no posee codigo se le asigna el 0
                $c_vencimiento = "-";
                $c_emision = "-";
              }else{
                //hacemos la conversion de la fecha a formato local
                $c_emision = date("d-m-Y", strtotime($certificado->getEmision()));
                $c_vencimiento = date("d-m-Y", strtotime($certificado->getVencimiento()));
              }
            }
            // le asignamos valor a cedula de estudante en el modelo discpacidad            
            $discapacidad->setCedula($estudiante_discapacidad->getCedula());
            //preguntamos si hay registros para poder devolver el arreglo disc con datos o vacio
            if ($discapacidad->consultar_registro()){
              $disc =  $discapacidad->consultar_discapacidad();
            }else{
              $disc = array();
            }
            //preguntamos si hay registros para poder devolver el arreglo req con datos o vacio
            if ($estudiante_requerimiento->consultar_estudiante()) {
              $req = $estudiante_requerimiento->consultar_requerimiento_estudiante();
            }else{
              $req = array();
            }
            // si existe un estudiante asociado a una discapacidad devuelve todos los datos
            $response = array('e_nombre' => $estudiante->getNombre(),
                              'e_apellido' => $estudiante->getApellido(),
                              'e_lapso' => $estudiante->getLapso(),
                              'e_decanato' => $estudiante->getDecanato(),
                              'e_carrera' => $estudiante->getCarrera(),
                              'e_semestre' => $estudiante->getSemestre(),
                              'c_codigo' => $certificado->getCodigo(),
                              'c_emision' => $c_emision,
                              'c_vencimiento' => $c_vencimiento,
                              'discapacidad' => $disc,
                              'requerimiento' => $req);
            echo json_encode($response, JSON_UNESCAPED_UNICODE);  
          }else{
            // si existe el estudiante pero no tiene una discapacidad devuelve el siguiente arreglo
            $response = array('e_nombre' => $estudiante->getNombre(),
                              'e_apellido' => $estudiante->getApellido(),
                              'e_lapso' => $estudiante->getLapso(),
                              'e_decanato' => $estudiante->getDecanato(),
                              'e_carrera' => $estudiante->getCarrera(),
                              'e_semestre' => $estudiante->getSemestre());
            echo json_encode($response, JSON_UNESCAPED_UNICODE);              
          }
      }else{
          $response = array('error' => 'La cédula no corresponde a un estudiante.');
          echo json_encode($response, JSON_UNESCAPED_UNICODE);        
      }
    }
  }

  public function consultar_certificado(){
    $estudiante = $this->estudiante;
    $estudiante_discapacidad = $this->estudiante_discapacidad;
    $estudiante_requerimiento = $this->estudiante_requerimiento;
    $certificado = $this->certificado;
    $discapacidad = $this->discapacidad;

    //comprobamos que el codigo del certificado se pase como parametro POST
    if (isset($_POST['c_codigo']) || $_POST['c_codigo'] != "") {
      // hacemos los set de codigo correspondiente en los modelos certificado y estudiante_discapacidad
      $certificado->setCodigo($_POST['c_codigo']);
      $estudiante_discapacidad->setCodigo($_POST['c_codigo']);
      // comprobamos que el certificado exista en la BD
      if ($_POST['c_codigo']!="0"){
        if ($certificado->consultar_registro()) {
            // consultamos si el certificado ya esta registrado con alguna discapacidad
            if($estudiante_discapacidad->consultar_certificado()){
              $estudiante->setCedula($estudiante_discapacidad->getCedula());
              // Consultamos los datos del estudiante por regla si existe certificado hay un estudiante
              
              $estudiante->consultar_registro();

              //hacemos la conversion de la fecha a formato local
              $c_emision = date("d-m-Y", strtotime($certificado->getEmision()));
              $c_vencimiento = date("d-m-Y", strtotime($certificado->getVencimiento()));
              // le asignamos valor a cedula de estudante en el modelo discpacidad            
              $discapacidad->setCedula($estudiante_discapacidad->getCedula());
              //preguntamos si hay registros para poder devolver el arreglo disc con datos o vacio
              if ($discapacidad->consultar_registro()){
                $disc =  $discapacidad->consultar_discapacidad();
              }else{
                $disc = array();
              }
              //preguntamos si hay registros para poder devolver el arreglo req con datos o vacio
              $estudiante_requerimiento->setCedula($estudiante->getCedula());
              if ($estudiante_requerimiento->consultar_estudiante()) {
                $req = $estudiante_requerimiento->consultar_requerimiento_estudiante();
              }else{
                $req = array();
              }
              // si existe un estudiante asociado a una discapacidad devuelve todos los datos
             
              $response = array('e_cedula' => $estudiante->getCedula(),
                                'e_nombre' => $estudiante->getNombre(),
                                'e_decanato' => $estudiante->getDecanato(),
                                'e_carrera' => $estudiante->getCarrera(),
                                'e_semestre' => $estudiante->getSemestre(),
                                'c_emision' => $c_emision,
                                'c_vencimiento' => $c_vencimiento,
                                'discapacidad' => $disc,
                                'requerimiento' => $req);
              echo json_encode($response, JSON_UNESCAPED_UNICODE);  
            }
        }else{
          
            $response = array('error' => 'La certificado no corresponde a un estudiante.');
            echo json_encode($response, JSON_UNESCAPED_UNICODE);        
        }
      }else{
        
          $response = array('error' => 'El certificado debe ser distinto de 0');
          echo json_encode($response, JSON_UNESCAPED_UNICODE);  
      }
    }    
  }


  public function registrar_discapacidad(){
    $discapacidad = $this->discapacidad;
    $tdiscapacidad = $this->tdiscapacidad;
    $regimen = $this->regimen;
    $grado = $this->grado;  

    if((isset($_POST['td_codigo']) || $_POST['td_codigo'] != "") && (isset($_POST['g_codigo']) || $_POST['g_codigo'] != "") && (isset($_POST['rg_codigo']) || $_POST['rg_codigo'] != "") && (isset($_POST['e_cedula']) || $_POST['e_cedula'] != "")){
      //hacemos el registro del nuevo tipo de discapacidad asociado a un estudiante
      $discapacidad->setCedula($_POST['e_cedula']);
      $discapacidad->setRegimen($_POST['rg_codigo']);
      $discapacidad->setGrado($_POST['g_codigo']);
      $discapacidad->setTipo($_POST['td_codigo']);
      
      if($_POST['d_duracion']=="" || $_POST['d_duracion']==NULL){
        $discapacidad->setDuracion(null);
      }else{
        $discapacidad->setDuracion(date("Y-m-d", strtotime($_POST['d_duracion'])));  
      }
      
      #$discapacidad->setDuracion(date("Y-m-d",$_POST['d_duracion']));

      if ($discapacidad->incluir()) {
        //retornamos el array con los datos necesarios para insertarlos en la tabla
        $regimen->setCodigo($_POST['rg_codigo']);
        $grado->setCodigo($_POST['g_codigo']);
        $tdiscapacidad->setCodigo($_POST['td_codigo']);
        if ($regimen->consultar_registro() && $grado->consultar_registro() && $tdiscapacidad->consultar_registro()) {
          //constuimos el array
          $duracion = "";
          if(date("d-m-Y", strtotime($discapacidad->getDuracion()))=='01-01-1970'){
            $duracion=null;
          }else{
            $duracion = date("d-m-Y", strtotime($discapacidad->getDuracion()));
          }

          $response = array('d_codigo' => $discapacidad->obtenerCodigo(),
                            'td_nombre' => $tdiscapacidad->getNombre(),
                            'g_nombre' => $grado->getNombre(),
                            'rg_nombre' => $regimen->getNombre(),
                            'd_duracion' => $duracion);
          echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        else{
          $response = array('error' => 'Error al recibir datos');
          echo json_encode($response);
        }

      }else{
          $response = array('error' => 'Error al incluir datos');
          echo json_encode($response);
      }

    }else{
          $response = array('error' => 'peticion incorrecta');
          echo json_encode($response);      
    }
  }

  public function registrar_requerimiento(){
    $estudiante_requerimiento = $this->estudiante_requerimiento;
    $requerimiento = $this->requerimiento;
    

    if((isset($_POST['r_codigo']) || $_POST['r_codigo'] != "") && (isset($_POST['e_cedula']) || $_POST['e_cedula'] != "")){
      //hacemos el registro del nuevo tipo de discapacidad asociado a un estudiante
      $estudiante_requerimiento->setCedula($_POST['e_cedula']);
      $estudiante_requerimiento->setRequerimiento($_POST['r_codigo']);

      if ($estudiante_requerimiento->incluir()) {
        //retornamos el array con los datos necesarios para insertarlos en la tabla
        $requerimiento->setCodigo($_POST['r_codigo']);

        if ($requerimiento->consultar_registro()) {
          //constuimos el array
          $response = array('er_codigo' => $estudiante_requerimiento->obtenerCodigo(),
                            'r_nombre' => $requerimiento->getNombre());
          echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        else{
          $response = array('error' => 'Error al recibir datos');
          echo json_encode($response);
        }

      }else{
          $response = array('error' => 'Error al incluir datos del requerimiento');
          echo json_encode($response);
      }

    }else{
          $response = array('error' => 'peticion incorrecta');
          echo json_encode($response);      
    }
  }


  public function eliminar_discapacidad(){
    $discapacidad = $this->discapacidad;
    if(isset($_POST["codigo"])){
      $discapacidad->setCodigo($_POST['codigo']);
      if($discapacidad->eliminar()){
        $response = array('success' => $discapacidad->getCodigo());
        echo json_encode($response);
      }
      else{

        $response = array('error' => 'No se ha podido eliminar el registro');
        echo json_encode($response);
      }
     }  
  }
    public function eliminar_requerimiento(){
    $estudiante_requerimiento = $this->estudiante_requerimiento;
    if(isset($_POST["codigo"])){
      $estudiante_requerimiento->setCodigo($_POST['codigo']);
      if($estudiante_requerimiento->eliminar()){
        $response = array('success' => $estudiante_requerimiento->getCodigo());
        echo json_encode($response);
      }
      else{

        $response = array('error' => 'No se ha podido eliminar el registro');
        echo json_encode($response);
      }
     }  
  }

  public function incluir_estudiante_disc(){
     $estudiante = $this->estudiante;
     $estudiante_discapacidad = $this->estudiante_discapacidad;
     $certificado = $this->certificado;

     if(isset($_POST["e_cedula"]) && !empty($_POST['e_cedula']) && isset($_POST['c_codigo'])){
        $estudiante_discapacidad->setCedula($_POST['e_cedula']);

        if($estudiante_discapacidad->consultar_estudiante()){
          if ($estudiante_discapacidad->getCodigo()=="0" && $_POST['c_codigo']!="0") {
            $estudiante_discapacidad->setCodigo($_POST['c_codigo']);
            $certificado->setCodigo($_POST['c_codigo']);
            $certificado->setEmision(date("Y-m-d", strtotime($_POST['c_emision'])));
            $certificado->setVencimiento(date("Y-m-d", strtotime($_POST['c_vencimiento'])));            
            if($certificado->incluir() && $estudiante_discapacidad->modificar()){
              $response = array('success' => 'El registro ha sido modificado exitosamente');
              echo json_encode($response);               
            }else{
            $response = array('error' => 'no se ha modificado el certificado');
            echo json_encode($response);            
            }
          }elseif (($estudiante_discapacidad->getCodigo()!="0" && $_POST['c_codigo']!="0") && ($estudiante_discapacidad->getCodigo()==$_POST['c_codigo'])) {
            $certificado->setEmision(date("Y-m-d", strtotime($_POST['c_emision'])));
            $certificado->setVencimiento(date("Y-m-d", strtotime($_POST['c_vencimiento'])));
            if($certificado->modificar()){
              $response = array('success' => 'El registro ha sido modificado exitosamente');
              echo json_encode($response);  
            }else{
              $response = array('error' => 'no se ha modificado el certificado');
              echo json_encode($response);              
            } 
          }else{
            $response = array('error' => 'no se ha modificado el certificado');
            echo json_encode($response);
          }
        }else{
            
            if($_POST['c_codigo']=="0"){
              $estudiante_discapacidad->setCodigo($_POST['c_codigo']);
              if($estudiante_discapacidad->incluir()){
                $response = array('success' => 'Registro incluido correctamente');
                echo json_encode($response);
              }else{
                $response = array('error' => 'No se ha podido incluir el registro correctamente');
                echo json_encode($response);          
              } 
            }else{
              $estudiante_discapacidad->setCodigo($_POST['c_codigo']);
              $certificado->setCodigo($_POST['c_codigo']);
              $certificado->setEmision(date("Y-m-d", strtotime($_POST['c_emision'])));
              $certificado->setVencimiento(date("Y-m-d", strtotime($_POST['c_vencimiento'])));
              if($certificado->incluir() && $estudiante_discapacidad->incluir()){
                $response = array('success' => 'ok');
                echo json_encode($response);
              }else{
                $response = array('error' => 'No se ha podido incluir el registro correctamente');
                echo json_encode($response);          
              }              
            }
        }
    }
  }
}