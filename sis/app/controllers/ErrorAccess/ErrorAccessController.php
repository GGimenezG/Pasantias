<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
* 
*/
class ErrorAccessController extends Controller
{


  public function __construct()
  {
  }
  
  public function exec()
  {
    $this->render(__class__);
  }
}