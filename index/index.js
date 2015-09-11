$(document).on('ready',inicio);
var array;
var app_id = '1019380434760499';
var scopes = 'email , public_profile, user_friends' ;
function inicio (){
	$("#btn_consultaRuc").on('click',consultarSRI);///////////
	$("#btn_guardar_empresa").on('click',guardar_empresas);///////////

	$('#modal-empresarial').on('hide.bs.modal', function() {
    	$("#txt_ruc").val("");
		$("#txt_razon_social").val("Razon Social");     		        		        	
	 	$("#txt_nombre_comercial").val("Nombre Comercial");     		        		        	
	 	$("#lbl_tipo_persona").text("PERSONERÌA: JURÍDICA/NATURAL");
	 	$("#txt_direccion").val("");	   	
	 	$("#txt_telefono_1").val("");
	 	$("#txt_telefono_2").val("");
	 	$("#txt_celular").val("");
	 	$("#txt_pagina_web").val("");
	 	$("#txt_correo").val("");
	});
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

}



function consultarSRI(){
	if($("#txt_ruc").val() != '' && $("#txt_ruc").val().length == 13 ){		
		$.ajax({
	        type: "POST",
	        url: "index/consultaSRI.php?txt_ruc="+$("#txt_ruc").val(),          
	        //dataType: 'json',
	        success: function(response) {         	        	
	        	response.replace(/\s+/gi, '');	        	
		 		response.replace(/\s+/gi, '');		 				 		
	        	array = response.split(",");				
	        	
	        	if(array[0] == '"Error en el sistema remoto"'){
	        		$("#txt_ruc").val("");
	        		$("#txt_ruc").focus();
	        		$("#txt_razon_social").val("Razon Social");     		        		        	
	        	 	$("#txt_nombre_comercial").val("Nombre Comercial");     		        		        	
	        	 	$("#lbl_tipo_persona").text("PERSONERÌA: JURÍDICA/NATURAL");	        		
	        		alert("Error no se encuenta en la base de datos");	        		
	        	}else{
	        		$("#txt_razon_social").val(array[0]);     		        		        	
	        	 	$("#txt_nombre_comercial").val(array[2]);     		        		        	
	        	 	$("#lbl_tipo_persona").text(array[5].toUpperCase());
	        	}	        	 
	        }        
	    });        
	}else{
		$("#txt_ruc").focus();
		alert("Digite un ruc de 13 digitos antes de continuar")
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
	console.log(response); 		
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
//1003129903001
//1090084247001