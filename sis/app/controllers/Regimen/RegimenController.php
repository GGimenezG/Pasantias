<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Regimen/RegimenModel.php';
/**
* CONTROLADOR Menu administrador
*/
class RegimenController extends Controller
{
  private $model;
  private $registros;

  public function __construct()
  {
    $this->model = new RegimenModel();

    $this->registros=$this->model->consultar_todos();

  }

  public function exec()
  {
 

  	$params=$this->registros;
    $this->render(__CLASS__,$params);

    
  } 
}