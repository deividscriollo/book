<?php 
    session_start();
    if($_SESSION){
      //con session
      $vec = explode('/', $_SERVER['REQUEST_URI']);
      $localname = $vec[count($vec)-2];
      print $_SESSION['acceso'][$localname];
      if ($_SESSION['acceso'][$localname]!='1') {
        header('Location: ../dashboard/');
      }
    }else{
      // print 'sin session';
      // header('Location: ../login/');
    };
?>
<!DOCTYPE html>
<html lang="es">  

<head>
	<title>Nextbook Login</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description" 
        content="Red de Negocios, Herramientas de Negocios, facturación electrónica, facturanext.com es un servicio gratuito que te permite concentrar todas las facturas electrónicas que recibes en un solo lugar"/>
  <meta name="keywords" content="Negocios, Facturación, todo en uno, nextbook, Nextbook.com, Nextbook.com.ec, Nextbook.ec, 
  facturación electrónica, herramienta de negocios, organizar facturas nube gestionar compras, correo facturación, beneficios nextbook" />
  <meta name="author" content="Una iniciativa de concepto intelectual /business group, nextbook.ec">
  <link rel="shortcut icon" href="../dist/img/docs.png">
  <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="author" content="webmaster david criollo by conceptual group">

  <!-- Bootstrap core CSS -->
  <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="//www.fuelcdn.com/fuelux/3.13.0/css/fuelux.min.css" rel="stylesheet"> -->

  <link href="../dist/css/bootstrap-material-design.css" rel="stylesheet">
  <link href="../dist/css/ripples.min.css" rel="stylesheet">
  <link href="../dist/css/animate.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="../dist/css/non-responsive.css"/>
  <link rel="stylesheet" href="../dist/css/sweetalert.css"/>
  <link rel="stylesheet" href="app.css">
  <!-- awesomefont -->
  <link rel="stylesheet" href="../dist/font-awesome-4.5.0/css/font-awesome.min.css">
  <!-- configuracion general -->
  <link href="../dist/css/dac.css" rel="stylesheet">
  <!-- text fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" /> 
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
          <a class="navbar-brand" href="#">nextbook</a>
        </div>
        <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
        <div id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>LOGIN </b> <span class="caret"></span></a>
              <ul id="login-dp" class="dropdown-menu">
                <li>
                   <div class="row">
                      <div class="col-md-12">
                        <div class="alert alert-dismissible alert-info">
                          <strong>Estimado usuario!</strong>
                          La información que usted dispone es únicamente para usted no la comparta con nadie más.
                        </div>                                
                        <form id="form-acceso">
                          <div class="col-sm-12 center">
                            <div class="form-group label-floating has-info">
                              <div class="input-group col-sm-12">
                                <label class="control-label" for="addon3a">Numero de Ruc</label>
                                <input type="text" id="txt_user" name="txt_user" class="form-control info">
                                <p class="help-block">Por favor ingrese su número de ruc.</p>
                              </div>
                            </div>
                            <div class="form-group label-floating has-info">
                              <div class="input-group col-sm-12">
                                <label class="control-label" for="addon3a">Password</label>
                                <input type="password" id="txt_pass" name="txt_pass" class="form-control">
                                <p class="help-block">Recuerde, su password / clave es únicamente de su pertenencia.</p>
                              </div>
                            </div>
                            <div class="form-group label-floating pull-right">
                                <button type="submit" class="btn btn-raised btn-success">Entrar</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="bottom text-center">
                        <a href="#" class=" blue"> Olvidó su contraseña ?</a>
                      </div>
                   </div>
                </li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Carousel -->
    <div id="main-carousel" class="carousel slide carousel-fade carousel-bg" data-interval="false">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#main-carousel" data-slide-to="0" class="active">
            </li>
            <li data-target="#main-carousel" data-slide-to="1"></li>
            <li data-target="#main-carousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="item active">
              <div class="container pad-dcop">
                <div class="row">       
                  <div class="col-sm-7 animated fadeInDown">
                    <h4 class="pull-center">
                        <span class="text-primary">Ingresa</span> fácil, <span class="text-primary">rápido</span>, efectivo y <span class="text-primary"> gratis.</span> <br>
                        Publica tú negocio y
                        <span class="text-primary">muéstrate</span> al mundo, seguro incrementarás <span class="text-primary">tús ventas</span>.
                    </h4>
                    <img src="../dist/img/mobilimg.png" width="100%">
                  </div>                
                  <div class="col-sm-5 animated fadeInRight">                    
                    <div class="col-sm-12">
                      <div class="jumbotron">               
                      <div class="row">
                      <h1 class="header smaller lighter blue"> Registrate es gratis </h1>
                      </div>
                      <form  class="form-horizontal" id="form-sri-consulta">
                        <div class="form-group label-floating has-info">
                          <div class="input-group col-sm-8 col-sm-offset-2">
                            <label class="control-label">Ingrese su número de Ruc</label>
                            <input type="text" id="txt_ruc" name="txt_ruc" class="form-control info">
                            <span class="help-block">Ingrese solo si tiene empresas registrada en el SRI.</span>
                          </div>
                        </div>
                        <div class="form-group center">
                          <button type="submit" class="btn btn-lg btn-success">
                            Buscar info
                            <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                          </button>
                        </div>
                      </form>     
                   </div>
                    </div>
                  </div>  
                </div>
              </div>                
            </div>
            <!-- /.First slide -->

            <!-- Second slide -->
            <div class="item">
                <div class="carousel-caption">
                    <div class="verticalcenter">
                        <div class="animated fadeInDown">
                            <!-- <h4>Material Design for Bootstrap</h4>
                            <h5>The best and free framework for Bootstrap</h5>
                            <a href="http://mdbootstrap.com/material-design-for-bootstrap/" target="_blank" class="btn btn-default btn-stc waves-effect waves-light"><i class="fa fa-download right"></i>Get started</a>
                            <a href="http://mdbootstrap.com/product/material-design-for-bootstrap-pro/" target="_blank" class="btn btn-primary btn-etc waves-effect waves-light"><i class="fa fa-star right"></i>Go Pro</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Second slide -->

            <!-- Third slide -->
            <div class="item">
                <div class="carousel-caption">
                    <div class="verticalcenter">
                        <div class="animated fadeInDown">
                            <!-- <h4>Material Design for Bootstrap</h4>
                            <h5>The best and free framework for Bootstrap</h5>
                            <a href="http://mdbootstrap.com/material-design-for-bootstrap/" target="_blank" class="btn btn-default btn-stc waves-effect waves-light"><i class="fa fa-download right"></i>Get started</a>
                            <a href="http://mdbootstrap.com/product/material-design-for-bootstrap-pro/" target="_blank" class="btn btn-primary btn-etc waves-effect waves-light"><i class="fa fa-star right"></i>Go Pro</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Third slide -->
        </div>
        <!-- /.carousel-inner -->

        <!-- Controls -->
        <a class="left carousel-control new-control" href="#main-carousel" role="button" data-slide="prev">
            <!-- <span class="fa fa fa-angle-left waves-effect waves-light"></span> -->
            <!-- <span class="sr-only">Previous</span> -->
        </a>
        <a class="right carousel-control new-control" href="#main-carousel" role="button" data-slide="next">
            <!-- <span class="fa fa fa-angle-right waves-effect waves-light"></span> -->
            <!-- <span class="sr-only">Previous</span> -->
        </a>
    </div>
    <!-- /.Carousel -->
    <!--Info Modal Templates-->
    <div id="modal-info" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <i class="fa fa-envelope pull-left"></i> 
                    <h4>Información Requerida</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6 wp-block no-space arrow-right base">
                      <div class="wp-block-body">
                        <h4 class=""><i class="fa fa-cube"></i> Razón Social: </h4>
                        <p class="list-group-item-text" id="lbl_razon_social">Razón Social</p>
                        <br>

                        <h4 class="list-group-item-heading"><i class="fa fa-user"></i> Actividad Económica: </h4>
                        <p class="list-group-item-text" id="lbl_actividad_economica">Actividad Económica</p>
                        <br>

                        <h4 class="list-group-item-heading"><i class="fa fa-cogs"></i> Tipo Contribuyente: </h4>
                        <p class="list-group-item-text" id="lbl_tipo_contribuyente">Tipo Contribuyente</p>
                        <br>

                        <h4 class="list-group-item-heading"><i class="fa fa-database"></i> Nombre Comercial: </h4>
                        <p class="list-group-item-text" id="lbl_nombre_comercial">Nombre Comercial</p>
                        <br>

                        <h4 class="list-group-item-heading"><i class="fa fa-dot-circle-o"></i> Clase Contribuyente: </h4>
                        <p class="list-group-item-text" id="lbl_clase_contribuyente">Clase Contribuyente:</p>
                        <br>

                        <h4 class="list-group-item-heading"><i class="fa fa-bar-chart"></i> Clase Contribuyente: </h4>
                        <p class="list-group-item-text" id="lbl_estado_contribuyente">Estado Contribuyente:</p>
                        <br>
                      </div>                          
                    </div>
                    <div class="col-md-6 wp-block no-space light pull-left">
                        <div class="wp-block-body ">
                          <form role="form" class="form-horizontal" id="form-registro-empresas">
                            <div class="row ">
                              <div class="col-md-6 col-md-offset-3 ">
                                <div class="form-group label-floating is-empty has-info">                                  
                                  <input class="form-control" id="txt_correo" name="txt_correo" type="text" placeholder="Correo electrónico">
                                  <p class="help-block">( * ) Por favor ingrese su correo electrónico</p>
                                  <span class="material-input"></span>
                                </div>
                                <div class="form-group label-floating is-empty has-info">                                  
                                  <input class="form-control" id="txt_telefono_1" name="txt_telefono_1" type="text" placeholder="Teléfono Fijo 1">
                                  <p class="help-block">Por favor ingrese su correo electrónico</p>
                                  <span class="material-input"></span>
                                </div>
                                <div class="form-group label-floating is-empty has-info">                                  
                                  <input class="form-control" id="txt_celular" name="txt_celular" type="text" placeholder="Teléfono Móvil">
                                  <p class="help-block">( * ) Por favor ingrese su correo electrónico</p>
                                  <span class="material-input"></span>
                                </div>
                                <div class="form-group">
                                <div class="col-md-10">
                                  <div class="radio radio-primary">
                                    <label>
                                      <input type="radio" name="obj_terminos_condiciones" id="obj_terminos_condiciones" class="input-sm" value="option1" checked>
                                      <a href="../terminos/" target="_blank" class="blue">Términos/Condiciones</a>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-4">
                                <button type="button" class="btn btn-default btn-raised btn-block" id="btn_modal_info_cancelar">Cancelar</button>
                              </div>
                              <div class="col-sm-8">
                                <button type="submit" class="btn btn-success btn-raised btn-block">Terminado</button>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                  </div>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Info Modal Templates-->   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../dist/js/ie10-viewport-bug-workaround.js"></script> 

    <!-- escrip extension required -->
    <script src="../dist/js/jquery.validate.min.js"></script>
    <script src="../dist/js/additional-methods.min.js"></script>
    <script src="../dist/js/jquery.maskedinput.min.js"></script>
    <script src="../dist/js/sweetalert.min.js"></script>
    <script src="../dist/js/jquery.blockUI.js"></script>
    <script src="../dist/js/lockr.js"></script>
    <script src="../dist/js/pace.min.js"></script>
    <script src="../dist/js/material.js"></script>
    <script src="../dist/js/ripples.min.js"></script>
    <script src="../dist/js/formValidation.min.js" type="text/javascript"></script>
    <script src="../dist/js/bootstrap.validation.min.js" type="text/javascript"></script>

    <!-- personal config scrip -->
    <script src="app.js"></script>
  </body>
</html>


