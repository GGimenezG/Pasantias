<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');
$tipo = $session['u_tipo'];
extract($params);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Gestión estudiante</title>
    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo PATH_ASSETS?>/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="<?php echo PATH_FONTS?>/Roboto.woff2" rel="stylesheet">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo PATH_ASSETS?>/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/bootstrap/css/bootstrap.min.css">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/jquery.mCustomScrollbar.css">
      <!-- am chart export.css -->
      <link rel="stylesheet" href="<?php echo PATH_ASSETS?>/pages/widget/amchart/css/export.css" type="text/css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/bootstrap-datepicker.css">
      <!-- notificaciones -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/snarl.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_DT?>/datatables.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_CONFIRM?>/jquery-confirm.css">
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
                    include (PATH_MENU . '/SideEnc.php');
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
                                          <h5 class="m-b-10">Gestión Estudiante</h5>
                                          <p class="m-b-0">Bienvenido</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="index.html"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Discapacidad</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="snarl-wrapper-bottom"></div>
                    <!-- Page-header end -->
                      <div class="pcoded-inner-content">
                          <!-- Main-body start -->
                          <div class="main-body">
                              <div class="page-wrapper">
                                  <!-- Page-body start -->
<div class="page-body">              
  <div class="row">
  <!-- CUERPO DEL ACORDION -->

    <div class="col-lg-12">
      <div class="card o-visible">
        <div class="card-header">
          <h4 class="card-header-text">DATOS</h4>
         
        </div>
        <form class="form-material" id="estudiante" name="estudiante" action="<?= FOLDER_PATH . '/EstudiantePDF/' ?>" target="_blank" method="POST">
        <div class="card-block accordion-block color-accordion-block">
          <div class="color-accordion" id="color-accordion">
          <!-- DATOS PERSONALES -->
            <a class="accordion-msg b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i>Estudiante
            </a>
              <div class="accordion-desc">     
                <div class="form-group row form-default">
                  <div class="col-4">
                    <input class="form-control" name="e_cedula" id="e_cedula" required="" type="text">
                    <span class="form-bar"></span>
                    <label class="float-label">Cédula</label>
                  </div>
                  <div class="col-1">
                    <button type="button" class=" btn btn-warning btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" onclick="b_estudiante();">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>    
                <div class="form-group row form-static-label">
                  <div class="col-9">
                    <input class="form-control" name="e_nombre" id="e_nombre" readonly="" type="text">
                    <span class="form-bar"></span>
                    <label class="float-label">Nombre</label>
                  </div>
                  
                  <div class="col-3" >
                    <input class="form-control" name="e_semestre" id="e_semestre" readonly="" type="text">
                    <span class="form-bar"></span>
                    <label class="float-label">Semestres</label>
                  </div>
                </div>   
                <div class="form-group row form-static-label">
                  <div class="col-7">
                    <input class="form-control" name="e_carrera" id="e_carrera" readonly="" type="text">
                    <span class="form-bar"></span>
                    <label class="float-label">Carrera</label>
                  </div>
                  
                  <div class="col-5">
                    <input class="form-control" name="e_decanato" id="e_decanato" readonly="" type="text">
                    <span class="form-bar"></span>
                    <label class="float-label">Decanato</label>
                  </div>
                </div>    
              </div>
                            
              <!-- DATOS DE LA DISCAPACIDAD --> 
              <a class="accordion-msg bg-darkest-primary b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i> Certificado de Discapacidad</a>
              <div class="accordion-desc">
                <div id="certificado" name="certificado">
                <div class="form-group row form-default">
                  <div class="col-4">
                      <input class="form-control" name="c_codigo" id="c_codigo" type="text">
                    <span class="form-bar"></span>
                    <label class="float-label">Código</label>
                  </div>
                  <div class="col-1">
                    <button type="button" class=" btn btn-warning btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" onclick="b_certificado();">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>                     
                <div class="form-group row form-default">
                 <div class="input-group date col-4">
                      <input type='text' class="form-control" id="c_emision" name="c_emision" placeholder="Emisión" />
                      <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                      </span>
                  </div>   
                  <div class="input-group date col-4">
                      <input type='text' class="form-control" id="c_vencimiento" name="c_vencimiento" placeholder="Vencimiento" />
                      <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                      </span>
                  </div>                  
                </div>
                </div> 
                  <div class="text-center">
                    <button class="btn waves-effect waves-light btn-danger btn-round"><i class="ti-save"></i>Guardar</button>
                  </div>
              </div>              
              <a class="accordion-msg bg-darkest-primary b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i> Discapacidad</a>
              <div class="accordion-desc">
                <div class="form-group row">
                  <div class="col-3">
                    <label class="col-form-label">Tipo</label>
                  </div>
                  <div class="col-3">
                    <label class="col-form-label">Grado</label>
                  </div>
                  <div class="col-3">
                    <label class="col-form-label">Régimen</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-3 col-push-0">
                    <select id="td_codigo" name="td_codigo" class="form-control-round custom-select d-block w-100">
                      <option value="-1">Seleccione</option>
                      <?php if(isset($discapacidad)){ foreach ($discapacidad as $d ) { ?>
                      <option value="<?php echo $d['td_codigo']; ?>"><?php echo $d['td_nombre']; ?></option>
                      <?php }} ?>  
                    </select>
                  </div>
                  <div class="col-2 col-push-3">
                    <select id="g_codigo" name="g_codigo" class="form-control-round custom-select d-block w-100">
                      <option value="-1">Seleccione</option>
                      <?php if(isset($grado)){ foreach ($grado as $g ) { ?>
                      <option value="<?php echo $g['g_codigo']; ?>"><?php echo $g['g_nombre']; ?></option>
                      <?php }} ?>  
                    </select>
                  </div>
                  <div class="col-3 col-push-5">
                    <select id="rg_codigo" name="rg_codigo" class="form-control-round custom-select d-block w-100">
                      <option value="-1">Seleccione</option>
                      <?php if(isset($regimen)){ foreach ($regimen as $rg ) { ?>
                      <option value="<?php echo $rg['rg_codigo']; ?>"><?php echo $rg['rg_nombre']; ?></option>
                      <?php }} ?>    
                    </select>
                  </div>
                  <div class="input-group date col-2 col-push-8">
                      <input type='text' class="form-control" name="d_duracion" id="d_duracion" />
                      <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                      </span>
                  </div>  
                  <div class="col-1 col-push-10">
                    <button id="agregarD" name="agregarD" type="button" class=" btn btn-warning btn-icon waves-effect waves-light" onclick="Agregar_D();">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>                
                </div>
                <!-- Table Discapacidad-->
                <div class="card">
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table name="tablaD" id="tablaD" class="table">
                        <thead>
                          <tr>
                              <th>Tipo</th>
                              <th>Grado</th>
                              <th>Regimen</th>
                              <th>Hasta</th>
                          </tr>
                        </thead>

                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> 
                <!-- Fin Table -->
              </div>
              <!-- DATOS DE REQUERIMIENTOS --> 
              <a class="accordion-msg bg-darkest-primary b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i> Requerimientos de Aula</a>
              <div class="accordion-desc">
                <div class="form-group row">
                  <div class="col-3">
                    <label class="col-form-label">Requerimiento</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-3">
                    <select id="r_codigo" name="r_codigo" class="form-control-round custom-select d-block w-100">
                      <option value="-1">Seleccione</option>
                      <?php if(isset($requerimiento)){ foreach ($requerimiento as $r ) { ?>
                      <option value="<?php echo $r['r_codigo']; ?>"><?php echo $r['r_nombre']; ?></option>
                      <?php }} ?>    
                    </select>
                  </div>
                  <div class="col-3">
                    <button id="agregarR" name="agregarR" type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top" onclick="Agregar_R();">
                      <i class="ti-plus"></i>
                    </button>
                  </div>                
                </div>
                <!-- Table -->
                <div class="card">
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table name="tablaR" id="tablaR" class="table">
                        <thead>
                          <tr>
                              <th>Requerimeitno</th>
                          </tr>
                        </thead>

                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> 
                <!-- Fin Table -->
              </div>

          </div> 
        </div>  <!-- Fin color accordion -->

        <div class="text-center">
            <button type="submit"  class="btn-dark">Imprimir</button>
           <a type="submit" target="_blank" class="waves-effect waves-dark">
              <span class="pcoded-micon"><i class="ti-print"></i></span>
              <span class="pcoded-mtext" >Imprimir</span>
              <span class="pcoded-mcaret"></span>
          </a>        
         </div>
        </form>
      </div> <!-- Fin card block -->  
    </div> <!-- Fin card -->
  </div> <!-- Fin col lg -->
</div> <!-- Fin row -->
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
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/bootstrap-datepicker.es.min"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/SmoothScroll.js"></script>
    <script src="<?php echo PATH_ASSETS?>/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- waves js -->
    <script src="<?php echo PATH_ASSETS?>/pages/waves/js/waves.min.js"></script>

    <!-- Accordion js -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/pages/accordion/accordion.js"></script>
    <!-- Custom js -->
    <script src="<?php echo PATH_ASSETS?>/js/pcoded.min.js"></script>
    <script src="<?php echo PATH_ASSETS?>/js/vertical-layout.min.js "></script>
    <script src="<?php echo PATH_ASSETS?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/script.js"></script>   
    <script type="text/javascript" src="<?php echo PATH_JS?>/sistema/Side.js "></script>
    <script type="text/javascript" src="<?php echo PATH_JS?>/estudiante.js "></script>

    <!-- notificaciones -->
    <script type="text/javascript" src="<?php echo PATH_ASSETS?>/js/snarl.js"></script>

    <script type="text/javascript" src="<?php echo PATH_CONFIRM?>/jquery-confirm.js"></script>

    
</body>

</html>


