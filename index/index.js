$(document).on('ready',inicio);
var array;
var app_id = '1019380434760499';
var scopes = 'email , public_profile, user_friends' ;
var googleInfo;
function inicio (){

	$("#txt_telefono_1").inputmask({mask: "(999)-999-999"});
	$("#txt_telefono_2").inputmask({mask: "(999)-999-999"});
	$("#txt_celular").inputmask({mask: "(09)-999-999999"});

	$('#modal-empresarial').on('show.bs.modal', function() {
    	$('#obj_buscar_ruc').removeClass('hide');
		$('#obj_resultado_envio_correo').html('<section class="widget" style="min-height: 200px">'
						                        +'<h1>Por favor, espere un momento</h1>'
						                        +'<div class="widget-body animated bounceIn">'
						                            +'<div class="loader animated fadeIn handle ui-sortable-handle">'
						                            +'<span class="spinner">'
						                                +'<i class="fa fa-spinner fa-spin"></i>'
						                            +'</span>'
						                            +'</div>'
						                            
						                        +'</div>'
						                    +'</section>');
		$('#obj_resultado_envio_correo').addClass('hide');
	});
	//-----------------------mascara campos---------------------------//
	// $("#txt_ruc").inputmask({mask: "9999999999-999"});
	//------------------- INICIO funciones de facebbok----------------//
	$('#login_facebook').on('click',function(e) {
		e.preventDefault();
		FB.getLoginStatus(function(response) {
	    	statusChangeCallback(response, function() {});
	  	});		
		facebookLogin();
	});

	$('#logout_facebook').on('click',function(e) {
		e.preventDefault();

		if (confirm("¿Está seguro?"))
			facebookLogout();
		else 
			return false;
	});		  	  	 
  	//------------------- FIN funciones de facebbok----------------//

  	// -----------------INICIO nuevo registro externo---------------//
	$('#btn-personal-registro').on('click',function(){
		$('#modal-personal').modal('hide');
		$('#modal-personal-registro').modal('show');
		$('#form-registro-personal').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				txt_nombre: {
					required: true,
				},
				txt_correo_reg: {
					required: true,
					email: true
				},
				sel_genero: {
					required: true					
				},
				txt_pass: {
					required: true,
					minlength: 8
				},
				txt_pass1: {
					required: true,
					equalTo: "#txt_pass"
				}				
			},
	
			messages: {
				txt_nombre: {
					required: "Ingrese nombre, campo requerido."
				},
				txt_correo_reg: {
					required: "Ingrese correo Electrónico, campo requerido."
				},
				txt_pass: {
					required: "Por favor, Ingrese una contraseña/password.",
					minlength: "Por Favor, ingresar minimo 8 digitos."
				},
				txt_pass1:{
					required: "Por favor, Ingrese una contraseña/password.",
				},
				sel_genero:{
					required:'Por Favor, Seleccione genero',
					equalTo:'Revise su password no coincide'
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
				// var formData = new FormData(form);
				$.ajax({
			        type: "POST",
			        url: 'index/app.php',          
			        dataType: 'json',
			        data:{guargar_personal_register:'0012',nombre:$('#txt_nombre').val(),correo:$('#txt_correo_reg').val(),genero:$('#sel_genero').val(),pass:$('#txt_pass').val()},
			        success: function(data) {         
			        	 console.log(response);
			        }        
			    }); 
			}
		});

	});
	// -----------------FINnuevo registro externo---------------//
	//------------------- INICIO funciones de GOOGLE----------------//
	
	$("#login_google").on('click',function(){
		iniciar_goole();
	});				
	
  	//------------------- FIN funciones de GOOGLE----------------//
}
	jQuery.validator.addMethod("validar_existencia", function (value, element) {
		var h='';
		$.ajax({
		        type: "POST",
		        url: 'index/app.php',          
		        data:{verificacion_existencia:'025dom01516',valor:value},
		        success: function(data) {
		        	h=data;
		        }        
	    });
		return h;
	}, "Usted ya se encuentra REGISTRADO, por favor acceda a iniciar session.");
	var data_acumulada;
	$('#form-sri-consulta').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_ruc: {
				required: true,
				digits: true,
				rangelength: [13, 13],
				validar_existencia:false
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
			$.ajax({
		        type: "POST",
		        url: "index/consultaSRI.php?txt_ruc="+$("#txt_ruc").val(),          
		        dataType: 'json',
		        beforeSend: function() {
		        	$('#obj_cargando').removeClass('hide');
		        },
		        success: function(data) {
		        	data_acumulada=data;
		        	$('#obj_cargando').addClass('hide');
		        	$('#form_empresas').each (function(){
						this.reset();
					});
		        	$('#modal-empresarial').modal('show');    
		        	if (data[0]==0) {
		        		$('#obj_resultado_ok').addClass('hide animated bounce');
		        		$('#obj_resultado_error').removeClass('hide animated bounce').addClass('animated bounce');
		        	}
		        	if (data[0]!=0) {
		        		var tipo;
		        		var a=$(data[12]).text();
		        		if (a=='') {
		        			tipo=data[12];
		        			console.log(tipo);
		        		};
		        		if (a!='') {
		        			tipo=$(data[12]).text();
		        			console.log(tipo);
		        		}
		        		$('#obj_resultado_error').addClass('hide animated bounce');
		        		$('#obj_resultado_ok').removeClass('hide').addClass('animated bounce');
		        		$("#txt_tipo").val(tipo.toUpperCase());
		        		$("#txt_razon_social").val(data[2]);
		        		$("#txt_nombre_comercial").val(data[6]); 
		        		//1003129903001
						//1090084247001
		        	}     	 
		        }        
		    });        
		}
	});
	$('#form_empresas').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				txt_telefono_1: {
					required: false,
					// digits: true
				},
				txt_telefono_2: {
					required: false,
					// digits: true
				},
				txt_celular: {
					required: true,
					// digits: true
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
					// digits: 'Digite solo numero'
				},
				txt_telefono_1: {
					required: false,
					// digits: 'Digite solo numero'
				},
				txt_telefono_2: {
					required: false,
					// digits: 'Digite solo numero'
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
				$.ajax({
			        type: "POST",
			        url: "index/app.php",          
			        dataType: 'json',
			        data:{
			        	g_registro_empresa:'',
			        	acu:data_acumulada,
			        	ruc:$('#txt_ruc').val(),
			        	tel1:$('#txt_telefono_1').val(),
			        	tel2:$('#txt_telefono_2').val(),
			        	tel3:$('#txt_celular').val(),
			        	pag:$('#txt_pagina_web').val(),
			        	cor:$('#txt_correo').val(),
			        	razon:$("#txt_razon_social").val()
			        },
			        beforeSend: function() {
			        	// $('#obj_resultado_envio_correo').removeClass('hide');
			        	// $('#obj_resultado_ok').addClass('hide');
			        	// $('#obj_buscar_ruc').addClass('hide');
			        },
			        success: function(data) {
			        	// $('#obj_resultado_envio_correo').html('<h2>Por favor revise su correo para activar su cuenta</h2>');
			   //      	$('#form_empresas').each (function(){
						// 	this.reset();
						// });
						// $('#form-sri-consulta').each (function(){
						// 	this.reset();
						// });
// 1003129903001
//1090084247001
			        }        
			    });        
			}
		});
