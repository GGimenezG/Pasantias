<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Admin/AdminModel.php';
/**
* CONTROLADOR Menu administrador
*/
class AdminController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new AdminModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}