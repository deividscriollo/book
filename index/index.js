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
	////////////////funciones de facebbok////
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
  	//////////////////

}
function consultarSRI(){
	if($("#txt_ruc").val() != '' && $("#txt_ruc").val().length == 13 ){		
		$.ajax({
	        type: "POST",
	        url: "index/consultaSRI.php?txt_ruc="+$("#txt_ruc").val(),          
	        //dataType: 'json',
	        success: function(response) {         
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
	FB.api('/me', {fields: "id,about,age_range,picture,bio,birthday,context,email,first_name,gender,hometown,link,location,middle_name,name,timezone,website,work"},
	 function(response) {	  		
		console.log(response)
		//s
		$('#modal-personal').modal('hide');
	    $('#modal-registro').modal('show');
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