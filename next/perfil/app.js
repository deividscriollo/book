$(function(){

	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	
	// edicion de perfil dueño empresa
	$('#editable_f_nacimiento').editable({
		type: 'adate',
		date: {
			//datepicker plugin options
			format: 'yyyy/mm/dd',
			viewformat: 'yyyy/mm/dd',
			stardate:'1990/01/02',
			weekStart: 1
			 
			//,nativeUI: true//if true and browser support input[type=date], native browser control will be used
			//,format: 'yyyy-mm-dd',
			//viewformat: 'yyyy-mm-dd'
		}
	});
	$('.dropzone').html5imageupload({
		width: '200', 
		height: 200, 
		originalsize:true,
		ghost: false,
		ajax:false,
		data: {customValue: 'edicion_img_empresa'},

	});
	$(".select2").css('width','100%').select2({allowClear:true})
	.on('change', function(){
		$(this).closest('form').validate().element($(this));
	}); 
	$('#editable_nacionalidad').editable({
		type: 'select2',
		value : 'NL',
		onblur:'ignore',
        source: llenar_pais(),
		select2: {
			'width': '100',
			placeholder: 'Seleccione Pais',
            allowClear: true
		},
		validate:function(value){
			if(value=='') return 'Seleccione pais requerido';
		},
		success: function(response, newValue) {
			if (newValue=="20150326104209551428d175961") {				
				$('#editable_provincia').removeClass('hide');
				$('#editable_provincia').editable({
					type: 'select2',
					value : null,
					source: llenar_provincia(),
					select2: {
						'width': 200,
						placeholder: 'Seleccione provincia',
			            allowClear: true
					},
					validate:function(value){
						if(value=='') return 'Seleccione alguna provincia';
					},
					success:function(response, newValue){
						$('#editable_ciudad').removeClass('hide');
						$('#editable_ciudad').editable({
							type: 'select2',
							value : null,
							source: llenar_ciudad(newValue),
							select2: {
								'width': 200,
								placeholder: 'Seleccione Provincia',
					            allowClear: true
							},
							validate:function(value){
								if(value=='') return 'Seleccione alguna ciudad';
							}
						});
						// $('#editable_ciudad').trigger("click");
					}
				});
				$("#editable_provincia").trigger("click");
			}else{
				$('#editable_provincia').addClass('hide');
				$('#editable_ciudad').addClass('hide');
			}
		}
    });
	llenar_tabla();
	data_form();
});

function llenar_pais(){
	var res;
	$.ajax({
		url: 'next/perfil/app.php',
		type: 'post',
		dataType:'json',
		async:false,
		data: {llenar_pais:''},
		success: function (data) {
			res=data;
		}
	});
	return res;
}
function llenar_provincia(id){
	var res;
	$.ajax({
		url: 'next/perfil/app.php',
		type: 'post',
		dataType:'json',
		async:false,
		data: {llenar_provincia:''},
		success: function (data) {
			res=data;
		}
	});
	return res;
}
function llenar_ciudad(id){
	var res;
	$.ajax({
		url: 'next/perfil/app.php',
		type: 'post',
		dataType:'json',
		async:false,
		data: {llenar_ciudad:'', id:id},
		success: function (data) {
			res=data;
		}
	});
	return res;
}
function llenar_tabla(){
	// estableciendo parametros para la tabla de mostrar clientes
	//initiate dataTables plugin
	$('#tbl_data').DataTable({
		language: {
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar: ",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		},
	});
}
function data_form(){
	$('#form-data').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			sel_cargo:{
				required: true
			},
			txt_1: {
				required: true,
			},			
			txt_2: {
				required: true,
				email:true
			},
			txt_3: {
				required: true,
				number: true
			}
		},
		messages: {
			sel_cargo:{
				required: 'Seleccione cargo es requerido'
			},
			txt_1: {
				required: 'Ingrese su nombre y apellido',
			},			
			txt_2: {
				required: 'ingrese correo, es requerido',
				email:'ingrese correo electrónico valido',
			},
			txt_3: {
				required: 'Ingrese, campo requerido',
				number: 'Ingrse, solo números'
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
			$.ajax({
				url: 'next/perfil/app.php',
				type: 'post',
				data:form.serialize(),
				dataType:'json',
				success: function (data) {
					console.log(data);
				}
			});
		},		
	});

}