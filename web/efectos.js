$(document).ready(function(){
    $('#cambio').hide();
 
// para que cambie el background a INICIO al hacer hover
    
$('#header img').bind("mouseenter",function(){
    $('#slider1').css("background-image", "url('web/img/portada5.jpg')");
    $('#cambio').fadeOut();
    $('#slider1 .contenedor').children().fadeIn();
    
    $('#slider1').unbind("click");
    
});
    
// para que cambie el background a LIBRE al hacer hover

    
$('#opcionlibre').bind("mouseenter",function(){
    $('#cambio').fadeIn();
    $('#destacado').fadeOut();
    $('#guiada').fadeOut();
    $('#libre').fadeIn();
    $('#slider1 .contenedor').children().fadeOut();
    
    //$('#slider1').css("background-image", "url('web/img/portada5.jpg')");  
    //$('#libre').bind("click",function(){
    //   window.location.href = "pannellum.html";
    //});
    
});
    
// para que cambie el background a GUIADA al hacer hover

    
$('#opcionguiada').bind("mouseenter",function(){
    $('#cambio').fadeIn();
    $('#destacado').fadeOut();
    $('#guiada').fadeIn();
    $('#libre').fadeOut();
    $('#slider1 .contenedor').children().fadeOut();
    
});
    
// para que cambie el background a PUNTOS DESTACADOS al hacer hover

    
$('#opciondestacada').bind("mouseenter",function(){
    $('#cambio').fadeIn();
    $('#destacado').fadeIn();
    $('#guiada').fadeOut();
    $('#libre').fadeOut();
    $('#slider1 .contenedor').children().fadeOut();
    
});



    // para desactivar el scroll cuando la pantalla sea grande 
//if ($(window).width()<800){
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });

    // para activar el scroll    
    $('#lazo').on('click',function(){
      $('html, body').css({
        overflow: 'auto',
        height: 'auto'
    });  
    });
    
    // para darle efecto al historia
    
    $('#lazo').on('click', function(e){
        e.preventDefault();
       $('html,body').animate({
           scrollTop: 1000
       }, 800); 
    });
    
//}
});