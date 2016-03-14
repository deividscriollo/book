// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('mybussinesController', function ($scope, $http, datainfo, service) {

    service.async().then(function(d) {
	    $scope.empresa = d;
	});
	jQuery(function(){
		$('#btn-actualizar-logo').click(function(){
			$('#modal-actualizar-logo').modal('show');
		});
		$('#btn-actualizar-fondo').click(function(){
			$('#modal-actualizar-fondo').modal('show');
		});
		$('.dropzone').html5imageupload({
			url:"data/mibussines/app.php",
			remote: {
		        url: "check-email.php",
		        type: "post",
		        data: {
		          	username: function() {
		            	return $( "#username" ).val();
		          	}
		        }
		    }
		});

		
	});
	// map
	// var map = L.map('madp').setView([0.3538352,-78.134931], 13);
	// L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	//     attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	// }).addTo(map);
	// fin map	
});
var app = angular.module('dcApp').controller('perfilCtrl', function ($scope, $http, datainfo, service) {
	$scope.tab = 1;
    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };
});


var app = angular.module('dcApp').controller('colaboradoresCtrl', function ($scope, $http, datainfo, service) {

	// config tabs
	$scope.tab = 1;
    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };
    
	// config datable 
	// ------------------------------------------ proceso formulario almacenar informacion ---------------------------------------------
		$.validator.addMethod("valid_existencia_area", function(value, element) {
		  	var x = 'false';
	  		$.ajax({
		      	url: "data/mibussines/app.php",
				contentType: "application/json",
		        type: "post",
		        async:false,
		        dataType:'json',
		        data: JSON.stringify({methods:'valid_existencia_area', valor:value}),
				success: function(data){
				  	x=data;
				}
			})
			if (x['valid']=='true')
				return false;
			return true;
		});
		$.validator.addMethod("valid_existencia_cargo", function(value, element) {
		  	var x = 'false';
	  		$.ajax({
		      	url: "data/mibussines/app.php",
				contentType: "application/json",
		        type: "post",
		        async:false,
		        dataType:'json',
		        data: JSON.stringify({methods:'valid_existencia_cargo', valor:value}),
				success: function(data){
				  	x=data;
				}
			})
			if (x['valid']=='true')
				return false;
			return true;
		});
		// formulario registro area
		$( "#form-area" ).validate( {
			rules: {
				txt_0: {
					required: true,
					minlength: 2,
					valid_existencia_area:true,
				}
			},
			messages: {
				txt_0: {
					required: "¡Por favor, Ingrese nombre del área!",
					valid_existencia_area:'¡Ingrese otra área, Ya existe!'
				}
			},
			errorElement: "em",
			errorPlacement: function ( error, element ) {
				error.addClass( "help-block" );
				element.parents( ".form-group" ).addClass( "has-feedback" );

				if ( element.prop( "type" ) === "checkbox" ) {
					error.insertAfter( element.parent( "label" ) );
				} else {
					error.insertAfter( element );
				}
				if ( !element.next( "span" )[ 0 ] ) {
					$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
				}
			},
			success: function ( label, element ) {
				if ( !$( element ).next( "span" )[ 0 ] ) {
					$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
				}
			},
			highlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
			},
			unhighlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
			},
			submitHandler: function (form) {
				var data = $(form).serializeFormJSON();
				service.general('save-area', 'data/mibussines/app.php',data).then(function(data) {			    
				    if (data['valid']=='true') {
				    	$.notify({
								title: '<H1>Datos Almacenados!</H1><br>',
								message: 'En hora buena su información se ha almacenado con exito. <i class="fa fa-smile-o"></i>',
							},{
								type: 'success',
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
								},
						});
						$(form).each (function(){
							this.reset();
						});
						llenar_tabla_area();
				    }else{
						$.notify({
								title: '<H1>Datos Almacenados!</H1>',
								message: 'En hora buena su información se ha almacenado con exito. <i class="fa fa-smile-o"></i>',
							},{
								type: 'success',
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
								},
						});
				    }
				});	
			}
		} );
		// formulario registro cargo
		$( "#form-cargo" ).validate( {
			rules: {
				txt_0: {
					required: true,
					minlength: 2,
					valid_existencia_cargo:true,
				}
			},
			messages: {
				txt_0: {
					required: "¡Por favor, Ingrese nombre del cargo!",
					valid_existencia_cargo:'¡Ingrese otro cargo, Ya existe!'
				}
			},
			errorElement: "em",
			errorPlacement: function ( error, element ) {
				error.addClass( "help-block" );
				element.parents( ".form-group" ).addClass( "has-feedback" );

				if ( element.prop( "type" ) === "checkbox" ) {
					error.insertAfter( element.parent( "label" ) );
				} else {
					error.insertAfter( element );
				}
				if ( !element.next( "span" )[ 0 ] ) {
					$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
				}
			},
			success: function ( label, element ) {
				if ( !$( element ).next( "span" )[ 0 ] ) {
					$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
				}
			},
			highlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
			},
			unhighlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
			},
			submitHandler: function (form) {
				var data = $(form).serializeFormJSON();
				service.general('save-cargo', 'data/mibussines/app.php',data).then(function(data) {	
				console.log(data);		    
				    if (data['valid']=='true') {
				    	$.notify({
								title: '<H1>Datos Almacenados!</H1><br>',
								message: 'En hora buena su información se ha almacenado con exito. <i class="fa fa-smile-o"></i>',
							},{
								type: 'success',
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
								},
						});
						$(form).each (function(){
							this.reset();
						});
						llenar_tabla_cargo();
				    }else{
						$.notify({
								title: '<H1>Datos Almacenados!</H1>',
								message: 'En hora buena su información se ha almacenado con exito. <i class="fa fa-smile-o"></i>',
							},{
								type: 'success',
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
								},
						});
				    }
				});	
			}
		} );
		// formulario registro cargo
		$( "#form-colaborador" ).validate( {
			rules: {
				select_area: {
					required: true,
				},
				select_cargo: {
					required: true,
				},
				txt_x: {
					required: true,
					email: true
				},
				txt_0: {
					required: true,
				},
				txt_1: {
					required: true,
				},
				txt_2: {
					required: true,
				}
			},
			messages: {
				select_area: {
					required: "¡Por favor, Seleccione alguna areal!",
				},
				select_cargo: {
					required: "¡Por favor, Seleccione algun cargo!",
				},
				txt_x: {
					required: "¡Por favor, Ingrese correo del colaborador!",
					email: "¡Por favor, Ingrese correo valido!"
				},
				txt_0: {
					required: "¡Por favor, Ingrese nombre del colaborador!",
				},
				txt_1: {
					required: "¡Por favor, Ingrese numero de teléfono!",
				},
				txt_2: {
					required: "¡Por favor, Ingrese numero de dirección!",
				}
			},
			errorElement: "em",
			errorPlacement: function ( error, element ) {
				error.addClass( "help-block" );
				element.parents( ".form-group" ).addClass( "has-feedback" );
				if ( element.prop( "type" ) === "checkbox" ) {
					error.insertAfter( element.parent( "label" ) );
				} else {
					error.insertAfter( element );
				}
			},
			highlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
			},
			unhighlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
			},
			submitHandler: function (form) {
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
				var data = $(form).serializeFormJSON();
				service.general('save-colaborador', 'data/mibussines/app.php',data).then(function(data) {	
				$.unblockUI();
				    if (data['valid']=='true') {
				    	$.notify({
								title: '<H1>Datos Almacenados!</H1><br>',
								message: 'En hora buena su información se ha almacenado con exito. <i class="fa fa-smile-o"></i>',
							},{
								type: 'success',
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
								},
						});
						$(form).each (function(){
							this.reset();
						});
						llenar_tabla_colaboradores();
				    }else{
						$.notify({
								title: '<H1>Datos no Porcesados !</H1>',
								message: 'Intente más tarde. <i class="fa fa-smile-o"></i>',
							},{
								type: 'success',
								animate: {
									enter: 'animated zoomInDown',
									exit: 'animated zoomOutUp'
								},
						});
				    }
				});	
			}
		} );
	// ------------------------------------------ fin proceso formulario almacenar informacion ------------------------------------------
	// -----------------------------------------------------------------inicio init methodos call----------------------------------------
		iniciar_table();
		llenar_tabla_area();
		llenar_tabla_cargo();
		// llenar_tabla_colaboradores();

		// configuracion tableActions()
		
	// -----------------------------------------------------------------fin init metodos ------------------------------------------------
	// ------------------------------------------------------------ inicio metodos en general -----------------------------------------------
		function llenar_tabla_area(){
			var x = $('#data-table-area').DataTable().clear().draw(); //limpiar tabla
			service.general('llenar_tabla_area', 'data/mibussines/app.php').then(function(data) {
				var t = $('#data-table-area').DataTable();
				for (var i = 0; i < data.length; i++) {
					var update = 	'<p data-toggle="tooltip" data-placement="bottom" title="Edit">'
	                                  +'<button class="btn btn-primary btn-xs" data-title="Editar">'
	                                    +'<span class="glyphicon glyphicon-pencil"></span>'
	                                  +'</button>'
	                                +'</p>';

					var edit = 	'<p data-toggle="tooltip" data-placement="bottom" title="Eliminar">'
	                                  +'<button class="btn btn-danger btn-xs" data-title="Eliminar">'
	                                    +'<span class="glyphicon glyphicon-trash"></span>'
	                                  +'</button>'
	                                +'</p>';                                
			        t.row.add( [
			            (i+1),
			            data[i]['area'],
			            update,
			            edit
			        ]).draw(false);	 
				}			
		    });
		    llenar_select_area()
		}
		function llenar_tabla_cargo(){
			var x = $('#data-table-cargo').DataTable().clear().draw(); //limpiar tabla
			service.general('llenar_tabla_cargo', 'data/mibussines/app.php').then(function(data) {
				var t = $('#data-table-cargo').DataTable();
				for (var i = 0; i < data.length; i++) {
					var update = 	'<p data-toggle="tooltip" data-placement="bottom" title="Edit">'
	                                  +'<button class="btn btn-primary btn-xs" data-title="Editar">'
	                                    +'<span class="glyphicon glyphicon-pencil"></span>'
	                                  +'</button>'
	                                +'</p>';

					var edit = 	'<p data-toggle="tooltip" data-placement="bottom" title="Eliminar">'
	                                  +'<button class="btn btn-danger btn-xs" data-title="Eliminar">'
	                                    +'<span class="glyphicon glyphicon-trash"></span>'
	                                  +'</button>'
	                                +'</p>';                                
			        t.row.add( [
			            (i+1),
			            data[i]['cargo'],
			            update,
			            edit
			        ]).draw(false);	 
				}			
		    });
		    llenar_select_cargo();
		}
		function llenar_tabla_colaboradores(){
			var x = $('#data-table-colaboradores').DataTable().clear().draw(); //limpiar tabla
			service.general('llenar_tabla_colaboradores', 'data/mibussines/app.php').then(function(data) {
				var t = $('#data-table-colaboradores').DataTable();
				for (var i = 0; i < data.length; i++) {
					var update = 	'<p data-toggle="tooltip" data-placement="bottom" title="Edit">'
	                                  +'<button class="btn btn-primary btn-xs" data-title="Editar">'
	                                    +'<span class="glyphicon glyphicon-pencil"></span>'
	                                  +'</button>'
	                                +'</p>';

					var edit = 	'<p data-toggle="tooltip" data-placement="bottom" title="Eliminar">'
	                                  +'<button class="btn btn-danger btn-xs" data-title="Eliminar">'
	                                    +'<span class="glyphicon glyphicon-trash"></span>'
	                                  +'</button>'
	                                +'</p>';                                
			        t.row.add([
			            (i+1),
			            data[i]['nombre'],
			            data[i]['area'],
			            data[i]['cargo'],
			            data[i]['stado'],
			            update,
			            edit
			        ]).draw(false);
				}			
		    });
		    llenar_select_cargo();
		}		
		function iniciar_table(){
			// table element
			var x = $('#data-table-area, #data-table-cargo, #data-table-colaborador').DataTable({
				language: 	{
						    "sProcessing":     "Procesando...",
						    "sLengthMenu":     "Mostrar _MENU_ registros",
						    "sZeroRecords":    "No se encontraron resultados",
						    "sEmptyTable":     "Ningún dato disponible en esta tabla",
						    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
						    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						    "sInfoPostFix":    "",
						    "sSearch":         "Buscar:",
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
				}
			});
			// select element 
			$( ".select2" ).css('width','100%').select2( {
				theme: "bootstrap",
				maximumSelectionSize: 6
			});
		}
		function llenar_select_area(){
			service.general('llenar_select_area', 'data/mibussines/app.php').then(function(data) {
				 $('#select_area').select2('data', null);
				for (var i = 0; i < data.length; i++) {
					$("#select_area").append('<option value="'+data[i]['id']+'">'+data[i]['area']+'</option>');           
				}
			});
		}
		function llenar_select_cargo(){
			$("#select_cargo").prop("disabled", false);
			service.general('llenar_select_cargo', 'data/mibussines/app.php').then(function(data) {
				 $('#select_cargo').select2('data', null);
				for (var i = 0; i < data.length; i++) {
					$("#select_cargo").append('<option value="'+data[i]['id']+'">'+data[i]['cargo']+'</option>');           
				}
			});
		}
	// ------------------------------------------------------------ Fin metodos en general -----------------------------------------------

});

