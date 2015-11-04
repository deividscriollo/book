jQuery(function($) {
	// formato input cedula
	$("#txt_ruc").inputmask({mask: "9999999999001"});
	$("#txt_telefono_1").inputmask({mask: "(999)-999-999"});
	$("#txt_telefono_2").inputmask({mask: "(999)-999-999"});
	$("#txt_celular").inputmask({mask: "(99)-9999-9999"});
	// inicializando variables
	limpiar_alert();
	function limpiar_alert(){
		$('#alert_no_disponible_ruc').hide();
		$('#alert_no_disponibleruc2').hide();
		$('#alert_existe_ruc').hide();
	}
	// consultando_sri
	var glo_acumulador_procesos=0;
	$('#form-sri-consulta').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
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
			limpiar_alert();
			// existencia de ruc en las cuentas
			var glo_existencia=0;
			$.ajax({
		        type: "POST",
		        url: "../data/registro/php/app.php", 
		        async:false,      
		        data:{registro_existencia_empresa:'',txt_ruc:$("#txt_ruc").val()},
		        dataType: 'json',
		        success: function(data) {
		        	$('#form_empresas').each (function(){
						this.reset();
					});
		        	if (data[0]) {
		        		$('#alert_existe_ruc').show();
		        		$('#alert_existe_ruc').addClass('animated bounce').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					      $(this).removeClass('animated bounce');
					    });
		        	}else{
						$.ajax({
					        type: "POST",
					        url: "../data/registro/php/app.php",          
					        data:{txt_ruc_consumed:'',txt_ruc:$("#txt_ruc").val()},
					        dataType: 'json',
					        beforeSend: function() {
					        	$('#obj_cargando').removeClass('hide');
					        	$.blockUI({ 
					        		css: { backgroundColor: 'background: rgba(255,255,255,0.7);', color: '#fff', border:'2px'},
					        		message: '<h3>Consultando, Por favor espere un momento...'
			                                        +'<span class="loader animated fadeIn handle ui-sortable-handle">'
			                                        +'<span class="spinner">'
			                                            +'<i class="fa fa-spinner fa-spin"></i>'
			                                        +'</span>'
			                                        +'</span>'
			                                  +'</h3>'
					        	});
					        },
					        success: function(data) {
					        	glo_acumulador_procesos=data;
					        	$.unblockUI();
					        	$('#alert_no_disponible_ruc').hide();
					        	
					        	var data1=data[0];
					        	var data2=data[1];
					        	$('#obj_cargando').addClass('hide');		        	
					        	if (data[0]!=0) {
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
					        		$("#txt_fecha_inicio_actividad").val(data1[18]);
					        		$("#txt_nombre_comercial").val(data1[6]);
					        		if (data1[6]=="") {
					        			$("#txt_nombre_comercial").val(data1[16]);
					        		}
					        		var i=data2.length;
						        	$('#txt_representante_legal').val(data2[i-2]);  	 
						        	$('#txt_representante_cedula').val(data2[i-1].substr(0,10));
					        		 
					        		//1003129903001
									//1090084247001
									//1002857009001
					        	}  
					        	if (data[0]==0) {
					        		$('#alert_no_disponible_ruc').show();
					        		$('#alert_no_disponible_ruc').addClass('animated bounce').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
								      $(this).removeClass('animated bounce');
								    });
					        	}	
					        	
					        }        
					    });
		        	}
		        }        
		    });
			
		}
	});
	// guardando informacion
	$('#form_empresas').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
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
				email: true
			}
		},
		messages: {
			txt_correo: {
				required: 'Ingrese una dirección de correo electrónico',
				email: 'Ingrese un correo valido'
			},
			txt_celular: {
				required: 'Digite su movíl es requerido',
			},
			txt_telefono_1: {
				required: false,
			},
			txt_telefono_2: {
				required: false,
			},
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
			limpiar_alert();
			var ruc=$('#txt_tipo').val();
			if (ruc!='') {
				var reg_adicional = [$('#txt_telefono_1').val(),$('#txt_celular').val(),$('#txt_correo').val()];
				var jsonstr = JSON.stringify(glo_acumulador_procesos);
				var jsonstr2 = JSON.stringify(reg_adicional);
				$.ajax({
			        type: "POST",
			        url: "../data/registro/php/app.php",          
			        // dataType: 'json',
			        data:{registro_nueva_empresa:'',global:jsonstr,reg_acu:jsonstr2},
			        beforeSend: function() {
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
			   //      	$.unblockUI();
			   //      	$('#form_empresas, #form-sri-consulta').addClass('animated zoomOutUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					 //      $(this).removeClass('animated zoomOutUp');
					 //      $(this).addClass('hide');
					 //    });

			   //      	if (data[0]==2) {
			        		
			   //      	};
			   //      	if (data[0]==1) {
			   //      		$('#obj_ok').removeClass('hide');
			   //      	};
			   //      	if (data[0]==0) {
			   //      		// expression
			   //      	};
						// // 1003129903001
						// // 1090084247001
			        }        
			    }); 
			};
			if (ruc=='') {
				$('#alert_no_disponibleruc2').show();
				$('#alert_no_disponibleruc2').addClass('animated bounce').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			      $(this).removeClass('animated bounce');
			    });
			}			       
		}
	});
});