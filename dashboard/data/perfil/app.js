// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('perfilController', function ($scope, datainfo) {
	$scope.perfil=datainfo['perfil'];
	var obj = jQuery.parseJSON($scope.perfil.nombre);
	$scope.nombre=obj;
	
});
