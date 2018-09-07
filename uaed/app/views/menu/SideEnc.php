<?php defined('BASEPATH') or header('location: /sis/erroraccess');?>
<script>
  $(function() {
  
  // elementos de la lista
  var menues = $(".nav ul li"); 

  // manejador de click sobre todos los elementos
  menues.click(function() {
     // eliminamos active de todos los elementos
     menues.removeClass("active");
     // activamos el elemento clicado.
     $(this).addClass("active");
  });

});

</script>
<nav class="pcoded-navbar">
  <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
  <div class="pcoded-inner-navbar main-menu">
      <div class="">
          <div class="main-menu-header">
              <img class="img-80 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image">
              <div class="user-details">
                  <span id="more-details"><i class="fa fa-caret-down"></i><?php echo $session['u_nombre'];?></span>
              </div>
          </div>

          <div class="main-menu-content">
              <ul>
                  <li class="more-details">
                      <a href="user-profile.html"><i class="ti-user"></i>Perfil</a>
                      <a href="<?= FOLDER_PATH . '/'.$tipo.'/logout' ?>"><i class="ti-layout-sidebar-left"></i>Desconectar</a>
                  </li>
              </ul>
          </div>
      </div>
      <ul class="pcoded-item pcoded-left-item">
        <li class="active">
            <a href="<?= FOLDER_PATH . '/'.$tipo.'' ?>" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.main">Inicio</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
      </ul>
      <div class="pcoded-navigation-label" data-i18n="nav.category.other">Servicios</div>
      <ul class="pcoded-item pcoded-left-item">
          <li class="pcoded-hasmenu ">
              <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                  <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Estudiante</span>
                  <span class="pcoded-mcaret"></span>
              </a>
              <ul class="pcoded-submenu">
                  <li >
                      <a href="<?= FOLDER_PATH . '/Estudiante' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Gestión discapacidad</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li class="pcoded-hasmenu ">
                      <a href="javascript:void(0)" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Gestión de Prestamo</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                      <ul class="pcoded-submenu">
                          <li class="">
                              <a href="<?= FOLDER_PATH . '/articulo' ?>" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Articulo</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                          <li class="">
                              <a href="<?= FOLDER_PATH . '/prestamo' ?>" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                  <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Prestamo</span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>                          
                      </ul>
                  </li>

              </ul>
          </li>
          <li class="pcoded-hasmenu ">
              <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                  <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Reportes</span>
                  <span class="pcoded-mcaret"></span>
              </a>
              <ul class="pcoded-submenu">
                  <li >
                      <a href="<?= FOLDER_PATH . '/reporte' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Reporte 1</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li >
                      <a href="<?= FOLDER_PATH . '/reporte' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Reporte 2</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li >
                      <a href="<?= FOLDER_PATH . '/reporte' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Reporte N</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
          </li>          
      </ul>
      <div class="pcoded-navigation-label" data-i18n="nav.category.other">Configuración</div>
      <ul class="pcoded-item pcoded-left-item">
          <li class="pcoded-hasmenu ">
              <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                  <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Maestros</span>
                  <span class="pcoded-mcaret"></span>
              </a>
              <ul class="pcoded-submenu">
                  <li >
                      <a href="<?= FOLDER_PATH . '/tipodiscapacidad' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Tipo de discapacidad</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li >
                      <a href="<?= FOLDER_PATH . '/grado' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Grado de discapacidad</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li >
                      <a href="<?= FOLDER_PATH . '/tiporequerimiento' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Tipo de requerimiento</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li >
                      <a href="<?= FOLDER_PATH . '/requerimiento' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Requerimiento de aula</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li >
                      <a href="<?= FOLDER_PATH . '/regimen' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Regimen</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li >
                      <a href="<?= FOLDER_PATH . '/tipoarticulo' ?>" class="waves-effect waves-dark">
                          <span class="pcoded-micon"><i class="fa fa-plus"></i></span>
                          <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Tipo de articulo</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>                    
              </ul>
          </li>
      </ul>      
  </div>
</nav>