
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Dashboard</title>
    <link href="dist/css/application.min.css" rel="stylesheet">
    <link href="dist/css/login.css" rel="stylesheet">
    <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
    <!--[if IE 9]>
        <link href="css/application-ie9-part2.css" rel="stylesheet">
    <![endif]-->
    <link rel="shortcut icon" href="img/favicon.html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script>
</head>
<body>
<!--
  Main sidebar seen on the left. may be static or collapsing depending on selected state.

    * Collapsing - navigation automatically collapse when mouse leaves it and expand when enters.
    * Static - stays always open.
-->
<nav id="sidebar" class="sidebar" role="navigation">
    <!-- need this .js class to initiate slimscroll -->
    <div class="js-sidebar-content">
        <header class="logo hidden-xs">
            <a href="index-2.html"><i class="fa fa-database"></i> MENU</a>
        </header>

        <!-- seems like lots of recent admin template have this feature of user info in the sidebar.
             looks good, so adding it and enhancing with notifications -->
        <div class="sidebar-status visible-xs">
            <a href="#" class="dropdown-toggle text-align-center" data-toggle="dropdown">

                <!-- .circle is a pretty cool way to add a bit of beauty to raw data.
                     should be used with bg-* and text-* classes for colors -->
                MENU
            </a>
            <!-- #notifications-dropdown-menu goes here when screen collapsed to xs or sm -->
        </div>
        <!-- main notification links are placed inside of .sidebar-nav -->
        <ul class="sidebar-nav">
            <li class="active">
                    <!-- an example of nested submenu. basic bootstrap collapse component -->
                    <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                        <span class="icon">
                            <i class="fa fa-desktop"></i>
                        </span>
                        Nuestra Empresa
                        <i class="toggle fa fa-angle-down"></i>
                    </a>
                    <ul id="sidebar-dashboard" class="collapse in">
                        <li><a href="form_elements.html">Op1</a></li>
                    <li><a href="form_validation.html">Op2</a></li>
                    <li><a href="form_wizard.html">Op3</a></li>
                    </ul>
                </li>
            <li>
                <a class="collapsed" href="#sidebar-ui" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-cubes"></i>
                    </span>
                    Nuestros Productos
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-ui" class="collapse">
                    <li><a href="ui_components.html">Op1 </a></li>
                    <li><a href="ui_notifications.html">Op2 </a></li>
                </ul>
            </li>
            <li>
                <a class="collapsed" href="#categoria" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="glyphicon glyphicon-th-large"></i>
                    </span>
                    Categorías
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="categoria" class="collapse">
                    <li><a href="ui_components.html">Op1 </a></li>
                    <li><a href="ui_notifications.html">Op2 </a></li>
                </ul>
            </li>
            <li>
                <a class="collapsed" href="#clasificados" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-cubes"></i>
                    </span>
                    Clasificados
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="clasificados" class="collapse">
                    <li><a href="ui_components.html">Op1 </a></li>
                    <li><a href="ui_notifications.html">Op2 </a></li>
                </ul>
            </li>
            <li>
                <a class="collapsed" href="#noticias" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-cubes"></i>
                    </span>
                    Noticias
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="noticias" class="collapse">
                    <li><a href="ui_components.html">Op1 </a></li>
                    <li><a href="ui_notifications.html">Op2 </a></li>
                </ul>
            </li>
            <li>
                <a href="grid.html">
                    <span class="icon">
                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                    </span>
                    Ayuda
                </a>
            </li>
            <li>
                <a href="grid.html">
                    <span class="icon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                    Contacto
                </a>
            </li>
            <li>
                <a href="grid.html">
                    <span class="icon">
                        <i class="glyphicon glyphicon-search"></i>
                    </span>
                    Buscador
                </a>
            </li>
            <li>
                <a class="collapsed" href="#sidebar-maps" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </span>
                    Maps
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-maps" class="collapse">
                    <!-- data-no-pjax turns off pjax loading for this link. Use in case of complicated js loading on the
                         target page -->
                    <li><a href="maps_google.html" data-no-pjax>Google Maps</a></li>
                    <li><a href="maps_vector.html">Vector Maps</a></li>
                </ul>
            </li>
        </ul>
        <!-- A place for sidebar notifications & alerts -->
        <div class="sidebar-alerts">
            <div class="row">
                <div class="col-sm-4 text-align-right" id="obj_reloj">
                    16:45
                </div>
                <div class="col-sm-8 text-align-left">
                    <div class="center">
                        <div id="obj_dia">JUEVES</div>
                        <div id="obj_fecha">10 de SEPTIEMBRE</div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</nav>
