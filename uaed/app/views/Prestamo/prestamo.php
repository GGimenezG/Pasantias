<!DOCTYPE html>
<html lang="en">
<head>

	<title>Encargado</title>
    
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo PATH_ASSETS?>/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
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
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_ASSETS?>/css/style.css">
      
 
      <link rel="stylesheet" type="text/css" href="<?php echo PATH_DT?>/datatables.min.css"/>

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
                <?php include (PATH_MENU . '/Cabecera.php');?>
                    <div class="pcoded-main-container">
                        <div class="pcoded-wrapper">
                            <!-- inicio de sideBar -->
                            <?php include (PATH_MENU . '/SideEnc.php');?>

                            <div class="pcoded-content">

                                <!-- Page-header start -->
                                <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <div class="page-header-title">
                                                <h5 class="m-b-10">Encargado</h5>
                                                <p class="m-b-0">Bienvenido</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Page-header end -->

                                <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">                     
                                    
                                        <!-- Page-body start -->
                                        <div class="page-body">              
                                        <div class="row">
                                    
                                            <!-- CUERPO DEL ACORDION -->   
                                            <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-header-text">SOLICITUD DE PRÉSTAMO</h4>
                                            </div>

                                            <!-- DATOS PERSONALES -->
                                            <div class="card-block accordion-block color-accordion-block">
                                                <div class="color-accordion" id="color-accordion">
                                                    <a class="accordion-msg b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i> Datos Personales</a>
                                                        <div class="accordion-desc">     
                                            	           <div class="form-group row">
                                            		          <label class="col-sm-2 col-form-label">Cedula</label>
                                            			         <div class="col-sm-3">
                                                        	           <input type="text" class="form-control" placeholder="Ingrese la cédula">
                                                     	          </div>
                                                     		     <button type="button" class="btn btn-danger btn-icon waves-effect waves-light" data-toggle="tooltip" data-placement="top">
                                                        		      <i class="icofont icofont-search-alt-2"></i>
                                                    		      </button>
                                                            </div>		

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Nombre</label>
                                                    	           <div class="col-sm-5">    
                                                        	           <input type="text" class="form-control">
                                                   		           </div>
                                                   	            
                                                            </div>   
                                                	
                                                            <div class="form-group row">
                                                    	       <label class="col-sm-2 col-form-label">Dirección</label>
                                                    	           <div class="col-sm-5">
                                                         	          <input type="text" class="form-control">
                                                    	           </div>
                                                            </div>

                                                            <div class="form-group row">
                                                               <label class="col-sm-2 col-form-label">Telefono</label>
                                                                   <div class="col-sm-5">
                                                                      <input type="text" class="form-control">
                                                                   </div>
                                                            </div>                                         	
                                      		            </div>
                                                                                        
                                                        <!-- DATOS ACADÉMICOS -->
                                                        <a class="accordion-msg b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i> Datos Académicos</a>
                                                            <div class="accordion-desc">     
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Decanato</label>
                                                                        <div class="col-sm-5">    
                                                        	               <input type="text" class="form-control">
                                                                        </div>
                                                                </div>

                                                                 <div class="form-group row">
                                                   	                <label class="col-sm-2 col-form-label">Carrera</label>
                                                                        <div class="col-sm-5">    
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                </div>

                                                                <div class="form-group row">
                                                   	                <label class="col-sm-2 col-form-label">Semestre</label>
                                                                        <div class="col-sm-2">    
                                                        	               <input type="text" class="form-control">
                                                                        </div>
													               <label class="col-sm-1 col-form-label">Lapso</label>
                                                                        <div class="col-sm-2">    
                                                        	               <input type="text" class="form-control">
                                                                        </div>
                                                                </div>      											
                                      		                </div>

                                                        <!-- DATOS ACADÉMICOS -->
                                                        <a class="accordion-msg bg-darkest-primary b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i> Datos de la Solicitud</a>
                                                            <div class="accordion-desc">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Fecha Emisión</label>
                                                    	               <div class="col-sm-3">    
                                                        	               <input type="text" class="form-control">
                                                   		               </div>
                                                   	                <label class="col-sm-2 col-form-label">Fecha Devolución</label>
                                                   		               <div class="col-sm-3">    
                                                        	               <input type="text" class="form-control">
                                                   		               </div>
												                </div>

												                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Tipo Artículo</label>
                                                                        <div class="col-sm-3">
                                                                            <select name="select" class="form-control">
                                                                                <option value="opt1">Selecione</option>
                                                                                <option value="opt2">Muleta</option>
                                                                                <option value="opt3">Silla de Rueda</option>
                                                                                <option value="opt4">Calculadora Científica</option>
                                                                                <option value="opt5">Lupa</option>
                                                                                <option value="opt5">Lupa con luz</option>     
                                                                            </select>
                                                                        </div>

													               <label class="col-sm-2 col-form-label">Artículo</label>
                                                                        <div class="col-sm-3">
                                                                            <select name="select" class="form-control">
                                                                                <option value="opt1">Selecione</option>
                                                                                <option value="opt2">M-01</option>
                                                                                <option value="opt3">M-02</option>  
                                                                            </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                   
													
                                                        <!-- REQUISITOS --> 
                                                        <a class="accordion-msg bg-darkest-primary b-none waves-effect waves-light"> <i class="ti-arrow-circle-down"></i> Requisitos</a>
                                                        <div class="accordion-desc">
                                                
                                                            <!--  Lista de Selección -->
                                                                <div class="col-xl-8 col-md-12">
                                                                    <div class="card table-card">
                                                                        <div class="card-header">
                                                                            <h5>Debe anexar a esta solicitud:</h5>  
                                                                        </div>
                                                                        <div class="card-block">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-hover">
                                                            	                   <tbody>
                                                                	                   <tr>
                                                                    	                   <td>
                                                                        	                   <div class="chk-option">
                                                                            	                   <div class="checkbox-fade fade-in-primary">
                                                                                                        <label class="check-task">
                                                                                                            <input type="checkbox" value="">
                                                                                                            <span class="cr">
                                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                            </span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                
                                                                                                <div class="d-inline-block">
                                                                                                    <p>Fotocopia de Cedula de identidad</p>
                                                                        	                    </div>
                                                                    	                   </td>
                                                                	                   </tr>
                                                                
                                                                	                   <tr>
                                                                    	                   <td>
                                                                        	                   <div class="chk-option">
                                                                            	                   <div class="checkbox-fade fade-in-primary">
                                                                                	                   <label class="check-task">
                                                                                    	                   <input type="checkbox" value="">
                                                                                                                <span class="cr">
                                                                                                                    <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                                </span>
                                                                                	                   </label>
                                                                            	                   </div>
                                                                        	                   </div>
                                                                        
                                                                        	                   <div class="d-inline-block align-middle">
                                                                                                    <div class="d-inline-block">
                                                                                                        <p>Fotocopia de carnet estudiantil</p>
                                                                                                    </div>
                                                                        	                   </div>
                                                                    	                   </td>
                                                                    
                                                                	                   </tr>
                                                                
                                                                	                   <tr>
                                                                    	                   <td>
                                                                        	                   <div class="chk-option">
                                                                            	                   <div class="checkbox-fade fade-in-primary">
                                                                                	                   <label class="check-task">
                                                                                                            <input type="checkbox" value="">
                                                                                                            <span class="cr">
                                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                            </span>
                                                                                	                   </label>
                                                                            	                   </div>
                                                                        	                   </div>
                                                                        	
                                                                        	                   <div class="d-inline-block align-middle">
                                                                            		              <div class="d-inline-block">
                                                                                		              <p>Fotocopia carnet de discapacidad</p>
                                                                            		              </div>
                                                                        	                   </div>
                                                                    	                   </td>
                                                               		                   </tr>
                                                                	
                                                                	                   <tr>
                                                                    	                   <td>
                                                                        	                   <div class="chk-option">
                                                                            	                   <div class="checkbox-fade fade-in-primary">
                                                                                	                   <label class="check-task">
                                                                                    	                   <input type="checkbox" value="">
                                                                                                            <span class="cr">
                                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                            </span>
                                                                                	                   </label>
                                                                            	                   </div>
                                                                        	                   </div>
                                                                        	                   <div class="d-inline-block align-middle">
                                                                                                    <div class="d-inline-block">
                                                                                		              <p>Constancia de estudios o planilla de inscripción vigente</p> 
                                                                                                    </div>
                                                                        	                   </div>
                                                                    	                   </td>
                                                                	                   </tr>

																	                   <tr>
                                                                    	                   <td>
                                                                        	                   <div class="chk-option">
                                                                            	                   <div class="checkbox-fade fade-in-primary">
                                                                                	                   <label class="check-task">
                                                                                    	                   <input type="checkbox" value="">
                                                                                                            <span class="cr">
                                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                            </span>
                                                                                	                   </label>
                                                                            	                   </div>
                                                                        	                   </div>
                                                                                               <div class="d-inline-block align-middle">
                                                                            		              <div class="d-inline-block">
                                                                                		              <p>Informe Médico</p> 
                                                                            		              </div>
                                                                        	                   </div>
                                                                    	                   </td>
                                                                	                   </tr>

                                                                	                   <tr>
                                                                    	                   <td>
                                                                        	                   <div class="chk-option">
                                                                            	                   <div class="checkbox-fade fade-in-primary">
                                                                                	                   <label class="check-task">
                                                                                    	                   <input type="checkbox" value="">
                                                                                    		                  <span class="cr">
                                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                                </span>
                                                                                	                   </label>
                                                                            	                   </div>
                                                                        	                   </div>
                                                                        	                   <div class="d-inline-block align-middle">
                                                                            		              <div class="d-inline-block">
                                                                                		              <p>Informe Psicológico</p> 
                                                                            		              </div>
                                                                        	                   </div>
                                                                    	                   </td>
                                                                	                   </tr>

                                                                	                   <tr>
                                                                    	                   <td>
                                                                        	                   <div class="chk-option">
                                                                            	                   <div class="checkbox-fade fade-in-primary">
                                                                                	                   <label class="check-task">
                                                                                    	                   <input type="checkbox" value="">
                                                                                    		                  <span class="cr">
                                                                                                                <i class="cr-icon fa fa-check txt-default"></i>
                                                                                                               </span>
                                                                                	                   </label>
                                                                            	                   </div>
                                                                        	                   </div>
                                                                        	                   <div class="d-inline-block align-middle">
                                                                            		              <div class="d-inline-block">
                                                                                		              <p>Informe Socioeconómico</p> 
                                                                            		              </div>
                                                                        	                   </div>
                                                                    	                   </td>
                                                                	                   </tr>

                                                            	                   </tbody>
                                                        	                   </table> 
                                                                            </div> <!-- Fin table responsive -->
                                                                        </div> <!-- Fin card block -->
                                                                    </div> <!-- Fin card table -->
                                                                </div> <!-- Fin columnas -->
                                                            </div>
                				                        </div>  <!-- Fin color accordion -->
                				
                				                        <!-- BOTONES -->
                                                        <div class="text-center">
    								                        <button class="btn waves-effect waves-light btn-round btn-danger center-block"><i class="ti-close"></i>Cancelar</button>
    								                        <button class="btn waves-effect waves-light btn-danger btn-round"><i class="ti-save"></i>Guardar</button>
								                        </div> 
                                            
                                                </div> <!-- Fin color accordion --> 
                                            </div> <!-- Fin card block --> 
                       	                </div> <!-- Fin card -->
                                            </div> <!-- Fin col lg -->
                                        </div> <!-- Fin row -->
                                        </div> <!-- Fin page body -->
                                    </div> <!-- Fin page wrapper -->
                                </div> <!-- Fin main body -->
                                </div>  <!-- Fin content -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


	<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
	<!-- jquery slimscroll js -->
	<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
	<!-- modernizr js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
	<!-- waves js -->
	<script src="assets/pages/waves/js/waves.min.js"></script>
	<!-- Accordion js -->
	<script type="text/javascript" src="assets/pages/accordion/accordion.js"></script>
	<!-- Custom js -->
	<script src="assets/js/pcoded.min.js"></script>
	<script src="assets/js/vertical-layout.min.js "></script>
	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
		
</body>
</html>