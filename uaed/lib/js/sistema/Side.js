  $(function() {
  
  // elementos de la lista
  var menues = $(".pcoded-navbar ul li");
  var submenu = $(".pcoded-submenu li");

  // manejador de click sobre todos los elementos
  menues.click(function() {
     // eliminamos active de todos los elementos
     menues.removeClass("active");
     submenu.removeClass('active')
     // activamos el elemento clicado.
     $(this).addClass("active");
    
  });

});

  $(function() {
  
  // elementos de la lista
  var menues = $(".pcoded-navbar ul li ul li"); 

  // manejador de click sobre todos los elementos
  menues.click(function() {
     // eliminamos active de todos los elementos
     menues.removeClass("active");
     // activamos el elemento clicado.
     $(this).addClass("active");
  });

});