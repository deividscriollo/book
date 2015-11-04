<?php
// setcookie('id','nombre_mijinesees', time() +60*60*24, "/",'nextbook.ec'); // 86400 = 1 day
// print $_COOKIE['id']; 

// unset($_COOKIE['id']); // destruir session
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Nextbook</title>
    <link href="assets/dist/css/application.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/animated.css">
    <link href="assets/dist/css/login.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/dist/img/favicons.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Red de Negocios, Herramientas de Negocios, facturación electrónica, facturanext es un servicio gratuito que te permite concentrar todas las facturas electrónicas que recibes en un solo lugar
    " />
    <meta name="msvalidate.01" content="64BBD913ED7E771F678671292BB6E9C7" />
    <meta name="keywords" content="Negocios, Facturación, todo en uno, nextbook, Nextbook.com, Nextbook.com.ec, Nextbook.ec, 
    facturación electrónica, herramienta de negocios, organizar facturas nube gestionar compras, correo facturación, beneficios nextbook" />
    <meta name="author" content="Una iniciativa de concepto intelectual /business group, nextbook.ec">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     
</head>
<body class="pace-done nav-collapsed">

<nav id="sidebar" class="sidebar" role="navigation">
    <!-- need this .js class to initiate slimscroll -->
    <div class="js-sidebar-content">
        <header class="logo hidden-xs">
            <!-- whether to automatically collapse sidebar on mouseleave. If activated acts more like usual admin templates -->
            <a class="hidden-sm hidden-xs" id="nav-state-toggle" href="#" title="Activar / Desactivar la barra lateral" data-placement="bottom">
                <i class="fa fa-bars fa-lg"></i>
            </a>            
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
        <h5 class="sidebar-nav-title">Menu<a class="action-link" href="#"><i class="glyphicon glyphicon-th"></i></a></h5>
        <ul class="sidebar-nav">
            <li class="active">
                <!-- an example of nested submenu. basic bootstrap collapse component -->
                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-desktop"></i>
                    </span>
                    Corporativo
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="sidebar-dashboard" class="collapse in">
                    <li class="active"><a href="quienes_somos.php">Quienes Somos</a></li>
                    <li><a href="compromiso.php">Nuestro Compromiso</a></li>
                    <li><a href="contactenos.php">Conócenos</a></li>
                    <li><a href="beneficios.php">Beneficios</a></li>
                </ul>
            </li>
            <li>
                <a class="collapsed" href="#clasificados" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-cubes"></i>
                    </span>
                    Categorías
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="clasificados" class="collapse">
                    <li><a href="comercial.php">Comercial</a></li>
                    <li><a href="industrial.php">Industrial</a></li>
                    <li><a href="turistica.php">Turística</a></li>
                    <li><a href="profesional.php">Profesional</a></li>
                    <li><a href="artesanal.php">Artesanal</a></li>
                    <li><a href="financiera.php">Financiera</a></li>
                    <li><a href="publica.php">Institución Publica</a></li>
                    <li><a href="privada.php">Institución Privada</a></li>
                </ul>
            </li>
            <li>
                <a class="collapsed" href="#noticias" data-toggle="collapse" data-parent="#sidebar">
                    <span class="icon">
                        <i class="fa fa-cubes"></i>
                    </span>
                    Productos
                    <i class="toggle fa fa-angle-down"></i>
                </a>
                <ul id="noticias" class="collapse">
                    <li><a href="guia.php">Guía </a></li>
                    <li><a href="facturanext.php">Facturanext </a></li>
                    <li><a href="ofertas.php">Ofertas </a></li>
                    <li><a href="empleo.php">Empleo </a></li>
                    <li><a href="tienda.php">Tienda </a></li>
                </ul>
            </li>
            <li>
                <a href="ayuda.php">
                    <span class="icon">
                        <i class="glyphicon glyphicon-info-sign"></i>
                    </span>
                    Ayuda
                </a>
            </li>
            <li>
                <a href="contactos.php">
                    <span class="icon">
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                    Contactos
                </a>
            </li>
            <li>
                <a href="buscador.php">
                    <span class="icon">
                        <i class="glyphicon glyphicon-search"></i>
                    </span>
                    Buscador
                </a>
            </li>
        </ul>
        <h5 class="sidebar-nav-title">Trabaje con nosotros<a class="action-link" href="#"><i class="glyphicon glyphicon-th"></i></a></h5>
        
        <h5 class="sidebar-nav-title">Hora<a class="action-link" href="#"><i class="glyphicon glyphicon-time"></i></a></h5>


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
<div class="chat-sidebar" id="chat">
    <div class="chat-sidebar-content">
        <header class="chat-sidebar-header">
            <h4 class="chat-sidebar-title">Contacts</h4>
            <div class="form-group no-margin">
                <div class="input-group input-group-dark">
                    <input class="form-control fs-mini" id="chat-sidebar-search" type="text" placeholder="Search...">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </header>
        <div class="chat-sidebar-contacts chat-sidebar-panel open">
            <h5 class="sidebar-nav-title">Today</h5>
            <div class="list-group chat-sidebar-user-group">
                <a class="list-group-item" href="#chat-sidebar-user-1">
                    <i class="fa fa-circle text-success pull-right"></i>
                    <span class="thumb-sm pull-left mr">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <h5 class="message-sender">Chris Gray</h5>
                    <p class="message-preview">Hey! What's up? So many times since we</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-2">
                    <i class="fa fa-circle text-gray-light pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="img/avatar.png" alt="...">
                </span>
                    <h5 class="message-sender">Jamey Brownlow</h5>
                    <p class="message-preview">Good news coming tonight. Seems they agreed to proceed</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-3">
                    <i class="fa fa-circle text-danger pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="demo/img/people/a1.jpg" alt="...">
                </span>
                    <h5 class="message-sender">Livia Walsh</h5>
                    <p class="message-preview">Check out my latest email plz!</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-4">
                    <i class="fa fa-circle text-gray-light pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="img/avatar.png" alt="...">
                </span>
                    <h5 class="message-sender">Jaron Fitzroy</h5>
                    <p class="message-preview">What about summer break?</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-5">
                    <i class="fa fa-circle text-success pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="demo/img/people/a4.jpg" alt="...">
                </span>
                    <h5 class="message-sender">Mike Lewis</h5>
                    <p class="message-preview">Just ain't sure about the weekend now. 90% I'll make it.</p>
                </a>
            </div>
            <h5 class="sidebar-nav-title">Last Week</h5>
            <div class="list-group chat-sidebar-user-group">
                <a class="list-group-item" href="#chat-sidebar-user-6">
                    <i class="fa fa-circle text-gray-light pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="demo/img/people/a6.jpg" alt="...">
                </span>
                    <h5 class="message-sender">Freda Edison</h5>
                    <p class="message-preview">Hey what's up? Me and Monica going for a lunch somewhere. Wanna join?</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-7">
                    <i class="fa fa-circle text-success pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="demo/img/people/a5.jpg" alt="...">
                </span>
                    <h5 class="message-sender">Livia Walsh</h5>
                    <p class="message-preview">Check out my latest email plz!</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-8">
                    <i class="fa fa-circle text-warning pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="demo/img/people/a3.jpg" alt="...">
                </span>
                    <h5 class="message-sender">Jaron Fitzroy</h5>
                    <p class="message-preview">What about summer break?</p>
                </a>
                <a class="list-group-item" href="#chat-sidebar-user-9">
                    <i class="fa fa-circle text-gray-light pull-right"></i>
                <span class="thumb-sm pull-left mr">
                    <img class="img-circle" src="img/avatar.png" alt="...">
                </span>
                    <h5 class="message-sender">Mike Lewis</h5>
                    <p class="message-preview">Just ain't sure about the weekend now. 90% I'll make it.</p>
                </a>
            </div>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-1">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Chris Gray
                </a>
            </h5>
            <ul class="message-list">
                <li class="message">
                    <span class="thumb-sm">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <div class="message-body">
                        Hey! What's up?
                    </div>
                </li>
                <li class="message">
                    <span class="thumb-sm">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <div class="message-body">
                        Are you there?
                    </div>
                </li>
                <li class="message">
                    <span class="thumb-sm">
                        <img class="img-circle" src="demo/img/people/a2.jpg" alt="...">
                    </span>
                    <div class="message-body">
                        Let me know when you come back.
                    </div>
                </li>
                <li class="message from-me">
                    <span class="thumb-sm">
                        <img class="img-circle" src="img/avatar.png" alt="...">
                    </span>
                    <div class="message-body">
                        I am here!
                    </div>
                </li>
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-2">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Jamey Brownlow
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-3">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Livia Walsh
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-4">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Jaron Fitzroy
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-5">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Mike Lewis
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-6">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Freda Edison
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-7">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Livia Walsh
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-8">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Jaron Fitzroy
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <div class="chat-sidebar-chat chat-sidebar-panel" id="chat-sidebar-user-9">
            <h5 class="title">
                <a class="js-back" href="#">
                    <i class="fa fa-angle-left mr-xs"></i>
                    Mike Lewis
                </a>
            </h5>
            <ul class="message-list">
            </ul>
        </div>
        <footer class="chat-sidebar-footer form-group">
            <input class="form-control input-dark fs-mini" id="chat-sidebar-input" type="text"  placeholder="Type your message">
        </footer>
    </div>
