    // create the module and name it scotchApp
    var app = angular.module('dcApp', ['ngRoute', 'ngAnimate', 'ngStorage', 'route-segment', 'view-segment', 'vAccordion', 'djds4rce.angular-socialshare']);
    
    app.factory('service', function($http,$q){
        var service = {
            async: function() {
                    var promise = $http({
                        url:"app.php", 
                        method: 'POST',
                        data: {methods: 'info'}
                    }).then(function (response) {
                    return response.data;
                });
                return promise;
            },
            general:function(typeservices){
                    var promise = $http.post("app.php", {methods: typeservices}).then(function (response) {
                    return response.data;
                });
                return promise;
            },
            general:function(typeservices, url, data){
                    var promise = $http.post(url, {methods: typeservices, data}).then(function (response) {
                    return response.data;
                });
                return promise;
            },
            url_short:function(url){
                    var promise = $http.post('https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyASs4iouqrVaYCzkMXawtE76yGhaTln_GM', {longUrl: url }).then(function (response) {
                    return response.data;
                });
                return promise;
            },
            mail_server:function(){
                // var promise = $http.post('data/mailserver.php', {methods: "verificar_correo_facturas_electronicas"}).then(function (response) {
                //     return response.data;
                // });
                // return promise;

                var defered = $q.defer();
                var promise = defered.promise;

                $http.post('data/mailserver.php', {methods: "verificar_correo_facturas_electronicas"},false,5000)
            },
        };
        return service;
    });

    // configure our routes
    app.config(function($routeSegmentProvider) {

        $routeSegmentProvider
        .when('/empresa',   's1.perfil')
        .when('/empresa/similares',      's1.similares')
        .when('/empresa/colaboradores',    's1.colaboradores')
        .when('/empresa/fotos',    's1.fotos')
        // .when('/empresa/:id/Y',    's1.itemInfo.tab2')
        
        .when('/facturas_fisicas',          's2')
        // .when('/section2/:id',      's2.itemInfo')
        .when('/','s3')
        .when('/facturas_electronicas',          's4')
        .when('/buscar',          's5')
        .when('/reportes',          's6')
        .segment('s1', {
            templateUrl: 'data/mibussines/app.html',
            controller: 'mybussinesController'})            
        .within()
            .segment('perfil', {
                'default': true,
                templateUrl: 'data/mibussines/perfil.html',
                controller: 'perfilCtrl',
            })                
            .segment('similares', {
                templateUrl: 'data/mibussines/similares.html',
                // controller: 'Section1ItemCtrl',
                // dependencies: ['id']
            })   
            .segment('colaboradores', {
                templateUrl: 'data/mibussines/colaboradores.html',
                controller: 'colaboradoresCtrl',
                // dependencies: ['id']
            }).segment('fotos', {
                templateUrl: 'data/mibussines/fotos.html',
                // controller: 'Section1ItemCtrl',
                // dependencies: ['id']
            })              
            // .within()
            //     .segment('tab1', {
            //         'default': true,
            //         templateUrl: 'templates/section1/tabs/tab1.html'})                    
            //     .segment('tab2', {
            //         templateUrl: 'templates/section1/tabs/tab2.html'})                
            // .up()                
            // .segment('prefs', {
            //     templateUrl: 'templates/section1/prefs.html'})                
        .up()        
        .segment('s2', {
            templateUrl: 'vista/fac_fisica.html',
            controller: 'fisicaCtrl'})
        // .within()
            
        //     .segment('itemInfo', {
        //         templateUrl: 'templates/section2/item.html',
        //         dependencies: ['id']})
                
        // .up()            
        .segment('s3', {
            templateUrl: 'vista/inicio.html',
            controller: 'inicioCtrl'
        })
        .segment('s4', {
            templateUrl: 'vista/fac_electro.html',
            controller: 'electronicaCtrl'
        })
        .segment('s5', {
            templateUrl: 'vista/buscar.html',
            controller: 'buscarCtrl'
        })
        .segment('s6', {
            templateUrl: 'vista/reportes.html',
            controller: 'reportesCtrl'
        })  
    });

    app.controller('mainController', function($scope, $rootScope, $localStorage){
        $rootScope.$on('$routeChangeStart', function(event, currRoute, prevRoute){
            $rootScope.animation = currRoute.animation;
        });
        // $scope.sucursal=datainfo.sucursal[0];
        // console.log($scope.sucursal);
    });


    