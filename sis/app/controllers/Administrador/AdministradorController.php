<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Administrador/AdministradorModel.php';
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
      exit('Debe iniciar session'); //hay que hacer pagina de redireccion al login
    } elseif ($this->session->get('u_tipo')!="administrador") {
      exit('usuario no permitido');
    } else {

      $this->model = new AdministradorModel();
    }
    
    
  }

  public function exec()
  {
    $session = array('u_nombre' => $this->session->get('u_nombre'),
                     'u_tipo' => $this->session->get('u_tipo'));
    $this->render(__CLASS__,array(),$session);
    var_dump($session);
    
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