$(document).on('ready',inicio);
var array;
var app_id = '313318885505529';
var scopes = 'email , public_profile, user_friends' ;
var googleInfo;


new WOW().init();
// Load the SDK asynchronously    
// variables inciales
window.fbAsyncInit = function() {
    FB.init({
        appId      : app_id,
        status     : true,
        cookie     : true, 
        xfbml      : true, 
        version    : 'v2.1'
    });
};
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

(function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  })();

function inicio (){

	$("#txt_telefono_1").inputmask({mask: "(999)-999-999"});
	$("#txt_telefono_2").inputmask({mask: "(999)-999-999"});
	$("#txt_celular").inputmask({mask: "(09)-9999-9999"});
	$("#txt_user_dc").inputmask({mask: "9999999999999"+'@FACTURANEXT.EC'});
	

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


  	// i-------------------------informacion accion btn-------------//
  	$('#btn_modal_atras').click(function(){
  		$('#modal-personal-registro').modal('hide');
  		$('#modal-personal').modal('show');
  	});

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
					// coreo_existencia:
					// existencia_correo_usuario:'required'
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
					required: "Ingrese correo Electrónico, campo requerido.",
					email: "Su correo electrónico no es valido"
				},
				txt_pass: {
					required: "Por favor, Ingrese una contraseña/password.",
					minlength: "Por Favor, ingresar minimo 8 digitos."
				},
				txt_pass1:{
					required: "Por favor, Ingrese una contraseña/password.",
					equalTo:'Revise su password no coincide'
				},
				sel_genero:{
					required:'Por Favor, Seleccione genero',
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
			        url: 'assets/index/app.php',          
			        dataType: 'json',
			        data:{guargar_personal_register:'0012',nombre:$('#txt_nombre').val(),correo:$('#txt_correo_reg').val(),genero:$('#sel_genero').val(),pass:$('#txt_pass').val()},
			        success: function(data) {         
			        	 console.log(response);
			   //      	 if (data[0]==0) {
						// 	var genero=$('#sel_genero').val();
						// 	var expresion_1='Estimada';
						// 	if (genero=='male') {	expresion_1=='Estimado'	}
						// 	$('#modal-personal-registro').modal('hide');
			   //      	 	$('#modal-registro').modal('show');
			   //      	 	var nombre = $('#txt_nombre').val();
			   //      	 	var nombre = nombre.split(' ');			        	 	
			   //      	 	$('#obj_genero').html(expresion_1);
						// 	$('#obj_firs_name').html(nombre[0]);
						// 	$('#facebook-session').attr('src','../assets/img/favicon.fw.png');
						// 	$('#obj_nombre').html(nombre[0]+' <span class="fw-semi-bold">'+nombre[1]+'</span>');
						// 	$('#obj_correo').html('<i class="glyphicon glyphicon-envelope"></i> '+$('#txt_correo_reg').val());
						// 	$('#href_entrar_facebook').attr('href','http://www.personal.nextbook.ec/');
			   //      	 }
			   //      	 if (data[0]!=0) {
			   //      	 	$('#modal-error'),modal('show');
			   //      	 }
			   // 			//  $('#modal-personal-registro').each (function(){
						// // 		this.reset();
						// // 	});
			        }        
			    }); 
			}
		});

	});
	// -----------------FINnuevo registro externo---------------//
	//------------------- INICIO funciones de GOOGLE----------------//
	
	$("#login_google").on('click',function(){
		render();
	});				
	
  	//------------------- FIN funciones de GOOGLE----------------//
}
	jQuery.validator.addMethod("validar_existencia", function (value, element) {
		var h='';
		$.ajax({
		        type: "POST",
		        async:false,
		        url: 'assets/index/app.php',          
		        data:{verificacion_existencia:'025dom01516',valor:value},
		        success: function(data) {
		        	if (data=='true') {
		        	 	return true;
		        	};
		        	if (data=='false') {
		        		return false;
		        	}
		        }        
	    });
	});
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
			$.ajax({
		        type: "POST",
		        url: "assets/index/app.php",
		        async:false,        
		        data:{verificacion_existencia:'',valor:$("#txt_ruc").val()},
		        dataType:'json',
		        success: function(data) {	
		        	$('#obj_resultado_ok').addClass('animated fadeOutUp hide').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				      $(this).removeClass('animated fadeOutUp');
				    });	        	
		        	if (data[0]=='false') {
		        		$('#obj_resultado_si_existe').addClass('animated fadeOutUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					      $(this).removeClass('animated fadeOutUp');
					      $(this).addClass('hide');
					    });
		        		$.ajax({
					        type: "POST",
					        url: "assets/index/consultaSRI.php",          
					        data:{txt_ruc_consumed:'',txt_ruc:$("#txt_ruc").val()},
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
					        			// console.log(tipo);
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
		        	};
		        	if (data[0]=='true') {
		        		$('#obj_resultado_si_existe').removeClass('hide').addClass('animated fadeInDown').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
				      $(this).removeClass('animated fadeInDown');
				    });
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
				$.ajax({
			        type: "POST",
			        url: "assets/index/app.php",          
			        // dataType: 'json',
			        data:{
			        	g_registro_empresa:'',
			        	acu:data_acumulada,
			        	ruc:$('#txt_ruc').val(),
			        	tel1:$('#txt_telefono_1').val(),
			        	tel2:$('#txt_telefono_2').val(),
			        	tel3:$('#txt_celular').val(),
			        	pag:$('#txt_pagina_web').val(),
			        	cor:$('#txt_correo').val(),
			        	razon:$("#txt_razon_social").val(),
			        	tipo:$('#txt_tipo').val()
			        },
			        beforeSend: function() {
			        	// $('#obj_resultado_envio_correo').removeClass('hide');
			        	// $('#obj_resultado_ok').addClass('hide');
			        	// $('#obj_buscar_ruc').addClass('hide');
			        },
			        success: function(data) {
			        	console.log(data);
			        	// $('#obj_resultado_envio_correo').html('<h2>Por favor revise su correo para activar su cuenta</h2>');



			        	// $('#form_empresas').each (function(){
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
		url: "assets/index/app.php",			
	    success: function(data) {			    	
	    	// console.log(data)
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
			url:'assets/index/app.php',
			type:'POST',
			dataType:'json',
			data:{info_face:'ok',id:response.id,correo:response.email,genero:response.gender,nom:response.name},
			success:function(data){
				console.log('impresion'+data);
				if (data[0]==0) {
					if (data[1]==1) {
						$('#modal-registro').modal('show');
						var nombre=response.name;
						var nombre=nombre.split(' ');
						var genero=response.gender;
						
						var expresion='Estimada';
						if (genero='male') {	expresion='Estimado'	}
						console.log(expresion);
						$('#obj_genero').html(expresion);
						$('#obj_firs_name').html(response.first_name);
						$('#facebook-session').attr('src','http://graph.facebook.com/'+response.id+'/picture?type=large');
						$('#obj_nombre').html(nombre[0]+' <span class="fw-semi-bold">'+nombre[1]+'</span>');
						$('#obj_correo').html('<i class="glyphicon glyphicon-envelope"></i> '+response.email);
						facebookLogout();
						$('#href_entrar_facebook').attr('href','http://www.personal.nextbook.ec/');
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
			FB.logout(function (response) {
    		});
		}
	})
}  	


function render() {	
    gapi.signin.render('login_google', {
      'callback': getGoogleData,
      'clientid': '286582982509-dupdlf1fqth5epa2641gm36v96lhlp5r.apps.googleusercontent.com',
      'cookiepolicy': 'single_host_origin',
      'requestvisibleactions': 'http://schemas.google.com/AddActivity',
      'scope': 'https://www.googleapis.com/auth/plus.login',
      'scope' : 'https://www.googleapis.com/auth/userinfo.email'
    });
  	 
}
function getGoogleData(authResult){        
    if (authResult['status']['signed_in']) {                                  
    	gapi.client.load('oauth2', 'v2', function() {        
        	var request = gapi.client.oauth2.userinfo.get();        
        	request.execute(function(obj){              	  
				$('#modal-personal').modal('hide');
				// console.log(obj)		        		
				$.ajax({
					url:'assets/index/app.php',
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
								var expresion_2='Estimada';
								if (genero=='male') {	
									expresion_2='Estimado'	
								}
								$('#obj_genero').html(expresion_2);
								$('#obj_firs_name').html(obj['given_name']);
								$('#facebook-session').attr('src',obj['picture']);
								$('#obj_nombre').html(nombre[0]+' <span class="fw-semi-bold">'+nombre[1]+'</span>');
								$('#obj_correo').html('<i class="glyphicon glyphicon-envelope"></i> '+obj['email']);

								$('#href_entrar_facebook').attr('href','http://www.personal.nextbook.ec/');
								logout(authResult);
							}else{
								$('#modal-error').modal('show');
								logout(authResult)
							}
						}else{
							$('#modal-error').modal('show');
							logout(authResult)
						}
					}
				});	
			});	                                      
      	});  
    } else {                                                                  
      //console.log('Sign-in failed: ' + authResult['error']);                  
    }                                                          
}
function logout(authResult){
    var access_token = authResult['access_token'];
    var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + access_token;
    $.ajax({
        type: 'GET',
        url: revokeUrl,
        async: false,
        contentType: "application/json",
        dataType: 'jsonp',
        success: function (nullResponse) {
           
        },
        error: function (e) {
            
        }
    });
  }


//1003129903001
//1090084247001
