$(document).ready(function(){	
	usuarios_online();
});



function usuarios_online(){	
	jQuery.ajax({
		type: 'POST',
		url: 'registro_empresa/app2.php',
		data: {id:$("#id_login").data('login')},
		dataType: 'json',
		success: function(retorno){			
			setTimeout(usuarios_online,15000);
		}
	});
}