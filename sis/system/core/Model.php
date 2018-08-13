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

  /**
  * Finaliza conexion
  */
  public function __destruct()
  {
    $this->db->close();
  }

   function conectar()
  {   
      $db=$this->db;
            
      $db= new MySQLi(HOST,USER,PASSWORD,DB_NAME);

    if ($db -> connect_errno) {
      die( "Fallo la conexión a MySQL: (" . $db -> mysqli_connect_errno() 
        . ") " . $db -> mysqli_connect_error());
    }
    else{
      return $this->db = $db;
    }

      
  }
  //--------------------------------------------------------
  public function select($sql)
  {
    $tb= mysqli_query($this->db,$sql);
    return $tb;
  }
  //--------------------------------------------------------
  public function hay_registro($tb)
  {
    $row= mysqli_fetch_array($tb);
    return $row;
  }
  //--------------------------------------------------------
  public function cerrarselect($tb)
  {
    mysqli_free_result($tb);
  }
  //--------------------------------------------------------
  public function ejecutar($sql)
  {
    mysqli_query($sql,$this->db);
  }
  //--------------------------------------------------------
  public function getcodigonuevo($tabla,$cod_tabla)
  {
    
    
      $sql="select MAX($this->tabla.$this->cod_tabla) as cod from $this->tabla ";
      $tb= $this->select($sql);
        
        if ($row=$this->hay_registro($tb))
        {
          return $row["cod"]+1;
        }
    

    return 0;
  }


}

