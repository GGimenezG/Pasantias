<?php defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />

      
      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo PATH_ASSETS?>/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="<?php echo PATH_FONTS?>/Roboto.woff2" rel="stylesheet">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo PATH_ASSETS?>/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/bootstrap/css/bootstrap.min.css">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/jquery.mCustomScrollbar.css">
      <!-- am chart export.css -->
      <link rel="stylesheet" href="<?php echo PATH_ASSETS?>/pages/widget/amchart/css/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/style.css">

    <!-- Required Jquery -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery-ui/jquery-ui.min.js "></script>
    <title>Tipo de Artículo</title>

</head>
<body>
  
   <nav id="collapse-2" class="navbar navbar-default no-margin">
    <!-- Cabecera Menu -->
            <?php
              include (PATH_MENU . '/cabeceraencargado.php');
            ?>
      <!--fin cabecera menu -->
    </nav>
    <!-- Barra de manu lateral -->
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <!-- Lista Maestros del menu -->     
          <ul class="sidebar-nav nav-pills nav-stacked" id="menu">     
            <?php
              include(PATH_MENU . "/menuencargado.php");
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
                    <h4>Tipo de Artículo</h4>
                  </div>
                  <div class="modal-body">
                    <div id="mensajesError"></div>
                    <form class="form-horizontal" id="formCargo" name="cargo">
                      <div class="panel panel-info"><!--inicio del panel-->
                        <div class="panel-heading">
                          <h3 class="panel-title">Datos</h3>
                        </div>
                        <div class="panel-body"><!--inicio del cuerpo del panel-->
                          <legend>Datos del Tipo de artículo</legend>
                          <div class="col-xs-12 col-sm-6 col-md-6" ><!--columna izquierda del formulario-->
                              <!-- primer campo a la izquierda -->
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="codigo">
                                  <span class="glyphicon glyphicon-briefcase"></span> CODIGO
                                </label>
                                <input class="form-control" type="text" name="codigo" id="codigo" readonly value="1"/>
                                <p class="help-block">Código del tipo de artículo</p>
                                <!--help-block es para que salga el texto debajo del input al hacer clic-->
                              </div>
                              
                              <div class="form-group has-info label-floating">
                                <label class="control-label" for="nombre">
                                  <span class="glyphicon glyphicon-briefcase"></span> NOMBRE
                                </label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required/>
                                <p class="help-block">Introduzca el tipo de artículo</p>
                                <!--help-block es para que salga el texto debajo del input al hacer clic-->
                              </div>
                          </div><!--fin de columna izquierda -->
                          <div class="col-xs-12 col-sm-4 col-md-4"> <!-- columna derecha -->
                            <div class="form-group has-info label-floating">
                              <label class="control-label" for="descripcion">
                                <span class="glyphicon glyphicon-edit"></span> DESCRIPCION
                              </label>
                              <textarea class="form-control" name="descripcion" rows="4" cols="6" id="descripcion" required></textarea>
                              <p class="help-block">Introduzca la descripción del  tipo de artículo</p>
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
                <h3 class="panel-title">Tipo de Artículo</h3>
              </div>
              <div class="panel panel-body">
                <div class="table-responsive">
                  <table id="tabla" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span id="codigo"></span>
                        </td>
                        <td>
                          <span id="nombre"></span>
                        </td>
                        <td>
                          <span id="descripcion"></span>
                        </td>
                        <td>
                          <a class="btn btn-success btn-raised btn-sm" data-toggle="modal"
                              data-target="#ventana" onclick="onConsultar('${cargo.idString}');">
                            <span class="fa fa-eye fa-lg"></span>
                          </a>
                        </td>
                        <td>
                          <a class="btn btn-warning btn-raised btn-sm" data-toggle="modal"
                             data-target="#ventana" onclick="onModificar('${cargo.idString}');">
                            <span class="fa fa-edit fa-lg"></span>
                          </a>
                        </td>
                        <td>
                          <a id="btnEliminar${cargo.idString}" class="btn btn-danger btn-raised btn-sm" 
                              data-toggle=" confirmation" data-title="¿Estas seguro?" data-singleton="true" 
                              data-popout="true" data-href="javascript:onEliminar('${cargo.idString}');"
                              data-btn-ok-label="Si" data-btn-ok-icon="glyphicon glyphicon-share-alt" 
                              data-btn-ok-class="btn btn-success btn-raised btn-sm"                         data-btn-cancel-label="No" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-btn-cancel-class="btn btn-danger btn-raised btn-sm">
                            <span class="fa fa-trash fa-lg"></span>
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
    
    <!-- Required Jquery -->

    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="<?php echo PATH_ASSETS?>/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/SmoothScroll.js"></script>
    <script src="<?php echo PATH_ASSETS?>/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="<?php echo PATH_ASSETS?>/pages/widget/amchart/gauge.js"></script>
    <script src="<?php echo PATH_ASSETS?>/pages/widget/amchart/serial.js"></script>
    <script src="<?php echo PATH_ASSETS?>/pages/widget/amchart/light.js"></script>
    <script src="<?php echo PATH_ASSETS?>/pages/widget/amchart/pie.min.js"></script>
    <script src="<?php echo PATH_ASSETS?>/pages/dashboard/amchart/js/export.min.js"></script>
    <!-- menu js -->
    <script src="<?php echo PATH_ASSETS?>/js/pcoded.min.js"></script>
    <script src="<?php echo PATH_ASSETS?>/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/script.js "></script>
    
    <script type="text/javascript" src="<?php echo PATH_JS?>/sistema/Side.js "></script>
    <script type="text/javascript" class="init">
      $('[data-toggle="confirmation"]').confirmation('hide');
    </script>
</body>

</html>
