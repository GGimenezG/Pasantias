<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess'); 
$tipo = $session['u_tipo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nuevo Usuario</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo PATH_STYLE?>/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="<?php echo PATH_FONTS?>/Roboto.woff2" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo PATH_STYLE?>/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?php echo PATH_STYLE?>/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/jquery.mCustomScrollbar.css">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="<?php echo PATH_STYLE?>/export.css" type="text/css" media="all" />

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/style.css">

     <link rel="stylesheet" type="text/css" href="<?php echo PATH_DT?>/datatables.min.css">
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
              include (PATH_MENU . '/SideAdm.php');
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


                          <div class="panel panel-info">
                            <div class="panel-heading">
                              <h3 class="panel-title"> Usuarios </h3>
                            </div>
                            <div class="panel panel-body">
                                                
                              <table id="tabla" class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Usuario</th>
                                    <th>Tipo de Usuario</th>                                         
                                    <th>Eliminar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($params as $r) { ?>      

                                  <tr>
                                    <td>
                                      <span class="f-12" id="cedula<?php echo $r['u_cedula']; ?>"><?php echo $r['u_cedula']; ?></span>
                                    </td>
                                    <td>
                                      <span class="f-12" id="nombre<?php echo $r['u_cedula']; ?>"><?php echo $r['u_nombre']; ?> </span>
                                    </td>
                                    <td>
                                      <span class="f-12" id="username<?php echo $r['u_cedula']; ?>"><?php echo $r['u_username']; ?> </span>
                                    </td>
                                    <td>
                                      <span class="f-12" id="tipo<?php echo $r['u_cedula']; ?>"><?php echo $r['u_tipo']; ?> </span>
                                    </td>
                                    <td>
                                      <a id="btnEliminar<?php echo $r['u_cedula']; ?>" class="btn btn-danger btn-raised btn-sm" 
                                        data-toggle="confirmation" 
                                        data-title="¿Está seguro?" 
                                        data-singleton="true" 
                                        data-popout="true" 
                                        data-href="javascript:onEliminar(<?php echo $r['u_cedula']; ?>);"
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
                        <!--fin de la tabla-->



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
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/excanvas.js "></script>
    <!-- waves js -->
    <script src="<?php echo PATH_JS?>/waves.min.js"></script>
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
    <script src="<?php echo PATH_JS?>/amcharts.js"></script>
    <script src="<?php echo PATH_JS?>/gauge.js"></script>
    <script src="<?php echo PATH_JS?>/serial.js"></script>
    <script src="<?php echo PATH_JS?>/light.js"></script>
    <script src="<?php echo PATH_JS?>/regimen.js"></script>
    <script src="<?php echo PATH_JS?>/pie.min.js"></script>
    <script src="<?php echo PATH_JS?>/export.min.js"></script>
    <!-- menu js -->
    <script src="<?php echo PATH_ASSETS?>/js/pcoded.min.js"></script>
    <script src="<?php echo PATH_ASSETS?>/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?php echo PATH_JS?>/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/script.min.js "></script>

    <script type="text/javascript" charset="utf8" src="<?php echo PATH_DT?>/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo PATH_JS?>/sistema/gusuario.js"></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/sistema/Side.js "></script>
</body>
</html>