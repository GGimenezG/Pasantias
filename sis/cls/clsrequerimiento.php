<?
	class clsrequerimiento
{
    var $r_codigo= "";
	var $r_nombre= "";
	var $r_descrp= "";
	var $r_status= "";
	
	var $objbd;

	function clsrequerimiento()
	{
	  $this->objbd= new clsconexion();
	}	
	//---------------------------------------------------------------------
	function buscar()
	{
	  $encontrado= false;
	  $objbd= $this->objbd;
	 
	  $sql= "select requerimiento.* from requerimiento where (r_nombre='$this->r_nombre') and r_status='a'";
	  $tb= $objbd->select($sql);
	  if ($row=$objbd->hay_registro($tb))
	    {
		  $this->r_codigo= $row["r_codigo"];
		  $this->r_nombre= $row["r_nombre"];
		  $this->r_descrp= $row["r_descrp"];
		  $this->r_status= $row["r_status"];
		  $encontrado= true;
	    }
	  $objbd->cerrarselect($tb);
	  return $encontrado;
	}// fin de buscar()
	//---------------------------------------------------------------------	
	function incluir()
	{
	  $objbd= $this->objbd;
	  
	  $sql= "insert into requerimiento(r_nombre, r_descrp, r_status) values('$this->r_nombre','$this->r_descrp','a')";
	  $this->objbd->ejecutar($sql);
	} // fin de incluir()
	//---------------------------------------------------------------------
	function modificar()
	{
	  $objbd= $this->objbd;
	  $sql= "update requerimiento set r_nombre='$this->r_nombre', 
	  								  r_descrp='$this->r_descrp'  
	  								  where r_codigo=$this->r_codigo";
	  $this->objbd->ejecutar($sql);
	} // fin de modificar()
	//---------------------------------------------------------------------
	function eliminar()
	{
	  $objbd= $this->objbd;
	  
	  $sql=  "update requerimiento set r_status='$this->r_status' where r_codigo=$this->r_codigo";
	  $this->objbd->ejecutar($sql);
	} // fin de eliminar()
	//---------------------------------------------------------------------		
  } //fin clsrequerimiento()
?>	