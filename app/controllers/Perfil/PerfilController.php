<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Home/HomeModel.php';
require_once LIBS_ROUTE .'Session.php';
/**
* CONTROLADOR PERFIL
*/

class PerfilController extends Controller
{
  private $model;
  private $session;

  public function __construct()
  {
   $this->session = new Session();
   $this->session->init();
   if($this->session->getStatus()===1 || empty($this->session->get('u_tipo')))
   {
     header('location: '.FOLDER_PATH.'/errorlogin');
   }
   else
   {
    $this->model = new HomeModel();
   }
  
  }

  public function exec()
  {
    $session = array('u_cedula' => $this->session->get('u_cedula'),
                      'u_nombre' => $this->session->get('u_nombre'),
                      'u_tipo' => $this->session->get('u_tipo'),
                      'u_username' => $this->session->get('u_username'),
                      'u_password' => $this->session->get('u_password'),
                      'u_correo' => $this->session->get('u_correo'));
    $this->render(__CLASS__,$session);
  } 



  public function editar(){
     
     if(isset($_POST["username"])){
        $this->model->setUsername($_POST['username']);
        $this->model->setPassword($_POST['password']);
        $this->model->setCorreo($_POST['correo']);
        
        if ($this->model->modificar()) {
            $response = array('username' => $this->model->getUsername(),
                              'password' => $this->model->getPassword(),
                              'correo' => $this->model->getCorreo());
            echo json_encode($response);          
        }else{
          $response = array('error' => 'Error al modificar.');
          echo json_encode($response);          
        }
      }
  }  
  
}