</div>



<!-- This is the white navigation bar seen on the top. A bit enhanced BS navbar. See .page-controls in _base.scss. -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- .navbar-header contains links seen on xs & sm screens -->
        <div class="navbar-header visible-xs">
            <ul class="nav navbar-nav">
                <li>
                    <a class="visible-sm visible-xs" id="nav-collapse-toggle" href="#" title="Ver/Ocultar Menú" data-placement="bottom">
                        <span class="rounded rounded-lg bg-gray text-white visible-xs"><i class="fa fa-bars fa-lg"></i></span>
                        <i class="fa fa-bars fa-lg hidden-xs"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right visible-xs">
                <li>
                    <!-- toggles chat -->
                    <a href="#" data-toggle="chat-sidebar">
                        <span class="rounded rounded-lg bg-gray text-white"><i class="fa fa-globe fa-lg"></i></span>
                    </a>
                </li>
            </ul>
            <a class="navbar-brand visible-xs" href="">
                <div>next<span class="text-white">book.ec</span></div>
                <span class="obj_sublinea text-white">RED DE NEGOCIOS</span>
            </a>
        </div>
        <!-- this part is hidden for xs screens -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right visible-xs">
                <li>
                    <!-- toggles chat -->
                    <a href="#" data-toggle="chat-sidebar">
                        <!-- <span class="rounded rounded-lg bg-gray text-white"><i class="fa fa-globe fa-lg">,mia]sd</i></span> -->
                    </a>
                </li>
            </ul>
            <div class="navbar-left">
                <img src="assets/dist/img/post_empresa.png" class="dcimg">
            </div>
            <div class="navbar-right hidden-sm hidden-md">
                <div class="obj_right_amd">
                    <div class="form-group buttondc">
                        <button class="navbar-btn btn btn-inverse width-100 mb-xs btn-sm" role="button">
                            <span class="circle dc_backgr"><i class="fa fa-map-marker text-white"></i></span>
                            ENTRAR
                        </button>
                    </div>
                </div>                
                <div class="obj_right">
                    <div class="form-group">
                        <label for="Contraseña" class="text-White dc_label">Contraseña</label>
                        <input class="form-control input-sm txt_accesos"id="txt_password_dc" type="text" placeholder="Password">   
                        <a href="" class=" text-white">¿Has olvidado tu contraseña?</a>                     
                    </div>
                </div>
                <div class="obj_right">
                    <div class="form-group">
                        <label for="username" class="text-White dc_label">Correo Electrónico</label>
                        <input class="form-control input-sm txt_accesos"id="txt_user_dc" type="text" placeholder="Correo electrónico">
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
                <h3 class="text-align-left text-danger wow bounceInUp aniamted" data-wow-delay="0.7s">
                    LLEGASTE A TIEMPO...!
                    <h4 class="text-align-left">La red de negocios de mayor tendencia en el mundo...</h4>
                </h3>
            </div>
            <div class="col-sm-5">
                <div class="text-align-right">
                    <h3 class="wow bounceInUp" data-wow-delay="0.3s">Ingresa, es gratis... </h3>
                    <button class="btn btn-inverse -width-100 mb-xs wow bounceInUp" role="button" data-toggle="modal" data-target="#modal-personal" data-wow-delay="0.5s">
                        <i class="glyphicon glyphicon-user text-success"></i>
                        PERSONAL
                    </button>
                    <a href="http://www.empresa.nextbook.ec/registro_empresa/" class="btn btn-primary -width-100 mb-xs wow bounceInUp" data-wow-delay="0.5s">
                        <i class="fa fa-codepen text-primary"></i>
                        EMPRESAS
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="row"> -->
            <div class="row gallery">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                    <div class="thumbnail">
                        <img src="assets/dist/img/logo_empresa.png" alt="logotipo">
                        <div class="caption">
                            <h5 class="mt-0 mb-xs"></h5>
                            <ul class="post-links">
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="thumbnail">
                        <img src="assets/dist/img/banner1.png" alt="banner">
                        <div class="caption">
                            <h5 class="mt-0 mb-xs"></h5>
                            <ul class="post-links">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>          
        <!-- </div> -->
        <br>
        <div class="row">
            <div class="col-md-8 col-mx-8 text-align-center">
                <br>
                <h3>
                <span class="text-danger">Ingresa</span> fácil, rápido, efectivo y <span class="text-danger">gratis</span>, 
                publica tú negocio, tus productos en <span class="text-danger">nextbook.ec</span><br>
                <span class="text-danger">muéstrate</span> al mundo, podrán encontrarte <span class="text-danger">más clientes</span> y seguro incrementarás <span class="text-danger">tús ventas</span>.
                </h3>
                <br>
                <h3>En <span class="text-danger">nextbook.ec</span> queremos que <span class="text-danger">crezcas</span> como empresario, es por ello que te <span class="text-danger">ofrecemos </span>
                <br>las herramientas ideales para que tus <span class="text-danger">productos</span>, servicios se conozcan y se vendan<br>
                en todo el mundo, las <span class="text-danger">24</span> horas de los <span class="text-danger">365</span> días del año.
                </h3>
                <h3>
                    Sistema integrado de herramientas para tu negocio ”TODO EN UNO”
                </h3>  
            </div> 
            <div class="col-md-4 col-mx-4">
                   <iframe width="100%" height="338" src="http://www.youtube.com/embed/KgMt0dtr4Vc" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group mb-lg" id="accordion2" data-toggle="collapse">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" class="dc_sinlink">
                                    <span class="text-danger">¿Cuánto cuesta y qué beneficios obtengo?</span>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h3>
                                    Contamos con paquetes que se adaptan a tus necesidades, los cuales van desde nuestro extraordinario servicio sin costo, hasta paquetes empresariales
                                    de $ 60 y $ 100 dólares por año, el cual te da acceso a más y al total a todas las herramientas y funciones del sistema, que son únicas de nuestra aplicación,
                                    si tu quieres compáranos.
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading collapsed">
                            <h5 class="panel-title">
                                
                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" class="dc_sinlink">
                                    <span class="text-danger">Funcionamiento</span>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <h3>

                                    <img src="assets/dist/img/logo2.png"> es un Centro de Comercio Electrónico donde se pueden encontrar tanto productos como servicios de una manera fácil, 
                                    rápida y efectiva gracias a los potentes motores de búsqueda con los que cuenta.</h3>
                                    <br>
                                    <h3>Las transacciones en nextbook.com se dan de una manera transparente y directa, ya que el comprador tendrá acceso a los datos del vendedor, 
                                    como lo son el nombre del contacto, dirección, teléfonos, correo electrónico, entre otras, todo esto sin comisiones ni intermediarios.</h3>
                                    <h3>La comunicación es fundamental en nuestra plataforma, es por ello que nuestros usuarios siempre están en continuo contacto gracias a 
                                    Bussines Communicator, la cual es una herramienta que permite mantener contacto comercial entre los miembros de RedComercial.com.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>             
        </div>
        <footer>
            <div class="row">
            <div class="text-align-center">
                <p><a href="">Vende aqui</a>||
                <a href="">Contacto</a>||
                <a href="">Ayuda</a>||
                <a href="">Preguntas frecuentes</a>||
                <a href="terminos.html" target="_blank">Términos y Condiciones</a>
                <p>una iniciativa de <a href="" class="text-danger">nextbook.com</a></p>
          </div>
        </div>
        </footer>
    </main>
