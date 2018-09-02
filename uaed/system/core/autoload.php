<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
spl_autoload_register(function ($class) {
  if(is_file(CORE . "$class.php"))
    return require CORE . "$class.php";
  if(is_file(HELPER_PATH . "$class.php"))
    return require HELPER_PATH . "$class.php";
});