<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH. '/app/models/Home/HomeModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR HOME - LOGIN 
*/
class HomeController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new HomeModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  public function login()
  {
    $this->model->setUsername($_POST['u_username']);
    $this->model->setPassword($_POST['u_password']);
    
    if($this->model->verificar()){
      
      //iniciamos sesion 
      $this->session->init();
      $this->session->add('u_nombre', $this->model->getNombre());
      $this->session->add('u_cedula', $this->model->getCedula());
      $this->session->add('u_tipo', $this->model->getTipo());
      
      if ($this->session->get('u_tipo') == "administrador") {       
        header('location: '.FOLDER_PATH.'/administrador');
      }elseif ($this->session->get('u_tipo') == "encargado") {
        header('location: '.FOLDER_PATH.'/encargado');
      }elseif ($this->session->get('u_tipo') == "secretaria") {
        header('location: '.FOLDER_PATH.'/secretaria');
      }  
      
     
    }else{
      header('location: /sis/');
    }
  }
  public function registrar(){
    $this->model->setUsername($_POST['u_username']);
    $this->model->setPassword($_POST['u_password']);
    $this->model->setCorreo($_POST['u_correo']);
    $this->model->setCedula($_POST['u_cedula']);
    $this->model->setNombre($_POST['u_nombre']);
    $this->model->setTipo($_POST['u_tipo']);
    
    if ($this->model->chequear()){
      if($this->model->registrar()){
        $this->login($request_params);
      }else{
        return false;
      }
    }else{
      return false;
    }
    
  }


}