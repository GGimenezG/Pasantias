<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
/**
 * Modelo base
 */
class Model
{
  /**
  * @var object
  */
  protected $db;

  /**
  * Inicializa conexion
  */
  public function __construct()
  {
    $this->conectar();
  }

 function conectar()
  {   
                  
      $db = new MySQLi(HOST,USER,PASSWORD,DB_NAME);

    if ($db -> connect_errno) {
      die( "Fallo la conexión a MySQL: (" . $db -> mysqli_connect_errno() 
        . ") " . $db -> mysqli_connect_error());
    }
    else{
      $this->db = $db;
    }
    if (!$db->set_charset("utf8")) {
      printf("Error cargando el conjunto de caracteres utf8: %s\n", $db->error);
      exit();
      } 
      
  }
  //--------------------------------------------------------
  protected function select($sql)
  {
    $tb= mysqli_query($this->db,$sql);
    return $tb;
  }
  //--------------------------------------------------------
  protected function hay_registro($tb)
  {
    $row= mysqli_fetch_array($tb);
    return $row;
  }

  protected function num_registros($tb)
  {
    $num = mysqli_num_rows($tb);
    return $num;
  }
    protected function registros($tb)
  {
     return mysqli_fetch_array($tb);
     
  }
  //--------------------------------------------------------
  protected function cerrarselect($tb)
  {
    mysqli_free_result($tb);
  }
  //--------------------------------------------------------
  protected function ejecutar($sql)
  {
    if(mysqli_query($this->db,$sql)){
      return true;
    }else{
      return false;
    }
  }
  //--------------------------------------------------------
 protected function getcodigonuevo($tabla,$cod_tabla)
  {
    
    
      $sql="select MAX($tabla.$cod_tabla) as cod from $tabla ";
      $tb= $this->select($sql);
        
        if ($row=$this->hay_registro($tb))
        {
          return $row["cod"]+1;
        }
    

    return 0;
  }

  /**
  * Finaliza conexion
  */
  // public function __destruct()
  // {
  //   $this->db->close();
  // }

  

}

