$(document).ready(function() {
    // inicializacion de procesos
    // var m=Lockr.get('modelo');
    // element_info_dahs(m['general']);
    sucursales();
    llenar_categoria();

    // inicializacion select    
    $("#sel_categoria1").select2({
      placeholder: "Categoría de su empresa",
      allowClear: true
    });

    $('#sel_categoria1').change(function(){
      var id=$(this).val();
      //lenr items segundo select
      llenar_item_categoria(id);
      // carga de inicializacion de select 2
      $("#sel_categoria2").select2({
        placeholder: "Actividad",
        allowClear: true
      });
    });

    // It is for the specific demo
    function adjustIframeHeight() {
        var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe
            $iframe.height($body.height());
        }
    }
    // inicializacion material desing
    $.material.init();
    // slider modelo
    $('#installationForm').formValidation({
      framework: 'bootstrap',
      icon: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      // This option will not ignore invisible fields which belong to inactive panels
      excluded: ':disabled',
      fields: {
          
          availability: {
              validators: {
                  notEmpty: {
                      message: 'Por favor seleccione al menos 1 sucursal, el campo es obligatorio'
                  }
              }
          },
          textarea: {
              validators: {
                  notEmpty: {
                      message: 'Campo requerido, Ingrese apellidos'
                  }
              }
          },
          sel_categoria1: {
              validators: {
                  notEmpty: {
                      message: 'Campo requerido, Ingrese apellidos'
                  }
              }
          },
          sel_categoria2: {
              validators: {
                  notEmpty: {
                      message: 'Seleccione al menos una actividad referente a su empresa'
                  }
              }
          }
      }
    })
    .bootstrapWizard({
        tabClass: 'nav nav-pills',
        onTabClick: function(tab, navigation, index) {
            return validateTab(index);
        },
        onNext: function(tab, navigation, index) {
            var numTabs    = $('#installationForm').find('.tab-pane').length,
                isValidTab = validateTab(index - 1);
            if (!isValidTab) {
                return false;
            }
            
            if (index==1) {
              var id;
              $("input[type=radio]:checked").each(function(){
                //cada elemento seleccionado
                id = $(this).val();
                restructurar_info(id);
              }); 
            };

            if (index === numTabs) {
              var form = $('#installationForm').serialize();
              $.ajax({
                url: 'app.php',
                type: 'POST',
                data: form,
                dataType:'json',
                success:function(data){
                  if (data['valid']=='true') {
                    Lockr.set('perfil_usuario', data['perfil_usuario']);
                    Lockr.set('perfil_sucursal', data['perfil_sucursal']);
                    Lockr.set('perfil_empresa', data['perfil_empresa']);
                    window.location = "../dashboard/";
                  };
                  
                }
              });
              
            }

            return true;
        },
        onPrevious: function(tab, navigation, index) {
            return validateTab(index + 1);
        },
        onTabShow: function(tab, navigation, index) {
            // Update the label of Next button when we are at the last tab
            var numTabs = $('#installationForm').find('.tab-pane').length;
            $('#installationForm')
                .find('.next')
                    .removeClass('disabled')    // Enable the Next button
                    .find('a')
                    .html(index === numTabs - 1 ? 'Finalizar' : 'Siguiente');

            // You don't need to care about it
            // It is for the specific demo
            adjustIframeHeight();
        }
    });    
});

