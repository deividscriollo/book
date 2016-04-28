// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('homeCtrl', function ($scope, service) {

	// ----------------------------------- configuración acceso facturanext ------------------------------------ //
	var perfil_empresa = Lockr.get('perfil_empresa');
	if (window.location.hostname=='localhost') {
		$scope.facturanext='http://localhost/book/facturanext.com/login/?datauser='+perfil_empresa.ruc+'@facturanext.com';	
	}else{
		$scope.facturanext='http://facturanext.com/login/?datauser='+perfil_empresa.ruc+'@facturanext.com';
	}
	

});