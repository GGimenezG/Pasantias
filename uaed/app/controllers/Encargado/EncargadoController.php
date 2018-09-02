<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Encargado/EncargadoModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR Menu Encargado
*/
class EncargadoController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if ($this->session->getStatus() === 1 || empty($this->session->get('u_tipo'))) {
      exit('Debe iniciar session'); //hay que hacer pagina de redireccion al login
    } elseif ($this->session->get('u_tipo')!="encargado") {
      exit('usuario no permitido');
    } else {
      // $params = array('u_nombre' => $this->session->get('u_nombre'),
      //                 'u_cedula' => $this->session->get('u_cedula'),
      //                 'u_tipo' => $this->session->get('u_tipo'));
      $this->model = new EncargadoModel();
    }
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}