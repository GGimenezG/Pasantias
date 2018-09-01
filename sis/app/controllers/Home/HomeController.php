<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Home/HomeModel.php';
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

  public function login($request_params)
  {
    
    if($this->model->verificar($request_params['u_username'],$request_params['u_password'])){
      
      //iniciamos sesion 
      $this->session->init();
      $this->session->add('u_nombre', $this->model->u_nombre);
      $this->session->add('u_cedula', $this->model->u_cedula);
      $this->session->add('u_tipo', $this->model->u_tipo);
      
      if ($this->session->get('u_tipo') == "administrador") {       
        header('location: /sis/administrador');
      }elseif ($this->session->get('u_tipo') == "encargado") {
        header('location: /sis/encargado');
      }elseif ($this->session->get('u_tipo') == "secretaria") {
        header('location: /sis/secretaria');
      }  
      
     
    }else{
      header('location: /sis/');
    }
  }


}