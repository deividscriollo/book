var app = angular.module('dcApp').controller('inicioCtrl', function ($scope, service, $window, $http, $FB) {

	// inicio compartir
		$FB.init('502203276630100'); //facebook

		$scope.tab = 1;
	    $scope.setTab = function(newTab){
	      $scope.tab = newTab;
	    };
	    $scope.isSet = function(tabNum){
	      return $scope.tab === tabNum;
	    };
	// fin compartir

	// parametrizacion

	// llenar_tabla_area();
	


    function haceAlgo(llenar_tabla_area, mailserver){
	    //algo aca
	    llenar_tabla_area();

	    //sigo... algo aca
	    mailserver();

	}

	haceAlgo(llenar_tabla_area, mailserver);

	function mailserver(){
		// service.general('verificar_correo_facturas_electronicas', 'data/mailserver.php').success(function(data) {
		// 	console.log(data);
		// });
		// $http({
  //           url : 'data/mailserver.php',
  //           method : 'POST',
  //           async : true,
  //           cache : false,
  //           // headers : { 'Accept' : 'application/json' , 'Pragma':'no-cache'},
  //           params : {methods: "verificar_correo_facturas_electronicas"}
  //       }).success(function(data) {
  //          // for each log entry in data, populate logEntries
  //          // push(new LogEntry( stuff from data ))...
  //          console.log('test');
  //       });
        // var promise = $http({
        //         url:'data/mailserver.php', 
        //         method: 'POST',
        //         async : true,
        //         cache : false,
        //         data: {methods: "verificar_correo_facturas_electronicas"}
        //     }).success(function (response) {
        //     return response.data;
        // });
	}
	
	$scope.methodspdf = function(id){		
		service.general('consulta-id-miempresa', 'data/app.php').then(function(data) {
			$window.open("data/reporte.php?id_miempresa="+data['id_miempresa']+"&id="+id+"&ext=xml","","width=900,height=800,scrollbars=NO");
		});
    };
    $scope.methodsxml = function(id){
    	service.general('consulta-id-miempresa', 'data/app.php').then(function(data) {
    		url_xml = "http://localhost/book/facturanext.com/archivos/"+data['id_miempresa']+"/"+id+'.xml'
			var anchor = angular.element('<a/>');
				anchor.attr({
					href: url_xml,
					target: '_blank',
					download: id+'.xml'
				})[0].click();			
		});
    };
    $scope.methodsshare = function(id){
    	service.general('consulta-id-miempresa', 'data/app.php').then(function(data) {
    		var dominio = document.domain;
    		var url='';
    		if (document.domain == 'localhost') {
				url_xml = "http://localhost/book/facturanext.com/archivos/"+data['id_miempresa']+"/"+id+'.xml'
				url_pdf = "http://localhost/book/facturanext.com/data/reporte.php?id_miempresa="+data['id_miempresa']+"&id=2016032815574256f99ac60b8ac&ext=xml"
		    	$scope.urlxml = url_xml;
		    	$scope.urlpdf = url_pdf;
    		};
    		if (document.domain == 'facturanext.com'){
    			url = "../archivos/"+data['id_miempresa']+"/"+id;
				
    		}			
			service.url_short(url_xml).then(function(data){
				$scope.linkxml = data.id;
			});

			service.url_short(url_pdf).then(function(data){
				$scope.linkpdf = data.id;
			});
			// collapseAll()
			$('#modal-compartir').modal('show');
		});

		$('#form-mail-xml').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				email: {
					required: true,
					email:true
				}
			},

			messages: {
				email: {
					required: "Por favor, Ingrese campo requerido.",
					email: "Por favor, Ingrese correo valido."
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
				var link = $scope.linkxml;
				var data = {correo: $('#email').val(), comment: $('#comment').val(), link: link};
				$('#modal-compartir').modal('hide');
				$.blockUI({ 
	        		css: { backgroundColor: 'background: rgba(25,25,25,0.2);', color: '#fff', border:'2px'},
	        		message: '<h3>Enviado correo espere un momento...'
	                                +'<span class="loader animated fadeIn handle ui-sortable-handle">'
	                                +'<span class="spinner">'
	                                    +'<i class="fa fa-spinner fa-spin"></i>'
	                                +'</span>'
	                                +'</span>'
	                          +'</h3>'
	        	});
				service.general('compartir-correo-xml', 'data/app.php', data).then(function(data) {
					$.unblockUI();
					$('#modal-compartir').modal('show');
					if (data['valid'] == 'true') {
						// $scope.accordion.collapseAll();	
						$.gritter.add({
							title: 'Mensaje Enviado',
							text: 'La petición realizada se ha enviado con éxito',
							class_name: 'gritter-success gritter-center',
							time: 2000,
						});
						$(form).each(function() { this.reset(); });
					};
					if (data['valid'] == 'false') {
						$.gritter.add({
							title: 'LO SENTIMOS INTENTE MÁS TARDE',
							text: 'Su peticion no ha sido posible procesarla, intente más tarde.',
							class_name: 'gritter-error gritter-center',
							time: 2000
						});
					}
					
				});
				
			}
		});
		$('#form-mail-pdf').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			ignore: "",
			rules: {
				email: {
					required: true,
					email:true
				}
			},

			messages: {
				email: {
					required: "Por favor, Ingrese campo requerido.",
					email: "Por favor, Ingrese correo valido."
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
				var link = $scope.linkpdf;
				var data = {correo: $('#emailpdf').val(), comment: $('#commentpdf').val(), link: link};
				$('#modal-compartir').modal('hide');
				$.blockUI({ 
	        		css: { backgroundColor: 'background: rgba(25,25,25,0.2);', color: '#fff', border:'2px'},
	        		message: '<h3>Enviado correo espere un momento...'
	                                +'<span class="loader animated fadeIn handle ui-sortable-handle">'
	                                +'<span class="spinner">'
	                                    +'<i class="fa fa-spinner fa-spin"></i>'
	                                +'</span>'
	                                +'</span>'
	                          +'</h3>'
	        	});
				service.general('compartir-correo-xml', 'data/app.php', data).then(function(data) {
					$.unblockUI();
					$('#modal-compartir').modal('show');
					console.log(data);
					if (data['valid'] == 'true') {
						// $scope.accordion.collapseAll();	
						$.gritter.add({
							title: 'Mensaje Enviado',
							text: 'La petición realizada se ha enviado con éxito',
							class_name: 'gritter-success gritter-center',
							time: 2000,
						});
						$(form).each(function() { this.reset(); });
					};
					if (data['valid'] == 'false') {
						$.gritter.add({
							title: 'LO SENTIMOS INTENTE MÁS TARDE',
							text: 'Su peticion no ha sido posible procesarla, intente más tarde.',
							class_name: 'gritter-error gritter-center',
							time: 2000
						});
					}
					
				});
				
			}
		});
    };

	function llenar_tabla_area(){
		var x = $('#data-table').DataTable({
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
			},
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  	null,
			   	null,
			   	null,
			   	null,
			  { "bSortable": false }
			],
			"aaSorting": [],
			
			
			//"bProcessing": true,
	        //"bServerSide": true,
	        //"sAjaxSource": "http://127.0.0.1/table.php"	,
	
			//,
			//"sScrollY": "200px",
			//"bPaginate": false,
	
			//"sScrollX": "100%",
			//"sScrollXInner": "120%",
			//"bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element
	
			//"iDisplayLength": 50
	
	
			select: {
				style: 'multi'
			}

		});
		var x = $('#data-table').DataTable().clear().draw(); //limpiar tabla
		service.general('llenar-facturas_electronicas', 'data/app.php').then(function(data) {
			var t = $('#data-table').DataTable();
			for (var i = 0; i < data.length; i++) {
                var xml = "<button type='button' class='btn btn-white btn-purple btn-sm' onclick=\"angular.element(this).scope().methodsxml('"+data[i].id_factura_correos+"')\"><span class='fa fa-file-code-o purple'> XML</button>";
                var pdf = "<button type='button' class='btn btn-white btn-pink btn-sm'  onclick=\"angular.element(this).scope().methodspdf('"+data[i].id_factura_correos+"')\"><span class='fa fa-file-pdf-o pink'> PDF</button>";
                var compartir = "<button type='button' class='btn btn-white btn-primary btn-sm' onclick=\"angular.element(this).scope().methodsshare('"+data[i].id_factura_correos+"')\"><span class='fa fa fa-share-alt blue'> Compartir</button>";
                var acu =  xml + ' ' + pdf +' '+ compartir;
		        t.row.add( [
		            data[i]['fecha_emision'],
		            data[i]['razon_social'],
		            data[i]['tipo_consumo'],
		            data[i]['tipo_documento'],
		            '$ '+data[i]['total_factura'],
		            acu
		        ]).draw(false);	 
			}			
	    });
	}

	
});