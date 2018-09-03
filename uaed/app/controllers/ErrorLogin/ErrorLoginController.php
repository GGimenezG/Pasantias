<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
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