<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Regimen/RegimenModel.php';
/**
* CONTROLADOR Menu administrador
*/
class RegimenController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->model = new RegimenModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}