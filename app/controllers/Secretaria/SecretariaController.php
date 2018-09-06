<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Secretaria/SecretariaModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR Menu Encargado
*/
class SecretariaController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if ($this->session->getStatus() === 1 || empty($this->session->get('u_tipo'))) {
      exit('Debe iniciar session'); //hay que hacer pagina de redireccion al login
    } elseif ($this->session->get('u_tipo')!="secretaria") {
      exit('usuario no permitido');
    } else {
      // $params = array('u_nombre' => $this->session->get('u_nombre'),
      //                 'u_cedula' => $this->session->get('u_cedula'),
      //                 'u_tipo' => $this->session->get('u_tipo'));
       $this->model = new SecretariaModel();
    }  
  }

  public function exec()
  {
    $sesion = array('u_nombre' => $this->session->get('u_nombre'),
                     'u_tipo' => $this->session->get('u_tipo'));
    $this->render(__CLASS__,array(),$sesion);
       
  }
  public function logout(){
    $this->session->close();
     header('location: '.FOLDER_PATH.'/home');
  }
  
  
}