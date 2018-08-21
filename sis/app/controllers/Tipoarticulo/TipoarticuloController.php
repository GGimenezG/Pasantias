<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Tipoarticulo/TipoarticuloModel.php';
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