</div>

<!-- modales -->
<!-- empresarial corporativo personal -->
<div class="modal fade" id="modal-empresarial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content bg-dc1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-align-center text-white">
                  FORMA PARTE DE nextbook AHORA...
                </h3>
                <p class="text-align-center fs-mini text-white mt-sm">
                    La red de negocios de mayor tendencia en el mundo...
                </p>
            </div>
            <div class="modal-body bg-gray-lighter">
                <div class="row">
                  <div class="col-md-12 padding" id="obj_buscar_ruc">
                    <form class="form-horizontal" id="form-sri-consulta">
                        <div class="form-group has-success has-feedback">
                            <label class="col-sm-3 control-label" for="formGroupInputSmall">¿Ingrese el RUC?</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txt_ruc" name="txt_ruc">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success">
                                            <span id="obj_cargando" class="hide">
                                                <span class="loader animated fadeIn handle ui-sortable-handle">
                                                <span class="spinner">
                                                    <i class="fa fa-spinner fa-spin"></i>
                                                </span>
                                                </span>
                                            </span>
                                            CONSULTAR
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>

                  </div>
                </div>
            </div>
            <div class="modal-body bg-white hide" id="obj_resultado_error">
                <div class="jumbotron handle bg-gray text-white mb-0">
                    <div class="container">
                        <h3>No dispone de RUC!!! o no se lo encuentra</h3>
                    </div>
                </div>
            </div>
            <div class="modal-body bg-white hide" id="obj_resultado_si_existe">
                <div class="jumbotron handle bg-gray text-white mb-0">
                    <div class="container text-align-center">
                        <h3>Usted ya se encuentra registrado por favor inicie sesión</h3>
                        <button class="btn btn-primary mb-xs" role="button">
                            ¿Has olvidado tu contraseña?
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body bg-white hide" id="obj_resultado_ok">
                <form class="form-horizontal" role="form" id="form_empresas">
                    <fieldset>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-sm-4 control-label" for="default-select">Tipo Contribuyente</label>
                                        <div class="col-sm-8">
                                            <input id="txt_tipo" name="txt_tipo" type="text" class="form-control input-no-border input-sm" readonly value="Razón Social"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-sm-4 control-label" for="default-select">Razón Social</label>
                                        <div class="col-sm-8">
                                            <input id="txt_razon_social" name="txt_razon_social" type="text" class="form-control input-no-border input-sm" readonly value="Razón Social"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group no-padding">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="col-sm-4 control-label" for="default-select">Nombre Comercial</label>
                                        <div class="col-sm-8">
                                            <input id="txt_nombre_comercial" name="txt_nombre_comercial" type="text" class="form-control input-no-border input-sm" readonly value="Nombre Comercial"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </fieldset>
                    <legend>
                        <span class="label label-warning  text-gray-dark mr-xs">
                            REQUERIDOS
                        </span>
                        Los campos marcados con (*) son obligatorios.
                    </legend>

                    <fieldset>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 text-align-left control-label" for="prepended-input">Teléfono Fijo 1</label>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input class="form-control"type="tel" id="txt_telefono_1" name="txt_telefono_1" placeholder="Teléfono 1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 text-align-left control-label" for="prepended-input">Teléfono Fijo 2</label>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input class="form-control" id="txt_telefono_2" name="txt_telefono_2" placeholder="Teléfono 2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 text-align-left control-label" for="prepended-input">Teléfono Móvil (*)</label>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input class="form-control" id="txt_celular" name="txt_celular" placeholder="Celular">
                                    </div>
                                </div>
                            </div>
                        </div>                           
                    </fieldset>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="col-sm-4 control-label" for="txt_pagina_web">Pagina Web</label>
                                <div class="col-sm-8">
                                    <input id="txt_pagina_web" name="txt_pagina_web" type="text" class="form-control input-sm" placeholder="Página web"  />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="col-sm-4 control-label" for="txt_correo">Correo (*)</label>
                                <div class="col-sm-8">
                                    <input id="txt_correo" name="txt_correo" type="text" class="form-control input-sm" placeholder="Cuenta de Correo"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-offset-4 col-sm-12 text-align-center">
                                <button type="submit" class="btn btn-success" id="btn_guardar_empresa"><span class="glyphicon glyphicon-chevron-right"></span> CONTINUAR</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-body bg-white hide" id="obj_resultado_envio_correo">
                <section class="widget" style="min-height: 200px">
                    <h1>Por favor, espere un momento</h1>
                    <div class="widget-body animated bounceIn">
                        <div class="loader animated fadeIn handle ui-sortable-handle">
                        <span class="spinner">
                            <i class="fa fa-spinner fa-spin"></i>
                        </span>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- personal red social -->
