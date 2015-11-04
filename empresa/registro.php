<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Nextbook</title>
    <link href="assets/dist/css/application.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/animated.css">
    <link href="data/registro/css/login.css" rel="stylesheet">
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
<body>

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
                <img src="assets/dist/img/logobanner.png" class="dcimg">
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

<main id="content" class="content" role="main">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h4 class="text-align-center">
                <span class="text-danger">Ingresa</span> fácil, rápido, efectivo y <span class="text-danger">gratis</span>, 
                publica tú negocio y tus productos
                
            </h4>
            <img src="assets/dist/img/mobilimg.png" width="100%">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h2>Registrarte</h2>
            <h4></h4>
            <form role="form" id="form-sri-consulta" class="">
                <fieldset>
                    <legend class="text-align-right">
                        Ingresa, es gratis
                    </legend>
                    <div class="form-group">                        
                        <div class="input-group">
                            <input type="search" class="form-control" id="txt_ruc" name="txt_ruc" placeholder="Ingrese ruc a buscar">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span id="obj_cargando" class="hide">
                                        <span class="loader animated fadeIn handle ui-sortable-handle">
                                        <span class="spinner">
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </span>
                                        </span>
                                    </span>
                                    Consultar
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="alert alert-danger alert-sm" id="alert_no_disponible_ruc">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span class="fw-semi-bold">Estimado/a:</span> Usted no dispone de RUC!!! O su número es incorrecto, favor verificar
                    </div>
                    <div class="alert alert-danger alert-sm" id="alert_no_disponibleruc2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span class="fw-semi-bold">Estimado/a:</span> Por favor, Ingrese numero de ruc.
                    </div>
                    <div class="alert alert-danger alert-sm" id="alert_existe_ruc">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span class="fw-semi-bold">Estimado/a:</span> Usted ya se encuentra registrado por favor inicie sesión
                        <a class="btn btn-primary btn-xs pull-right mr" href="#">¿Has olvidado tu contraseña?</a>
                    </div>
                </fieldset>
            </form>
            <div class="jumbotron handle bg-gray text-white text-aling-center mb-0 animated zoomInUp hide" id="obj_ok">
                <div class="container text-align-center">
                    <h1>En hora buena!</h1>
                    <p class="lead">
                        se a creado con exito, verifique su correo electrónico para activar su cuenta.
                    </p>
                    <p class="text-align-center">
                        <a href="registro_empresa" class="btn btn-danger btn-lg">
                            Registrar nueva Empresa! &nbsp;
                            <i class="fa fa-check"></i>
                        </a>
                    </p>
                </div>
            </div>

            <form role="form" id="form_empresas" class="">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_tipo" name="txt_tipo" placeholder="Tipo Contribuyente" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_fecha_inicio_actividad" name="txt_fecha_inicio_actividad" placeholder="Fecha de inicio actividad" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_representante_legal" name="txt_representante_legal" placeholder="Representante Legal" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_representante_cedula" name="txt_representante_cedula" placeholder="Cédula de Identid.." readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="txt_razon_social" name="txt_razon_social" placeholder="Razón Social" readonly>
                    </div> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="txt_nombre_comercial" name="txt_nombre_comercial" placeholder="Nombre Comercial" readonly>
                    </div>                    
                </fieldset>
                <fieldset>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="search-input">Teléfono Fijo 1</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input class="form-control"type="text" id="txt_telefono_1" name="txt_telefono_1" placeholder="Teléfono 1">
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="search-input">Teléfono Móvil</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input class="form-control"type="text" id="txt_celular" name="txt_celular" placeholder="Teléfono 1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">                        
                        <div class="input-group col-sm-12 col-md-12 col-lg-12">
                            <input type="text" class="form-control" id="txt_correo" name="txt_correo" placeholder="Correo Electrónico">
                        </div>
                    </div>
                </fieldset>
                <fieldset>                            
                    <div class="row">
                        <div class="col-sm-12">
                            <fieldset>
                                Al hacer clic en Terminado, aceptas las <a href="www.nextbook.ec/terminos.html" target="_blank">Condiciones</a> y confirmas que has leído nuestra Política de datos, incluido el Uso de cookies.
                            </fieldset>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success btn-block">Terminado</button>
                        </div>
                    </div>           
                </fieldset>
                
            </form>
            
        </div>
    </div>   
</main>
<div class="footer">
    <p><a href="">Vende aqui</a>||
    <a href="">Contacto</a>||
    <a href="">Ayuda</a>||
    <a href="">Preguntas frecuentes</a>||
    <a href="http://www.nextbook.ec/terminos.html" target="_blank">Términos y Condiciones</a>
    una iniciativa de <a href="" class="text-danger">conceptual business group</a></p>
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

<!-- common app js -->
<script src="assets/dist/js/settings.js"></script>

<!-- page specific libs -->
<script src="assets/dist/vendor/underscore/underscore.js"></script>
<script src="assets/dist/vendor/jquery.sparkline/index.js"></script>
<script src="assets/dist/vendor/jquery-autosize/jquery.autosize.min.js"></script>
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
<script src="assets/dist/js/jquery.blockUI.js"></script>

<script src="assets/dist/js/wow.js"></script>

<!-- page specific js -->
<!-- <script src="assets/index/index.js"></script> -->


<!-- page config app js -->
<script src="data/registro/js/app.js"></script>

</body>
</html>
