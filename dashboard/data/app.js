    // create the module and name it scotchApp
    var app = angular.module('dcApp', ['ngRoute', 'ngAnimate', 'ngStorage', 'route-segment', 'view-segment']);

    // configuracion variable inicial
    var datatotal ={perfil:Lockr.get('perfil'), empresa:Lockr.get('perfil'),sucursal:Lockr.get('sucursal_activo_ctual')};
    app.constant('datainfo', datatotal);    
    app.factory('service', function($http){
        var service = {
            async: function() {
                    var promise = $http.post("app.php", {methods: 'info'}).then(function (response) {
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
            general:function(typeservices, data){
                    var promise = $http.post("app.php", {methods: typeservices, data}).then(function (response) {
                    return response.data;
                });
                return promise;
            }
        };
        return service;
    });

    // Lockr.flush()
    // configure our routes
    app.config(function($routeSegmentProvider, datainfo) {
        var data=JSON.stringify(datainfo);
        var p = JSON.parse(datainfo['perfil']['nombre']);
        var perfil = p.nombre+p.apellido
        $routeSegmentProvider
        .when('/empresa/',    's1')
        .when('/empresa/',    's1.perfil')
        .when('/empresa/:id',      's1.itemInfo')
        .when('/empresa/:id/X',    's1.itemInfo.tab1')
        .when('/empresa/:id/Y',    's1.itemInfo.tab2')
        
        .when('/'+perfil,          's2')
        // .when('/section2/:id',      's2.itemInfo')
        .when('/',          's3')
        .when('/home',          's3')
        
        .segment('s1', {
            templateUrl: 'data/home/app.html',
            controller: 'MainCtrl'})
            
        .within()
            
            .segment('perfil', {
                'default': true,
                templateUrl: 'data/home/app.html'})
                
            .segment('itemInfo', {
                templateUrl: 'data/home/app.html',
                controller: 'Section1ItemCtrl',
                dependencies: ['id']})
                
            .within() 
                
                .segment('tab1', {
                    'default': true,
                    templateUrl: 'templates/section1/tabs/tab1.html'})
                    
                .segment('tab2', {
                    templateUrl: 'templates/section1/tabs/tab2.html'})
                
            .up()
                
            .segment('prefs', {
                templateUrl: 'templates/section1/prefs.html'})
                
        .up()
        
        .segment('s2', {
            templateUrl: 'data/perfil/app.html',
            controller: 'MainCtrl'})
            
        // .within()
            
        //     .segment('itemInfo', {
        //         templateUrl: 'templates/section2/item.html',
        //         dependencies: ['id']})
                
        // .up()
            
        .segment('s3', {
            templateUrl: 'data/home/app.html'})
            
            
    // Also, we can add new item in a deep separately. This is useful when working with
    // routes in every module individually
        // $routeSegmentProvider.within ( ' s1 ' ) .SEGMENT ( ' casa ' , {
        //     templateUrl :  ' templates / section1 / home.html ' });

        // $routeSegmentProvider.within ( ' s1 ' .SEGMENT) ( ' itemInfo ' , {
        //     templateUrl :  ' templates / section1 / item.html ' ,
        //     Controlador : Section1ItemCtrl,
        //     dependencias : [ ' ID ' ]});

        // $routeSegmentProvider.within ( ' s1 ' ) .dentro ( ' itemInfo ' ) .SEGMENT ( ' visión general ' , {
        //     templateUrl :  ' templates / section1 / artículo / overview.html ' });
        // $routeProvider
        //     // route for the home page
        //     .when('/', {
        //         templateUrl : 'data/home/app.html',
        //         controller  : 'mainController',
        //     })
        //     // route for the corporativo
        //     .when('/perfil', {
        //         templateUrl : 'data/perfil/app.html',
        //         controller  : 'perfilController',
        //     })
        //     // route for the programacio page
        //     .when('/mybussines', {
        //         templateUrl : 'data/mibussines/app.html',
        //         controller  : 'mybussinesController',
        //     })
        //     .when('/similares', {
        //         templateUrl : 'data/mibussines/similares.html',
        //         controller  : 'mybussinesController',
        //     })
        //     .when('/colaboradores', {
        //         templateUrl : 'data/mibussines/colaboradores.html',
        //         controller  : 'mybussinesController',
        //     })
        //     .when('/fotos', {
        //         templateUrl : 'data/mibussines/fotos.html',
        //         controller  : 'mybussinesController',
        //     })
        //     // route for the noticias page
        //     .when('/noticias', {
        //         templateUrl : 'vista/noticias.html',
        //         controller  : 'noticiasController',
        //     })
        //     // route for the corporativo
        //     .when('/tarifa', {
        //         templateUrl : 'vista/tarifa.html',
        //         controller  : 'tarifaController',
        //     })
        //     // route for the noticias page
        //     .when('/despertador', {
        //         templateUrl : 'vista/programas/programa1.html',
        //         controller  : 'programa1Controller',
        //     })
        //     // route for the podtcats page
        //     .when('/podcast', {
        //         templateUrl : 'vista/podcast.html',
        //         controller  : 'podcastController'
        //     })

        //     // route for the contact page
        //     .when('/contactos', {
        //         templateUrl : 'vista/contactos.html',
        //         controller  : 'contactosController'
        //     });
    });

    app.controller('mainController', function($scope, $rootScope, $localStorage){
        $rootScope.$on('$routeChangeStart', function(event, currRoute, prevRoute){
            $rootScope.animation = currRoute.animation;
        });
    });
