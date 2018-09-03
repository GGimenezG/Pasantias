<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH. '/app/models/Administrador/AdministradorModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR Menu administrador
*/
class AdministradorController extends Controller
{
  private $model;
  private $session;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if ($this->session->getStatus() === 1 || empty($this->session->get('u_tipo'))) {
      header('location: '.FOLDER_PATH.'/errorlogin'); 
    } elseif ($this->session->get('u_tipo')!="administrador") {
      header('location: '.FOLDER_PATH.'/erroraccess');
    } else {

      $this->model = new AdministradorModel();
    }
    
    
  }

  public function exec()
  {
    $sesion = array('u_nombre' => $this->session->get('u_nombre'),
                     'u_tipo' => $this->session->get('u_tipo'));
    $this->render(__CLASS__,array(),$sesion);
    var_dump($sesion);
    
  }

  public function logout(){
    $this->session->close();
     header('location: /sis/home');
  }
    public function usuario(){
    $usuario = array('usuario' => $this->session->get('u_nombre'));
    echo json_encode($usuario);
  }
  
}