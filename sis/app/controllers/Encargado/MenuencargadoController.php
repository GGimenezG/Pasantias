<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Menuencargado/MenuencargadoModel.php';
/**
* CONTROLADOR Menu Encargado
*/
class MenuencargadoController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->model = new MenuencargadoModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}