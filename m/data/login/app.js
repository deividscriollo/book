jQuery(function($) {
	// acceso valores iniciales
	init();
	// llamado funciones secundarias
	validaracceso()
});
function init(){
	// entornos de animate(element, from, to, className, options)
	$(document).on('click', '.toolbar a[data-target]', function(e) {
		e.preventDefault();
		var target = $(this).data('target');
		$('.widget-box.visible').removeClass('visible');//hide others
		$(target).addClass('visible');//show target
	});
	// dar formato de makeStackTraceLong(error, promise)
	// $. Máscara. Definiciones ['h']  =  "[A-Za-z0-9 \ / \ -_]";

	$('#txt_movil_usuario').mask('9999999999');

}
function validaracceso(){
	// registro movil
	$('#form_movil').validate({
        errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
        rules: {
            txt_movil_usuario: {
                required: true
            },
            txt_movil_pass: {
                required: true
            }
        },
        messages:{
        	txt_movil_usuario:{
        		required:'<i class="ace-icon fa fa-arrow-up icon-animated-vertical"></i> Ingrese numero de ruc'
        	},
        	txt_movil_pass:{
        		required:'<i class="ace-icon fa fa-arrow-up icon-animated-vertical"></i> Ingrese password'
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
        submitHandler: function (form) { // for demo
        	var usuario=$('#form_movil #txt_movil_usuario').val();
			var password=$('#form_movil #txt_movil_pass').val();
			$.ajax({
				url: 'data/login/app.php',
				type: 'post',
				dataType:'json',
				data: {acceder_user:'dkjf5',user:usuario, pass:password},
				success: function (data) {
					if (data[0]==0) {
						swal("Incorrecto", "Usuario o contraseña no validos :(", "error");
						$('#form_movil').each (function(){
						  this.reset();
						});
					};
					if (data[0]==1) {		
						sessionStorage.setItem("id", data[1]);											
						location.href="dashboard.php";						
					}
				}
			});
		}
    });
}