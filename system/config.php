<?php
defined('BASEPATH') or header('location: /uaed/erroraccess');

//////////////////////////////////////
// Valores de uri
/////////////////////////////////////

define('URI', $_SERVER['REQUEST_URI']);

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

//////////////////////////////////////
// Valores de rutas
/////////////////////////////////////

define('FOLDER_PATH', '/uaed2');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

define('PATH_VIEWS', FOLDER_PATH . '/app/views/');

define('PATH_CONTROLLERS', 'app/controllers/');

define('PATH_MODELS', 'app/models/');


//////////////////////////////////////
// Rutas menu y estilos cargan desde ubicacion del index
/////////////////////////////////////
define('PATH_MENU', '/app/views/menu');
/////////////////////////////////////
define('PATH_STYLE', FOLDER_PATH . '/lib/css');
/////////////////////////////////////
define('PATH_JS', FOLDER_PATH . '/lib/js');
/////////////////////////////////////
define('PATH_DT', FOLDER_PATH . '/lib/DataTables');
/////////////////////////////////////
define('PATH_IMG', FOLDER_PATH . '/lib/img');
/////////////////////////////////////
define('PATH_ASSETS', FOLDER_PATH . '/lib/assets');
/////////////////////////////////////
define('PATH_FONT', FOLDER_PATH . '/lib/fonts');
/////////////////////////////////////


define('HELPER_PATH', 'system/helpers/');

define('LIBS_ROUTE', ROOT . FOLDER_PATH . '/system/libs/');

//////////////////////////////////////
// Valores de core
/////////////////////////////////////

define('CORE', 'system/core/');
define('DEFAULT_CONTROLLER', 'Articulo');

//////////////////////////////////////
// Valores de base de datos
/////////////////////////////////////

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'uaed');

//////////////////////////////////////
// Valores configuracion
/////////////////////////////////////

define('ERROR_REPORTING_LEVEL', -1);