function restructurar_info(id){
  console.log(id);
  $.ajax({
    url: 'app.php',
    type: 'POST',
    dataType: 'json',
    async:false,
    data:{'llenar_sucursales_perfil':'',id:id},
    success:function(data){
      // //editables 
      $('#editable-empresa').editable({
        url: 'app.php',
        mode: 'inline',
        value:data['nombre_sucursal'],
        type: 'text',
        pk: data['id'],
        name: 'nom_empresa',
        title: 'Nombre Empresa',
        validate:function(value){                                 
          if(value=='') return '(*) Campo requerido ingrese nombre empresa';
        },success:function(data){
          if (data=='procesado') {
            // window.location = "../dashboard/";
          };
        }
      });
      $('#editable-direccion').editable({
        url: 'app.php',
        mode: 'inline',
        value:data['direccion'],
        type: 'text',
        pk: data['id'],
        name: 'dir_empresa',
        title: 'Nombre Empresa',
        validate:function(value){
          if(value=='') return '(*) Campo requerido ingrese dirección empresa';
        },success:function(data){
          if (data=='procesado') {
            // window.location = "../dashboard/";
          };
        }
      });
      $('#editable-empresa').editable('setValue',data['nombre_sucursal']);
      $('#editable-direccion').editable('setValue',data['direccion']);
    }
  });
}
function verificar_existencia_sucursal(id){
  $.ajax({
    url: 'app.php',
    type: 'POST',
    dataType: 'json',
    data: {verificar_existencia_sucursal: 'deocp', id:id},
    success:function(data){
      if (data[0]=='true') {
        Lockr.set('perfil', data['perfil']);
        window.location = "../dashboard/";
      };
    }
  });  
}
function validateTab(index) {
    var fv   = $('#installationForm').data('formValidation'), // FormValidation instance
        // The current tab
        $tab = $('#installationForm').find('.tab-pane').eq(index);

    // Validate the container
    fv.validateContainer($tab);

    var isValidStep = fv.isValidContainer($tab);
    if (isValidStep === false || isValidStep === null) {
        // Do not jump to the target tab
        return false;
    }

    return true;
}
function verificar(data,valor){
  var acu=0;
  for(var i = 0; i < data.length; i++){
    var sum=data[i];
    var arr = Object.keys(sum).map(function (key) {return sum[key]});
    var d = arr[2];
    if (d===valor) {
      acu++;
    };
  }
  return acu;
}
function sucursales(data){
  // init procesando info
  
  //end procesando info
  var acumulador='';
  $('#element-sucursal').html('');
  for (var i = 0; i < data.length; i++) {
    var sum = verificar(data,data[i]['nombre_sucursal']);    
    if (sum > 1) {
      acumulador='<div class="radio">'                 
               +'<label>'
                  +data[i]['nombre_sucursal']+' || '+data[i]['direccion']
                  +'<input type="radio" name="availability" value="'+data[i]['id']+'"/>'                  
                +'</label>'                
              +'</div>';
      $('#element-sucursal').append(acumulador);  
    }else{
      acumulador='<div class="radio">'                 
               +'<label>'
                  +data[i]['nombre_sucursal']
                  +'<input type="radio" name="availability" value="'+data[i]['id']+'"/>'                  
                +'</label>'                
              +'</div>'; 
      $('#element-sucursal').append(acumulador);
    };    
    
  } 
}
function element_info_dahs(data){
  var nombre=data['empresa_nombre'];
  $('.element_empresa').text(nombre);
  if (nombre=='') {
    $('.element_empresa').text('Nombre de la empresa no disponible');
  };  
  $('.element_acceso').text(data['acceso']);
  $('.element_tipo').text(data['tipo']);
  $('.element_correo').text(data['perfil_correo']);
}
function llenar_categoria(){
  $('#sel_categoria1').html('');
  $.ajax({
    url: 'app.php',
    type: 'POST',
    async:false,
    dataType:'json',
    data: {llenar_categoria: 'df56g'},
    success:function(data){
      for (var i = 0; i < data.length; i++) {
        $('#sel_categoria1').append('<option value='+data[i]['id']+'>'+data[i]['categoria']+'</option>');
      }      
    }
  });
}
function llenar_perfil(id){
  $.ajax({
    url: 'app.php',
    type: 'POST',
    dataType: 'json',
    async:false,
    data: {perfil_usuario:'d8gf67' , id:id},
    success:function(data){
      console.log(data);
      Lockr.set('perfil_usuario', data);
    }
  }); 
}
function llenar_perfil_sucursal(id){
  $.ajax({
    url: 'app.php',
    type: 'POST',
    dataType: 'json',
    async:false,
    data: {perfil_sucursal:'d8gf67', id:id},
    success:function(data){
      Lockr.set('sucursal_activo_ctual', data); // Saved as string
    }
  }); 
}
function llenar_item_categoria(id){
  $('#sel_categoria2').html('');
  $.ajax({
    url: 'app.php',
    type: 'POST',
    dataType:'json',
    data: {llenar_item_categoria: 'df56g',id:id},
    success:function(data){
      for (var i = 0; i < data.length; i++) {
        $('#sel_categoria2').append('<option value='+data[i]['id']+'>'+data[i]['tipo']+'</option>');
      }      
    }
  });
}

function sucursales(){
  $.ajax({
    url: 'app.php',
    type: 'POST',
    dataType: 'json',
    async:false,
    data:{'llenar_sucursales':''},
    success:function(data){
      //end procesando info
      var acumulador='';
      $('#element-sucursal').html('');
      acumulador='<table class="table table-condensed">'
                  +'<thead>'
                   +' <tr>'
                      +'<th>Nro</th>'
                      +'<th>Nombre Comercial</th>'
                      +'<th>Direccion</th>'
                    +'</tr>'
                  +'</thead>'
                  +'<tbody>';                  
      
      for (var i = 0; i < data.length; i++) {
          acumulador = acumulador+ 
                      '<tr>'
                        +'<td>'
                            +'<div class="radio">'
                              +'<label>'
                                +'<input type="radio" name="availability" value="'+data[i]['id']+'"/>'
                              +'</label>'
                            +'</div>'
                        +'</td>'
                        +'<td>'
                          +data[i]['nombre_sucursal']
                        +'</td>'
                        +'<td class="text-info">'
                          +data[i]['direccion']
                        +'</td>'
                      +'</tr>';
          
      }
      $('#element-sucursal').append(acumulador+'</tbody></table>');
    }
  });
}