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
    $this->model = new AdministradorModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}