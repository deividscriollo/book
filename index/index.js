$(document).on('ready',inicio);
function inicio (){
	$("#btn_consultaRuc").on('click',consultarSRI);
}
function consultarSRI(){
	if($("#txt_ruc").val() != '' && $("#txt_ruc").val().length == 13 ){		
		$.ajax({
	        type: "POST",
	        url: "index/consultaSRI.php?txt_ruc="+$("#txt_ruc").val(),          
	        //dataType: 'json',
	        success: function(response) {         
	        	var array = response.split(",");		        	
	        	if(array[0] == '"Error en el sistema remoto"'){
	        		$("#txt_ruc").val("");
	        		$("#txt_ruc").focus();
	        		$("#txt_razon_social").val("Proceso de Prueba");     		        		        	
	        	 	$("#txt_representante_legal").val("Proceso de Prueba");     		        		        	
	        	 	$("#lbl_tipo_persona").text("PERSONERÌA: JURÍDICA/NATURAL");	        		
	        		alert("Error no se encuenta en la base de datos");	        		
	        	}else{
	        		$("#txt_razon_social").val(array[2]);     		        		        	
	        	 	$("#txt_representante_legal").val(array[0]);     		        		        	
	        	 	$("#lbl_tipo_persona").text(array[5].toUpperCase());
	        	}	        	 
	        }        
	    });        
	}else{
		$("#txt_ruc").focus();
		alert("Digite un ruc de 13 digitos antes de continuar")
	}
}


//1003129903001