<?php

// verificar la conexión 

  function consulta(){
    $mysqli = new mysqli("localhost", "root", "", "uaed");
    if ($mysqli->connect_errno) {
        return $arrRespuesta=array("error"=>"Conexión fallida: ".$mysqli->connect_error);

    }else{
            
         /*Establecemos el charset a la conexión para evitar datos erróneos*/
         $mysqli->set_charset("utf8");
         $consulta ="select MAX(rg_codigo) as cod from regimen ";

         if ($resultado = mysqli_query($mysqli,$consulta)) {
            // obtener un array asociativo 
             if ($row=mysqli_fetch_array($resultado))
              {
                return json_encode($row["cod"]+1);
              }
    
            var_dump($arrRespuesta);
            // liberar el conjunto de resultados 
            $resultado->free();

         }else{

            return $arrRespuesta=array("error"=>"Hubo un problema con la consulta");

         }

        // cerrar la conexión 
        $mysqli->close();
    }
}
consulta();
$var = consulta();
echo consulta();