<!-- This is the white navigation bar seen on the top. A bit enhanced BS navbar. See .page-controls in _base.scss. -->
<nav class="page-controls navbar navbar-default">
    <div class="container-fluid">
        <!-- .navbar-header contains links seen on xs & sm screens -->
        <div class="navbar-header">
             <ul class="nav navbar-nav navbar-left visible-xs">
                <li>
                    <!-- whether to automatically collapse sidebar on mouseleave. If activated acts more like usual admin templates -->
                    <a class="hidden-sm hidden-xs" id="nav-state-toggle" href="#" title="Turn on/off sidebar collapsing" data-placement="bottom">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                    <!-- shown on xs & sm screen. collapses and expands navigation -->
                    <a class="visible-sm visible-xs" id="nav-collapse-toggle" href="#" title="Show/hide sidebar" data-placement="bottom">
                        <span class="rounded rounded-lg bg-gray text-white visible-xs"><i class="fa fa-bars fa-lg"></i></span>
                        <i class="fa fa-bars fa-lg hidden-xs"></i>
                    </a>
                </li>
            </ul>
            <!-- <ul class="nav navbar-nav navbar-left visible-xs">
                <li> -->
                    <!-- toggles chat -->
                   <!--  <a href="#" data-toggle="chat-sidebar">
                        <span class="rounded rounded-lg bg-gray text-white"><i class="fa fa-globe fa-lg"></i></span>
                    </a>
                </li>
            </ul> -->

            <!-- <ul class="nav navbar-nav navbar-right visible-xs">
                <li> -->
                    <!-- toggles chat -->
                    <!-- <a href="#" data-toggle="chat-sidebar">
                        <span class="rounded rounded-lg bg-gray text-white"><i class="fa fa-globe fa-lg"></i></span>
                    </a>
                </li>
            </ul> -->
            <!-- xs & sm screen logo -->
            <a class="navbar-brand visible-xs" href="index-2.html">
                <img src="dist/img/logo2.fw.png" >
            </a>
        </div>

        <!-- this part is hidden for xs screens -->
        <div class="collapse navbar-collapse">
            <div class="col-sm-6">
                <img src="dist/img/logo.fw.png" class="dcimg">
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-xs-4 col-sm-4">
                      <label for="username" class="text-White dc_label">Correo Electrónico</label>
                        <input type="text" id="username" name="username" placeholder="" class="form-control input-sm" required="required" value="Proceso de Prueba">
                        <span class="help-block checkbox">
                            <input id="checkbox1" type="checkbox">
                            <label for="checkbox1">
                                No cerrar sesión
                            </label>
                        </span>
                    </div>
                    <div class="col-xs-4 col-sm-4">
                      <label for="Contraseña" class="text-White dc_label">Contraseña</label>
                        <input type="password" id="username" name="username" placeholder="" class="form-control input-sm" required="required" value="Proceso de Prueba">
                        <span class="help-block">
                            <a href="">¿Has olvidado tu contraseña?</a>
                        </span>
                    </div>
                    <div class="col-xs-4 col-sm-4">
                        <p class="navbar-btn">
                            <button class="navbar-btn btn btn-primary width-100 mb-xs btn-sm" role="button">
                                <span class="circle dc_backgr"><i class="fa fa-map-marker text-white"></i></span>
                                ENTRAR
                            </button>
                        </p>
                    </div>
                </div>
            </div>
            <!-- search form! link it to your search server -->
        </div>
    </div>
</nav>



