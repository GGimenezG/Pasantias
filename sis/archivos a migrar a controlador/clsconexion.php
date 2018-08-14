<?
class clsconexion
{	
	var $con;
	//--------------------------------------------------------
	function clsconexion()
	{
	  $this->conectar();
	}
  //--------------------------------------------------------
  function conectar()
	{	  
	  	$conexion=$this->con;
	  	$servidor="localhost";
	  	$database="uaed"; 
	  	$userbd="root"; 
	  	$passwordbd="";  
  		
	  	$conexion= new MySQLi($servidor,$userbd,$passwordbd,$database);

		if ($conexion -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $conexion -> mysqli_connect_errno() 
				. ") " . $conexion -> mysqli_connect_error());
		}
		else{
			$this->con = $conexion;
		}

	    
	}
	//--------------------------------------------------------
	function select($sql)
	{
	  $tb= mysqli_query($this->con,$sql);
	  return $tb;
	}
	//--------------------------------------------------------
	function hay_registro($tb)
	{
	  $row= mysqli_fetch_array($tb);
	  return $row;
	}
	//--------------------------------------------------------
	function cerrarselect($tb)
	{
	  mysqli_free_result($tb);
	}
	//--------------------------------------------------------
	function ejecutar($sql)
	{
	  mysqli_query($sql,$this->con);
	}
	//--------------------------------------------------------
	function getcodigonuevo($tabla,$cod_tabla)
	{
		
	  	$sql="select MAX($this->tabla.$this->cod_tabla) as cod from $this->tabla ";
	  	$tb= $objbd->select($sql);
	  		
	  		if ($row=$this->hay_registro($tb))
	  		{
	  			return $row["cod"]+1;
	  		}
	  

	  return 0;
	}
} // fin de clsconexion()
?>