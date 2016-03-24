var app = angular.module('dcApp').controller('fisicaCtrl', function ($scope, service) {
	// console.log('test');
});
var app = angular.module('dcApp').controller('electronicaCtrl', function ($scope, service) {
	
	jQuery(function($) {
		// -------------------------- inicio configuracion imagen box ------------------------------- //
		var $overflow = '';
		var colorbox_params = {
			rel: 'colorbox',
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			close:'&times;',
			current:'{current} of {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = $overflow;
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		};
		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
		$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon	
		
		$(document).one('ajaxloadstart.page', function(e) {
			$('#colorbox, #cboxOverlay').remove();
	   	});
		// ------------------------------------ parametrizacion -------------------------------------//
	   	$('.select2').css('width','100%').select2({
	   		placeholder: "Select a State"
	   	});
		llenar_tipo_consumo();
	   	// -------------------------- inicio configuracion imagen box ------------------------------- //
		$('#form_proceso').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				txt_clave: {
					required: true,
			        minlength: 49,
				    maxlength: 49			
				},
				slt_consumo: {
					required: true
				}
			},
			messages: {
				txt_clave: {
					required: "Campo Obligatorio"
				},
				slt_consumo: {
					required: 'Seleccione Tipo de consumo de su factura'
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
				$.blockUI({ 
	        		css: { backgroundColor: 'background: rgba(25,25,25,0.2);', color: '#fff', border:'2px'},
	        		message: '<h3>Estamos consultando su factura al SRI, espere un momento por favor...'
	                                +'<span class="loader animated fadeIn handle ui-sortable-handle">'
	                                +'<span class="spinner">'
	                                    +'<i class="fa fa-spinner fa-spin"></i>'
	                                +'</span>'
	                                +'</span>'
	                          +'</h3>'
	        	});
				var data = $(form).serializeFormJSON();
				service.general('save-clave-acceso', 'data/app.php',data).then(function(data) {
					$.unblockUI();
					
					if (data['valid'] == 'true') {
						$.gritter.add({
							title: 'FACTURA AGREGADA CORRECTAMENTE',
							text: 'La petición realizada se ha registrado con éxito',
							class_name: 'gritter-success gritter-center',
							time: 2000,
						});
						$(form).each(function() { this.reset(); });
						llenar_tipo_consumo();
					};
					if (data['valid'] == "false") {
						if (data['error'] == '1') {
							$.gritter.add({
								title: 'LA FACTURA QUE INTENTA AGREGAR NO ES PERMITIDA',
								text: 'Su factura no puede ser procesada, se encuentra emitido a otro número de ruc.',
								class_name: 'gritter-error gritter-center',
								time: 2000
							});
						}
						if (data['error'] == '2') {
							$.gritter.add({
								title: 'LA FACTURA QUE INTENTA AGREGAR NO ES VALIDA',
								text: 'El código de acceso que ha ingresado no es válido en el SRI, por lo tanto, no podemos procesarla.',
								class_name: 'gritter-error gritter-center',
								time: 2000
							});
						}
						if (data['error'] == '3') {
	    					$.gritter.add({
								title: 'ESTA CLAVE DE ACCESO YA ESTA REGISTRADA EN ESTE CLIENTE',
								text: 'Anterior mente ya se ha registrado esta factura.',
								class_name: 'gritter-error gritter-center',
								time: 2000,
							});
	    				}
					};
				});
			}
		});
	});
	// ------------------------------------ methods -------------------------------------//
	function llenar_tipo_consumo(){
		var $select = $('#slt_consumo');
		$select.select2("val", "");
		$select.append('<option value=""></option>');
		service.general('llenar-tipo-consumo', 'data/app.php').then(function(data) {
			for (var i = 0; i < data.length; i++) {
				$select.append("<option value="+data[i]['id']+">"+data[i]['value']+"</option>");
			}
		});
	}	
	

});
var app = angular.module('dcApp').controller('reportesCtrl', function ($scope, service) {

});
var app = angular.module('dcApp').controller('buscarCtrl', function ($scope, service) {

});