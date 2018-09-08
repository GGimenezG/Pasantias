<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess'); 
$tipo = $session['u_tipo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Editar Perfil</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <!--<link rel="icon" href="<?php echo PATH_IMG?>/favicon.ico" type="image/x-icon">-->
    <!-- Google font-->
    <link href="<?php echo PATH_FONT?>/Roboto.woff2" rel="stylesheet">
    <!-- waves.css -->
    <!--<link rel="stylesheet" href="<?php echo PATH_STYLE?>/waves.min.css" type="text/css" media="all">-->
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <!--<link rel="stylesheet" href="<?php echo PATH_STYLE?>/waves.min.css" type="text/css" media="all">-->
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>?>/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/style.css">

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


            <!-- AQUI VA EL BOTON QUE HACE QUE DESAPAREZCA EL NAVBAR-->
            <!--<nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        
                    </div>
            
                </div>
            </nav>-->
    
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <!-- inicio de sideBar -->
                  <?php
                  /*if($session['u_tipo']=="encargado")
                  {
                    include (PATH_MENU . '/SideEnc.php');
                  }
                  elseif($session['u_tipo']=="administrador")
                  {
                    include (PATH_MENU . '/SideAdm.php');
                  }
                  else
                  {
                    include (PATH_MENU . '/SideSec.php');
                  }
                    */
                  ?>

                  <div class="pcoded-content">

                   <!-- <div class="pcoded-content">-->
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item"><a href="#!">admin</a>
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
                                  
                                    <!-- Formulario para editar perfil -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Editar Perfil</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material">
                                                            <div class="form-group form-default">
                                                                <input type="text" name="footer-email" class="form-control" value="<?php echo $session['u_username']; ?>)" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Usuario</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="text" name="footer-email" class="form-control" value="<?php echo $session['u_correo']; ?>)" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Correo (ejemplo@email.com)</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="password" name="footer-email" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Contraseña</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input type="password" name="footer-email" class="form-control" required="">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Confirmar Contraseña</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <button type="button" class="btn btn-success">Guardar                                        
                                                                </button>
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <!--Fin del formulario para editar perfil -->
                                </div>
                            </div>
                        </div>
                   <!-- </div>-->    
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
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery-slimscroll/jquery.slimscroll.js "></script>
<!-- waves js -->
<script src="<?php echo PATH_JS?>/waves.min.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/SmoothScroll.js"></script>     
<script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery.mCustomScrollbar.concat.min.js "></script>
<!-- Custom js -->
<script src="<?php echo PATH_ASSETS?>/js/pcoded.min.js"></script>
<script src="<?php echo PATH_ASSETS?>/js/vertical-layout.min.js "></script>
<script src="<?php echo PATH_ASSETS?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/script.js "></script>
<script type="text/javascript" src="<?php echo PATH_JS?>/custom-dashboard.js"></script>
</body>

</html>
