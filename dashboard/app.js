// Proces generales por herencia
var app = angular.module('dcApp').controller('MainCtrl', function ($scope, service, $http, $interval) {


  var perfil_usuario = Lockr.get('perfil_usuario');
  var perfil_empresa = Lockr.get('perfil_empresa');
  var perfil_sucursal =Lockr.get('perfil_sucursal');
  // perfil usuario
  var perfil = Lockr.get('perfil_usuario');

  var nombre = (perfil.nombre).split(" ");
  var apellido = (perfil.apellido).split(' ');
  var perfil = {nombre:nombre[0].toLowerCase(), apellido:apellido[0].toLowerCase()}
  $scope.perfil=perfil;

  // perfil sucursal    
  var perfil_sucursal =Lockr.get('perfil_sucursal');
  $scope.sucursal=perfil_sucursal;
  $scope.perfil_sucursal = perfil_sucursal.nombre_sucursal.replace(/\s/g, '').toLowerCase();

  // setInterval(function(){ verificar_existencia_nuevos_correos(); }, 1000);

  // verificar_existencia_nuevos_correos()
  // $interval(function () {
  //   // service.general('verificar_existencia_nuevos_correos', 'app.php').then(function(data) {
  //   //   data = data['correos'];      
  //   //   var vec2 = Lockr.get('notificaciones_facturanext');
  //   //   if (vec2) { // si existe
  //   //     console.log('hola');
  //   //     if (data.length > vec2.length) {
  //   //       console.log('hola1');
  //   //       Lockr.set('notificaciones_facturanext', data);
  //   //       var res = data.length-vec2.length;
  //   //       console.log('hola');
  //   //       $('#element_notificaciones').removeClass('hide').text(res);
  //   //     }
  //   //   }else{
  //   //     Lockr.set('notificaciones_facturanext', data);
  //   //   }
  //   // });
  // }, 3000);
});



$(function(){

  $('.ripple').on('click', function (event) {
      event.preventDefault();
      
      var $div = $('<div/>'),
          btnOffset = $(this).offset(),
          xPos = event.pageX - btnOffset.left,
          yPos = event.pageY - btnOffset.top;
      

      
      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      
      $ripple.css("height", $(this).height());
      $ripple.css("width", $(this).height());
      $div
        .css({
          top: yPos - ($ripple.height()/2),
          left: xPos - ($ripple.width()/2),
          background: $(this).data("ripple-color")
        }) 
        .appendTo($(this));

      window.setTimeout(function(){
        $div.remove();
      }, 2000);
    });
  // verificar_session();
  // element_info_dahs();
  
  // verificar_existencia_nuevos_correos();

  $('#btn_notificaciones').click(function(event) {
    $('#element_notificaciones').addClass('hide');
  });
  // inicializacion de obtener_datos(data)
  $('[data-toggle="tooltip"]').tooltip();
    $('#btn_cambiar_empresa').click(function(){
      $.ajax({
        url: 'app.php',
        type: 'POST',
        dataType: 'json',
        contentType: "application/json",
        data:  JSON.stringify({methods:'cambio_sucursal'}),
        success:function(data){
          window.location.href = '../'+data[0];
        }
      }); 
    });
  });
function verificar_session(){  
  jQuery.ajax({
    type: 'POST',
    url: 'app.php',
    data:{time_session:'15'},    
    dataType: 'json',
    async:false,
    success: function(data){
      if(data[0] == '0'){
       window.location.href = '../';
      }
    }      
  });
}
function element_info_dahs(){
  var datatotal = Lockr.get('modelo');
  console.log(datatotal);
  var data = datatotal['general'];
  var nombre=data['perfil_nombre'].split(' ');
  $('.element_usuario').text(data['perfil_nombre']);
  if (nombre.length>2) {
    $('.element_usuario').text(nombre[0]+' '+nombre[2]);
  };  
  $('.element_acceso').text(data['acceso']);
  $('.element_tipo').text(data['tipo']);
  $('.element_correo').text(data['perfil_correo']);
  // elemet_empresa_name
  var data = datatotal['sucursal'];
  var id_sucursal = Lockr.get('sucursal_activo_ctual');
  for (var i = 0; i < data.length; i++) {
    var data2 = data[i];
    var array = $.map(data2, function(value, index) {
        return [value];
    });
    if (array[0]==id_sucursal) {
      $('.elemet_empresa_name').attr('title',array[2]);
      break;
    };
  }
}
