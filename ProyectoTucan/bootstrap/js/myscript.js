// Llamar a tooltip

$(document).ready(function(){
          // $('[data-toggle="tooltip"]').tooltip(); 
          $('.mytool').tooltip();
});

// Funcion de Sidebar
 
  $('.hamburger').on('click', function () {
        $('#wrapper').toggleClass('toggled');
  });  
