<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Menuencargado/MenuencargadoModel.php';
/**
* CONTROLADOR Menu administrador
*/
class MenuencargadoController extends Controller
{
  private $model;
  private $registros;

  public function __construct()
  {
    $this->model = new MenuencargadoModel();

    $this->registros = $this->registros->consultar_todos();
  }

  public function exec()
  {
  	$params = $this->registros;
    $this->render(__CLASS__,$params);
    
  }

}