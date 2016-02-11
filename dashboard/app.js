$(function(){
  verificar_session();
  element_info_dahs();
  // inicializacion de obtener_datos(data)
  $('[data-toggle="tooltip"]').tooltip();
  $('#btn_cambiar_empresa').click(function(){
    $.ajax({
      url: 'app.php',
      type: 'POST',
      dataType: 'json',
      data: {cambio_sucursal: 'dogi'},
      success:function(data){
        window.location.href = '../'+data;
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