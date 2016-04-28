var app = angular.module('dcApp').controller('MainCtrl', function ($scope, service, $interval,$http, $q) {
	
	// actualizar_correos();
	// $interval(function () {
		// verificacion existencia de correos
        
    // }, 10000);
 //    service.general('verificar_correo_facturas_electronicas', 'data/mailserver.php').success(function(data) {
	// 	console.log(data);
	// });
	// var promise = $http({
 //            url:'data/mailserver.php', 
 //            method: 'POST',
 //            async : true,
 //            cache : false,
 //            data: {methods: "verificar_correo_facturas_electronicas"}
 //        }).success(function (response) {
 //        return response.data;
 //    });


    service.mail_server();
});