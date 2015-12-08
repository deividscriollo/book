$(function(){
	new WOW().init();
	$("#link_factura").on('click',function(){
	 	cambiar_link(sessionStorage.id);
	});
	$('[data-rel=tooltip]').tooltip();
	$('#modal-wizard-container').ace_wizard().on('actionclicked.fu.wizard' , function(e, info){
		console.log('test');
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
	}).on('finished.fu.wizard', function(e) {		
		if(!$('#form-new-pass2').valid()) e.preventDefault();
			if($('#form-new-pass2').valid()) {

				$.ajax({
					url: 'next/dashboard/app.php',
					type: 'post',
					data: {
						save_data:'save_pass',
						txt_1:$('#select_empresa').val(),//id sucursal empresa
						txt_2:$('#txt_empresa').val(),
						txt_3:$('#select_tipo').val(),
						txt_4:$('#select_categoria').val()
					},
					success:function(){
						$('#modal-wizard').modal('hide');
						info_perfil_sucursal();
					}
				});
			};
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
	llenar_mis_empresa();

	// modostyle
	setTimeout(stylescroll, 50);
});
function stylescroll(){

	$('.scrollable').each(function () {
		$(this).ace_scroll({
			size:  '100%',
			//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
		});
	});

}
function requireinfo(){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		dataType:'json',
		data: {verificar_seleccion:'dom19'},//verificar si alguna empresa ya se selecciono
		success: function (data) {
			if (data[0]==1) {
				$('#modal-wizard').modal('show');
			}else{
				info_perfil_sucursal();
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
	var url ='http://www.facturanext.com?id_user='+id;
	window.open(url,'_blank');	
}
function llenar_mis_empresa(){
	$.ajax({
	url: 'next/dashboard/app.php',
	type: 'post',
	dataType:'json',
	data: {llenar_mis_empresa:''},
	success: function (data) {
		$('#element_acordeon_empresas').html('');
		var acumulador='<div id="proposalAccordian" class="panel-group accordion-style1 accordion-style2">';

		for (var i = 0; i < data.length; i++) {
			var label='glyphicon-ok green';
			if (data[i]['stado_sucursal']=='Cerrado') {
				label='glyphicon-remove red';
			}
			acumulador+='<div class="panel panel-default">'
						   +'<div class="panel-heading">'
						       +' <h4 class="panel-title">'
						            +'<a data-toggle="collapse" data-parent="#proposalAccordian" href="#collapseContact'+i+'" class="accordion-toggle collapsed">'
						            	+'<i class="ace-icon fa fa-database"></i> '
						            	+data[i]['nombre_empresa_sucursal']
						            	+'<i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>'
						            	+'<span class="glyphicon '+label+' pull-right" title="Estado: '+data[i]['stado_sucursal']+'"></span>'
						            +'</a>'
						        +'</h4>'
						    +'</div>'
						    +'<div id="collapseContact'+i+'" class="panel-collapse collapse">'
						        +'<div class="panel-body green">'
						            +'Dirección: <i class="fa fa-map-marker light-orange bigger-110"></i> '+data[i]['direccion']
						            +'<button class="btn btn-white btn-warning btn-round btn-block">'
										+'<i class="ace-icon fa fa-database"></i>'
										+'<span>Entrar</span>'
									+'</button>'
						        +'</div>'
						    +'</div>'
						+'</div>'
								
		}
		acumulador+='</div>';


		
							
		$('#element_acordeon_empresas').html(acumulador);	
	}
});
}