<div class="modal fade" id="modal-personal" tabindex="-1" role="dialog"aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content bg-dc1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-align-center text-white">
                  FORMA PARTE DE nextbook AHORA...
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
                            <button type="button" class="btn btn-primary btn-block" role="button" id="login_facebook">
                                <i class="fa fa-facebook"></i> Login Facebook
                            </button>                                
                        </p>
                        <p class="text-align-center">
                            <div class="btn btn-danger btn-block" role="button" id="login_google">
                                <i class="fa fa-google"></i> Login Google
                            </div>                                                              
                        </p>
                        <p class="text-align-center">
                            <button type="button" class="btn btn-info btn-block" role="button" id="btn-personal-registro">
                                <i class="glyphicon glyphicon-th-large"></i> Crear Cuenta
                            </button>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal registro externo -->
<div class="modal fade" id="modal-personal-registro" tabindex="-1" role="dialog"aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content bg-dc1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-align-center text-white">
                  FORMA PARTE DE nextbook AHORA...
                </h3>
                <p class="text-align-center fs-mini text-white mt-sm">
                    La red de negocios de mayor tendencia en el mundo...
                </p>
            </div>
            <div class="modal-body bg-white">

                <form class="form-horizontal" id="form-registro-personal">
                     <legend class="text-align-right">
                            Todos los campos son requeridos
                        </legend>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nombre:</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="clearfix">
                                <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Correo:</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="clearfix">
                                <input type="text" name="txt_correo_reg" id="txt_correo_reg" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Genero:</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="clearfix">
                                <select id="sel_genero" name="sel_genero" class="select2 form-control" data-placeholder="seleccione">
                                    <option value=""></option>
                                    <option value="male">MASCULINO</option>
                                    <option value="female">FEMENINO</option>                                       
                                </select>
                            </div>
                        </div>
                    </div>
                    <legend>
                        <span class="label label-warning  text-gray-dark mr-xs">
                            Seguridad
                        </span>                                    
                    </legend>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Password:</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="clearfix">
                                <input type="password" name="txt_pass" id="txt_pass" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Repita Password</label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="clearfix">
                                <input type="password" name="txt_pass1" id="txt_pass1" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"></label>
                        <div class="col-xs-12 col-sm-9">
                            <div class="clearfix">
                                <button type="button" class="btn btn-primary" id="btn_modal_atras">Atras</button>
                                <button type="reset" class="btn btn-gray" >Limpiar</button>
                                <button type="submit" class="btn btn-success" name="btn_guardar_personal_registro" id="btn_guardar_personal_registro">Guardar</button>                                    
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <section class="widget bg-gray-dark">
                <footer class="bg-gray-dark">
                    <span class="text-danger"><i class="fa fa-ok"></i> Cuenta gratuita</span></a>
                </footer>
            </section>
        </div>
    </div>
