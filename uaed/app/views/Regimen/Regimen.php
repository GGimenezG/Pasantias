<?php defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess'); ?>
<!DOCTYPE html>
<html lang="es">

  <head>

      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="<?php echo PATH_BOOTSTRAP?>/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo PATH_BOOTSTRAP?>/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo PATH_BOOTSTRAP?>/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo PATH_BOOTSTRAP?>/bootstrap-material-design.min.css">
      <link rel="stylesheet" href="<?php echo PATH_BOOTSTRAP?>/ripples.min.css">
      <link rel="stylesheet" href="<?php echo PATH_STYLE?>/style1.css" >
      <link rel="stylesheet" href="<?php echo PATH_STYLE?>/style2.css" >

      <title> Régimen </title>
  </head>

  <style media="screen">
    #modalTamano{
      width: 80%;
    }
  </style>
  <body>
    
     <nav id="collapse-2" class="navbar navbar-default no-margin">
      <!-- Cabecera Menu -->
        <div class="navbar-header fixed-brand">
              <!-- Esta parte incluye la cabecera del encargado-->
              <?php
                if ($session['u_tipo']=="encargado"){
                  include (PATH_MENU . '/cabeceraencargado.php');
                }elseif ($session['u_tipo']=="secretaria") {
                  include (PATH_MENU . '/cabecerasecretaria.php');
                }
              ?>
        </div>
        <!--fin cabecera menu -->
      </nav>
      <!-- Barra de manu lateral -->
      <div id="wrapper">
          <!-- Sidebar -->
          <div id="sidebar-wrapper">
              <!-- Lista Maestros del menu -->     
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">     
              <?php
                if ($session['u_tipo']=="encargado"){
                  include (PATH_MENU . '/menuencargado.php');
                }elseif ($session['u_tipo']=="secretaria") {
                  include (PATH_MENU . '/menusecretaria.php');
                }
              ?>

            </ul>
          </div><!-- fin barra de menu  -->
          <!-- Page Content -->
          <div id="page-content-wrapper">
            <!--inicio de la ventana modal  -->
            <div class="col-lg-12">
              <div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" id="modalTamano">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4>Certificado</h4>
                    </div>
                    <div class="modal-body">
                      <div id="mensajesError"></div>
                      <form class="form-horizontal" id="formRegimen" name="formRegimen">
                        <div class="panel panel-info"><!--inicio del panel-->
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos</h3>
                          </div>
                          <div class="panel-body"><!--inicio del cuerpo del panel-->
                            <legend>Datos del régimen</legend>
                            <div class="col-xs-12 col-sm-6 col-md-6" ><!--columna izquierda del formulario-->
                                <!-- primer campo a la izquierda -->
                                <div id='dcodigo' name="dcodigo" class="form-group has-info">
                                  <label class="control-label" for="codigo">
                                    <span class="glyphicon glyphicon-briefcase"></span> CODIGO
                                  </label>
                                  <input class="form-control" type="text" name="codigo" id="codigo" readonly />
                                  <p class="help-block">Código del régimen</p>
                                  <!--help-block es para que salga el texto debajo del input al hacer clic-->
                                </div>
                                
                                <div class="form-group has-info label-floating">
                                  <label class="control-label" for="nombre">
                                    <span class="glyphicon glyphicon-briefcase"></span> NOMBRE
                                  </label>
                                  <input class="form-control" type="text" name="nombre" id="nombre" required/>
                                  <p class="help-block">Introduzca el nombre del régimen</p>
                                  <!--help-block es para que salga el texto debajo del input al hacer clic-->
                                </div>
                            </div><!--fin de columna izquierda -->
                            <div class="col-xs-12 col-sm-4 col-md-4"> <!-- columna derecha -->
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="descrp">
                                  <span class="glyphicon glyphicon-edit"></span> DESCRIPCION
                                </label>
                                <textarea class="form-control" name="descrp" rows="4" cols="6" id="descrp" required></textarea>
                                <p class="help-block">Introduzca la descripción del régimen</p>
                              </div>
                            </div><!-- fin columna derecha -->
                          </div>
                        </div><!--fin del panel-->
                      </form>
                    </div><!--fin  del cuerpo del panel-->
                    <div class="modal-footer">
                      <div class="btn-group"> 
                        <button class="btn btn-success btn-raised" type="button" id="btnGuardar" onclick="onGuardar();"> Guardar 
                          <span class="fa fa-save fa-lg"></span>
                        </button>
                        <button class="btn btn-warning btn-raised" type="reset" name="button" id="limpiar"> Limpiar 
                          <span class="fa fa-eraser fa-lg"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal" id="cerrar"> Cerrar 
                          <span class="fa fa-window-close fa-lg"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  <!--fin  de la ventana modal  -->
            <div class="col-lg-12">
              <!-- barra del boton incluir -->
              <div class="navbar navbar-info">
                <div class="container">
                  <table class="col-md-10">
                    <tr>
                      <td>
                        <a class="navbar-btn btn btn-success btn-raised" data-toggle="modal" data-target="#ventana" onclick="onIncluir();"> Registrar&nbsp;
                          <span class="fa fa-plus fa-lg"></span>
                        </a>
                      </td>
                      <td>
                        <div id="mensajes" class="col-md-offset-1"></div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- fin barra del boton incluir  -->

              <!--Inicio de la tabla-->
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"> Régimen </h3>
                </div>
                <div class="panel panel-body">
                  <div class="table-responsive">
                    <table id="tabla" class="table table-striped table-bordered table-hover table-condensed">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Consultar</th>
                          <th>Modificar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($params as $r) { var_dump($params); ?>      

                        <tr>
                          <td>
                            <span id="codigo<?php echo $r['rg_codigo']; ?>"><?php echo $r['rg_codigo']; ?></span>
                          </td>
                          <td>
                            <span id="nombre<?php echo $r['rg_codigo']; ?>"><?php echo $r['rg_nombre']; ?> </span>
                          </td>
                          <td>
                            <span id="descrp<?php echo $r['rg_codigo']; ?>"><?php echo $r['rg_descrp']; ?> </span>
                          </td>
                          <td>
                            <a class="btn btn-success btn-raised btn-sm" data-toggle="modal"
                                data-target="#ventana" onclick="onConsultar(<?php echo $r['rg_codigo']; ?>);">
                              <span class="fa fa-eye fa-lg"></span>
                            </a>
                          </td>
                          <td>
                            <a class="btn btn-warning btn-raised btn-sm" data-toggle="modal"
                               data-target="#ventana" onclick="onModificar(<?php echo $r['rg_codigo']; ?>);">
                              <span class="fa fa-edit fa-lg"></span>
                            </a>
                          </td>
                          <td>
                            <a id="btnEliminar<?php echo $r['rg_codigo']; ?>" 
                               class="btn btn-danger btn-raised btn-sm" 
                               data-toggle="confirmation" 
                               data-title="¿Está seguro?" 
                               data-singleton="true" 
                               data-popout="true" 
                               data-href="javascript:onEliminar(<?php echo $r['rg_codigo']; ?>);"
                               data-btn-ok-label="Si" 
                               data-btn-ok-icon="fa fa-check" 
                               data-btn-ok-class="btn btn-success btn-raised btn-sm"
                               data-btn-cancel-label="No" 
                               data-btn-cancel-icon="fa fa-ban" 
                               data-btn-cancel-class="btn btn-danger btn-raised btn-sm">
                              <span class="fa fa-trash fa-lg"></span>
                            </a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--fin de la tabla-->

            </div>
          </div>
          <!-- /#page-content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="<?php echo PATH_JS?>/jquery-3.3.1.min.js"></script>
      <script src="<?php echo PATH_JS?>/bootstrap.min.js"></script>
      <script src="<?php echo PATH_JS?>/jquery.validate.min.js"></script>
      
      <script src="<?php echo PATH_JS?>/menu.js"></script>
      <script src="<?php echo PATH_JS?>/regimen.js"></script>
      
  	  <script src="<?php echo PATH_JS?>/jquery.numeric.min.js"></script>
      <script src="<?php echo PATH_JS?>/jquery.dataTables.min.js"></script>
      <script src="<?php echo PATH_JS?>/dataTables.bootstrap.min.js"></script>
      <script src="<?php echo PATH_JS?>/bootstrap-confirmation.js"></script>
      <script src="<?php echo PATH_JS?>/ripples.min.js"></script>
      <script src="<?php echo PATH_JS?>/material.min.js"></script>
      
    	<script type="text/javascript" class="init">
    		$('[data-toggle="confirmation"]').confirmation('hide');
    	</script>

  </body>

</html>