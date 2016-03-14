// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('perfilController', function ($scope, datainfo) {
	var usuario = Lockr.get('perfil_usuario');
	$scope.perfil=usuario;
	$scope.nombre=usuario.nombre;
	
});