function validar_ruc(x){
	var number = x;
	var dto = number.length;
	var valor;
	var acu=0;
	for (var i=0; i<dto; i++){
	valor = number.substring(i,i+1);
	if(valor==0||valor==1||valor==2||valor==3||valor==4||valor==5||valor==6||valor==7||valor==8||valor==9){
		acu = acu+1;
	}
	}
	if(acu==dto){
	  while(number.substring(10,13)!=001){
	    return false;
	  }
	  while(number.substring(0,2)>24){    
	  return false;
	  }
	  return true;	  
	}
	else{
	return false
	}
}
function guardar_empresas(){
	$("#form_empresas").on("submit",function (e){				
		var valores = $("#form_empresas").serialize();		
		datos_empresa(valores,"guardar",e);					
		e.preventDefault();
		$(this).unbind("submit")
	});
}
function datos_empresa(valores,tipo,p){	
	$.ajax({				
		type: "POST",
		data: valores+"&guardar="+tipo+"&array="+array,		
		url: "index/app.php",			
	    success: function(data) {			    	
	    	console.log(data)
		}
	}); 
}
function statusChangeCallback(response, callback) {
	//console.log(response);		
	if (response.status === 'connected') {
  		getFacebookData();
	} else {
 		callback(false);
	}
}

function checkLoginState(callback) {
	FB.getLoginStatus(function(response) {
  		callback(response);
	});
}