<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <div class="row">
            <div class="col-sm-7">
                <h2 class="text-align-center text-danger wow bounceInUp" data-wow-delay="0.7s">
                    LLEGASTE A TIEMPO...!
                    <h4 class="text-align-center">La red de negocios de mayor tendencia en el mundo...</h4>
                </h2>
            </div>
            <div class="col-sm-5">
                    <div class="text-align-center">
                        <h2 class="wow bounceInUp" data-wow-delay="0.3s">Ingresa, es gratis... </h2>
                        <button class="btn btn-inverse -width-100 mb-xs wow bounceInUp" role="button" data-toggle="modal" data-target="#modal-personal" data-wow-delay="0.5s">
                            <i class="glyphicon glyphicon-user text-success"></i>
                            PERSONAL
                        </button>
                        <button class="btn btn-danger -width-100 mb-xs wow bounceInUp" role="button" data-toggle="modal" data-target="#modal-empresarial" data-wow-delay="0.5s">
                            <i class="fa fa-codepen text-primary"></i>
                            EMPRESAS
                        </button>
                    </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <img src="dist/img/banner1.png" class="center" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-mx-12">
                <h4 class="text-align-center">
                    <p>Ingresa, fácil, rápido y gratis tu negocio, publica</p> <p>tus <span class="text-danger">productos</span> en www.nextbook.ec </p>
                </h4>
                <h4 class="text-align-center">
                    <p><span class="text-danger">Muéstrate</span> al mundo y <span class="text-danger">más clientes</span> podrán <span class="text-danger">encontrarte</span> </p>
                    <p>Y seguro <span class="text-danger">incrementaras</span> y realizaras muchas ventas más.</p>
                </h4>
                <h3 class="text-align-center">
                    <p>Sistema integrado de herramientas para tu negocio “TODO EN UNO”</p>
                </h3>
            </div>
        </div>
        <footer>
            <div class="row">
            <div class="text-align-center">
                <p><a href="">Vende aqui</a>||
                <a href="">Contacto</a>||
                <a href="">Ayuda</a>||
                <a href="">Preguntas frecuentes</a>||
                <a href="">Términos y Condiciones</a>
              <p>una iniciativa de <a href="" class="text-danger">nextbook.com</a></p>
          </div>
        </div>
        </footer>
    </main>
</div>

<!-- modales -->
    <!-- empresarial corporativo personal -->
    <div class="modal fade" id="modal-empresarial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dc1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title text-align-center text-white">
                      FORMA PARTE DE NEGbook AHORA...
                    </h3>
                    <p class="text-align-center fs-mini text-white mt-sm">
                        La red de negocios de mayor tendencia en el mundo...
                    </p>
                </div>
                <div class="modal-body bg-gray-lighter no-padding">
                    <div class="row">
                      <div class="col-md-8 col-md-offset-2">
                        <div class="form-group">
                          <label>¿Ingrese el RUC?</label>
                          <div class="input-group input-group-sm">
                              <input type="search" class="form-control" id="txt_ruc">
                              <span class="input-group-btn">
                                  <button type="button" class="btn btn-success">CONSULTAR</button>
                              </span>
                          </div>
                          <span class="help-block text-align-center text-danger">
                            PERSONERÌA: JURÍDICA/NATURAL
                          </span>

                      </div>
                      </div>
                    </div>
                </div>
                <div class="modal-body bg-white">
                    <form class="form-horizontal form-label-rigth" role="form">
                        <fieldset>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="col-sm-4 control-label" for="default-select">Razón Social</label>
                                            <div class="col-sm-8">
                                                <input id="" type="text" class="form-control input-no-border input-sm" readonly value="Proceso de Prueba" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group no-padding">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="col-sm-4 control-label" for="default-select">Representante Legal</label>
                                            <div class="col-sm-8">
                                                <input id="" type="text" class="form-control input-no-border input-sm" readonly value="Proceso de Prueba" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group no-padding">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="col-sm-4 control-label" for="default-select">Dirección</label>
                                            <div class="col-sm-8">
                                                <input id="" type="text" class="form-control input-no-border input-sm" readonly value="Proceso de Prueba" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </fieldset>
                        <fieldset>
                            <div class="col-md-4">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teléfono Fijo 1</label>
                                        <input type="email" class="form-control col-sm-8 input-sm" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teléfono Fijo 2</label>
                                        <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teléfono Fijo Móvil</label>
                                        <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="col-sm-4 control-label" for="default-select">Pagina Web</label>
                                    <div class="col-sm-8">
                                        <input id="" type="text" class="form-control input-sm" value="Proceso de Prueba" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="col-sm-4 control-label" for="default-select">Correo</label>
                                    <div class="col-sm-8">
                                        <input id="" type="text" class="form-control input-sm" value="Proceso de Prueba" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-12 text-align-center">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right"></span> CONTINUAR</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- personal red social -->
    <div class="modal fade" id="modal-personal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dc1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title text-align-center text-white">
                      FORMA PARTE DE NEGbook AHORA...
                    </h3>
                    <p class="text-align-center fs-mini text-white mt-sm">
                        La red de negocios de mayor tendencia en el mundo...
                    </p>
                </div>
                <div class="modal-body bg-white">
                    <div class="jumbotron handle bg-gray text-white mb-0">
                        <div class="container">
                            <h1>Registrarme por!</h1>
                            <p class="lead">
                                Ingresa,facil rapido y <em>GRATIS</em>...
                            </p>
                            <p class="text-align-center">
                                <button type="button" class="btn btn-primary btn-block">
                                    <i class="fa fa-facebook"></i> Login Facebook
                                </button>
                            </p>
                            <p class="text-align-center">
                                <button type="button" class="btn btn-danger btn-block">
                                    <i class="fa fa-google"></i> Login Google
                                </button>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="dist/vendor/jquery/dist/jquery.min.js"></script>
