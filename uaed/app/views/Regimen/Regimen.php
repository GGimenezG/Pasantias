<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
$tipo = $session['u_tipo'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Encargado</title>
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
      <link rel="icon" href="<?php echo PATH_IMG?>/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="<?php echo PATH_FONTS?>/Roboto.woff2" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo PATH_STYLE?>/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo PATH_STYLE?>/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
      <link rel="stylesheet" href="<?php echo PATH_STYLE?>/export.css" type="text/css" media="all" />

    <script type="text/javascript" src="<?php echo PATH_JS?>/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/jquery-ui.min.js "></script>

      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/style.css">
  </head>
  <style media="screen">
    #modalTamano{
      width: 80%;
    }
  </style>
  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
              <!-- navbar -->
              <?php
                  include (PATH_MENU . '/Cabecera.php');
              ?>
         
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                 <!-- inicio de sideBar -->
                  <?php
                    include (PATH_MENU . '/SideEnc.php');
                  ?>
                  <div class="pcoded-content">

                      <!-- Page-header 
                        
                        ACOMODAR
                              
                        start -->

                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Welcome to Mega Able</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->

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
                                                        <?php foreach ($params as $r) { ?>      

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

                                            <!--  project and team member end -->
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Required Jquery -->

    <script type="text/javascript" src="<?php echo PATH_JS?>/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/excanvas.js "></script>
    <!-- waves js -->
    <script src="<?php echo PATH_JS?>/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo PATH_JS?>/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo PATH_JS?>/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?php echo PATH_JS?>/SmoothScroll.js"></script>
    <script src="<?php echo PATH_JS?>/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?php echo PATH_JS?>/Chart.js"></script>
    <!-- amchart js -->
    <script src="<?php echo PATH_JS?>/amcharts.js"></script>
    <script src="<?php echo PATH_JS?>/gauge.js"></script>
    <script src="<?php echo PATH_JS?>/serial.js"></script>
    <script src="<?php echo PATH_JS?>/light.js"></script>
    <script src="<?php echo PATH_JS?>/pie.min.js"></script>
    <script src="<?php echo PATH_JS?>/export.min.js"></script>
    <!-- menu js -->
    <script src="<?php echo PATH_JS?>/pcoded.min.js"></script>
    <script src="<?php echo PATH_JS?>/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?php echo PATH_JS?>/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/script.js "></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/sistema/regimen.js "></script>    
    <script type="text/javascript" src="<?php echo PATH_JS?>/sistema/Side.js "></script>




</body>

</html>

