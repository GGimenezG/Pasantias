<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../lib/bs/bootstrap.min.css" >
    <link rel="stylesheet" href="../lib/bs/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../lib/css/font-awesome/css/font-awesome.min.css" >
    <link rel="stylesheet" href="../lib/bs/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="../lib/bs/ripples.min.css">
    <link rel="stylesheet" href="css/style1.css" >
    <link rel="stylesheet" href="css/style2.css" >

    <title>Requerimiento</title>
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
            <?php
            include("menu/cabeceraadmin.php");
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
            include("menu/menuadmin.php");
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
                    <h4>Requerimiento</h4>
                  </div>
                  <div class="modal-body">
                    <div id="mensajesError"></div>
                    <form class="form-horizontal" id="formCargo" name="cargo">
                      <div class="panel panel-info"><!--inicio del panel-->
                        <div class="panel-heading">
                          <h3 class="panel-title">Datos</h3>
                        </div>
                        <div class="panel-body"><!--inicio del cuerpo del panel-->
                          <legend>Datos del requerimiento de aula</legend>
                          <div class="col-xs-12 col-sm-6 col-md-6" ><!--columna izquierda del formulario-->
                              <!-- primer campo a la izquierda -->
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="codigo">
                                  <span class="glyphicon glyphicon-briefcase"></span> CODIGO
                                </label>
                                <input class="form-control" type="text" name="codigo" id="codigo" readonly value="1"/>
                                <p class="help-block">Código del requerimiento</p>
                                <!--help-block es para que salga el texto debajo del input al hacer clic-->
                              </div>
                              
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="nombre">
                                  <span class="glyphicon glyphicon-briefcase"></span> NOMBRE
                                </label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required/>
                                <p class="help-block">Introduzca el nombre del requerimiento</p>
                                <!--help-block es para que salga el texto debajo del input al hacer clic-->
                              </div>
                          </div><!--fin de columna izquierda -->
                          <div class="col-xs-12 col-sm-4 col-md-4"> <!-- columna derecha -->
                            <div class="form-group has-info label-floating">
                              <label class="control-label" for="descripcion">
                                <span class="glyphicon glyphicon-edit"></span> DESCRIPCION
                              </label>
                              <textarea class="form-control" name="descripcion" rows="4" cols="6" id="descripcion" required></textarea>
                              <p class="help-block">Introduzca la descripción del requerimiento</p>
                            </div>
                          </div><!-- fin columna derecha -->
                        </div>
                      </div><!--fin del panel-->
                    </form>
                  </div><!--fin  del cuerpo del panel-->
                  <div class="modal-footer">
                    <div class="btn-group"> 
                      <button class="btn btn-success btn-raised" type="button" id="btnGuardar" onclick="onGuardar();"> Guardar 
                        <span class="glyphicon glyphicon-floppy-disk"></span>
                      </button>
                      <button class="btn btn-warning btn-raised" type="reset" name="button" id="limpiar"> Limpiar 
                        <span class=" glyphicon glyphicon-erase"></span>
                      </button>
                      <button type="button" class="btn btn-danger btn-raised" data-dismiss="modal" id="cerrar"> Cerrar 
                        <span class=" glyphicon glyphicon-remove"></span>
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
                        <i class="glyphicon glyphicon-plus"></i>
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
                <h3 class="panel-title"> Requerimientos</h3>
              </div>
              <div class="panel panel-body">
                <div class="table-responsive">
                  <table id="tabla" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Consultar</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span id="codigo">1</span>
                        </td>
                        <td>
                          <span id="nombre">nombre</span>
                        </td>
                        <td>
                          <a class="btn btn-success btn-raised btn-sm" data-toggle="modal"
                              data-target="#ventana" onclick="onConsultar('${cargo.idString}');">
                            <i class="glyphicon glyphicon-eye-open"></i>
                          </a>
                        </td>
                        <td>
                          <a class="btn btn-warning btn-raised btn-sm" data-toggle="modal"
                             data-target="#ventana" onclick="onModificar('${cargo.idString}');">
                            <i class="glyphicon glyphicon-edit"></i>
                          </a>
                        </td>
                        <td>
                          <a id="btnEliminar${cargo.idString}" class="btn btn-danger btn-raised btn-sm" 
                              data-toggle=" confirmation" data-title="¿Estas seguro?" data-singleton="true" 
                              data-popout="true" data-href="javascript:onEliminar('${cargo.idString}');"
                              data-btn-ok-label="Si" data-btn-ok-icon="glyphicon glyphicon-share-alt" 
                              data-btn-ok-class="btn btn-success btn-raised btn-sm"                         data-btn-cancel-label="No" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-btn-cancel-class="btn btn-danger btn-raised btn-sm">
                            <i class="glyphicon glyphicon-trash"></i>
                          </a>
                        </td>
                      </tr>
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