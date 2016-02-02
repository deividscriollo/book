$(document).ready(function() {
    // inicializacion de procesos
    var m=Lockr.get('modelo');
    element_info_dahs(m['general']);
    sucursales(m['sucursal']);
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
                txt_nombre: {
                    validators: {
                        notEmpty: {
                            message: 'Campo requerido, Ingrese nombres'
                        }
                    }
                },
                txt_apellido: {
                    validators: {
                        notEmpty: {
                            message: 'Campo requerido, Ingrese apellidos'
                        }
                    }
                },
                availability: {
                    validators: {
                        notEmpty: {
                            message: 'Por favor seleccione sucursal el campo es obligatorio'
                        }
                    }
                },
                dbServer: {
                    validators: {
                        notEmpty: {
                            message: 'The server IP is required'
                        },
                        ip: {
                            message: 'The server IP is not valid'
                        }
                    }
                },
                dbName: {
                    validators: {
                        notEmpty: {
                            message: 'The database name is required'
                        }
                    }
                },
                dbUser: {
                    validators: {
                        notEmpty: {
                            message: 'The database user is required'
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

                if (index === numTabs) {
                    // We are at the last tab

                    // Uncomment the following line to submit the form using the defaultSubmit() method
                    // $('#installationForm').formValidation('defaultSubmit');

                    // For testing purpose
                    $('#completeModal').modal();
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
                        .html(index === numTabs - 1 ? 'Sigiente' : 'Siguiente');

                // You don't need to care about it
                // It is for the specific demo
                adjustIframeHeight();
            }
        });

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
});

function sucursales(data){
  var data=data;
  var acumulador='';
  $('#element-sucursal').html('');
  for (var i = 0; i < data.length; i++) {
    acumulador='<div class="radio">'                 
               +'<label>'
                  +data[i]['nombre_sucursal']+' || '+data[i]['direccion']
                  +'<input type="radio" name="availability" value="'+data[i]['id']+'"/>'                  
                +'</label>'                
              +'</div>';
    $('#element-sucursal').append(acumulador);
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