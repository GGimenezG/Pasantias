<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Certificado/CertificadoModel.php';
/**
* CONTROLADOR Certificado
*/
class CertificadoController extends Controller
{
  private $model;
  private $registros;

  public function __construct()
  {
    $this->model = new CertificadoModel();
    $this->registros = $this->model->consultar_todos();
  }

  public function exec()
  {
  	$params = $this->registros;
    $this->render(__CLASS__, $params);
    
  }

  
  
}