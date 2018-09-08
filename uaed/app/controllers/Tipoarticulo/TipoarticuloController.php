<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Tipoarticulo/TipoarticuloModel.php';
/**
* CONTROLADOR Tipo de Artículo
*/
class TipoarticuloController extends Controller
{

  private $model;
  private $registros;

  public function __construct()
  {
    $this->model = new TipoarticuloModel();
    $this->registros = $this->model->consultar_todos();
  }

  public function exec()
  {
  	$params = $this->registros;
    $this->render(__CLASS__, $params);
    
  }

}