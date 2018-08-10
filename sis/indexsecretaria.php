<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../lib/bs/bootstrap.min.css" >
    <link rel="stylesheet" href="../lib/css/font-awesome/css/font-awesome.min.css" >
    <link rel="stylesheet" href="../bs/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="css/style1.css" >
    <link rel="stylesheet" href="css/style2.css" >

    <title>Administrador</title>
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
            <h1><b href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </b></h1>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../lib/js/jquery-3.1.1.min.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <script src="../lib/js/menu.js"></script>
    

</body>

</html>
