// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('MainCtrl', function ($scope, datainfo) {
    var data=JSON.stringify(datainfo);
    var perfil = JSON.parse(datainfo['perfil']['nombre']);

    var nombre = (perfil.nombre).split(' ')
    var apellido = (perfil.apellido).split(' ')
    var perfil = {nombre:nombre[0], apellido:apellido[0]}
    $scope.perfil=perfil;
    $scope.sucursal=datainfo.sucursal;
    $scope.perfil_sucursal = datainfo.sucursal.nombre_empresa_sucursal.replace(/\s/g, '').toLowerCase();
});