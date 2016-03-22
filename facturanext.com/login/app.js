jQuery(function($) {
	$('#email').mask('9999999999001@FACTURANEXT.COM');
	$('#form-data').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			email: {
				required: true,
			},
			password: {
				required: true,
			}
		},
		messages: {
			email: {
				required: "Por favor, Ingrese numero de cedula.",
			},
			password: {
				required: "Por favor, Ingrese password",
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
			$('.pass_olvidado').removeClass('hide');
            var usuario = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                url: 'app.php',
                type: 'post',
                dataType: 'json',
                data: {
                    acceder_user: 'dkjf5',
                    user: usuario,
                    pass: password
                },
                success: function(data) {
                    if (data['valid'] == 'false') {
                        swal("Incorrecto", "Usuario o contraseña no validos :(", "error");
                    }
                    if (data['valid'] == 'true') {
                        var directorio = data['valid'] == 'true';
                        window.location.href = '../';
                    };
                }
            });
			
		}
	});
});
