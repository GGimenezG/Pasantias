

function SoloNumeros(e)
  {
    if ((event.keyCode < 48) || (event.keyCode > 57)) //Excluye todos caracteres y letras menos números de 0-9
      event.returnValue = false;
  }
              

function SoloLetras(e)
  {
    if (event.keyCode >=33 && event.keyCode <=64) // Excluye caracteres y numeros menos letras
      event.returnValue = false;
  }


function FormatoCorreo(e)
  {
    var correo = document.getElementById(e.id).value;
    var formato = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;  //Formato nombre+@+servidor+dominio y caracteres aceptados

      if (!formato.test(correo)) 
      {
        document.getElementById("aviso").innerHTML = "Correo invalido";
      } 
      
      else 
      {
        document.getElementById("aviso").innerHTML = "";
      }
  }


function FormatoCertificado(e)
  {
    var certificado = document.getElementById(e.id).value;
    var formato = /^(D){1}([0-9]){7}$/;  //Formato D+espacio+numero y caracteres aceptados (D 0102021)

    if (!formato.test(certificado)) 
    {
      document.getElementById("aviso").innerHTML = "Certificado invalido";
    } 
          
    else 
    {
      document.getElementById("aviso").innerHTML = "";
    }

  }


function FormatoCedula(e)
  {
    var cedula = document.getElementById(e.id).value;
    var formato = /^(V|E){1}([0-9]){8}$/;  //Formato nacionalidad+espacio+numero sin puntos y caracteres aceptados
          
    if (!formato.test(cedula)) 
    {
      document.getElementById("aviso").innerHTML = "Cedula invalido";
    } 

    else 
    {
      document.getElementById("aviso").innerHTML = "";
    }
  }
      

function FormatoFecha(e) 
  {
    var fecha = document.getElementById(e.id).value;
    var formato = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;

    if (!formato.test(cedula)) 
      {
        document.getElementById("aviso").innerHTML = "Fecha invalido";
      } 

    else 
      {
        document.getElementById("aviso").innerHTML = "";
      }

  }


function CamposLlenos(e)
{
    var todo_lleno = true;   

    //Hay que arreglarla para que sea con todos los campos. Esta funcion se activa al hacer click en el boton Guarar
    if(document.getElementById(e.id).value.length == 0 )
    {
      todo_lleno = false;
    }
    
    if(!todo_lleno)
    {
      alert('Debe llenar todos los datos');
    }
    
    return todo_lleno;
}