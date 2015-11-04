//bootstrap application wizard demo functions

$(function(){
    function info_empresa(){
        var data=Lockr.get('empresa_info');
        console.log(data);
        $('.company-name').text(data[4]);
        $('.company_adress').text(data[5]);
        $('.company-name').text(data[4]);
        $('.company-name').text(data[4]);
        $('#obj_empresa_seleccionada').html(data[4]);

    }
    function pageLoad(){
        $.ajax({
            url: 'processcount/app.php',
            type: 'post',
            data: {obj_grup_empresas:'6DStr52'},
            success: function (data) {
                $('#obj_grup_empresas').html(data);
                $('.btn_empresa_select').click(function(){
                    var empresa = $(this).attr('id');
                    $('#modal-empresa').modal('hide');
                    bootbox.confirm("Esta seguro de seleccionar la empresa"+empresa, function(result) {
                       if (result == false) {
                            $('#modal-empresa').modal('show');
                       }else{
                            $('#modal-empresa').modal('hide');
                            $.ajax({
                                url: 'processcount/app.php',
                                type: 'post',
                                async:false,
                                dataType:'json',
                                data: {seleccionar_empresa:'ok',empresa:empresa},
                                success: function (data) {
                                    Lockr.set('empresa_info', data); // Saved as number
                                }
                            });
                       }
                    }); 
                    
                });
                info_empresa();
            }
        });
        $('.widget').widgster();
        $('[data-toggle=tooltip]').tooltip();
        $('[data-toggle=popover]').popover();
        $("#destination").inputmask({mask: "99999"});
        $("#credit").inputmask({mask: "9999-9999-9999-9999"});
        $("#expiration-date").datetimepicker({
            pickTime: false
        });
        $('#wizard').bootstrapWizard({
            onTabShow: function($activeTab, $navigation, index) {
                var $total = $navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current/$total) * 100;
                var $wizard = $("#wizard");
                $wizard.find('.progress-bar').css({width: $percent + '%'});

                if($current >= $total) {
                    $wizard.find('.pager .next').hide();
                    $wizard.find('.pager .finish').show();
                    $wizard.find('.pager .finish').removeClass('disabled');
                } else {
                    $wizard.find('.pager .next').show();
                    $wizard.find('.pager .finish').hide();
                }

                //setting done class
                $navigation.find('li').removeClass('done');
                $activeTab.prevAll().addClass('done');
            },

            // validate on tab change
            onNext: function($activeTab, $navigation, nextIndex){
                var $activeTabPane = $($activeTab.find('a[data-toggle=tab]').attr('href')),
                    $form = $activeTabPane.find('form');

                // validate form in case there is form
                if ($form.length){
                    return $form.parsley().validate();
                }
            },
            //diable tab clicking
            onTabClick: function($activeTab, $navigation, currentIndex, clickedIndex){
                return $navigation.find('li:eq(' + clickedIndex + ')').is('.done');
            }
        })
            //setting fixed height so wizard won't jump
            .find('.tab-pane').css({height: 444});

        //clear previous wizard if exists
        //causes conflicts when loaded via pjax
        $('.modal.wizard').remove();
        $('.chzn-select').select2();
        var wizard = $('#satellite-wizard').wizard({
            keyboard : false,
            contentHeight : 400,
            contentWidth : 700,
            backdrop: 'static'
        });
        wizard.on("reset", function() {
            wizard.modal.find(':input').val('').removeAttr('disabled');
            wizard.modal.find('.form-group').removeClass('has-error').removeClass('has-succes');
            wizard.modal.find('#fqdn').data('is-valid', 0).data('lookup', 0);
        });


        wizard.on("submit", function(wizard) {
            // $( '#new_pass_access' ).parsley();
            this.log('seralize()');
            this.log(this.serialize());
            this.log('serializeArray()');
            this.log(this.serializeArray());

            setTimeout(function() {
                wizard.trigger("success");
                wizard.hideButtons();
                wizard._submitting = false;
                wizard.showSubmitCard("success");
                wizard.updateProgressBar(0);
                wizard.modal.hide()
            }, 2000);

        });

        wizard.el.find(".wizard-success .im-done").click(function() {
            setTimeout(function() {
                wizard.reset();
            }, 250);
        });

        wizard.el.find(".wizard-success .create-another-server").click(function() {
            wizard.reset();
        });

        wizard.el.find('.wizard-progress-container .progress').removeClass('progress-striped')
            .addClass('progress-xs');

        $(".wizard-group-list").click(function() {
            alert("Disabled for demo.");
        });
        

        var pass=verificacion_entrada();
        if (pass==0) {
            wizard.show();
        }else{
            seleccion_empresa();
        }
        
        $('#btn_cerrar_modal').click(function(){
            seleccion_empresa();
        });
        $('#txt_password_min').keyup(function(){
            var valor=$(this).val();
            muestra_seguridad_clave(valor);
        });
    }
   
   
    function seleccion_empresa(){
        $.ajax({
            url: 'processcount/app.php',
            type: 'post',
            dataType:'json',
            async:false,
            data: {verificacion_seleccion_empresa:'2587sfsd'},
            success: function (data) {
                if (data[0]==1) {
                    $('#modal-empresa').modal('show');
                }else{
                    $('#modal-empresa').modal('hide');
                }
                
            }
        });
    }
    pageLoad();
    SingApp.onPageLoad(pageLoad);
    
});




function verificacion_entrada(){
    var acumulador=0;
    $.ajax({
        url: 'processcount/app.php',
        type: 'post',
        dataType:'json',
        async:false,
        data: {verificacion_acceso:'fg5403'},
        success: function (data) {
            acumulador=data[0];
        }
    });
    return acumulador;
}
var numeros="0123456789";
var letras="abcdefghyjklmnñopqrstuvwxyz";
var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function seguridad_clave(clave){
    var seguridad = 1;
    if (clave.length!=0){
        if (tiene_numeros(clave) && tiene_letras(clave)){
            seguridad += 30;
        }
        if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
            seguridad += 30;
        }
        if (clave.length >= 4 && clave.length <= 5){
            seguridad += 10;
        }else{
            if (clave.length >= 6 && clave.length <= 8){
                seguridad += 30;
            }else{
                if (clave.length > 8){
                    seguridad += 39;
                }
            }
        }
    }
    return seguridad                
}   

function muestra_seguridad_clave(clave){
    seguridad=seguridad_clave(clave);
    $('#devian').css({width: seguridad + "%"});
    $('#devian').text(seguridad+'% Segura...');
}
