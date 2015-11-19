<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
    if (!$_SESSION['m']) {
    	header('Location: index.php');
    }
	include_once('next/menu/app.php');
	$classmenu=new menu();
	$perfil=$_SESSION['m']['representante_legal'];
    $nombre = explode(' ', $_SESSION['m']['representante_legal']);
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
		<link rel="stylesheet" href="next/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="next/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="next/assets/fonts/fonts.googleapis.com.css" />

		
		<link rel="stylesheet" href="next/assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="next/assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="next/assets/css/sweetalert.css" />
		<link rel="stylesheet" href="next/assets/css/select2.min.css" />
		<link rel="stylesheet" href="next/assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="next/assets/css/bootstrap-editable.min.css" />

		

		<!-- ace styles -->
		<link rel="stylesheet" href="next/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="next/assets/css/app.css" />
		<link rel="stylesheet" href="next/dashboard/app.css" />
		<script src="next/assets/js/ace-extra.min.js"></script>
	</head>

	<body class="no-skin">
		<?php 
			$classmenu->navbar();
		?>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-md-3">
								<div class="row-fluid">
									<div class="widget-box">
										<div class="widget-header">
											<h4 class="widget-title lighter">Personalizar</h4>
											<div class="widget-toolbar no-border">
												<a href="#" data-action="collapse">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a>
											</div>
										</div>
										<div class="widget-body">
											<div class="widget-main">
												<p>
													<a href="perfil.php">
														<button class="btn btn-white btn-warning btn-round btn-block">
															<i class="ace-icon fa fa-user "></i>
															<?php print $nombre[2].' '.$nombre[0]; ?>
														</button>
													</a>
												</p>
												<p>
													<a href="empresa.php">
														<button class="btn btn-white btn-pink btn-round btn-block">
															<i class="ace-icon fa fa-database"></i>
															Perfil Empresa
														</button>
													</a>
												</p>
											</div>
										</div>
									</div>
								</div>													
								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title lighter grey">Aplicaciones</h4>
										<div class="widget-toolbar no-border">
											<a href="#" data-action="collapse">
												<i class="ace-icon fa fa-chevron-up"></i>
											</a>
										</div>
									</div>
									<div class="widget-body">
										<div class="widget-main">
											<button type="button" id="link_factura" class="btn btn-lg btn-primary btn-primary btn-block">
												<i class="fa fa-print"></i>	Facturanext
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div id="timeline-1">
									<div class="row">
										<div class="col-xs-12 col-sm-10 col-sm-offset-1">
											<div class="timeline-container">
												<div class="timeline-label">
													<span class="label label-primary arrowed-in-right label-lg">
														<b>Today</b>
													</span>
												</div>

												<div class="timeline-items">
													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<img alt="Susan't Avatar" src="next/assets/avatars/avatar1.png" />
															<span class="label label-info label-sm">16:22</span>
														</div>

														<div class="widget-box transparent">
															<div class="widget-header widget-header-small">
																<h5 class="widget-title smaller">
																	<a href="#" class="blue">Susan</a>
																	<span class="grey">reviewed a product</span>
																</h5>

																<span class="widget-toolbar no-border">
																	<i class="ace-icon fa fa-clock-o bigger-110"></i>
																	16:22
																</span>

																<span class="widget-toolbar">
																	<a href="#" data-action="reload">
																		<i class="ace-icon fa fa-refresh"></i>
																	</a>

																	<a href="#" data-action="collapse">
																		<i class="ace-icon fa fa-chevron-up"></i>
																	</a>
																</span>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	Anim pariatur cliche reprehenderit, enim eiusmod
																	<span class="red">high life</span>

																	accusamus terry richardson ad squid &hellip;
																	<div class="space-6"></div>

																	<div class="widget-toolbox clearfix">
																		<div class="pull-left">
																			<i class="ace-icon fa fa-hand-o-right grey bigger-125"></i>
																			<a href="#" class="bigger-110">Click to read &hellip;</a>
																		</div>

																		<div class="pull-right action-buttons">
																			<a href="#">
																				<i class="ace-icon fa fa-check green bigger-130"></i>
																			</a>

																			<a href="#">
																				<i class="ace-icon fa fa-pencil blue bigger-125"></i>
																			</a>

																			<a href="#">
																				<i class="ace-icon fa fa-times red bigger-125"></i>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-cutlery btn btn-success no-hover"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-body">
																<div class="widget-main">
																	Going to cafe for lunch
																	<div class="pull-right">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		12:30
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-star btn btn-warning no-hover green"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-header widget-header-small">
																<h5 class="widget-title smaller">New logo</h5>

																<span class="widget-toolbar no-border">
																	<i class="ace-icon fa fa-clock-o bigger-110"></i>
																	9:15
																</span>

																<span class="widget-toolbar">
																	<a href="#" data-action="reload">
																		<i class="ace-icon fa fa-refresh"></i>
																	</a>

																	<a href="#" data-action="collapse">
																		<i class="ace-icon fa fa-chevron-up"></i>
																	</a>
																</span>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	Designed a new logo for our website. Would appreciate feedback.
																	<div class="space-6"></div>

																	<div class="widget-toolbox clearfix">
																		<div class="pull-right action-buttons">
																			<div class="space-4"></div>

																			<div>
																				<a href="#">
																					<i class="ace-icon fa fa-heart red bigger-125"></i>
																				</a>

																				<a href="#">
																					<i class="ace-icon fa fa-facebook blue bigger-125"></i>
																				</a>

																				<a href="#">
																					<i class="ace-icon fa fa-reply light-green bigger-130"></i>
																				</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-flask btn btn-default no-hover"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-body">
																<div class="widget-main"> Took the final exam. Phew! </div>
															</div>
														</div>
													</div>
												</div><!-- /.timeline-items -->
											</div><!-- /.timeline-container -->

											<div class="timeline-container">
												<div class="timeline-label">
													<span class="label label-success arrowed-in-right label-lg">
														<b>Yesterday</b>
													</span>
												</div>

												<div class="timeline-items">
													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-beer btn btn-inverse no-hover"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-header widget-header-small">
																<h5 class="widget-title smaller">Haloween party</h5>

																<span class="widget-toolbar">
																	<i class="ace-icon fa fa-clock-o bigger-110"></i>
																	1 hour ago
																</span>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	<div class="clearfix">
																		<div class="pull-left">
																			Lots of fun at Haloween party.
																			<br />
																			Take a look at some pics:
																		</div>

																		<div class="pull-right">
																			<i class="ace-icon fa fa-chevron-left blue bigger-110"></i>

																			&nbsp;
																			<img alt="Image 4" width="36" src="next/assets/images/gallery/thumb-4.jpg" />
																			<img alt="Image 3" width="36" src="next/assets/images/gallery/thumb-3.jpg" />
																			<img alt="Image 2" width="36" src="next/assets/images/gallery/thumb-2.jpg" />
																			<img alt="Image 1" width="36" src="next/assets/images/gallery/thumb-1.jpg" />
																			&nbsp;
																			<i class="ace-icon fa fa-chevron-right blue bigger-110"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-trophy btn btn-pink no-hover green"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-header widget-header-small">
																<h5 class="widget-title smaller">Lorum Ipsum</h5>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	Anim pariatur cliche reprehenderit, enim eiusmod
																	<span class="green bolder">high life</span>
																	accusamus terry richardson ad squid &hellip;
																</div>
															</div>
														</div>
													</div>

													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-cutlery btn btn-success no-hover"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-body">
																<div class="widget-main"> Going to cafe for lunch </div>
															</div>
														</div>
													</div>

													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-bug btn btn-danger no-hover"></i>
														</div>

														<div class="widget-box widget-color-red2">
															<div class="widget-header widget-header-small">
																<h5 class="widget-title smaller">Critical security patch released</h5>

																<span class="widget-toolbar no-border">
																	<i class="ace-icon fa fa-clock-o bigger-110"></i>
																	9:15
																</span>

																<span class="widget-toolbar">
																	<a href="#" data-action="reload">
																		<i class="ace-icon fa fa-refresh"></i>
																	</a>

																	<a href="#" data-action="collapse">
																		<i class="ace-icon fa fa-chevron-up"></i>
																	</a>
																</span>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	Please download the new patch for maximum security.
																</div>
															</div>
														</div>
													</div>
												</div><!-- /.timeline-items -->
											</div><!-- /.timeline-container -->

											<div class="timeline-container">
												<div class="timeline-label">
													<span class="label label-grey arrowed-in-right label-lg">
														<b>May 17</b>
													</span>
												</div>

												<div class="timeline-items">
													<div class="timeline-item clearfix">
														<div class="timeline-info">
															<i class="timeline-indicator ace-icon fa fa-leaf btn btn-primary no-hover green"></i>
														</div>

														<div class="widget-box transparent">
															<div class="widget-header widget-header-small">
																<h5 class="widget-title smaller">Lorum Ipsum</h5>

																<span class="widget-toolbar no-border">
																	<i class="ace-icon fa fa-clock-o bigger-110"></i>
																	10:22
																</span>

																<span class="widget-toolbar">
																	<a href="#" data-action="reload">
																		<i class="ace-icon fa fa-refresh"></i>
																	</a>

																	<a href="#" data-action="collapse">
																		<i class="ace-icon fa fa-chevron-up"></i>
																	</a>
																</span>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	Anim pariatur cliche reprehenderit, enim eiusmod
																	<span class="blue bolder">high life</span>
																	accusamus terry richardson ad squid &hellip;
																</div>
															</div>
														</div>
													</div>
												</div><!-- /.timeline-items -->
											</div><!-- /.timeline-container -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row-fluid">
									<div class="widget-box transparent">
										<div class="widget-header">
												<h4 class="widget-title lighter">Tus Empresas</h4>
												<div class="widget-toolbar no-border">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

										<div class="widget-body">
											<div class="widget-main">
												<p class="alert alert-info">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis.
												</p>
											</div>
										</div>
									</div>	
								</div>
								<div class="row-fluid">
									<div class="widget-box transparent">
										<div class="widget-header">
												<h4 class="widget-title lighter primary">Empresas Recientes</h4>
												<div class="widget-toolbar no-border">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

										<div class="widget-body">
											<div class="widget-main">
												<p class="alert alert-info">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis.
												</p>
											</div>
										</div>
									</div>	
								</div>
								<div class="row-fluid">
									<div class="widget-box transparent">
										<div class="widget-header">
												<h4 class="widget-title lighter primary">Publicidad <small><a href="#">Crear un anuncio</a></small></h4>
												<div class="widget-toolbar no-border">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

										<div class="widget-body">
											<div class="widget-main">
												<p class="alert alert-info">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis.													
												</p>
											</div>
										</div>
									</div>	
								</div>
								
							</div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<!-- modales -->
			<div id="modal-wizard" class="modal fade" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div id="modal-wizard-container">
							<div class="modal-header">
								<ul class="steps">
									<li data-step="1" class="active">
										<span class="step">1</span>
										<span class="title">Seguridad</span>
									</li>
									<li data-step="2">
										<span class="step">2</span>
										<span class="title">Empresa</span>
									</li>
								</ul>
							</div>

							<div class="modal-body step-content">
								<div class="step-pane active" data-step="1">
									<div class="">
										<form class="form-horizontal" id="form-new-pass">
											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>
												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="password" name="txt_pass_1" id="txt_pass_1" value="CROnos_1021" />
													</div>
												</div>
											</div>
											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirmar Password:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="password" name="txt_pass_2" id="txt_pass_2"  value="CROnos_1021" />
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div class="step-pane" data-step="2">
									<form class="form-horizontal" id="form-new-pass2" name="form_2">
										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Selecc. Empresa</label>
											<div class="col-xs-12 col-sm-9">
												<select id="select_empresa" name="select_empresa" class="select2" data-placeholder="Seleccionar Empresa">
													<option value="">&nbsp;</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre Empresa </label>
											<div class="col-sm-9">
												<input type="text" id="txt_empresa" name="txt_empresa" placeholder="Nombre Empresa" class="col-xs-12 col-sm-12" readonly />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Dirección Empresa</label>
											<div class="col-sm-9">
												<input type="text" id="txt_direccion_empresa" name="txt_direccion_empresa" placeholder="Nombre Empresa" class="col-xs-12 col-sm-12" readonly/>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Tipo</label>
													<div class="col-xs-12 col-sm-9">
														<select id="select_tipo" name="select_tipo" class="select2" data-placeholder="Sele.. Tipo">
															<option value="">&nbsp;</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">Categoría</label>
													<div class="col-xs-12 col-sm-9">
														<select id="select_categoria" name="select_categoria" class="select2" data-placeholder="Sele.. Categoría">
															<option value="">&nbsp;</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="modal-footer wizard-actions">
							<button class="btn btn-success btn-sm btn-next" data-last="Finalizar, Ir al menu principal">
								Adelante
								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
							</button>							
						</div>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->

			<?php 
				$classmenu->footer();
			?>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<script src="next/assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='next/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='next/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="next/assets/js/bootstrap.min.js"></script>
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
		<script src="next/assets/js/fuelux.wizard.min.js"></script>
		<script src="next/assets/js/select2.min.js"></script>
		<script src="next/assets/js/bootstrap-editable.min.js"></script>
		<script src="next/assets/js/ace-editable.min.js"></script>
		<script src="next/assets/js/jquery.gritter.min.js"></script>
		<script src="next/assets/js/jquery.easypiechart.min.js"></script>
		<script src="next/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="next/assets/js/jquery.hotkeys.min.js"></script>
		<script src="next/assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="next/assets/js/fuelux.spinner.min.js"></script>




		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script src="next/dashboard/app.js"></script>
	</body>
</html>



