
function redireccionar() {
setTimeout("location.href='../ingresos'", 3000);	
}

$(function(){
// validacion de formulario
	$('#form_proceso').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_nombre: {
				required: true				
			},
			txt_clave: {
				required: true				
			}			
		},
		messages: {
			txt_nombre: {
				required: "Por favor, Digíte nombre de usuario"
			},
			txt_clave: {
				required: "Por favor, Digíte password / clave"
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
			var form=$("#form_proceso");
			$.ajax({
				url:'login.php',
				type:'POST',
				data:{txt_nombre:$('#txt_nombre').val(),txt_clave:$('#txt_clave').val()},
				success:function(data) {					
					console.log(data)
					if (data==1) {
						$.gritter.add({
							title: 'Información Mensaje',
							text: '	<span class="fa fa-shield"></span>'
										+' Bienvenido: <span class="text-success">'+$('#txt_nombre').val().toUpperCase()
									+'</span><br><span class="fa fa-paw"></span> Dame unos segundos para acceder a la aplicación <span class="text-succes fa fa-spinner fa-spin"></span>'
									,
							image: '../../ice/dist/avatars/avatar1.png', //in Ace demo dist will be replaced by correct assets path
							sticky: false,
							time: 3000,												
						});		
						redireccionar();		
					};
					if (data == 0) {
						$.gritter.add({
							title: '<span>Información Mensaje</span>',
							text: '	<span class="fa fa-shield"></span>'
										+' <span class="text-danger">Su usuario o contraseña son incorrectos</span>'
									+'<span class="fa fa-ban fa-stack-2x text-danger"></span>',
							image: '../../ice/dist/avatars/avatar1.png', //in Ace demo dist will be replaced by correct assets path
							sticky: false,
							time: 3000,												
						});	
						//Limpiar formulario
						$('#form_proceso').each (function(){
						  this.reset();
						});
					};
					if (data!=0&&data!=1) {
						$.gritter.add({
							title: '<span>Información Mensaje</span>',
							text: '	<span class="fa fa-shield"></span>'
										+' <span class="text-danger">ERROR PROCESO AUTENTIFICACIÓN<BR></span>'
									+'<span class="fa fa-ban fa-stack-2x text-danger"></span>',
							image: '../../ice/dist/avatars/avatar1.png', //in Ace demo dist will be replaced by correct assets path
							sticky: false,
							time: 3000,												
						});	
					};
				}
			});
		},
		invalidHandler: function (form) {
			console.log('proceso invalido'+form)
		}
	});

});