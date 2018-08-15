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

    <title>Usuario</title>
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
        <!-- <div id="page-content-wrapper"> -->
          <!--inicio de la ventana modal  -->
  <!--fin  de la ventana modal  -->
          <div class="col-lg-12">
            <!-- barra del boton incluir -->
  
          <br>    

            <!--Inicio de la tabla-->
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"> Usuario</h3>
              </div>
              <div class="panel panel-body">
                <div class="table-responsive">
                  <table id="tabla" class="table table-striped table-bordered table-hover table-condensed">
                    <thead>
                      <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Tipo usuario</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span id="u_cedula"></span>
                        </td>
                        <td>
                          <span id="u_nombre"></span>
                        </td>
                        <td>
                          <span id="u_tipo"></span>
                        </td>
                        <td>
                          <a id="btnEliminar" class="btn btn-danger btn-raised btn-sm" 
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
