$(function(){
	$('#modal-wizard-container').ace_wizard().on('actionclicked.fu.wizard' , function(e, info){
		var step=info.step;
		if (step==1) {
			if(!$('#form-new-pass').valid()) e.preventDefault();
			if ($('#form-new-pass').valid()) {
				$.ajax({
					url: 'next/dashboard/app.php',
					type: 'post',
					data: {update_pass:'update_pass',txt:$('#txt_pass_1').val()},
				});
			}
			
		};
		if (step==2) {
			
			if(!$('#form-new-pass2').valid()) e.preventDefault();
			if($('#form-new-pass2').valid()) {

				$.ajax({
					url: 'next/dashboard/app.php',
					type: 'post',
					data: {
						save_data:'save_pass',
						txt_1:$('#select_empresa').val(),
						txt_2:$('#txt_empresa').val(),
						txt_3:$('#select_tipo').val(),
						txt_4:$('#select_categoria').val()
					},
				});
			};
		};
		if (step==3) {
			if(!$('#form-new-pass3').valid()) e.preventDefault();
			if($('#form-new-pass3').valid()) {
				$.ajax({
					url: 'next/dashboard/app.php',
					type: 'post',
					data: {update_img:'update_pass',txt:$('#txt_pass_1').val()},
				});
			};
		}
	}).on('finished.fu.wizard', function(e) {
		$('#modal-wizard').modal('hide');
	});
	
	$('#file_1').ace_file_input({
		style:'well',
		btn_choose:'Seleccionar Logotípo',
		btn_change:null,
		no_icon:'ace-icon fa fa-cloud-upload',
		droppable:true,
		thumbnail:'small',//large | fit
		allowExt: ['jpg', 'jpeg', 'png', 'gif'],
		allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
		//,icon_remove:null//set null, to hide remove/reset button
		/**,before_change:function(files, dropped) {
			//Check an example below
			//or examples/file-upload.html
			return true;
		}*/
		/**,before_remove : function() {
			return true;
		}*/
		,
		preview_error : function(filename, error_code) {
			//name of the file that failed
			//error_code values
			//1 = 'FILE_LOAD_FAILED',
			//2 = 'IMAGE_LOAD_FAILED',
			//3 = 'THUMBNAIL_FAILED'
			//alert(error_code);
		}

	}).on('change', function(){
		//console.log($(this).data('ace_input_files'));
		//console.log($(this).data('ace_input_method'));
	});
	$('#file_2').ace_file_input({
		style:'well',
		btn_choose:'Soltar archivos o haga clic aquí para elegir. Seleccionar Banner',
		btn_change:null,
		no_icon:'ace-icon fa fa-cloud-upload',
		droppable:true,
		thumbnail:'small',
		allowExt: ['jpg', 'jpeg', 'png', 'gif'],
		allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
		,
		preview_error : function(filename, error_code) {
			//name of the file that failed
			//error_code values
			//1 = 'FILE_LOAD_FAILED',
			//2 = 'IMAGE_LOAD_FAILED',
			//3 = 'THUMBNAIL_FAILED'
			//alert(error_code);
		}

	}).on('change', function(){
		//console.log($(this).data('ace_input_files'));
		//console.log($(this).data('ace_input_method'));
	});
	
	



	$('#form-new-pass').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: true,
		rules: {
			txt_pass_1: {
				required: true,
				minlength: 8
			},
			txt_pass_2: {
				required: true,
				minlength: 8,
				equalTo: "#txt_pass_1"
			},
		},
		messages: {
			txt_pass_1: {
				required: "Por favor, Ingrese su nueva contraseña.",
				minlength: "Minimo 8 Caracteres."
			},
			txt_pass_2: {
				required: 'Por favor, Repita su nueva contraseña',
				equalTo: "Revice, su contraseña no coincide"
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
		}
	});	
	$('#form-new-pass3').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: true,
		rules: {
			file_1: {
				required: true,
				minlength: 8
			},
			file_1: {
				required: true,
				minlength: 8,
				equalTo: "#txt_pass_1"
			},
		},
		messages: {
			txt_pass_1: {
				required: "Por favor, Ingrese su nueva contraseña.",
				minlength: "Minimo 8 Caracteres."
			},
			txt_pass_2: {
				required: 'Por favor, Repita su nueva contraseña',
				equalTo: "Revice, su contraseña no coincide"
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
		}
	});	
	$('#form-new-pass2').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			select_empresa: {
				required: true,
			},
			txt_empresa: {
				required: true,
			},
			select_tipo: {
				required: true,
			},
			select_categoria: {
				required: true,
			}
		},

		messages: {
			select_empresa: {
				required: "Por favor, Seleccione la empresa.",
			},
			txt_empresa: {
				required: "Por favor, Ingrese nombre de la empresa ya que no dispone en el SRI.",
			},
			select_tipo: {
				required: "Por favor, Seleccione Tipo de Empresa.",
			},
			select_categoria: {
				required: "Por favor, seleccione Categoría",
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
		},
		invalidHandler: function (form) {
		}
	});

	$("#select_empresa").css('width','100%').select2({allowClear:true}).on('change', function(){
		$(this).closest('form').validate().element($(this));
		var id=$(this).val();
		var empresa=buscar_nombre(id);
		if (empresa[0]==null) {
			$('#txt_empresa').attr("readonly", false);
		}else{
			$('#txt_empresa').attr("readonly", true);
		}
		$('#txt_empresa').val(empresa[0]);
		$('#txt_direccion_empresa').val(empresa[1]);
	}); 
	$('#select_categoria').prop('disabled', true).trigger("liszt:updated");
	$("#select_tipo").css('width','100%').select2({allowClear:true}).on('change', function(){
		$(this).closest('form').validate().element($(this));
		var id=$(this).val();
		llenaselect_categoria_empresa(id);
		$('#select_categoria').prop('disabled', false).trigger("liszt:updated");
		$('#select_categoria').val('').trigger('chosen:updated');
		$('#select_categoria').trigger('chosen:updated');
	}); 
	$("#select_categoria").css('width','100%').select2({allowClear:true}).on('change', function(){
		$(this).closest('form').validate().element($(this));
	});
	requireinfo();
	llenaselect_empresa();
	llenaselect_tipo_empresa();
});
function requireinfo(){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		dataType:'json',
		data: {verificar_seleccion:'dom19'},//verificar si alguna empresa ya se selecciono
		success: function (data) {
			if (data[0]==1) {
				$('#modal-wizard').modal('show');
			}
		}
	});
}
function llenaselect_empresa(){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		data: {llenaselect_empresa:'dom19'},//verificar si alguna empresa ya se selecciono
		success: function (data) {
			$('#select_empresa').append(data);
			$('#select_empresa').trigger('liszt:updated');
		}
	});
}
function llenaselect_tipo_empresa(){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		data: {llenaselect_tipo_empresa:'dom19'},//verificar si alguna empresa ya se selecciono
		success: function (data) {
			$('#select_tipo').append(data);
			$('#select_tipo').trigger('liszt:updated');
		}
	});
}
function llenaselect_categoria_empresa(id){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		data: {llenaselect_categoria_empresa:'dom19',id:id},//verificar si alguna empresa ya se selecciono
		success: function (data) {
			$('#select_categoria').append(data);
			$('#select_categoria').trigger('liszt:updated');
		}
	});
}
function buscar_nombre(id){
	var result='no disponible';
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		async:false,
		dataType:'json',
		data: {buscar_nombre_empresa:'dom19',id:id},//verificar si alguna empresa ya se selecciono
		success: function (data) {
			result=data;
		}
	});
	return result;
}