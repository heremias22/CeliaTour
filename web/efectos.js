$(document).ready(function(){
    
/*     Que cambie y descambie tras cada hoever
    
// para libre

$('#opcionlibre').bind("mouseenter",function(){
    $('#slider1').css("background-image", "url('img/portadalibre.jpg')");
    $('#slider1 .contenedor').children().fadeOut(250);
});
    
    
$('#opcionlibre').bind("mouseleave",function(){
    $('#slider1').css("background-image", "url('img/portada5.jpg')");
    $('#slider1 .contenedor').children().fadeIn(250);
});
    
    // para guiada

$('#opcionguiada').bind("mouseenter",function(){
    $('#slider1').css("background-image", "url('img/portadaguiada.jpg')");
    $('#slider1 .contenedor').children().fadeOut(250);
});
    
    
$('#opcionguiada').bind("mouseleave",function(){
    $('#slider1').css("background-image", "url('img/portada5.jpg')");
    $('#slider1 .contenedor').children().fadeIn(250);
});
    
       // para puntos destacados

$('#opciondestacada').bind("mouseenter",function(){
    $('#slider1').css("background-image", "url('img/portadadestacada.jpg')");
    $('#slider1 .contenedor').children().fadeOut(250);
});
    
    
$('#opciondestacada').bind("mouseleave",function(){
    $('#slider1').css("background-image", "url('img/portada5.jpg')");
    $('#slider1 .contenedor').children().fadeIn(250);
});

*/
    
    
// para que cambie el background a INICIO al hacer hover
    
$('#header img').bind("mouseenter",function(){
    $('#slider1').css("background-image", "url('web/img/portada5.jpg')");

    $('#slider1 .contenedor').children().fadeIn(250);
    
    $('#slider1').unbind("click");
    
});
    
// para que cambie el background a LIBRE al hacer hover

    
$('#opcionlibre').bind("mouseenter",function(){
    
    $('#slider1').css("background-image", "url('web/img/portadalibre.jpg')");  
    $('#slider1 .contenedor').children().fadeOut(250);
    
    // intento fallido para conseguir una animacion
    /*$('#slider1').animate({opacity: 0.1}, 'slow', function() {
        $(this)
            .css({'background-image':"url('img/portadalibre.jpg')"})
            .animate({opacity: 1});
    });
    */
    
    $('#slider1').bind("click",function(){
        window.location.href = "pannellum.html";
    });
    
});
    
// para que cambie el background a GUIADA al hacer hover

    
$('#opcionguiada').bind("mouseenter",function(){
    $('#slider1').css("background-image", "url('web/img/portadaguiada.jpg')");
    $('#slider1 .contenedor').children().fadeOut(250);
    
    $('#slider1').unbind("click");
    
});
    
// para que cambie el background a PUNTOS DESTACADOS al hacer hover

    
$('#opciondestacada').bind("mouseenter",function(){
    $('#slider1').css("background-image", "url('web/img/portadadestacada.jpg')");
    $('#slider1 .contenedor').children().fadeOut(250);
    
    $('#slider1').unbind("click");
    
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