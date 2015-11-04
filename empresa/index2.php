<?php
if(!isset($_SESSION))
    {
        session_start();        
    }
if(!isset($_SESSION["pass"])) {
    header('Location: registro_empresa/');
}
    require_once('assets/admin/menu.php');
    $class_menu=new menu();
?>
<!DOCTYPE html>
<html lang="es">
    <title>NextBook</title>
<!-- Mirrored from demo.flatlogic.com/sing-wrapbootstrap/ajax/form_wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2015 15:14:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <link href="assets/dist/css/application.min.css" rel="stylesheet">    
    <link href="processcount/style.css" rel="stylesheet">    
    <link rel="icon" type="image/png" href="assets/dist/img/favicons.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <?php  $class_menu->navbar(); ?>
    <div class="content-wrap">
        <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
        <main id="content" class="content" role="main">
            <div class="row">
                <div class="pull-right">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 360px; height: 150px;">
                            <img data-src="holder.js/100%x100%" alt="" src="assets/dist/img/formato.fw.png">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 360px; max-height: 150px;"></div>
                        <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar Imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 360px; height: 150px;">
                            <img data-src="holder.js/100%x100%" alt="..." src="assets/dist/img/formato.fw.png">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 360px; max-height: 150px;"></div>
                        <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar Imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 360px; height: 150px;">
                            <img data-src="holder.js/100%x100%" alt="..." src="assets/dist/img/formato.fw.png">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 360px; max-height: 150px;"></div>
                        <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar Imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 360px; height: 150px;">
                            <img data-src="holder.js/100%x100%" alt="..." src="assets/dist/img/formato.fw.png">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 360px; max-height: 150px;"></div>
                        <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar Imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="btn-toolbar">
                    <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-envelope-o"></i> Contactanos</button>
                    <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-map-marker"></i> Ubicanos</button>
                    <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-tags"></i> Promociones</button>
                    <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-square"></i> Show Room</button>
                    <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-rocket"></i> Ofertas</button>
                    <button type="button" class="btn btn-sm btn-default pull-right"><i class="fa fa-database"></i> Inicio</button>
                </div>
            </div>
        </main>
    </div>
    <!-- modal actualizacion datos -->
    <div class="wizard" id="satellite-wizard" data-title="Actualización Información">
        <!-- Step 1 Name & FQDN -->
        <div class="wizard-card" data-cardname="name">
            <h3>Password</h3>
            <div class="wizard-input-section">
                <p>
                    Ingrese nuevo password/clave
                </p>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="txt_password_min" name="txt_password_min" placeholder="nuevo password">
                    </div>
                </div>
            </div>
            <div class="wizard-input-section">
                <p>
                    Repita password/clave
                </p>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="txt_repetir_min" name="txt_repetir_password_min" placeholder="repetir password">
                    </div>
                </div>
            </div>
            <div class="wizard-input-section">
                <div class="progress progress-striped active mt">
                    <div id="devian" class="progress-bar progress-bar-success fw-semi-bold" style="width: 1%;">
                        1%
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
    <script src="processcount/config/settings.js"></script>
    <script src="processcount/config/app.js"></script>

    <!-- page specific libs -->
    <script src="assets/dist/vendor/parsleyjs/dist/parsley.min.js"></script>
    <script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
    <script src="assets/dist/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="assets/dist/vendor/select2/select2.js"></script>
    <script src="assets/dist/vendor/moment/min/moment.min.js"></script>
    <script src="assets/dist/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/dist/vendor/jasny-bootstrap/js/inputmask.js"></script>
    <script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>
    <script src="assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
    <script src="assets/dist/vendor/bootstrap-application-wizard/src/bootstrap-wizard.js"></script>
    <script src="assets/dist/vendor/jasny-bootstrap/js/fileinput.js"></script>

    <!-- page specific js -->
    
    <script src="assets/dist/js/ui-components.js"></script>
</body>
</html>