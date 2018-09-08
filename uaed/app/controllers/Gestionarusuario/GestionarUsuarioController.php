<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
require_once ROOT . FOLDER_PATH . '/app/models/Administrador/AdministradorModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Home/HomeModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
 * Controlador Gestionar Usuario
 */
class GestionarUsuarioController extends Controller
{
	private $model;
	private $registros;
	
	function __construct(argument)
	{
		$this->session = new Session();
		$this->session->init();
		if($this->session->getStatus() === 1 || empty($this->session->get('u_tipo')))
		{
			 header('location: '.FOLDER_PATH.'/errorlogin'); //hay que hacer pagina de redireccion al login
		}
		elseif($this->session->get('u_tipo')=="encargado")
		{
			header('location: '.FOLDER_PATH.'/erroraccess');
		}
		else
		{
			$this->model = new HomeModel();
			$this->registros=$this->model->consultartodos();
		}
	}


	public function exec()
	{
		$session=array('u_cedula' => $this->session->get('u_cedula'), 
						'u_nombre' => $this->session->get('u_nombre'), 
						'u_username' => $this->session->get('u_username'));
		$params=$this->registros;
		$this->render(__CLASS__,$params,$session);
	}

	public function cedula(){
  	$cedula = $this->model->obtenerCedula(); 
  	echo $cedula;
  }
}