</div>

<!-- login facebook -->
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <section class="widget ">
            <div class="widget-controls">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="widget-body">
                <div class="post-user mt-n-xs">
                    <span class="thumb pull-left mr">
                        <img class="img-circle" id="facebook-session" src="" alt="...">
                    </span>
                    <h5 class="mb-xs mt-xs" id="obj_nombre"></h5>
                    <p class="fs-mini text-muted" id="obj_correo"></p>
                </div>
                <div class="widget-middle-overflow windget-padding-md clearfix bg-danger text-white text-align-center">
                    <h3 class="mt-lg mb-lg"><span id="obj_genero"></span> <span class="fw-semi-bold" id="obj_firs_name">USUARIO</span> ahora formas parte de <span class="fw-semi-bold">nextbook</span>, por favor espera unos segundos para acceder...</h3>
                        <a href="#" class="btn btn-inverse width-100 mb-xs wow bounce" id="href_entrar_facebook">
                            <span class="circle bg-white">
                                <i class="fa fa-map-marker text-gray"></i>
                            </span>
                            Entrar
                        </a>                        
                </div>
                <p class="text-light fs-mini mt-sm text-align-right">La red de negocios de mayor tendencia en el mundo... </p>
            </div>

            <footer class="bg-gray-dark">
                <span class="text-danger"><i class="fa fa-ok"></i> Cuenta gratuita</span></a>
            </footer>
        </section>
    </div>
