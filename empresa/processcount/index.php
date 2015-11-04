<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Nextbook</title>
    <link href="../assets/dist/css/application.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dist/css/animated.css">
    <link href="../data/registro/css/login.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/dist/img/logo.png"/>
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
<body class="login-page">

	<div class="container">
	    <main id="content" class="widget-login-container" role="main">
	        <div class="row hide" id="obj_ok">
	            <div class="col-lg-4 col-sm-6 col-xs-10 col-lg-offset-4 col-sm-offset-3 col-xs-offset-1">
	                <h4 class="widget-login-logo animated fadeInUp">
	                    <img src="../assets/dist/img/logo.png">
	                </h4>
	                <section class="widget widget-login animated fadeInUp text-align-center">
	                    <header>
	                        <h4>Activación de cuenta exitosa</h4>
	                    </header>
	                    <div class="widget-body">
	                        <p class="widget-login-info">
	                            Se a creado una cuenta de correo exitosa <span class="text-success glyphicon glyphicon-ok"></span>
	                        </p>
	                        <form class="login-form mt-lg">
	                            <div class="form-group">
	                                <input class="form-control" type="text" value="@facturanext.ec" id="txt_correo">
	                            </div>
	                            <div class="form-group">
	                                <input class="form-control" type="text" value="" id="txt_pass">
	                            </div>                            
	                        </form>
	                        <p class="widget-login-info">
	                        	<p id="obj_empresa"></p>
	                            <p>La información del usuario y contraseña fueron enviados a su correo electrónico</p>
	                        </p>
	                        
	                    </div>
	                </section>
	            </div>
	        </div>
	        <div class="row hide" id="obj_existente">
	        	<div class="col-lg-4 col-sm-6 col-xs-10 col-lg-offset-4 col-sm-offset-3 col-xs-offset-1">
	                <h4 class="widget-login-logo animated fadeInUp">
	                    <img src="../assets/dist/img/proces_count.png">
	                </h4>
	                <section class="widget widget-login animated fadeInUp text-align-center">
	                    <header>
	                        <h3>YA ESTA ACTIVA LA CUENTA</h3>
	                    </header>
	                    <div class="widget-body">
	                        <p class="widget-login-info">
	                            Estimado cliente usted ya es parte de nextbook.ec y su cuenta está en estado activo <span class="text-success glyphicon glyphicon-ok"></span>
	                        </p>	                        
	                        <p class="widget-login-info">
	                            <p>La información del usuario y contraseña fueron enviados a su correo electrónico</p>
	                        </p>
	                        
	                    </div>
	                </section>
	            </div>
	        </div>
	        <div class="row hide" id="obj_existente">
	        	<div class="col-lg-4 col-sm-6 col-xs-10 col-lg-offset-4 col-sm-offset-3 col-xs-offset-1">
	                <h4 class="widget-login-logo animated fadeInUp">
	                    <img src="../assets/dist/img/proces_count.png">
	                </h4>
	                <section class="widget widget-login animated fadeInUp text-align-center">
	                    <header>
	                        <h3>Lo sentimos.!!!</h3>
	                    </header>
	                    <div class="widget-body">
	                        <h3>
	                        	<p class="widget-login-info">
	                            	Intente más tarde proceso de actualización<span class="text-success glyphicon glyphicon-ok"></span>I
	                        	</p>	                        
	                        </h3>
	                        <p class="widget-login-info">
	                        </p>
	                        
	                    </div>
	                </section>
	            </div>
	        </div>
	    </main>
	    <footer class="page-footer">
	        nextbook.ec 2015 &copy; por CONCEPTUAL BUSINESS GROUP.
	    </footer>
	</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="../assets/dist/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/dist/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="../assets/dist/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../assets/dist/vendor/widgster/widgster.js"></script>
<script src="../assets/dist/js/jquery.blockUI.js"></script>
<script src="app.js"></script>
<!-- common app js -->

<!-- page specific libs -->
<!-- page specific js -->
</body>

<!-- Mirrored from demo.flatlogic.com/sing-wrapbootstrap/ajax/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2015 15:16:45 GMT -->
</html>
</html>
