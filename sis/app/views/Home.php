<!DOCTYPE html>

<html lang="es">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="../lib/bs/bootstrap.min.css" >
    <link rel="stylesheet" href="../lib/css/font-awesome/css/font-awesome.min.css" >
    

    
    <link rel="stylesheet" href="../lib/bs/ripples.min.css">

        <link rel="stylesheet" href="css/style1.css" >
        <link rel="stylesheet" href="css/style2.css" > 
        <link rel="stylesheet" href="../lib/bs/bootstrap-material-design.min.css">
        <title>Pagina Principal</title>
    </head>
<style media="screen">
  #modalTamano{
    width: 80%;
  }
</style>
    <body>
    <!-- Navegacion -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
            <!-- agrupacion para una mejor visualización móvil -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" 
                            data-target="#collapse-1"> Menu 
                    <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand">NonmbreSIstema</a>
                </div>

                <div class="collapse navbar-collapse" id="collapse-1">
                    <ul class="nav navbar-nav navbar-right"></ul>
                </div>
            </div>
        </nav>

    <!-- Cabecera -->
    <header>
        <div class="container">
          <div class="col-lg-12">
            <div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" id="modalTamano">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Registro</h4>
                  </div>
                  <div class="modal-body">
                    <div id="mensajesError"></div>
                    <form action="cls/clsregistrousuaio.php" class="form-horizontal" id="registro" name="registro" method="post">
                      <div class="panel panel-info"><!--inicio del panel-->
                        <div class="panel-heading">
                          <h3 class="panel-title">Datos</h3>
                        </div>
                        <div class="panel-body"><!--inicio del cuerpo del panel-->
                          
                          <div class="col-xs-12 col-sm-6 col-md-6" ><!--columna izquierda del formulario-->
                              <!-- primer campo a la izquierda -->
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="u_cedula">
                                  <span class="glyphicon glyphicon-briefcase"></span>CEDULA
                                </label>
                                <input class="form-control" type="text" name="u_cedula" id="u_cedula"/>
                                <p class="help-block">Ingrese la cédula de identididad</p>
                                <!--help-block es para que salga el texto debajo del input al hacer clic-->
                              </div>
                              
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="u_nombre">
                                  <span class="glyphicon glyphicon-briefcase"></span>NOMBRE
                                </label>
                                <input class="form-control" type="text" name="u_nombre" id="u_nombre" required/>
                                <p class="help-block">Introduzca el nombre</p>
                                <!--help-block es para que salga el texto debajo del input al hacer clic-->
                              </div>
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="u_tipo">
                                  <span class="glyphicon glyphicon-briefcase"></span>TIPO EMPLEADO
                                </label>
                                <input class="form-control" type="text" name="u_tipo" id="u_tipo" required/>
                                <p class="help-block">Introduzca tipo de acceso</p>
                                <!--help-block es para que salga el texto debajo del input al hacer clic-->
                              </div>                              
                          </div><!--fin de columna izquierda -->
                          <div class="col-xs-12 col-sm-4 col-md-4"> <!-- columna derecha -->
                            <div class="form-group has-info label-floating">
                              <label class="control-label" for="u_username">
                                <span class="glyphicon glyphicon-edit"></span>USUARIO
                              </label>
                              <input class="form-control" type="text" name="u_username" id="u_username" required/>
                              <p class="help-block">Introduzca nombre de usuario</p>
                            </div>
                            <div class="form-group has-info label-floating">
                              <label class="control-label" for="u_password">
                                <span class="glyphicon glyphicon-edit"></span>CONTRASEÑA
                              </label>
                              <input class="form-control" type="password" name="u_password" id="u_password" required/>
                              <p class="help-block">Introduzca la contraseña</p>
                            </div>                            
                          </div><!-- fin columna derecha -->
                        </div>
                      </div><!--fin del panel-->
                      <div class="btn-group"> 
                          <button class="btn btn-success btn-raised" type="submit" id="btnGuardar"> Guardar 
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                          </button>
                          <button class="btn btn-warning btn-raised" type="reset" name="button" id="limpiar"> Limpiar 
                            <span class=" glyphicon glyphicon-erase"></span>
                          </button>
                          <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal" id="cerrar"> Cerrar 
                            <span class=" glyphicon glyphicon-remove"></span>
                          </button>
                      </div>
                    </form>
                  </div><!--fin  del cuerpo del panel-->

                </div>
              </div>
            </div>
          </div>            
          <div class="col-lg-6">
            <img class="img-responsive" src="img/portada.png" alt="">      
          </div>
          <div class="col-lg-6">
            <div class="col-md-12" class="panel-default">
              <div class="panel-body" style="background-color:deepskyblue">
							 <div id="mensajesError"></div>
               
                <form class="form" accept-charset="UTF-8" id="login-nav" name="login" action="login();" method="POST">
                  <legend id="leyenda">Inicia sesión</legend>
                    <div class="form-group">
                      <label class="control-label" for="u_username">
                        <span class="glyphicon glyphicon-user"></span>USUARIO
                      </label>
                      <input class="form-control" type="text" name="u_username" id="u_username" maxlength="15"  placeholder="usuario" required="on">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="u_password">
                        <span class="glyphicon glyphicon-lock"></span>CONTRASEÑA
                      </label>
                      <input class="form-control" type="password" name="u_password" id="u_password" maxlength="20"  placeholder="●●●●●●●●" required="on">
                      <div class="help-block text-right">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                      </div>
                    </div>
                    <div class="btn-group">
                        <button id="btn1" type="submit" class="btn btn-primary btn-block btn-md"> ENTRAR 
                        </button>
    				            </div>
                </form>
                <div class="form-group text-center">
                  <a class="servicios-link" data-toggle="modal" data-target="#ventana"><b>¿No tienes una cuenta?</b>
                  </a>           
                 </div>
              </div>
          </div>
        </div>
    </header>

    <script src="../lib/js/inicio.js" ></script>
    <script src="../lib/js/login.js" ></script>
    <script src="../lib/js/jquery-3.1.1.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <script src="../lib/js/menu.js"></script>
    <script src="../lib/js/cargo.js"></script>
    <script src="../lib/js/jquery.validate.min.js"></script>
    <script src="../lib/js/jquery.numeric.min.js"></script>
    <script src="../lib/js/jquery.dataTables.min.js"></script>
    <script src="../lib/js/dataTables.bootstrap.min.js"></script>
    <script src="../lib/js/ripples.min.js"></script>
    <script src="../lib/js/material.min.js"></script>
    <script src="../lib/js/bootstrap-confirmation.js"></script>
    <script type="text/javascript" class="init">
      $('[data-toggle="confirmation"]').confirmation('hide');
    </script>
    </body>
</html>
