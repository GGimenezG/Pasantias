<?php defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ingreso al Sistema</title>

      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="Descripción" content="Esta es la página de login al sistema [INSERTE NOMBRE AQUÍ], perteneciente a la 
      Unidad de Apoyo al Estudiante con Discapacidad de la UCLA." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />

      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo PATH_IMG?>/favicon.ico" type="image/x-icon">
      <!-- Google font-->     
      <link href="<?php echo PATH_FONTS?>/Roboto.woff2" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo PATH_STYLE?>/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_STYLE?>/style.css">

  </head>

  <body themebg-pattern="theme1">
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
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material" id="login" name="login" action="<?= FOLDER_PATH . '/home/login' ?>" method="POST">
                            <div class="text-center">
                                <img src="<?php echo PATH_IMG?>/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box card">
                              <!-- Aquí empieza el card del login-->
                                <div id="card-1" class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 id="inicio" class="text-center" name="inicio">Iniciar Sesión</h3>
                                        </div>
                                    </div>
                                    <div id="user" class="form-group form-primary">
                                        <input type="text" name="u_username" id="u_username" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label" for="u_username"> Usuario </label>
                                    </div>
                                    <div id="pass" class="form-group form-primary">
                                        <input type="password" name="u_password" id="u_password" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label" for="u_password"> Contraseña </label>
                                    </div>
                                    <div id="forgot" class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="forgot-phone ">
                                                <a href="#" class="text-right f-w-600"> ¿Olvidaste la contraseña? </a>
                                            </div>
                                        </div>
                                    </div>                             
                                    <div class="row m-t-30">
                                        <div id="alerta"></div>
                                        <div class="col-md-12">
                                            <button id="registro" type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" onclick="onEnviar();"> Entrar </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                              <p id="noRegistrado">¿No estás registrado?<a href="#" class="text-right f-w-600" onclick="Mostrar();"> Click aquí </a></p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </form>
                            <!-- Aquí termina el formulario del login-->
                            <!-- Aquí empieza el formulario del registrar-->
                            <form class="md-float-material form-material" id="formRegistro" name="formRegistro" action="<?= FOLDER_PATH . '/home/login' ?>" method="POST">
                              <div class="auth-box card">
                                <div id="card-2" class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center" name="registrarse">Registrarse</h3>
                                        </div>
                                    </div>
                                    <div id="usuario" class="form-group form-primary">
                                        <input type="text" name="u_username" id="u_username" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label" for="u_username"> Usuario </label>
                                    </div>
                                    <div id="cedula" class="form-group form-primary">
                                      <input type="text" name="u_cedula" id="u_cedula" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label" for="u_cedula"> Cédula </label>
                                    </div>
                                    <div id="correo" class="form-group form-primary">
                                        <input type="email" id="u_email" name="u_email" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label" for="u_email"> Correo Electrónico </label>
                                    </div>
                                    <div id="confirme" class="form-group form-primary">
                                        <input type="email" id="cemail" name="cemail" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label"> Confirme Correo </label>
                                    </div>
                                    <div id="clave" class="form-group form-primary">
                                        <input type="password" name="u_password" id="u_password" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label" for="u_password"> Contraseña </label>
                                    </div>
                                    <div id="confirmp" class="form-group form-primary">
                                        <input type="password" id="cpass" name="cpass" class="form-control" required="">
                                        <span class="form-bar"></span>
                                        <label class="float-label"> Confirme Contraseña </label>
                                    </div>                        
                                    <div class="row m-t-30">
                                        <div id="mensajes" name="mensajes"></div>
                                        <div class="col-md-12">
                                            <button id="registro" type="button" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20" onclick="Registrar();"> Registrar </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                              <a href="#" id="volver" onclick="Regresar();"> Volver </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Aquí termina el card del registrar-->
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <div class="text-center">
      <img src="<?php echo PATH_IMG?>/portada.png" alt="portada.png" class="imagen">
    </div>

  <script type="text/javascript" src="<?php echo PATH_JS?>/login.js"></script>
  <script type="text/javascript" src="<?php echo PATH_JS?>/validaciones.js"></script>

  <!-- Required Jquery -->
  <script type="text/javascript" src="<?php echo PATH_JS?>/jquery.min.js"></script>    
  <script type="text/javascript" src="<?php echo PATH_JS?>/jquery-ui.min.js "></script>     
  <script type="text/javascript" src="<?php echo PATH_JS?>/popper.min.js"></script>     
  <script type="text/javascript" src="<?php echo PATH_JS?>/bootstrap.min.js "></script>
  <script type="text/javascript" src="<?php echo PATH_JS?>/bootstrap.4.0.0.min.js "></script>
  <!-- waves js -->
  <script src="<?php echo PATH_JS?>/waves.min.js"></script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript" src="<?php echo PATH_JS?>/jquery.slimscroll.js "></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="<?php echo PATH_JS?>/SmoothScroll.js"></script>     
  <script src="<?php echo PATH_JS?>/jquery.mCustomScrollbar.concat.min.js "></script>
  <!-- i18next.min.js -->
  <!--<script type="text/javascript" src="bower_components/i18next/js/i18next.min.js"></script>
  <script type="text/javascript" src="bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
  <script type="text/javascript" src="bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>-->
  <script type="text/javascript" src="<?php echo PATH_JS?>/common-pages.js"></script>

  <script type="text/javascript" class="init">
      $('[data-toggle="confirmation"]').confirmation('hide');
    </script>
</body>

</html>
