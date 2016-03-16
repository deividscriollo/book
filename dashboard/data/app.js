    // create the module and name it scotchApp
    var app = angular.module('dcApp', ['ngRoute', 'ngAnimate', 'ngStorage', 'route-segment', 'view-segment']);
    var perfil_usuario = Lockr.get('perfil_usuario');
    var perfil_empresa = Lockr.get('perfil_empresa');
    var perfil_sucursal =Lockr.get('perfil_sucursal');

    // // configuracion variable inicial
    var datatotal = {
                        perfil:perfil_usuario,
                        empresa:perfil_empresa,
                        sucursal:perfil_sucursal
                    };
    app.constant('datainfo', datatotal);    
    app.factory('service', function($http){
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
            }
        };
        return service;
    });

    // Lockr.flush()
    // configure our routes
    app.config(function($routeSegmentProvider) {
        // infor perfil usuario
        var p = Lockr.get('perfil_usuario');
        var nombre = (p.nombre).split(' ')
        var apellido = (p.apellido).split(' ')
        var perfil = (nombre[0]+apellido[0]).toLowerCase();

        // infor perfil sucursal
        var p = Lockr.get('perfil_sucursal')
        var nombre_sucursal = p.nombre_sucursal.replace(/\s/g, '').toLowerCase();

        $routeSegmentProvider
        .when('/'+nombre_sucursal,    's1.perfil')
        .when('/'+nombre_sucursal+'/similares',      's1.similares')
        .when('/'+nombre_sucursal+'/colaboradores',    's1.colaboradores')
        .when('/'+nombre_sucursal+'/fotos',    's1.fotos')
        // .when('/empresa/:id/Y',    's1.itemInfo.tab2')
        
        .when('/'+perfil,          's2')
        // .when('/section2/:id',      's2.itemInfo')
        .when('/',          's3')
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
            templateUrl: 'data/perfil/app.html',
            controller: 'perfilController'})            
        // .within()
            
        //     .segment('itemInfo', {
        //         templateUrl: 'templates/section2/item.html',
        //         dependencies: ['id']})
                
        // .up()            
        .segment('s3', {
            templateUrl: 'data/home/app.html',
            controller: 'homeCtrl'
        })          
    });

    app.controller('mainController', function($scope, $rootScope, $localStorage){
        $rootScope.$on('$routeChangeStart', function(event, currRoute, prevRoute){
            $rootScope.animation = currRoute.animation;
        });
        // $scope.sucursal=datainfo.sucursal[0];
        // console.log($scope.sucursal);
    });


