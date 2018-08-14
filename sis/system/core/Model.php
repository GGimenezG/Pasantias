<?php
defined('BASEPATH') or exit('No se permite acceso directo');
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
  //--------------------------------------------------------
  protected function cerrarselect($tb)
  {
    mysqli_free_result($tb);
  }
  //--------------------------------------------------------
  protected function ejecutar($sql)
  {
    mysqli_query($this->db,$sql);
  }
  //--------------------------------------------------------
 protected function getcodigonuevo($tabla,$cod_tabla)
  {
    
    
      $sql="select MAX($this->tabla.$this->cod_tabla) as cod from $this->tabla ";
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

