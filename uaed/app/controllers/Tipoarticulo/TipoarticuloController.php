<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Tipoarticulo/TipoarticuloModel.php';
/**
* CONTROLADOR Tipo de Artículo
*/
class TipoarticuloController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->model = new TipoarticuloModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}