</div>
<!-- login facebook -->
<div class="modal fade" id="modal-correo-respond" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <section class="widget ">
            <div class="widget-controls">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="widget-body">
                <div class="post-user mt-n-xs">
                    <span class="thumb pull-left mr">
                        <img class="img-circle" id="facebook-session" src="" alt="...">
                    </span>
                    <h5 class="mb-xs mt-xs" id="obj_nombre"></h5>
                    <p class="fs-mini text-muted" id="obj_correo"></p>
                </div>
                <div class="widget-middle-overflow windget-padding-md clearfix bg-danger text-white text-align-center">
                    <h3 class="mt-lg mb-lg"><span id="obj_genero"></span> <span class="fw-semi-bold" id="obj_firs_name">USUARIO</span> ahora formas parte de <span class="fw-semi-bold">nextbook</span>, por favor espera unos segundos para acceder...</h3>
                       
                        <a href="#" class="btn btn-inverse width-100 mb-xs wow bounce" id="href_entrar_google">
                            <span class="circle bg-white">
                                <i class="fa fa-map-marker text-gray"></i>
                            </span>
                            Entrar
                        </a>                        
                </div>
                <p class="text-light fs-mini mt-sm text-align-right">La red de negocios de mayor tendencia en el mundo... </p>
            </div>

            <footer class="bg-gray-dark">
                <span class="text-danger"><i class="fa fa-ok"></i> Cuenta gratuita</span></a>
            </footer>
        </section>
    </div>
