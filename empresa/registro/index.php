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
    <link href="../assets/dist/css/application.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dist/css/animated.css">
    <link href="dist/css/login.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/dist/img/favicons.png"/>
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
                <img src="../dist/img/logo.fw.png" class="dcimg">
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
                publica tú negocio, tus productos en <span class="text-danger">nextbook.ec</span><br>
                <span class="text-danger">muéstrate</span> al mundo, podrán encontrarte <span class="text-danger">más clientes</span> y seguro incrementarás <span class="text-danger">tús ventas</span>.
            </h4>
            <img src="dist/img/mobilimg.png" width="100%">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h2>Registrarte</h2>
            <h4></h4>
            <form role="form">
                <fieldset>
                    <legend class="text-align-right">
                        Ingresa, es gratis
                    </legend>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="search" class="form-control" id="txt_ruc" name="txt_ruc" placeholder="Ingrese ruc a buscar">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default">Consultar</button>
                            </span>
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
                                <input type="text" class="form-control" id="txt_representante_cedula" name="txt_representante_legal" placeholder="Cédula de Identid.." readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="txt_tipo" name="txt_tipo" placeholder="Tipo Contribuyente" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="" placeholder="Razón Social" readonly>
                    </div> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="" placeholder="Nombre Comercial" readonly>
                    </div>                    
                </fieldset>
                <fieldset>
                    <div class="row">
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
                                <div class="form-group">
                                <label for="search-input">Teléfono Fijo 2</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input class="form-control"type="text" id="txt_telefono_2" name="txt_telefono_2" placeholder="Teléfono 1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_correo" name="txt_correo" placeholder="Correo electrónico">
                            </div>
                        </div>
                    </div>
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
    <a href="">Términos y Condiciones</a>
    una iniciativa de <a href="" class="text-danger">conceptual business group</a></p>
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

<!-- common app js -->
<script src="../assets/dist/js/settings.js"></script>


<!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
<script src="https://apis.google.com/js/api:client.js"></script>
<script src="../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
<script src="../assets/dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<script src="../assets/dist/js/wow.js"></script>

<!-- page config app js -->
<script src="app.js"></script>

</body>
</html>
