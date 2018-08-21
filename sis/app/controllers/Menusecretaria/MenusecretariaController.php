<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Menusecretaria/MenusecretariaModel.php';
/**
* CONTROLADOR Menu Encargado
*/
class MenusecretariaController extends Controller
{
  private $model;

  public function __construct()
  {
    $this->model = new MenusecretariaModel();
  }

  public function exec()
  {
    $this->render(__CLASS__);
    
  }

  
  
}