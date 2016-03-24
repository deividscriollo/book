var app = angular.module('dcApp').controller('inicioCtrl', function ($scope, service) {
	// parametrizacion
	llenar_tabla_area()


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
		}
	});

	function llenar_tabla_area(){
			var x = $('#data-table').DataTable().clear().draw(); //limpiar tabla
			service.general('llenar-facturas_electronicas', 'data/app.php').then(function(data) {
				var t = $('#data-table').DataTable();
				for (var i = 0; i < data.length; i++) {
	                var pdf = '<button class="btn btn-xs btn-default"><span class="fa fa-pencil green"></span> Editar</button>';
	                var xml = '<button class="btn btn-xs btn-default"><span class="fa fa-trash-o red"></span> Eliminar</button>';
			        t.row.add( [
			            data[i]['tipo_documento'],
			            data[i]['razon_social'],
			            data[i]['tipo_consumo'],
			            data[i]['fecha_emision'],
			            xml+pdf
			        ]).draw(false);	 
				}			
		    });
		    llenar_select_area()
		}

	

});