<script src="dist/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="dist/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="dist/vendor/widgster/widgster.js"></script>
<script src="dist/vendor/pace.js/pace.min.js"></script>
<script src="dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- common app js -->
<script src="dist/js/settings.js"></script>
<script src="dist/js/app.js"></script>

<!-- page specific libs -->
<script src="dist/vendor/underscore/underscore.js"></script>
<script src="dist/vendor/jquery.sparkline/index.js"></script>
<script src="dist/vendor/d3/d3.min.js"></script>
<script src="dist/vendor/rickshaw/rickshaw.min.js"></script>
<script src="dist/vendor/raphael/raphael-min.js"></script>
<script src="dist/vendor/jQuery-Mapael/js/jquery.mapael.js"></script>
<script src="dist/vendor/jQuery-Mapael/js/maps/usa_states.js"></script>
<script src="dist/vendor/jQuery-Mapael/js/maps/world_countries.js"></script>
<script src="dist/vendor/flot/jquery.flot.js"></script>
<script src="dist/vendor/MetroJS/release/MetroJs.Full/MetroJs.js"></script>
<script src="dist/vendor/skycons/skycons.js"></script>
<script src="dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>

<!-- page specific js -->

</body>

<!-- Mirrored from demo.flatlogic.com/sing-wrapbootstrap/ajax/widgets.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2015 15:13:25 GMT -->
</html>

<script type="text/javascript">
// iniciando reloj
    Comenzar();
    function Comenzar()
    {
    var reloj=new Date();
    var horas=reloj.getHours();
    var minutos=reloj.getMinutes();
    var segundos=reloj.getSeconds();
    // Agrega un cero si .. minutos o segundos <10
    minutos=revisarTiempo(minutos);
    segundos=revisarTiempo(segundos);
    document.getElementById('obj_reloj').innerHTML=horas+":"+minutos;
    tiempo=setTimeout(function(){Comenzar()},500);
    /*en tiempo creamos una funcion generica que cada 
    500 milisegundos ejecuta la funcion Comenzar()*/
    }

    function revisarTiempo(i)
    {
    if (i<10)
      {
      i="0" + i;
      }
    return i;
    /*Esta funcion le agrega un 0 
    a una variable i que sea menor a 10*/
    }


    var fecha=new Date();
    var dias = new Array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado')
    var meses= new Array('Enero','Febrero','Marzo','Abril','Mayo','junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre')
    $('#obj_dia').html(dias[fecha.getDay()]);
    var acu=(fecha.getMonth()+1)+' de '+(meses[fecha.getMonth()]);
    console.log(acu);
    $('#obj_fecha').html(acu);
</script>