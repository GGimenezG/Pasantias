<!DOCTYPE html>
<html lang="es">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
        <link href="../bs/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <title>Pagina Principal</title>
    </head>

    <body>
    <!-- Navegacion -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
            <!-- agrupacion para una mejor visualización móvil -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" 
                            data-target="#collapse-1"> Menu 
                    <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand">NonmbreSIstema</a>
                </div>

                <div class="collapse navbar-collapse" id="collapse-1">
                    <ul class="nav navbar-nav navbar-right"></ul>
                </div>
            </div>
        </nav>

    <!-- Cabecera -->
    <header>
        <div class="container">
                <div class="col-lg-6">
                    <img class="img-responsive" src="../../sis/img/portada.png" alt="">      
                </div>
                <div class="col-lg-6">
                    <div class="col-md-12" class="panel-default">
                        <div class="panel-body" style="background-color:deepskyblue">
							<div id="mensajesError"></div>
                            <form class="form" accept-charset="UTF-8" id="login-nav" name="login" action="clslogin.php" method="post">
                                <legend id="leyenda">Inicia sesión</legend>
                                <div class="form-group">
                                    <label class="control-label" for="usuario">
                                        <span class="glyphicon glyphicon-user"></span>USUARIO
                                    </label>
                                    <input class="form-control" type="text" name="usuario" id="usuario" maxlength="15"  placeholder="usuario" required="on">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="clave">
                                        <span class="glyphicon glyphicon-lock"></span>CONTRASEÑA
                                    </label>
                                    <input class="form-control" type="password" name="clave" id="clave" maxlength="20"  placeholder="●●●●●●●●" required="on">
                                    <div class="help-block text-right">
                                        <a href="#">¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button id="btn1" type="submit" class="btn btn-primary btn-block btn-md"> ENTRAR 
                                    </button>
    				            </div>
                            </form>
                            <div class="form-group text-center">
                                <a href="#noRegistrado" class="servicios-link" data-toggle="modal"><b>¿No tienes una cuenta?</b></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </header>

    <!-- jQuery -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/inicio.js" ></script>
    <script src="../js/login.js" ></script>
    <script src="../js/funciones.js" ></script>
    </body>
</html>
