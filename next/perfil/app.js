$(function(){
	info_perfil_sucursal();
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
	$('.dropzone').html5imageupload();
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
	config_tabla();
	data_form();
	formcargo();
	llenar_tabla_cargo();
	llenar_select_cargo();
	llenar_tabla_data();
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
function config_tabla(){
	// estableciendo parametros para la tabla de mostrar clientes
	//initiate dataTables plugin
	$('#tbl_data, #tbl_data_cargo').DataTable({
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
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Todo"]]
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
				email:'ingrese correo electrónico valido'
			},
			txt_3: {
				required: 'Ingrese, campo requerido',
				number: 'Ingrese, solo números'
			},
			thumb:{
				required:'Seleccione una foto es requerido'
			}
		},
		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			$('.btn-ok').trigger('click');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
			$('.btn-ok').trigger('click');
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
			var formdata=$('#form-data').serialize();
			$.ajax({
				url: 'next/perfil/app.php',
				type: 'post',
				data:formdata,
				dataType:'json',
				async:false,
				success: function (data) {
					if (data[0]==1) {
						swal("Buen Trabajo!", "Su información se ha creado con exito!", "success");
					}			
					$('#form-data').each (function(){
					  this.reset();
					});
					$('.btn-del').trigger('click');
					llenar_tabla_data()				
				}
			});
		},		
	});	
}
function formcargo(){
	$('#form-cargo').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_0:{
				required: true,
				remote: {
			        url: "next/perfil/app.php",
			        type: "post",
			        data:{verificacion_existencia_cargo:''}			        
			    }
			}			
		},
		messages: {
			txt_0:{
				required: 'Ingrese nombre del cargo, es requerido.',
				remote: 'El registro ya existe, ingrese otro.'
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
			var formdata=$('#form-cargo').serialize();
			$.ajax({
				url: 'next/perfil/app.php',
				type: 'post',
				data: formdata,
				dataType: 'json',
				success: function (data) {
					if (data[0]==1) {
						swal("Buen Trabajo!", "Su información se ha creado con exito!", "success")
						llenar_tabla_cargo();
					}
					$('#form-cargo').each (function(){
					  this.reset();
					});
				}
			});
		},		
	});
}
function llenar_tabla_cargo(){
	var tabla=$('#tbl_data_cargo');
	tabla.DataTable().clear().draw();
	jQuery.ajax({
		url: 'next/perfil/app.php',
		type: 'post',
		dataType:'json',
		async:false,
		data: {llenar_data_cargo:''},
		success: function (data) {
			for (var i = 0; i < data.length; i++) {
				tabla.dataTable().fnAddData([
					i+1,
					data[i][1],
					data[i][3],
					'<button class="btn btn-white btn-default btn-round btn-sm btn-primary pull-center" onclick=data_actualizar_cargo("'+data[i][0]+'")>'
						+'<i class="ace-icon fa fa-pencil blue bigger-125"></i>'
					+'</button> '
					+'<button class="btn btn-white btn-default btn-round btn-sm btn-danger pull-center" onclick=data_eliminar_cargo("'+data[i][0]+'")>'
						+'<i class="ace-icon fa fa-times red bigger-125"></i>'
					+'</button>'
                ]);
			}			
		}
	});
	llenar_select_cargo();
}
function llenar_tabla_data(){
	var tabla=$('#tbl_data');
	tabla.DataTable().clear().draw();
	jQuery.ajax({
		url: 'next/perfil/app.php',
		type: 'post',
		dataType:'json',
		async:false,
		data: {llenar_data:''},
		success: function (data) {
			for (var i = 0; i < data.length; i++) {
				tabla.dataTable().fnAddData([
					i+1,
					data[i][1],
					data[i][2],
					data[i][3],
					data[i][4],
					'<button class="btn btn-white btn-default btn-round btn-sm btn-primary pull-center" onclick=data_actualizar_data("'+data[i][0]+'")>'
						+'<i class="ace-icon fa fa-pencil blue bigger-125"></i>'
					+'</button> '
					+'<button class="btn btn-white btn-default btn-round btn-sm btn-danger pull-center" onclick=data_eliminar_data("'+data[i][0]+'")>'
						+'<i class="ace-icon fa fa-times red bigger-125"></i>'
					+'</button>'
                ]);
			}			
		}
	});
	llenar_select_cargo();
}
function data_actualizar_cargo(id){
	console.log(id);
}
function data_eliminar_cargo(id){
	swal({   
		title: "Eliminar registro?",   
		text: "Esta seguro de eliminar el registro!",   
		type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Si, Eliminar",   
		cancelButtonText: "Cancelar",
		closeOnConfirm: false }, function(){
			$.ajax({
				url: 'next/perfil/app.php',
				type: 'post',
				data: {cargo_eliminar:'',id:id},
				dataType: 'json',
				success: function (data) {
					if (data[0]==1) {
						swal("Buen Trabajo!", "Su información se elimino correctamente!", "success")
						llenar_tabla_cargo();						
					}
				}
			});   
			
		});	
}
function data_eliminar_data(id){
	swal({   
		title: "Eliminar registro?",   
		text: "Esta seguro de eliminar el registro!",   
		type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Si, Eliminar",   
		cancelButtonText: "Cancelar",
		closeOnConfirm: false }, function(){
			$.ajax({
				url: 'next/perfil/app.php',
				type: 'post',
				data: {data_eliminar:'',id:id},
				dataType: 'json',
				success: function (data) {
					if (data[0]==1) {
						swal("Buen Trabajo!", "Su información se elimino correctamente!", "success")
						llenar_tabla_data();						
					}
				}
			});   
			
		});	
}
function llenar_select_cargo(){
	
	$.ajax({
		url: 'next/perfil/app.php',
		type: 'post',
		data: {llenar_select_cargo:''},
		success: function (data) {
			$('#sel_cargo').html(data);
		}
	});  
}