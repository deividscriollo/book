$(function(){
  verificar_session();
  var m=Lockr.get('modelo');
  element_info_dahs(m[0]);
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

function element_info_dahs(data){  
  var nombre=data['perfil_nombre'].split(' ');
  $('.element_usuario').text(data['perfil_nombre']);
  if (nombre.length>2) {
    $('.element_usuario').text(nombre[0]+' '+nombre[2]);
  };  
  $('.element_acceso').text(data['acceso']);
  $('.element_tipo').text(data['tipo']);
  $('.element_correo').text(data['perfil_correo']);
}