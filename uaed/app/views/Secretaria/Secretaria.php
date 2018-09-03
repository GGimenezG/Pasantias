<?php defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess'); ?>
<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href= "<?php echo PATH_BOOTSTRAP?>/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo PATH_BOOTSTRAP?>/font-awesome/css/font-awesome.min.css" >
    <link rel="stylesheet" href="<?php echo PATH_BOOTSTRAP?>/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="<?php echo PATH_STYLE?>/style1.css" >
    <link rel="stylesheet" href="<?php echo PATH_STYLE?>/style2.css" >

    <title> Secretaria </title>
</head>

<style media="screen">
  #modalTamano{
    width: 80%;
  }
</style>
<body>
  
   <nav id="collapse-2" class="navbar navbar-default no-margin">
    <!-- Cabecera Menu -->
     
            <?php
              include (PATH_MENU . '/cabecerasecretaria.php');
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
              include(PATH_MENU . "/menusecretaria.php");
            ?>

          </ul>
        </div><!-- fin barra de menu  -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <!--inicio de la ventana modal  -->
            <h1><b href="">Bienvenido <strong><?php echo 'user';?></strong> </b></h1>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo PATH_JS?>/jquery-3.3.1.min.js"></script>
    <script src="<?php echo PATH_JS?>/bootstrap.min.js"></script>
    <script src="<?php echo PATH_JS?>/menu.js"></script>
    

</body>

</html>
