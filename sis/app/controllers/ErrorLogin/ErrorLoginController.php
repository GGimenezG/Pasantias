<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
* 
*/
class ErrorLoginController extends Controller
{


  public function __construct()
  {
  }
  
  public function exec()
  {
    $this->render(__class__);
  }
}