jQuery(function($) {
  Lockr.flush();
  $('.carousel').carousel();
  // llamado formulario
  init_element();
  form_init();
  form_data();
  form_empresa();
  $.material.init();
  // setInterval('verificar_session()',2000);
});

function init_element(){
  // mascara al segmento
  $('#txt_ruc').mask("9999999999001");

  // mascara segmento 2
  $('#txt_user').mask("9999999999001@FACTURANEXT.COM");

  $('#txt_user_dc').mask("9999999999"); 
  $('#btn_modal_info_cancelar').on('click',function(){
    $('#modal-info').modal('hide');
    $('#form-sri-consulta').each(function(){
      this.reset();
    });
  });
}

function form_data() {
  $('#form-sri-consulta').validate({
    rules: {
      txt_ruc: {
        required: true,
        rangelength: [13, 13]
      }
    },
    messages: {
      txt_ruc: {
        required: "Ingrese RUC, campo requerido….",
        rangelength: "Digite un ruc de 13 dígitos antes de continuar"
      }
    },
    submitHandler: function (form) {      
      // existencia de ruc en las cuentas
      var glo_existencia=0;
      $.ajax({
        type: "POST",
        url: "app.php", 
        async:false,      
        data:{registro_existencia_empresa:'',txt_ruc:$("#txt_ruc").val()},
        dataType: 'json',
        success: function(data) {
          $('#form_empresas').each (function(){
            this.reset();
          });
          if (data[0]) {
            swal("Lo sentimos", "El numero de ruc ingresado ya esta registrado.", "error");
          }else{
            $.ajax({
              type: "POST",
              url: "app.php",          
              data:{methods_ruc_consumed:'',txt_ruc:$("#txt_ruc").val()},
              dataType: 'json',
              beforeSend: function() {
                $('#txt_ruc').popover('hide');
                $.blockUI({ 
                  css: { backgroundColor: 'background: rgba(255,255,255,0.7);', color: '#fff', border:'2px'},
                  message: '<h3>Consultando, Por favor espere un momento...'
                  // message: '<h3>Estamos trabajando intente mas tarde...'
                                          +'<span class="loader animated fadeIn handle ui-sortable-handle">'
                                          +'<span class="spinner">'
                                              +'<i class="fa fa-spinner fa-spin"></i>'
                                          +'</span>'
                                          +'</span>'
                                    +'</h3>'});
              },
              success: function(data) {
                $.unblockUI();
                if (data['valid']=='true') {
                  if (data['estado_contribuyente']=='Activo') {
                    Lockr.set('sri_resultado', data);
                    $('#modal-info').modal('show');
                    $("#lbl_tipo_contribuyente").text(data['tipo_contribuyente']);
                    $("#lbl_razon_social").text(data['razon_social']);
                    $("#lbl_actividad_economica").text(data['actividad_economica']);
                    $("#lbl_fecha_inicio_actividad").text(data['fecha_inicio_actividades']);
                    $("#lbl_nombre_comercial").text(''+data['nombre_comercial']);
                    $("#lbl_estado_contribuyente").text(data['estado_contribuyente']);
                    $("#lbl_clase_contribuyente").text(data['clase_contribuyente']);
                    
                  }else
                    swal("Lo sentimos", "Usted SI dispone de empresas registradas en el SRI pero se encuentran en ESTADO CERRADO y no podemos continuar con el registro.", "error");
                }else                          
                  swal("Lo sentimos", "Usted no dispone de un ruc registrado en el sri, o es Incorrecto el numero ingresado.", "error");
                
                $('#form-sri-consulta').each (function(){
                  this.reset();
                });
              },
              error: function(data){
                console.log('test'+data);
              }              
            });
          }
        }        
      });      
    }
  });
}
function form_empresa() {
  $('#form-registro-empresas').validate({
    rules: {
      txt_telefono_1: {
        required: false,
      },
      txt_celular: {
        required: true,
      },
      txt_correo: {
        required: true,
        email: true,
        remote: {
              url: "app.php",
              type: "post",
              data:{
                verific_user_mail: function() {
                  return $("#txt_correo").val();
                  }
              }
          }
      },
      obj_terminos_condiciones:{
        required: true
      }
    },
    messages: {
      txt_correo: {
        required: '.',
        email: '.',
        remote:'.'
      },
      txt_celular: {
        required: '.',
      },
      txt_telefono_1: {
        required: false,
      },
      obj_terminos_condiciones:{
        required: 'Debe aceptar los términos y condiciones'
      }
    },
    highlight: function (e) {
      $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    },
    success: function (e) {
      $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
      $(e).remove();
      
    },
    errorPlacement: function (error, element) {
      
      if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
        var controls = element.closest('div[class*="col-"]');
        if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
        else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
      }
      else if(element.is('.select2')) {
        error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
      }
      else if(element.is('.chosen-select')) {
        error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
      }
      else error.insertAfter(element.parent());
    },
    submitHandler: function (form) {
      var glo_acumulador_procesos=Lockr.get('sri_resultado');
          Lockr.flush();
      if (glo_acumulador_procesos) {
          var reg_adicional = {
                                'telefono':$('#txt_telefono_1').val(),
                                'movil': $('#txt_celular').val(),
                                'correo': $('#txt_correo').val()
                              };
          var data1 = JSON.stringify(glo_acumulador_procesos);
          var data2 = JSON.stringify(reg_adicional);
          $.ajax({
                type: "POST",
                url: "app.php",          
                dataType: 'json',
                data:{registro_nueva_empresa:'',global:data1,reg_acu:data2},
                beforeSend: function() {
                  $('#modal-info').modal('hide');
                  $.blockUI({ 
                    css: { backgroundColor: 'background: rgba(255,255,255,0.7);', color: '#fff', border:'2px'},
                    message: '<h3>Guardando su información...'
                                        +'<span class="loader animated fadeIn handle ui-sortable-handle">'
                                        +'<span class="spinner">'
                                            +'<i class="fa fa-spinner fa-spin"></i>'
                                        +'</span>'
                                        +'</span>'
                                  +'</h3>'
                  });
                },
                success: function(data) {
                  $.unblockUI();
                  if (data['error']=='existencia') {
                    swal("Lo sentimos", "Este número de ruc ya está registrado, ingrese otro.", "error");
                  };
                  if (data['valid']=='true') {
                    swal("Buen Trabajo!", "Hemos enviado un correo electrónico de activación a su cuenta, por favor revise su correo para activar su nueva cuenta de nextbook.ec.", "success");
                  };
                  $('#form-sri-consulta').each(function(){
                    this.reset();
                  });              
                }        
            });
      }else
        swal("Lo sentimos", "Usted debe ingresar un ruc y realizar una consulta. (La información se genera automáticamente solo ingresando el número ruc).", "error");
    }
  });
}