function getFacebookData() {	
	// FB.api('/me', {fields: "id,email,first_name,gender,hometown,link,location,middle_name,name,timezone"},
	FB.api('/me', {fields: "id,email,first_name,gender,name"},
	function(response) {	 
	//console.log(response); 		
		$('#modal-personal').modal('hide');
		$.ajax({
			url:'index/app.php',
			type:'POST',
			dataType:'json',
			data:{info_face:'ok',id:response.id,correo:response.email,genero:response.gender,nom:response.name},
			success:function(data){
				console.log(data);
				if (data[0]==0) {
					if (data[1]==1) {
						$('#modal-registro').modal('show');
						var nombre=response.name;
						var nombre=nombre.split(' ');
						var genero=response.gender;
						var expresion='Estimada';
						if (genero=='male') {	expresion=='Estimado'	}
						$('#obj_genero').html(expresion);
						$('#obj_firs_name').html(response.first_name);
						$('#facebook-session').attr('src','http://graph.facebook.com/'+response.id+'/picture?type=large');
						$('#obj_nombre').html(nombre[0]+' <span class="fw-semi-bold">'+nombre[1]+'</span>');
						$('#obj_correo').html('<i class="glyphicon glyphicon-envelope"></i> '+response.email);
						$('#href_entrar_face').attr('href','data/index/');
					}else{
						$('#modal-error').modal('show');
					}
				}else{
					$('#modal-error').modal('show');
				}
			}
		});
  	});
}

function facebookLogin() {
	checkLoginState(function(data) {
		if (data.status !== 'connected') {
			FB.login(function(response) {
				if (response.status === 'connected')
					getFacebookData();
			}, {scope: scopes});
		}
	})
}

function facebookLogout() {
	checkLoginState(function(data) {
		if (data.status === 'connected') {
			FB.logout(function(response) {
				$('#facebook-session').before(btn_login);
				$('#facebook-session').remove();
			})
		}
	})
}  	


function iniciar_goole () {
	gapi.load('auth2', function(){	      
    	auth2 = gapi.auth2.init({
        	client_id: '308434150280-e1djt4sf5ef7dlcol3imlbu0f765ncic.apps.googleusercontent.com',
        	cookiepolicy: 'single_host_origin',
        	// Request scopes in addition to 'profile' and 'email'
        	scope: 'https://www.googleapis.com/auth/plus.login'
      	});
      	getGoogleData(document.getElementById('login_google'));
    });
}
function getGoogleData(element) {		
		auth2.attachClickHandler(element, {},
	    	function(googleUser) {
	    		//console.log(googleUser)	 
	    		gapi.client.load('oauth2', 'v2', function() {
		        	var request = gapi.client.oauth2.userinfo.get();
		        	request.execute(function(obj){
		        		$('#modal-personal').modal('hide');
		        		console.log(obj)		        		
						$.ajax({
							url:'index/app.php',
							type:'POST',
							dataType:'json',
							data:{info_google:'ok',id:obj['id'],correo:obj['email'],genero:obj['gender'],nom:obj['name'],pic:obj['picture']},
							success:function(data){								
								if (data[0]==0) {
									if (data[1]==1) {
										$('#modal-registro').modal('show');
										var nombre=obj['name'];
										var nombre=nombre.split(' ');
										var genero=obj['gender'];
										var expresion='Estimada';
										if (genero=='male') {	expresion=='Estimado'	}
										$('#obj_genero').html(expresion);
										$('#obj_firs_name').html(obj['given_name']);
										$('#facebook-session').attr('src',obj['picture']);
										$('#obj_nombre').html(nombre[0]+' <span class="fw-semi-bold">'+nombre[1]+'</span>');
										$('#obj_correo').html('<i class="glyphicon glyphicon-envelope"></i> '+obj['email']);
										$('#href_entrar_face').attr('href','data/index/');
									}else{
										$('#modal-error').modal('show');
									}
								}else{
									$('#modal-error').modal('show');
								}
							}
						});	
		        	});		        			          
		        });	       		
	        }, function(error) {
	         	alert(JSON.stringify(error, undefined, 2));
	        }
	    );
}

//1003129903001
//1090084247001
