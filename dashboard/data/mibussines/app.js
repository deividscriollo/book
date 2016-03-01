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

		// configuracion tableActions()
    	$('.element-table').DataTable({
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
	});



	// map
	// var map = L.map('madp').setView([0.3538352,-78.134931], 13);
	// L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	//     attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	// }).addTo(map);
	// fin map

	$scope.tab = 1;
    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };




});