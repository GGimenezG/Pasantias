<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
$tipo = $session['u_tipo'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tipo de Artículo</title>
    
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
      <link rel="stylesheet" type="text/css" href="/uaed2/lib/confirm/jquery-confirm.min.css">
      
 
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_DT?>/datatables.min.css"/>
  </head>

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
              <div class="page-header">
                <div class="page-block">
                  <div class="row align-items-center">
                    <div class="col-md-8">
                      <div class="page-header-title">
                        <h5 class="m-b-10">Tipo de Artículo</h5>
                        <p class="m-b-0">Bienvenido</p>
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
                          <div class="modal fade" id="ModalRegistro" tabindex="-1" role="dialog" aria-labelledby="registro-modal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h5 class="modal-title" id="registro-modal">Registrar Tipo de Artículo</h5>
                                </div>
                                <div class="modal-body">
                                  <div id="mensajesError"></div>
                                    <form class="form-horizontal" id="formTart" name="formArticulo">
                                      <div class="panel panel-info">
                                        <!--inicio del panel-->
                                        <div class="panel-heading">
                                          <h3 class="panel-title">Tipo de Artículo</h3>
                                        </div>
                                        <div class="panel-body">
                                          <!--inicio del cuerpo del panel-->
                                          <div class="col-md-6">
                                          <!--columna izquierda del formulario-->
                                            <!-- primer campo a la izquierda -->
                                            <div id='acodigo' name="acodigo" class="form-group has-info">
                                              <label class="float-label" for="codigo"><span class="fa fa-briefcase fa-lg"></span> Código: </label>
                                              <input type="text" name="codigo" class="form-control" required="" id="codigo"/>
                                              <!--help-block es para que salga el texto debajo del input al hacer clic-->
                                            </div>       
                                            <div class="form-group has-info label-floating">
                                              <label class="float-label" for="nombre"><span class="fa fa-briefcase fa-lg"></span> Nombre: </label>
                                              <input type="text" name="nombre" class="form-control" required="" id="nombre"/>
                                              <!--help-block es para que salga el texto debajo del input al hacer clic-->
                                            </div>
                                          </div><!--fin de columna izquierda -->
                                          <div class="col-md-6"> <!-- columna derecha -->
                                            <div class="form-group has-info">
                                              <label class="float-label" for="descrp"><span class="fa fa-edit fa-lg"></span> Descripción: </label>
                                              <textarea class="form-control" name="descrp" rows="4" cols="6" id="descrp" required=""></textarea>
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
                                          
                          <div class="col-12">
                            <div class="card o-visible">
                              <div class="card-header">
                                <h5>Artículo</h5>
                              </div>
                              <div class="card-block tooltip-pop">
                                <!-- barra del boton incluir -->
                                <div class="navbar navbar-info"">
                                  <div class="container">
                                    <table class="col-md-10">
                                      <tr>
                                        <td>
                                          <a class="navbar-btn btn btn-success btn-raised" data-toggle="modal" data-target="#ModalRegistro" onclick="onIncluir();"> Registrar&nbsp;
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
                              <div>
                                <table id="tabla" class="table table-striped table-bordered table-hover">
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
                                  <?php foreach ($params as $ta) { ?>      

                                    <tr>
                                      <td>
                                        <span class="f-12" id="codigo<?php echo $ta['ta_codigo']; ?>"><?php echo $ta['ta_codigo']; ?></span>
                                      </td>
                                      <td>
                                        <span class="f-12" id="nombre<?php echo $ta['ta_nombre']; ?>"><?php echo $ta['ta_nombre']; ?> </span>
                                      </td>
                                      <td>
                                        <span class="f-12" id="descrp<?php echo $ta['ta_descrp']; ?>"><?php echo $ta['ta_descrp']; ?> </span>
                                      </td>
                                      <td>
                                        <a class="btn btn-success btn-raised btn-sm" data-toggle="modal"
                                                                  data-target="#ModalRegistro" onclick="onConsultar(<?php echo $ta['ta_codigo']; ?>);">
                                          <span class="fa fa-eye fa-lg"></span>
                                        </a>
                                      </td>
                                      <td>
                                        <a class="btn btn-warning btn-raised btn-sm" data-toggle="modal"
                                                                 data-target="#ModalRegistro" onclick="onModificar(<?php echo $ta['ta_codigo']; ?>);">
                                          <span class="fa fa-edit fa-lg"></span>
                                        </a>
                                      </td>
                                      <td>
                                        <a id="btnEliminar<?php echo $ta['ta_codigo']; ?>" 
                                                                 class="btn btn-danger btn-raised btn-sm btn-red">
                                          <span class="fa fa-trash fa-lg"></span>
                                        </a>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                            <!--fin de la tabla-->                                                                                            
                          </div>
                                              
                        </div>
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
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery-ui/jquery-ui.min.js "></script>
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
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/amcharts.js "></script>
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

    <script type="text/javascript" src="<?php echo PATH_DT?>/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/sistema/tipoart.js "></script>    
    <script type="text/javascript" src="<?php echo PATH_JS?>/sistema/Side.js "></script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover({
            html: true,
            content: function() {
                return $('#primary-popover-content').html();
            }
        });
    });

</script>
  </body>
</html>