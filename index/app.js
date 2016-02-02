jQuery(function($) {
  verificar_session();
  var m=Lockr.get('modelo');
  element_info_index(m['general']);
});

function verificar_session(){  
  jQuery.ajax({
    type: 'POST',
    url: 'index/app.php',
    data:{time_session:'15'},    
    dataType: 'json',
    async:false,
    success: function(data){
      if(data[0] == '1'){
       // window.location.href = '..s/dashboard/';       
       $('#element-nabar-menu-nom').removeClass('hide');
       $('#element-nabar-menu-app').removeClass('hide');
       $('#element-nabar-menu-user').removeClass('hide');
      };
      if(data[0] == '0'){
        $('#element-nabar-menu-btn').removeClass('hide');
      }
    }      
  });
}

function element_info_index(data){
  $('.element_usuario').text(data['perfil_nombre']);
  $('.element_acceso').text(data['acceso']);
  $('.element_tipo').text(data['tipo']);
  $('.element_correo').text(data['perfil_correo']);
}