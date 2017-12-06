$(document).ready(function(){
    $('#cambio_portada').hide();
 
// para que cambie el background a INICIO al hacer hover
    
$('#header_portada img').bind("mouseenter",function(){
    $('#slider1_portada').css("background-image", "url('web/img/portada5.jpg')");
    $('#cambio_portada').fadeOut("fast");
    $('#slider1_portada .contenedor_portada').children().fadeIn("fast");
    
    $('#slider1_portada').unbind("click");
    
});
    
// para que cambie el background a LIBRE al hacer hover

    
$('#opcionlibre_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn("fast");
    $('#libre_portada').fadeIn("fast");
    $('#libre_portada').siblings().fadeOut("fast");
    $('#slider1_portada .contenedor_portada').children().fadeOut("fast");
  
});
    
$('#opcionlibre_portada').click(function(){
  $('#portadaca').fadeOut("fast");
  
});    
    
    
// para que cambie el background a GUIADA al hacer hover

    
$('#opcionguiada_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn("fast");
    $('#guiada_portada').fadeIn("fast");
    $('#guiada_portada').siblings().fadeOut("fast");
    $('#slider1_portada .contenedor_portada').children().fadeOut("fast");
    
});
    
// para que cambie el background a PUNTOS DESTACADOS al hacer hover

    
$('#opciondestacada_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn("fast");
    $('#destacado_portada').fadeIn("fast");
    $('#destacado_portada').siblings().fadeOut("fast");
    $('#slider1_portada .contenedor_portada').children().fadeOut("fast");
});


// para que cambie el background a BIBLIOTECA al hacer hover

    
$('#opcionbiblioteca_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn("fast");
    $('#biblioteca_portada').fadeIn("fast");
    $('#biblioteca_portada').siblings().fadeOut("fast");
    $('#slider1_portada .contenedor_portada').children().fadeOut("fast");
    
});
    
    // para que cambie el background a PORFOLIO al hacer hover

    
$('#opcionporfolio_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn("fast");
    $('#porfolio_portada').fadeIn("fast");
    $('#porfolio_portada').siblings().fadeOut("fast");
    $('#slider1_portada .contenedor_portada').children().fadeOut("fast");
    
});
    
    // para que cambie el background a  al hacer hover

    
$('#opcioncredito_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn("fast");
    $('#creditos_portada').fadeIn("fast");
    $('#creditos_portada').siblings().fadeOut("fast");
    $('#slider1_portada .contenedor_portada').children().fadeOut("fast");
    
});
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // para desactivar el scroll cuando la pantalla sea grande 
//if ($(window).width()<800){
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });

    // para activar el scroll    
    /*$('#lazo_portada').on('click',function(){
      $('html, body').css({
        overflow: 'auto',
        height: 'auto'
    });  
    });*/
    
    // para darle efecto al historia
    /*
    $('#lazo_portada').on('click', function(e){
        e.preventDefault();
       $('html,body').animate({
           scrollTop: 1000
       }, 800); 
    });*/
    
//}
});