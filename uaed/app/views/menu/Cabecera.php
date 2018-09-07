<?php defined('BASEPATH') or header('location: /sis/erroraccess');

?>       
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <!-- logo -->
            <a href="<?= FOLDER_PATH . '/'.$tipo.'' ?>">
                <img class="img-fluid" src="<?php echo PATH_IMG?>/logo.png" alt="Theme-Logo" />
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="ti-more"></i>
            </a>
        </div>
      
        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                  <!-- opciones del usuario navbar -->
                    <a href="#!" class="waves-effect waves-light">
                        <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                        <span><?php echo $session["u_nombre"];?></span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li class="waves-effect waves-light">
                            <a href="<?= FOLDER_PATH . '/Perfil/PerfilController.php' ?>">
                                <i class="ti-user"></i> Perfil
                            </a>
                        </li>
                        <li class="waves-effect waves-light">
                            <a href="<?= FOLDER_PATH . '/'.$tipo.'/logout' ?>">
                                <i class="ti-layout-sidebar-left"></i> Desconectar
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
