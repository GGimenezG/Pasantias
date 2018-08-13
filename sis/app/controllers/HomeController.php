<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/sis/app/models/Home/HomeModel.php';
/**
 * Home controller
 */
class HomeController extends Controller
{
  /**
   * string 
   */
  public $nombre;

  /**
   * object 
   */
  public $model;

  /**
   * Inicializa valores 
   */
  public function __construct()
  {
    $this->model = new HomeModel();
    $this->nombre = 'Mundo';
  }

  /**
  * Método estándar
  */
  public function exec()
  {
    $this->show();
  }

  /**
  * Método de ejemplo
  */
  public function show()
  {
    $params = array('nombre' => $this->nombre);
    $this->render(__CLASS__, $params); 
  }

  /**
  * Método de ejemplo con model. Obtiene un usuario segun ID
  */
  public function usuario($param)
  {
    $res = $this->model->getUser($param);
    $this->nombre = $res['usuario_dev'];
    $this->show();
  }


}

<?php
defined('BASEPATH') or exit('No se permite acceso directo');

/**
* CONTROLADOR HOME - LOGIN 
*/
class LoginController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function signin($request_params)
  {
    if($this->verify($request_params))
      return $this->renderErrorMessage('El email y password son obligatorios');

    $result = $this->model->signIn($request_params['email']);

    if(!$result->num_rows)
      return $this->renderErrorMessage("El email {$request_params['email']} no fue encontrado");

    $result = $result->fetch_object();

    if(!password_verify($request_params['password'], $result->password))
      return $this->renderErrorMessage('La contraseña es incorrecta');

    $this->session->init();
    $this->session->add('email', $result->email);
    header('location: /php-mvc/main');
  }

  private function verify($request_params)
  {
    return empty($request_params['email']) OR empty($request_params['password']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    $this->render(__CLASS__, $params);
  }

}