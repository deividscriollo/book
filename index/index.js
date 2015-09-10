$(document).on('ready',inicio);
var array;
function inicio (){
	$("#btn_consultaRuc").on('click',consultarSRI);///////////
	$("#btn_guardar_empresa").on('click',guardar_empresas);///////////

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

//1003129903001