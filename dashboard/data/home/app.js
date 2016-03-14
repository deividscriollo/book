// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('MainCtrl', function ($scope, service) {

	var perfil_usuario = Lockr.get('perfil_usuario');
    var perfil_empresa = Lockr.get('perfil_empresa');
    var perfil_sucursal =Lockr.get('perfil_sucursal');

    // perfil usuario
    var perfil = Lockr.get('perfil_usuario');
    var nombre = (perfil.nombre).split(' ');
    var apellido = (perfil.apellido).split(' ');
    var perfil = {nombre:nombre[0].toLowerCase(), apellido:apellido[0].toLowerCase()}
    $scope.perfil=perfil;

    // perfil sucursal    
    var perfil_sucursal =Lockr.get('perfil_sucursal');
    $scope.sucursal=perfil_sucursal;
    $scope.perfil_sucursal = perfil_sucursal.nombre_sucursal.replace(/\s/g, '').toLowerCase();



});