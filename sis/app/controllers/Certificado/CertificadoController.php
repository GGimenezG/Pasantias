<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Certificado/CertificadoModel.php';
/**
* CONTROLADOR Certificado
*/
class CertificadoController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->model = new CertificadoModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}