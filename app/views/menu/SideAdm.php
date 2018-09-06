<?php defined('BASEPATH') or header('location: /sis/erroraccess');?>
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
      <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Usuario</div>
      <ul class="pcoded-item pcoded-left-item">
          <li class="active">
              <a href="index.html" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                  <span class="pcoded-mtext" data-i18n="nav.dash.main">Nuevo</span>
                  <span class="pcoded-mcaret"></span>
              </a>
          </li>
          <li class="pcoded-hasmenu">
              <a href="javascript:void(0)" class="waves-effect waves-dark">
                  <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                  <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Gestión</span>
                  <span class="pcoded-mcaret"></span>
              </a>
          </li>
      </ul>
  </div>
</nav>