<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Menuadmin/MenuadminModel.php';
/**
* CONTROLADOR Menu administrador
*/
class MenuadminController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->model = new MenuadminModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}