</div>

<!-- modale error -->
<div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dc1">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title text-align-center text-white">
                    Lo sentimos, 
                    <div class="text-align-center fs-mini text-white mt-sm"> no podemos acceder en este momento</div>
                </h3>
            </div>
            <div class="modal-body bg-white">
                <div class="jumbotron handle bg-gray text-white mb-0">
                        <h4>Le sugerimos intentar más tarde</h4>
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
<script src="assets/dist/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/dist/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="assets/dist/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="assets/dist/vendor/widgster/widgster.js"></script>
<script src="assets/dist/vendor/pace.js/pace.min.js"></script>
<script src="assets/dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- common app js -->
<script src="assets/dist/js/settings.js"></script>
<script src="assets/dist/js/app.js"></script>

<!-- page specific libs -->
<script src="assets/dist/vendor/underscore/underscore.js"></script>
<script src="assets/dist/vendor/jquery.sparkline/index.js"></script>
<script src="assets/dist/vendor/d3/d3.min.js"></script>
<script src="assets/dist/vendor/jquery-autosize/jquery.autosize.min.js"></script>
<script src="assets/dist/vendor/rickshaw/rickshaw.min.js"></script>
<script src="assets/dist/vendor/raphael/raphael-min.js"></script>
<script src="assets/dist/vendor/jQuery-Mapael/js/jquery.mapael.js"></script>
<script src="assets/dist/vendor/jQuery-Mapael/js/maps/usa_states.js"></script>
<script src="assets/dist/vendor/jQuery-Mapael/js/maps/world_countries.js"></script>
<script src="assets/dist/vendor/flot/jquery.flot.js"></script>
<script src="assets/dist/vendor/MetroJS/release/MetroJs.Full/MetroJs.js"></script>
<script src="assets/dist/vendor/skycons/skycons.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>
<script src="assets/dist/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/dist/vendor/jasny-bootstrap/js/inputmask.js"></script>
<script src="assets/dist/js/jquery.validate.min.js"></script>
<script src="assets/dist/js/additional-methods.min.js"></script>

<!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
<script src="https://apis.google.com/js/api:client.js"></script>
<script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
<script src="assets/dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<script src="assets/dist/js/wow.js"></script>

<!-- page specific js -->
<script src="assets/index/index.js"></script>

</body>
</html>
