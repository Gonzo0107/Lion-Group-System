
$(function() {
  
//menú fijo

$(window).scroll (function() {
  var scroll = $(window).scrollTop();
});

var map = L.map('mapa').setView([4.600539, -74.10816], 17);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
L.marker([4.600539, -74.10816]).addTo(map)
  .bindPopup('Grupo Gestión L&C')
  .openPopup();

//menu-movil

$('.menu-movil').on('click' , function() {
 $('.navegacion-principal').slideToggle();
});

//Programa de conferencias
$(function () {
  $('.programa-evento .info-tdt:first').show();
  $('.menu-servicios a:first').addClass('activo');

  $('.menu-servicios a').on('click', function () {
      $('.menu-servicios a').removeClass('activo');
      $(this).addClass('activo');
    $('.ocultar').hide();
    var enlace = $(this).attr('href');
    $(enlace).fadeIn(1000);
    return false;
  });
});

//animaciones para números
var resumenLista= jQuery('.resumen-cobertura');
if(resumenLista.length > 0 ) {
  $('.resumen-cobertura').waypoint (function(params) {
    $('.resumen-cobertura li:nth-child(1) p').animateNumber({number:(44)},2000);
$('.resumen-cobertura li:nth-child(2) p').animateNumber({number:(43)},2000);
$('.resumen-cobertura li:nth-child(3) p').animateNumber({number:(5)},2000);
$('.resumen-cobertura li:nth-child(4) p').animateNumber({number:(32)},2000);
  }, {
offset: '50%'
  });
}


//Cuenta regresiva
$('.reloj').countdown('2021/12/31 23:59:59', function(event) {
  $('#dias').html(event.strftime('%D'));
  $('#horas').html(event.strftime('%H'));
  $('#minutos').html(event.strftime('%M'));
  $('#segundos').html(event.strftime('%S'));
})

});