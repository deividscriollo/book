jQuery(function($) {
  Lockr.flush();
  // llamado formulario
  init_element();
  form_init();
  form_data();
  form_empresa();
  // setInterval('verificar_session()',2000);

});
function init_element(){
  $('#txt_ruc').popover({
    title:'<i class="glyphicon glyphicon-info-sign blue"></i> Ingrese solo si tiene alguna empresa registrada en el SRI.',
    placement: 'top',
    html: true,
    content: '<img src="../dist/img/sri.jpg">'
  });
  var element_ruc=$('#txt_ruc');
  element_ruc.on('blur',function(){
    $('#txt_ruc').popover('hide');
  });
  element_ruc.on('focus',function(){
    $('#txt_ruc').popover('show');
  })
  element_ruc.mask("9999999999001"); 
  $('#txt_user_dc').mask("9999999999"); 
  $('#btn_modal_info_cancelar').on('click',function(){
    $('#modal-info').modal('hide');
    $('#form-sri-consulta').each(function(){
      this.reset();
    });
  });
}

function form_data(){
  $('#form-sri-consulta').validate({
    rules: {
      txt_ruc: {
        required: true,
        digits: true,
        rangelength: [13, 13]
      }
    },
    messages: {
      txt_ruc: {
        required: "Ingrese RUC, campo requerido….",
        digits: "Ingrese solo valores numericos",
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
                      data:{txt_ruc_consumed:'',txt_ruc:$("#txt_ruc").val()},
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
                        if (verificar_stado_sucursales(data)!=0) {
                          Lockr.set('sri_resultado', data);                        
                          var data1=data[0];
                          var data2=data[1];
                          if (data[0]!=0) {                
                            $('#modal-info').modal('show');
                            form_empresa();
                            var tipo;
                            var a=$(data1[12]).text();
                            if (a=='') {
                              tipo=data1[12];
                            };
                            if (a!='') {
                              tipo=$(data1[12]).text();
                            }
                            $("#txt_tipo").val(tipo.toUpperCase());
                            $("#txt_razon_social").val(data1[2]);
                            $("#txt_representante_cedula").val(data1[16]);
                            $("#txt_fecha_inicio_actividad").val(data1[18]);
                            $("#txt_nombre_comercial").val(data1[6]);
                            $("#txt_estado_contribuyente").val(data1[8]);
                            
                            if (data1[6]=="") {
                              $("#txt_nombre_comercial").val('No dispone de un nombre comercial');
                            }
                            var i=data2.length;
                            $('#txt_representante_legal').val(data2[i-2]);
                            // $('#form_empresas #txt_representante_cedula').val(data2[i-1].substr(0,10));                                          
                          }; 
                          if (data[0]==0) {
                            swal("Lo sentimos", "Usted no dispone de un ruc registrado en el sri, o es Incorrecto el numero ingresado.", "error");
                            $('#form-sri-consulta').each (function(){
                              this.reset();
                            });
                          };
                        }else{
                          swal("Lo sentimos", "Usted SI dispone de empresas registradas en el SRI pero se encuentran en ESTADO CERRADO y no podemos continuar con el registro.", "error");
                          $('#form-sri-consulta').each (function(){
                            this.reset();
                          });
                        }
                      }
                });
              }
            }        
        });
      
    }
  });
}
function verificar_stado_sucursales(data){
  var acu=0;
  for (var i = 4; i <= data[1].length; i=i+4) {
    if (data[1][i]=='Abierto'){
      acu = 1;
    };
  }
  return acu;
}
function form_empresa(){
  $('#form_empresas').validate({
    rules: {
      txt_telefono_1: {
        required: false,
      },
      txt_telefono_2: {
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
    tooltip_options: {
      txt_user_dc: {
        placement:'bottom'
      },
      txt_password_dc: {
        placement:'bottom'
      }
    },
    messages: {
      txt_correo: {
        required: 'Ingrese una dirección de correo.',
        email: 'Ingrese un correo valido.',
        remote:'Este correo ya está registrado.'
      },
      txt_celular: {
        required: 'Digite su móvil es requerido',
      },
      txt_telefono_1: {
        required: false,
      },
      txt_telefono_2: {
        required: false
      },
      obj_terminos_condiciones:{
        required: 'Debe aceptar los términos y condiciones del sitio.'
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
      var ruc=$('#txt_tipo').val();
      if (ruc!='') {
        var reg_adicional = [$('#form_empresas #txt_telefono_1').val(),$('#form_empresas #txt_celular').val(),$('#form_empresas #txt_correo').val()];
        var jsonstr = JSON.stringify(glo_acumulador_procesos);
        var jsonstr2 = JSON.stringify(reg_adicional);
        $.ajax({
              type: "POST",
              url: "app.php",          
              dataType: 'json',
              data:{registro_nueva_empresa:'',global:jsonstr,reg_acu:jsonstr2},
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
                if (data[0]==2) {
                  swal("Lo sentimos", "Este número de ruc ya está registrado, ingrese otro.", "error");
                };
                if (data[0]==1) {
                  swal("Buen Trabajo!", "Hemos enviado un correo electrónico de activación a su cuenta, por favor revise su correo para activar su nueva cuenta de nextbook.ec.", "success");
                };
                if (data[0]==0) {
                  // swal("Lo sentimos", "Su petición no pudo ser procesada, Intente más tarde.", "error");
                  swal("Buen Trabajo!", "Hemos enviado un correo electrónico de activación a su cuenta, por favor revise su correo para activar su nueva cuenta de nextbook.ec.", "success");
                };
                $('#form-sri-consulta').each(function(){
                  this.reset();
                });
            
              }        
          }); 
      };
      if (ruc=='') {
        swal("Lo sentimos", "Usted debe ingresar un ruc y realizar una consulta. (La información se genera automáticamente solo ingresando el número ruc).", "error");
      }            
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
            txt_user_dc: {
                required: true
            },
            txt_password_dc: {
                required: true
            }
        },
        messages:{
          txt_user_dc:{
            required:'Ruc, este campo es requerido.'
          },
          txt_password_dc:{
            required:'Password, campo requerido.'
          }
        },
        tooltip_options: {
      txt_user_dc: {
        placement:'bottom'
      },
      txt_password_dc: {
        placement:'bottom'
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
          var usuario=$('#txt_user_dc').val();
      var password=$('#txt_password_dc').val();
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