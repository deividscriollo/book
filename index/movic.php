<?php 
	// $dominio = $_SERVER['SERVER_NAME'];
	// if ($dominio!='www.nextbook.ec') {
	// 	header('Location: http://www.nextbook.ec/');
	// }
	// // detectar dispositivos
	// require_once('next/admin/Mobile_Detect.php'); 
 //    $detect = new Mobile_Detect(); //redireccionar a versión móvil si nos visitan desde un móvil o tablet 
 //    if($detect->isMobile() || $detect->isTablet()) { 
 //       header("Location: http://m.nextbook.ec"); 
 //    }

	// // sessiones
	if(!isset($_SESSION)){
        session_start(); 
         if(isset($_SESSION["m"])) {
	    	header('Location: dashboard.php');
	    }       
    }	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Nextbook</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <meta name="description" content="Red de Negocios, Herramientas de Negocios, facturación electrónica, facturanext es un servicio gratuito que te permite concentrar todas las facturas electrónicas que recibes en un solo lugar
	    " />
	    <meta name="msvalidate.01" content="64BBD913ED7E771F678671292BB6E9C7" />
	    <meta name="keywords" content="Negocios, Facturación, todo en uno, nextbook, Nextbook.com, Nextbook.com.ec, Nextbook.ec, 
	    facturación electrónica, herramienta de negocios, organizar facturas nube gestionar compras, correo facturación, beneficios nextbook" />
	    <meta name="author" content="Una iniciativa de concepto intelectual /business group, nextbook.ec">
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <link rel="icon" type="image/png" href="next/assets/images/favicon.png"/>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="next/assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="next/assets/css/sweetalert.css"/>
		<link rel="stylesheet" href="next/assets/font-awesome/4.2.0/css/font-awesome.min.css"/>
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="next/assets/fonts/fonts.googleapis.com.css"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="next/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="next/assets/css/app.css"/>

		<script src="next/assets/js/ace-extra.min.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<img src="next/assets/login/logo_empresa.jpg">
					</a>
				</div>
				<nav role="navigation" class="navbar-menu pull-right collapse navbar-collapse">
					<form class="navbar-form navbar-left form-search" id="form-acceso">
						<div class="form-group">
							<span class="input-icon input-icon-right">
								<input type="text" id="txt_user_dc" name="txt_user_dc" placeholder="Correo electrónico / Ruc" class="tooltip-error" data-placement="bottom">
								<i class="ace-icon glyphicon glyphicon-envelope purple"></i>
							</span>
							<span class="input-icon input-icon-right">
								<input type="password" id="txt_password_dc" name="txt_password_dc" placeholder="Password" class="tooltip-error" data-placement="bottom">
								<i class="ace-icon fa fa-lock green"></i>
							</span>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-mini btn-inverse">
								<i class="ace-icon glyphicon glyphicon-play"></i>
								Entrar
							</button>
						</div>
					</form>					
				</nav>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-content">
				<div class="main-container ace-save-state container">
					<div class="page-content">
						<div class="col-sm-12 no-padding visible-xs">
							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="ace-icon fa fa-lock green"></i>
											Entrar
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#messages">
											<i class="ace-icon fa fa-cloud-upload blue"></i>
											Registrar
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<form class="form-horizontal" id="form_movil">
											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Correo electrónico / Ruc:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="text" name="txt_movil_usuario" id="txt_movil_usuario" class="col-xs-12 tooltip-error" />
													</div>
												</div>
											</div>
											<div class="space-2"></div>
											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="password" name="txt_movil_pass" id="txt_movil_pass" class="col-xs-12 tooltip-error" />
													</div>
												</div>
											</div>
											<button class="btn btn-white btn-default pull-right" type="submit">
												<i class="ace-icon fa fa-play red2"></i>
												Entrar
											</button>
										</form>
									</div>

									<div id="messages" class="tab-pane fade ">
										<h1 class="header smaller lighter blue">
											Registrate
											<small>Ingresa, es gratis</small>
										</h1>
										<form role="form" class="form-horizontal" id="form-sri-consulta-movil">
						                    <div class="form-group">
						                    	<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Ingresar Ruc:</label>
												<div class="col-xs-12 col-sm-8">

													<div class="input-group">
														<input type="text" class="form-control search-query" id="txt_ruc_movil" name="txt_ruc_movil" placeholder="Ingrese ruc"/>
														<span class="input-group-btn">
															<button type="submit" class="btn btn-purple btn-sm">
																Buscar
																<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
															</button>
														</span>
													</div>
												</div>
											</div>
										</form>
										<form role="form" class="form-horizontal" id="form_empresas-movil">
											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Representante Legal:</label>
												<div class="col-xs-12 col-sm-8">
													<div class="clearfix">
														<input type="text" id="txt_representante_legal" name="txt_representante_legal" placeholder="Representante Legal" class="col-xs-12 col-sm-12" readonly />
													</div>
												</div>
											</div>
											<div class="row">
												<div class="widget-box transparent collapsed">
													<div class="widget-header">
														<h4 class="widget-title lighter text-center"> más información</h4>

														<div class="widget-toolbar">
															<a href="#" data-action="collapse">
																<i class="ace-icon fa fa-chevron-down" id="btn_opcion"></i>
															</a>
														</div>
													</div>

													<div class="widget-body">
														<div class="widget-main">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Actividad Económica Principal:</label>
																<div class="col-xs-12 col-sm-8">
																	<div class="clearfix">
																		<input type="text" id="txt_representante_cedula" name="txt_representante_cedula" placeholder="Actividad Económica Principal" class="col-xs-12 col-sm-12" readonly />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Tipo Contribuyente:</label>
																<div class="col-xs-12 col-sm-8">
																	<div class="clearfix">
																		<input type="text" id="txt_tipo" name="txt_tipo" placeholder="Tipo Contribuyente" class="col-xs-12 col-sm-12" readonly/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Razón Social:</label>
																<div class="col-xs-12 col-sm-8">
																	<div class="clearfix">
																		<input type="text" id="txt_razon_social" name="txt_razon_social" placeholder="Razón Social" class="col-xs-12 col-sm-12" readonly />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Nombre Comercial:</label>
																<div class="col-xs-12 col-sm-8">
																	<div class="clearfix">
																		<input type="text" id="txt_nombre_comercial" name="txt_nombre_comercial" placeholder="Nombre Comercial" class="col-xs-12 col-sm-12" readonly />
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
				                                <label class="control-label col-xs-12 col-sm-4 no-padding-right">Teléfono Fijo 1</label>
				                                <div class="col-xs-12 col-sm-8">
					                                <div class="input-group">
					                                    <div class="input-group">
					                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
					                                        <input class="form-control"type="text" id="txt_telefono_1" name="txt_telefono_1" placeholder="Teléfono 1">
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
					                                        <input class="form-control"type="text" id="txt_telefono_2" name="txt_telefono_2" placeholder="Teléfono 2">
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
					                                        <input class="form-control"type="text" id="txt_celular" name="txt_celular" placeholder="Teléfono Móvil">
					                                    </div>
					                                </div>
					                            </div>
				                            </div>
				                            <div class="form-group">
												<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Correo electrónico:</label>
												<div class="col-xs-12 col-sm-8">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="ace-icon glyphicon glyphicon-envelope"></i>
														</span>
														<input class="form-control input-mask-phone" type="email" id="txt_correo" name="txt_correo" placeholder="Correo electrónico"/>
													</div>
												</div>
											</div>
											<div class="space-8"></div>
											<div class="form-group">
												<div class="col-xs-12 col-sm-8 col-sm-offset-4">
													<label>
														<input name="obj_terminos_condiciones" id="obj_terminos_condiciones" type="checkbox" class="ace" data-placement="right" />
														<span class="lbl"> Terminos y Condiciones, Declaro conocer y aceptar los <a href="http://www.nextbook.ec/terminos.html">Términos y Condiciones</a> del sitio.</span>
													</label>
												</div>
											</div>
						                    <div class="row">
						                        <div class="col-xs-12 col-sm-8 col-sm-offset-4">
						                            <button type="submit" class="btn btn-success btn-block">Terminado</button>
						                        </div>
						                    </div>           
							            </form>
									</div>
								</div>
							</div>
						</div>
						<div class="row hidden-xs">
							<div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 ">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						            <h4 class="center">
						                <span class="text-primary">Ingresa</span> fácil, rápido, efectivo y <span class="text-primary">gratis</span>, 
						                publica tú negocio y tus productos<br>
						                <span class="text-primary">muéstrate</span> al mundo, podrán encontrarte <span class="text-primary">más clientes</span> y seguro incrementarás <span class="text-primary">tús ventas</span>.
						            </h4>
						            <img src="next/assets/login/mobilimg.png" width="100%">
						        </div>								
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
									<h1 class="header smaller lighter blue">
										Registrate
										<small>Ingresa, es gratis</small>
									</h1>
						            <form role="form" class="form-horizontal" id="form-sri-consulta">
					                    <div class="form-group">
					                    	<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Ingresar Ruc:</label>
											<div class="col-xs-12 col-sm-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="ace-icon fa fa-check"></i>
													</span>
													<input type="text" class="form-control search-query" id="txt_ruc" name="txt_ruc" placeholder="Ingrese ruc a buscar"/>
													<span class="input-group-btn">
														<button type="submit" class="btn btn-purple btn-sm">
															Consultar
															<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
														</button>
													</span>
												</div>
											</div>
										</div>
									</form>
									<form role="form" class="form-horizontal" id="form_empresas">
										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Representante Legal:</label>
											<div class="col-xs-12 col-sm-8">
												<div class="clearfix">
													<input type="email" id="txt_representante_legal" name="txt_representante_legal" placeholder="Representante Legal" class="col-xs-12 col-sm-12" readonly/>
												</div>
											</div>
										</div>
										<div class="widget-box transparent collapsed">
											<div class="widget-header">
												<h3 class="widget-title lighter">más información . . . </h3>
												<div class="widget-toolbar no-border">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-6 no-padding-left no-padding-right">
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="email">Actividad Económica Principal:</label>
														<div class="col-xs-12 col-sm-8">
															<div class="clearfix">
																<input type="text" id="txt_representante_cedula" name="txt_representante_cedula" placeholder="Actividad Económica Principal" class="col-xs-12 col-sm-12" readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Tipo Contribuyente:</label>
														<div class="col-xs-12 col-sm-8">
															<div class="clearfix">
																<input type="text" id="txt_tipo" name="txt_tipo" placeholder="Tipo Contribuyente" class="col-xs-12 col-sm-12" readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Razón Social:</label>
														<div class="col-xs-12 col-sm-8">
															<div class="clearfix">
																<input type="text" id="txt_razon_social" name="txt_razon_social" placeholder="Razón Social" class="col-xs-12 col-sm-12" readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Nombre Comercial:</label>
														<div class="col-xs-12 col-sm-8">
															<div class="clearfix">
																<input type="text" id="txt_nombre_comercial" name="txt_nombre_comercial" placeholder="Nombre Comercial" class="col-xs-12 col-sm-12" readonly/>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>		                    		
										
										<div class="form-group">
			                                <label class="control-label col-xs-12 col-sm-4 no-padding-right">Teléfono Fijo 1</label>
			                                <div class="col-xs-12 col-sm-8">
				                                <div class="input-group">
				                                    <div class="input-group">
				                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
				                                        <input class="form-control"type="text" id="txt_telefono_1" name="txt_telefono_1" placeholder="Teléfono 1">
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
				                                        <input class="form-control"type="text" id="txt_telefono_2" name="txt_telefono_2" placeholder="Teléfono 2">
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
				                                        <input class="form-control"type="text" id="txt_celular" name="txt_celular" placeholder="Teléfono Móvil">
				                                    </div>
				                                </div>
				                            </div>
			                            </div>
			                            <div class="form-group">
											<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="text">Correo electrónico:</label>
											<div class="col-xs-12 col-sm-8">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="ace-icon glyphicon glyphicon-envelope"></i>
													</span>
													<input class="form-control input-mask-phone" type="email" id="txt_correo" name="txt_correo" placeholder="Correo electrónico"/>
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
						                        <div class="col-xs-12 col-sm-8 col-sm-offset-4">
						                            <button type="submit" class="btn btn-success btn-block">Terminado</button>
						                        </div>
						                    </div>           
						                </fieldset>
						            </form>
						        </div>
							</div>
							<!-- PAGE CONTENT BEGINS -->
							
							<div class="hr hr32 hr-dotted"></div>
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.row -->
						<div class="row visible-xs">
							<div class="col-xs-12 ">
					            <h4 class="center">
					                <span class="text-primary">Ingresa</span> fácil, rápido, efectivo y <span class="text-primary">gratis</span>, 
					                publica tú negocio y tus productos<br>
					                <span class="text-primary">muéstrate</span> al mundo, podrán encontrarte <span class="text-primary">más clientes</span> y seguro incrementarás <span class="text-primary">tús ventas</span>.
					            </h4>
					            <img src="next/assets/login/mobilimg.png" width="100%">
					        </div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Nextbook.ec</span>&copy; 2015-2016
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="next/assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="next/assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='next/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='next/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='next/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="next/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="next/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="next/assets/js/jquery-ui.custom.min.js"></script>
		<script src="next/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="next/assets/js/jquery.easypiechart.min.js"></script>
		<script src="next/assets/js/jquery.sparkline.min.js"></script>
		<script src="next/assets/js/jquery.flot.min.js"></script>
		<script src="next/assets/js/jquery.flot.pie.min.js"></script>
		<script src="next/assets/js/jquery.flot.resize.min.js"></script>
		<script src="next/assets/js/jquery.maskedinput.min.js"></script>
		<script src="next/assets/js/jquery.validate.min.js"></script>
		<script src="next/assets/js/jquery.blockUI.js"></script>
		<script src="next/assets/js/sweetalert.min.js"></script>
		<script src="next/assets/js/pace.min.js"></script>
		
		<script type="next/assets/css/app.js"></script>
		
		

		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script src="next/login/app.js"></script>
	</body>
</html>
<style type="text/css">
	.dropdown-menu {
	    position: absolute;
	    top: 100%;
	    left: -6px;
	    z-index: 1000;
	    display: none;
	    float: left;
	    min-width: 160px;
	    /*padding: 5px 0;*/
	    /*margin: 2px 0 0;*/
	    list-style: none;
	    font-size: 14px;
	    text-align: left;
	    background-color: #fff;
	    border: 1px solid #ccc;
	    border: 1px solid rgba(0,0,0,.15);
	    border-radius: 4px;
	    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
	    box-shadow: 0 6px 12px rgba(0,0,0,.175);
	    background-clip: padding-box;
	    background: #3085C9;
	}	
	.main-content-inner {
	    float: left;
	    width: 100%;
	}
	h4 {
	    font-size: 14px;
	    font-weight: 400;
	    font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
	}
	.navbar-form.form-search input[type=text] {
	    width: 250px;
	}
	
</style>