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
        <script src="<?php echo PATH_JS?>/jquery-3.3.1.min.js"></script>
    <script src="<?php echo PATH_JS?>/bootstrap.min.js"></script>
    <script src="<?php echo PATH_JS?>/menu.js"></script>
    
    <!-- calendar -->
    <script src='<?php echo PATH_ASSET?>/calendar/jquery.min.js'></script>
    <script src='<?php echo PATH_ASSET?>/calendar/moment.min.js'></script>
    <script src='<?php echo PATH_ASSET?>/calendar/fullcalendar.js'></script>
    <script src='<?php echo PATH_ASSET?>/calendar/locale/es.js'></script>
    <link href='<?php echo PATH_ASSET?>/calendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='<?php echo PATH_ASSET?>/calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    
    
    
    

<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      defaultDate: '2018-03-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2018-03-01'
        },
        {
          title: 'Long Event',
          start: '2018-03-07',
          end: '2018-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2018-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2018-03-11',
          end: '2018-03-13'
        },
        {
          title: 'Meeting',
          start: '2018-03-12T10:30:00',
          end: '2018-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2018-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2018-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2018-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2018-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2018-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2018-03-28'
        }
      ]
    });

  });

</script>

<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>

    <title> Encargado </title>
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
              include (PATH_MENU . '/cabeceraencargado.php');
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
              include(PATH_MENU . "/menuencargado.php");
            ?>

          </ul>
        </div><!-- fin barra de menu  -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <!--inicio de la ventana modal  -->
            <h1><b href="">Bienvenido <strong><?php echo 'user';?></strong> </b></h1>
            <div class="col-lg-12">
                <div id="calendar" style="width: 100%;" class="cal-context">
              
              <script>
              
              var err = new Array();
              
               
                function generar(){
                  
                    // <#list calendarioList as calendario>err.push({id: '${calendario.id}', title: '${calendario.motivo?trim}', start: '${calendario.fecha?date?string('yyyy-MM-dd')}'},);</#list>
                }   
               generar();                   
               console.log(err);
               
               function onAgregar() {
                  var datos = $("#formcalendario").serialize();
                  console.log("datos: "+JSON.stringify(datos));
                  $.ajax({
                    url: "ControladorCalendarios",
                    type: "POST",
                    data: datos,
                    success: function(response) {
                      console.log("'"+response+"'");
                      if (response == "save") {

                        mostrarMensajeExito("Día feriado incluido satisfactoriamente!!!");
                      }
                      else if (response == "update") {
                        
                        mostrarMensajeExito("Día feriado modificado satisfactoriamente!!!");
                        
                        
                      }else{
                        mostrarMensajeError(response);
                      }
                    },
                    error: function(jqXHR, estado, error) {
                      mostrarMensajeError(error);
                    },
                    complete: function(jqXHR, estado) {
                      
                      refresh();

                      $('#ventana2').modal('hide');
                       
                    },
                    timeout: 10000
                  });
                  

                }
               
               function refresh(){
                 $("#calendar").fullCalendar('removeEvents');
                 err.splice(0, err.length);
                generar();
                $("#calendar").fullCalendar( 'addEventSource', err );
                console.log(err);
               }
               
              $(document).ready(function() {
        
                  // page is now ready, initialize the calendar...
        
                  $('#calendar').fullCalendar({
                      // put your options and callbacks here
                    lang: 'es',
                      
                   dayClick: function(date) {
                     $("#ventana2").modal("show");
                     $("#fecha").val(date.format());
                     $('#calendar').fullCalendar('clientEvents', function(event) {
                        // match the event date with clicked date if true render clicked date events
                        if (moment(date).format('YYYY-MM-DD') == moment(event.start).format('YYYY-MM-DD')) {
                          
                          console.log(event.title);
                          $("#motivo").val(event.title);
                         
                        }else{
                          $("#motivo").val("");
                        }
                      });
                     $("#ventana2").modal("show");
                     $("#fecha").val(date.format());
                    
                    },
                    
                     events:err,
                    eventRender: function (event, element) {
                        var dataToFind = moment(event.start).format('YYYY-MM-DD');
                        $("td[data-date='"+dataToFind+"']").addClass('activeDay');
                        var el = element.html();
                        element.html(el + 
                        "<div class='btn-group pull-right'>" + 
                        "<button type='button' id='edit' class='btn-warning' data-toggle='modal' " +
                    "data-target='#ventana' onclick=''> " +
                    "<i class='glyphicon glyphicon-edit'></i></a>" +
                        
                      "<button type='button' id='del' class='btn-danger' data-toggle='confirmation'> " + 
                         
                      "<i class='glyphicon glyphicon-trash'></i></button>");
                        element.find('#del').click(function(){
                            

                          $.confirm({
                              title: 'Confirmación',
                              icon: 'fa fa-check',
                              animation: 'zoom',
                              theme: 'black',
                              content: '¿Está seguro de eliminar el día feriado?',
                              buttons: {
                                      confirm: {action: function () {
                                          onEliminar(event.start.format());
                                          $("td[data-date='"+event.start.format()+"']").addClass('normalDay');
                                          $("#calendar").fullCalendar('removeEvents', event.id);
                                          },
                                          text:'Aceptar',
                                          btnClass: 'btn-green'
                                          
                                      },
                                    cancel:{ text: 'Cancelar',
                                           btnClass: 'btn-red' 
                                          }
                                  }
                           
                          
                          });
                        });
                        element.find('#edit').click(function(){
                           $("#ventana2").modal("show");
                           $("#fecha").val(dataToFind);
                           $("#motivo").val(event.title);
                           
                        });
                       
                    }
                  
                 

                  
                  })
        
                  
              });
              
              </script>
            </div>             
          </div>
        </div>
      <!-- Calendar -->

  


        <!-- /#page-content-wrapper -->
    </div>
    <div id='calendar'></div>
    <!-- /#wrapper -->
    <!-- jQuery -->

    

</body>

</html>