function form_init(){
  // registro de informacion
  $('#form-acceso').validate({
    errorElement: 'div',
    errorClass: 'help-block',
    focusInvalid: false,
    ignore: "",
    rules: {
        txt_user: {
            required: true
        },
        txt_pass: {
            required: true
        }
    },
    messages:{
      txt_user:{
        required:'.'
      },
      txt_pass:{
        required:'.'
      }
    },
    highlight: function (e) {
      $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
    },
    success: function (e) {
      $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
      $(e).remove();
    },
    errorPlacement: function (error, element) {
      if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
        var controls = element.closest('div[class*="col-"]');
        if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
        else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
      }
      else if(element.is('.select2')) {
        error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
      }
      else if(element.is('.chosen-select')) {
        error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
      }
      else error.insertAfter(element.parent());
    },
    submitHandler: function (form) { // for demo
      $('.pass_olvidado').removeClass('hide');
      var usuario=$('#txt_user').val();
      var password=$('#txt_pass').val();
      $.ajax({
        url: 'app.php',
        type: 'post',
        dataType:'json',
        data: {acceder_user:'dkjf5',user:usuario, pass:password},
        success: function (data) {
          if (data[0]==0) {
            swal("Incorrecto", "Usuario o contraseña no validos :(", "error");
            $('#form-acceso').each (function(){
              this.reset();
            });
          };
          if (data[0]==1) {
            Lockr.set('perfil', data['perfil']);
            $.ajax({
              url: 'app.php',
              type: 'POST',
              dataType: 'json',
              data: {buscar_info: 'value1'},
              success:function(data1){
                Lockr.set('modelo', data1);
                window.location.href = '../'+data['acceso']+'/';
              }
            });
          }else{
            swal("Lo sentimos", "Usuario o contraseña incorrectos", "error");
            $('#form-acceso').each (function(){
              this.reset();
            });
          }
        }
      });
    },
    invalidHandler: function (form) {
      $('.pass_olvidado').addClass('hide');
    }
    });
}

function verificar_session(){  
  jQuery.ajax({
    type: 'POST',
    url: 'app.php',
    data:{time_session:'15'},    
    dataType: 'json',
    async:false,
    success: function(data){
      console.log(data);
      if(data[0] == '1'){
       window.location.href = '../dashboard/';
      }
    }      
  });
}