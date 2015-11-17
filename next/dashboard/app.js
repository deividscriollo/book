$(function(){
	$("#link_factura").on('click',function(){
		cambiar_link(sessionStorage.id);
	})
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
	

	//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	$('#avatar').editable({
		type: 'image',
		name: 'avatar',
		value: null,
		image: {
			//specify ace file input plugin's options here
			btn_choose: 'Change Avatar',
			droppable: true,
			maxSize: 110000,//~100Kb

			//and a few extra ones here
			name: 'avatar',//put the field name here as well, will be used inside the custom plugin
			on_error : function(error_type) {//on_error function will be called when the selected file has a problem
				if(last_gritter) $.gritter.remove(last_gritter);
				if(error_type == 1) {//file format error
					last_gritter = $.gritter.add({
						title: 'File is not an image!',
						text: 'Please choose a jpg|gif|png image!',
						class_name: 'gritter-error gritter-center'
					});
				} else if(error_type == 2) {//file size rror
					last_gritter = $.gritter.add({
						title: 'File too big!',
						text: 'Image size should not exceed 100Kb!',
						class_name: 'gritter-error gritter-center'
					});
				}
				else {//other error
				}
			},
			on_success : function() {
				$.gritter.removeAll();
			}
		},
	    url: function(params) {
			// ***UPDATE AVATAR HERE*** //
			//for a working upload example you can replace the contents of this function with 
			//examples/profile-avatar-update.js

			var deferred = new $.Deferred

			var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
			if(!value || value.length == 0) {
				deferred.resolve();
				return deferred.promise();
			}


			//dummy upload
			setTimeout(function(){
				if("FileReader" in window) {
					//for browsers that have a thumbnail of selected image
					var thumb = $('#avatar').next().find('img').data('thumb');
					if(thumb) $('#avatar').get(0).src = thumb;
				}
				
				deferred.resolve({'status':'OK'});

				if(last_gritter) $.gritter.remove(last_gritter);
				last_gritter = $.gritter.add({
					title: 'Avatar Updated!',
					text: 'Uploading to server can be easily implemented. A working example is included with the template.',
					class_name: 'gritter-info gritter-center'
				});
				
			 } , parseInt(Math.random() * 800 + 800))

			return deferred.promise();
			
			// ***END OF UPDATE AVATAR HERE*** //
		},
		
		success: function(response, newValue) {
		}
	})
	



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
	$('#select_categoria').prop('disabled', true).trigger("chosen:updated");
	$("#select_tipo").css('width','100%').select2({allowClear:true}).on('change', function(){		
		$(this).closest('form').validate().element($(this));				
		var id=$(this).val();			
		llenaselect_categoria_empresa(id);
		$('#select_categoria').prop('disabled', false).trigger("chosen:updated");
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
			$('#select_empresa').trigger('chosen:updated');
		}
	});
}
function llenaselect_tipo_empresa(){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		data: {llenaselect_tipo_empresa:'dom19'},//verificar si alguna empresa ya se selecciono
		success: function (data) {
			$("#select_tipo").html("");      			
			$('#select_tipo').append('<option value="">&nbsp;</option>');
			$('#select_tipo').append(data);
			$('#select_tipo').trigger('chosen:updated');
		}
	});
}
function llenaselect_categoria_empresa(id){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		data: {llenaselect_categoria_empresa:'dom19',id:id},//verificar si alguna empresa ya se selecciono		
		success: function (data) {						
			$("#select_categoria").html("");      			
			$('#select_categoria').append('<option value="">&nbsp;</option>');
			$('#select_categoria').append(data);			
			$("#select_categoria").select2();
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
function cambiar_link(id){
	location.href ='http://www.facturanext.com?id_user='+id;
	//
}