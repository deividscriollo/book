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
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<title>Nextbook Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Red de Negocios, Herramientas de Negocios, facturación electrónica, facturanext.com es un servicio gratuito que te permite concentrar todas las facturas electrónicas que recibes en un solo lugar"/>
    <meta name="keywords" content="Negocios, Facturación, todo en uno, nextbook, Nextbook.com, Nextbook.com.ec, Nextbook.ec, 
    facturación electrónica, herramienta de negocios, organizar facturas nube gestionar compras, correo facturación, beneficios nextbook" />
    <meta name="author" content="Una iniciativa de concepto intelectual /business group, nextbook.ec">
    <link rel="shortcut icon" href="../dist/img/docs.png">
    <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="author" content="webmaster david criollo by conceptual group">

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="//www.fuelcdn.com/fuelux/3.13.0/css/fuelux.min.css" rel="stylesheet"> -->

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
    <script src="../dist/js/ie-emulation-modes-warning.js"></script>
    
	
  </head>

  <body class="light-bg fuelux">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
          <a class="navbar-brand" href="#">Nextbook.ec</a>
        </div>
        <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
        <div id="navbar">
          <form class="navbar-form navbar-right" id="form-acceso">
            <div class="form-group">
                  <div class="input-group">
                      <input type="text" class="form-control input-sm" id="txt_user_dc" name="txt_user_dc" placeholder="ruc">
                      <div class="input-group-addon" type="text">001@facturanext.com</div>
                  </div>
            </div>
           	<div class="form-group">
      				<div class="input-group">
    			      <input type="password" class="form-control input-sm" id="txt_password_dc" name="txt_password_dc" placeholder="password">
    			      <span class="input-group-btn">
    			        <button class="btn btn-primary btn-sm" type="submit">
    			        	<i class="fa fa-key"></i> Entrar
    			        </button>
    			      </span>
    			    </div><!-- /input-group -->
            </div>   
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    	<div class="row">    		
            <div class="col-sm-6">
                <h4 class="pull-center">
                    <span class="text-primary">Ingresa</span> fácil, <span class="text-primary">rápido</span>, efectivo y <span class="text-primary"> gratis.</span> <br>
                    Publica tú negocio y
                    <span class="text-primary">muéstrate</span> al mundo, seguro incrementarás <span class="text-primary">tús ventas</span>.
                </h4>
                <img src="../dist/img/mobilimg.png" width="100%">
            </div>                
            <div class="col-sm-6">
            	<h1 class="header smaller lighter blue">
                    Registrate es gratis
                </h1>
            	<div class="col-sm-12">
            		<div class="jumbotron">				        
				        <div class="row">
				        <h1 class="header smaller lighter blue pull-right">Para empresas</h1>	
				        </div>
				        <form  class="form-horizontal" id="form-sri-consulta">
							<div class="form-group">
							    <input type="text" class="form-control" id="txt_ruc" name="txt_ruc" placeholder="Ingrese ruc">
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
    </div><!-- /container -->
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
                          <form role="form" class="form-horizontal">
                            <div class="form-group">
                              <label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Represent. Legal:</label>
                              <div class="col-xs-12 col-sm-8">
                                <input type="email" id="txt_representante_legal" name="txt_representante_legal" placeholder="Representante Legal" class="form-control input-sm" readonly/>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Activi. Económica:</label>
                              <div class="col-xs-12 col-sm-8">
                                <input type="text" id="txt_representante_cedula" name="txt_representante_cedula" placeholder="Actividad Económica" class="form-control input-sm" readonly/>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Tipo Contribuyente:</label>
                              <div class="col-xs-12 col-sm-8">
                                <div class="clearfix">
                                  <input type="text" id="txt_tipo" name="txt_tipo" placeholder="Tipo Contribuyente" class="form-control input-sm" readonly/>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Razón Social:</label>
                              <div class="col-xs-12 col-sm-8">
                                <div class="clearfix">
                                  <input type="text" id="txt_razon_social" name="txt_razon_social" placeholder="Razón Social" class="form-control input-sm" readonly/>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Nombre Comercial:</label>
                              <div class="col-xs-12 col-sm-8">
                                <div class="clearfix">
                                  <input type="text" id="txt_nombre_comercial" name="txt_nombre_comercial" placeholder="Nombre Comercial" class="form-control input-sm" readonly/>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Est. Contribuyente:</label>
                              <div class="col-xs-12 col-sm-8">
                                <div class="clearfix">
                                  <input type="text" id="txt_estado_contribuyente" name="txt_estado_contribuyente" placeholder="Estado Contribuyente" class="form-control input-sm" readonly/>
                                </div>
                              </div>
                            </div>                      
                          </form>
                      </div>
                    </div>
                    <div class="col-md-6 wp-block no-space light">
                        <div class="wp-block-body">
                            <form role="form" class="form-horizontal" id="form_empresas">
                              <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Correo electrónico:</label>
                                <div class="col-xs-12 col-sm-8">
                                  <div class="input-group">
                                    <span class="input-group-addon">
                                      <i class="ace-icon glyphicon glyphicon-envelope"></i>
                                    </span>
                                    <input class="form-control input-sm input-mask-phone" type="email" id="txt_correo" name="txt_correo" placeholder="Correo electrónico"/>
                                  </div>
                                </div>
                              </div>                                   
                              <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-4 no-padding-right">Teléfono Fijo 1</label>
                                <div class="col-xs-12 col-sm-8">
                                  <div class="input-group">
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                          <input class="form-control input-sm"type="text" id="txt_telefono_1" name="txt_telefono_1" placeholder="Teléfono 1">
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-4 no-padding-right">Teléfono Fijo 2</label>
                                <div class="col-xs-12 col-sm-8">
                                  <div class="input-group">
                                      <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                          <input class="form-control input-sm"type="text" id="txt_telefono_2" name="txt_telefono_2" placeholder="Teléfono 2">
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-xs-12 col-sm-4 no-padding-right">Teléfono Móvil</label>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input class="form-control input-sm"type="text" id="txt_celular" name="txt_celular" placeholder="Teléfono Móvil">
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="space-8"></div>
                                <div class="form-group">
                                  <div class="col-xs-12 col-sm-8 col-sm-offset-4">
                                    <label>
                                      <input name="obj_terminos_condiciones" id="obj_terminos_condiciones" type="checkbox" class="ace" />
                                      <span class="lbl"> Terminos y Condiciones, Declaro conocer y aceptar los <a href="http://www.nextbook.ec/terminos.html">Términos y Condiciones</a> del sitio.</span>
                                    </label>
                                  </div>
                                </div>
                                <fieldset>
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <button type="button" class="btn btn-default btn-block" id="btn_modal_info_cancelar">Cancelar</button>
                                      </div>
                                      <div class="col-sm-8">
                                        <button type="submit" class="btn btn-success btn-block">Terminado</button>
                                      </div>
                                    </div>           
                                </fieldset>
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
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- sfd a<script src="//www.fuelcdn.com/fuelux/3.13.0/js/fuelux.min.js"></script> -->
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
    

    <!-- personal config scrip -->
    <script src="app.js"></script>
  </body>
</html>
<style type="text/css" media="screen">
  .h4, h4 {
    font-size: 18px;
    text-align: center;
}
</style>