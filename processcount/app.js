jQuery(function($) {
	var cadena=window.location.search;
	var cadena = cadena.replace('?','');
	var sum=cadena.split('=')
	if (sum[0]=='activ_reg_count') {
		$.ajax({
			url: 'app.php',
			type: 'post',
			dataType:'json',
			data: {activ_reg_count:sum[0],id:sum[2]},
			beforeSend: function() {
	        	$.blockUI({ 
	        		css: { backgroundColor: 'background: rgba(255,255,255,0.7);', color: '#fff', border:'2px'},
	        		message: '<h3>Creando su nuevo correo, espere un momentos...'
	        		// message: '<h3>Estamos trabajando, intente mas tarde...'
	                                +'<span class="loader animated fadeIn handle ui-sortable-handle">'
	                                +'<span class="spinner">'
	                                    +'<i class="fa fa-spinner fa-spin"></i>'
	                                +'</span>'
	                                +'</span>'
	                          +'</h3>'
	        	});
	        },
			success: function (data) {
				$.unblockUI();
				if (data['valid']=='false') {
					swal({
						title:"Lo sentimos", 
						text:"Su petición ya fue procesada anteriormente", 
						type:"error"},function(){
						location.href="../";
					});
					
				}else{
					if (data['@attributes']['valid']=='true') {
						var acu=data['@attributes'];
						$('#txt_correo').val(acu['user']+'@facturanext.com');
						$('#txt_pass').val(acu['pass']);
						$('#obj_empresa').text('Estimados, '+acu['empresa']);
						swal({   
							title: "Buen Trabajo!",   
							text: "La información del usuario y contraseña fueron enviados a su correo electrónico. <br>"+"Correo: "+acu['user']+'@facturanext.com'+'<br>'+'Password: '+acu['pass'],
							html: true,
							type:"success",
						},function(){
							location.href="../";
						});
					};					
				}
				
			}
		});
	}
	
});
