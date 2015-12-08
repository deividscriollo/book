jQuery(function($) {
	// formato input cedula
	$("#form-sri-consulta #txt_ruc").mask("9999999999001");
	$("#form_empresas #txt_telefono_1").mask("(999)-999-999");
	$("#form_empresas #txt_telefono_2").mask("(999)-999-999");
	$("#form_empresas #txt_celular").mask("(99)-9999-9999");
	$('#txt_user_dc').mask("9999999999001@FACTURANEXT.com");
	$('#txt_movil_usuario').mask("9999999999001@FACTURANEXT.com");

	$('#form-sri-consulta-movil #txt_ruc_movil').mask("9999999999001");

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
			
			// existencia de ruc en las cuentas
			var glo_existencia=0;
			$.ajax({
		        type: "POST",
		        url: "next/login/app.php", 
		        async:false,      
		        data:{registro_existencia_empresa:'',txt_ruc:$("#txt_ruc").val()},
		        dataType: 'json',
		        success: function(data) {
		        	$('#form_empresas').each (function(){
						this.reset();
					});
		        	if (data[0]) {
		        		swal("Lo sentimos", "El numero de ruc ingresado ya existe en el sistema.", "error");
		        	}else{
						$.ajax({
					        type: "POST",
					        url: "next/login/app.php",          
					        data:{txt_ruc_consumed:'',txt_ruc:$("#txt_ruc").val()},
					        dataType: 'json',
					        beforeSend: function() {
					        	$('#obj_cargando').removeClass('hide');
					        	$.blockUI({ 
					        		css: { backgroundColor: 'background: rgba(255,255,255,0.7);', color: '#fff', border:'2px'},
					        		message: '<h3>Consultando, Por favor espere un momento...'
					        		// message: '<h3>Estamos trabajando intente mas tarde...'
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
					        	var data1=data[0];
					        	var data2=data[1];
					        	if (data[0]!=0) {
					        		var tipo;
					        		var a=$(data1[12]).text();
					        		if (a=='') {
					        			tipo=data1[12];
					        		};
					        		if (a!='') {
					        			tipo=$(data1[12]).text();
					        		}
					        		$("#form_empresas #txt_tipo").val(tipo.toUpperCase());
					        		$("#form_empresas #txt_razon_social").val(data1[2]);
					        		$("#form_empresas #txt_representante_cedula").val(data1[16]);
					        		$("#form_empresas #txt_fecha_inicio_actividad").val(data1[18]);
					        		$("#form_empresas #txt_nombre_comercial").val(data1[6]);
					        		if (data1[6]=="") {
					        			$("#form_empresas #txt_nombre_comercial").val('No dispone de un nombre comercial');
					        		}
					        		var i=data2.length;
						        	$('#form_empresas #txt_representante_legal').val(data2[i-2]);
						        	// $('#form_empresas #txt_representante_cedula').val(data2[i-1].substr(0,10));					        		 					        	
					        	}  
					        	if (data[0]==0) {
					        		swal("Lo sentimos", "Usted no dispone de un ruc registrado en el sri, o es Incorrecto el numero ingresado.", "error");
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
	$('#form-sri-consulta-movil').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_ruc_movil: {
				required: true,
				digits: true,
				rangelength: [13, 13]
			}
		},
		messages: {
			txt_ruc_movil: {
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
			
			// existencia de ruc en las cuentas
			var glo_existencia=0;
			$.ajax({
		        type: "POST",
		        url: "next/login/app.php", 
		        async:false,      
		        data:{registro_existencia_empresa:'',txt_ruc:$("#form-sri-consulta-movil #txt_ruc_movil").val()},
		        dataType: 'json',
		        success: function(data) {
		        	$('#form_empresas').each (function(){
						this.reset();
					});
		        	if (data[0]) {
		        		swal("Lo sentimos", "El numero de ruc ingresado ya existe en el sistema.", "error");
		        	}else{
						$.ajax({
					        type: "POST",
					        url: "next/login/app.php",          
					        data:{txt_ruc_consumed:'',txt_ruc:$("#form-sri-consulta-movil #txt_ruc_movil").val()},
					        dataType: 'json',
					        beforeSend: function() {
					        	$.blockUI({ 
					        		css: { backgroundColor: 'background: rgba(255,255,255,0.7);', color: '#fff', border:'2px'},
					        		message: '<h3>Buscando, Por favor espere un momento...'
					        		// message: '<h3>Estamos trabajando intente mas tarde...'
			                                        +'<span class="loader animated fadeIn handle ui-sortable-handle">'
			                                        +'<span class="spinner">'
			                                            +'<i class="fa fa-spinner fa-spin"></i>'
			                                        +'</span>'
			                                        +'</span>'
			                                  +'</h3>'
					        	});
					        },
					        success: function(data) {
					        	console.log(data);
					        	$('#btn_opcion').addClass('icon-animated-vertical');
					        	glo_acumulador_procesos=data;
					        	$.unblockUI();
					        	var data1=data[0];
					        	var data2=data[1];
					        	if (data[0]!=0) {
					        		var tipo;
					        		var a=$(data1[12]).text();
					        		if (a=='') {
					        			tipo=data1[12];
					        		};
					        		if (a!='') {
					        			tipo=$(data1[12]).text();
					        		}
					        		$("#form_empresas-movil #txt_tipo").val(tipo.toUpperCase());
					        		$("#form_empresas-movil #txt_razon_social").val(data1[2]);
					        		$("#form_empresas-movil #txt_representante_cedula").val(data1[16]);
					        		$("#form_empresas-movil #txt_fecha_inicio_actividad").val(data1[18]);
					        		$("#form_empresas-movil #txt_nombre_comercial").val(data1[6]);
					        		if (data1[6]=="") {
					        			$("#form_empresas-movil #txt_nombre_comercial").val('No dispone de un nombre comercial');
					        		}
					        		var i=data2.length;
						        	$('#form_empresas-movil #txt_representante_legal').val(data2[i-2]);
						        	// $('#form_empresas-movil #txt_representante_cedula').val(data2[i-1].substr(0,10));					        		 
					        		
					        	}  
					        	if (data[0]==0) {
					        		swal("Lo sentimos", "Usted no dispone de un ruc registrado en el sri, o es Incorrecto el numero ingresado.", "error");
					        		$('#form-sri-consulta-movil').each (function(){
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
				email: true,
				remote: {
			        url: "next/login/app.php",
			        type: "post",
			        data:{
			          verific_user_mail: function() {
			            return $( "#txt_correo").val();
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
				required: 'Ingrese una dirección de correo electrónico.',
				email: 'Ingrese un correo valido.',
				remote:'Este correo ya está registrado, ingrese otro.'
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
			
			var ruc=$('form_empresas #txt_tipo').val();
			if (ruc!='') {
				var reg_adicional = [$('#form_empresas #txt_telefono_1').val(),$('#form_empresas #txt_celular').val(),$('#form_empresas #txt_correo').val()];
				var jsonstr = JSON.stringify(glo_acumulador_procesos);
				var jsonstr2 = JSON.stringify(reg_adicional);
				$.ajax({
			        type: "POST",
			        url: "next/login/app.php",          
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
			        	$('#form_empresas').each (function(){
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
	$('#form_empresas-movil').validate({
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
				email: true,
				remote: {
			        url: "next/login/app.php",
			        type: "post",
			        data:{
			          verific_user_mail: function() {
			            return $( "#txt_correo").val();
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
				required: 'Ingrese una dirección de correo electrónico.',
				email: 'Ingrese un correo valido.',
				remote:'Este correo ya está registrado, ingrese otro.'
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
			
			var ruc=$('form_empresas #txt_tipo').val();
			if (ruc!='') {
				var reg_adicional = [$('#form_empresas-movil #txt_telefono_1').val(),$('#form_empresas-movil #txt_celular').val(),$('#form_empresas-movil #txt_correo').val()];
				var jsonstr = JSON.stringify(glo_acumulador_procesos);
				var jsonstr2 = JSON.stringify(reg_adicional);
				$.ajax({
			        type: "POST",
			        url: "next/login/app.php",          
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
			        	$('#form_empresas-movil').each (function(){
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
				url: 'next/login/app.php',
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
						sessionStorage.setItem("id", data[1]);
						localStorage.setItem("id", data[1]);
						location.href="dashboard.php";
					}else{
						swal("Lo sentimos", "Nuestro servicio se encuentra en mantenimiento por favor intente más tarde", "error");
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
	// registro movil
	$('#form_movil').validate({
        errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
        rules: {
            txt_movil_usuario: {
                required: true
            },
            txt_movil_pass: {
                required: true
            }
        },
        messages:{
        	txt_movil_usuario:{
        		required:'Ingrese numero de ruc'
        	},
        	txt_movil_pass:{
        		required:'Ingrese password'
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
        	var usuario=$('#form_movil #txt_movil_usuario').val();
			var password=$('#form_movil #txt_movil_pass').val();
			$.ajax({
				url: 'next/login/app.php',
				type: 'post',
				dataType:'json',
				data: {acceder_user:'dkjf5',user:usuario, pass:password},
				success: function (data) {
					if (data[0]==0) {
						swal("Incorrecto", "Usuario o contraseña no validos :(", "error");
						$('#form_movil').each (function(){
						  this.reset();
						});
					};
					if (data[0]==1) {		
						sessionStorage.setItem("id", data[1]);											
						location.href="dashboard.php";						
					}
				}
			});
		}
    });
});
