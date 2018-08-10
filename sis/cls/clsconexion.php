<?php


		$mysqli = new MySQLi("localhost", "root","", "uaed");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else
			//echo "Conexión exitossa!";

//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}
?>

<!-- <?
// class clsconexion
// {	
// 	var $con;
// 	//--------------------------------------------------------
// 	function clsconexion()
// 	{
// 	  $this->conectar();
// 	}
//   //--------------------------------------------------------
//   function conectar()
// 	{	  
// 	  	$conexion=false;
// 	  	$servidor="localhost";
// 	  	$database="uaed"; 
// 	  	$userbd="root"; 
// 	  	$passwordbd="";  
  		
// 	  	$this->con= new MySQLi($servidor,$userbd,$passwordbd,$database);

	  	
// 	  	if($this->con->connect_errno)
// 	  	{

// 	  		die( "Fallo la conexión a MySQL: (" . $this->con -> mysqli_connect_errno() 
// 				. ") " . $this->con -> mysqli_connect_error());

// 	  	}
// 	  	else{
// 	  		echo "string";
// 	  	}

	    
// 	}
// 	//--------------------------------------------------------
// 	function select($sql)
// 	{
// 	  $tb= mysqli_query($sql,$this->con);
// 	  return $tb;
// 	}
// 	//--------------------------------------------------------
// 	function hay_registro($tb)
// 	{
// 	  $row= mysqli_fetch_array($tb);
// 	  return $row;
// 	}
// 	//--------------------------------------------------------
// 	function cerrarselect($tb)
// 	{
// 	  mysqli_free_result($tb);
// 	}
// 	//--------------------------------------------------------
// 	function ejecutar($sql)
// 	{
// 	  mysqli_query($sql,$this->con);
// 	}
// 	//--------------------------------------------------------
// 	function getcodigonuevo($tabla,$cod_tabla)
// 	{
		
	  
// 	  	$sql="select MAX($this->tabla.$this->cod_tabla) as cod from $this->tabla "
// 	  	$tb= $objbd->select($sql);
	  		
// 	  		if ($row=$this->hay_registro($tb))
// 	  		{
// 	  			return $row["cod"]+1;
// 	  		}
	  

// 	  return 0;
// 	}
} // fin de clsconexion()
?> -->