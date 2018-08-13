<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/HomeModel.php';
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
  }

  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function login($request_params)
  {
    if($this->model->login($request_params['u_username'],$request_params['u_password'])){
      if ($this->u_tipo="administrador") {
          echo '<script>alert("administrador log") </script>';
          //header('location: /sis/administrador');
      }
     
    }
  }
}