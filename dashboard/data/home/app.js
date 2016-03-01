// create the controller and inject Angular's $scope
var app = angular.module('dcApp').controller('MainCtrl', function ($scope, datainfo) {
    var data=JSON.stringify(datainfo);
    // console.log(datainfo);
    var perfil = JSON.parse(datainfo['perfil']['nombre']);
    $scope.perfil=perfil;

});