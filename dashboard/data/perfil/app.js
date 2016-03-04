// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('perfilController', function ($scope, datainfo) {
	$scope.perfil=datainfo['perfil'];
	console.log(datainfo['perfil']);
	// var nombre = (p.nombre).split(' ')
 //        var apellido = (p.apellido).split(' ')
 //        var perfil = nombre[0]+apellido[0]
	// var obj = jQuery.parseJSON($scope.perfil.nombre);

	// $scope.nombre=obj;
	
});
