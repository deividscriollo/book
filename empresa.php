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
		<link rel="stylesheet" href="next/assets/css/sweetalert.css" />
		<link rel="stylesheet" href="next/assets/css/bootstrap-editable.min.css"/>
		<link rel="stylesheet" href="next/assets/css/demo.html5imageupload.css"/>
		<link rel="stylesheet" href="http://js.arcgis.com/3.14/esri/css/esri.css">


		<link rel="stylesheet" href="next/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="next/assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="next/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="next/assets/css/app.css" />
		<link rel="stylesheet" href="next/empresa/app.css" />
		
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
								<div class="center">
									<form>
									  	<div class="dropzone">
									    	<input type="file" name="thumb"/>
									  	</div>
									</form>
								</div>
								<div class="dd dd-draghandle">
									<ol class="dd-list">
										<li class="dd-item dd2-item" data-id="15">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-signal orange bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content bg-origin" id="element_empresa"><?php print_r($_SESSION['m']['nom_comercial']); ?></div>

											<ol class="dd-list">
												<li class="dd-item dd2-item" data-id="16">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon fa fa-user red bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content">Galería de Eventos</div>
												</li>
												<li class="dd-item dd2-item dd-colored" data-id="17">
													<div class="dd-handle dd2-handle btn-info">
														<i class="normal-icon ace-icon fa fa-pencil-square-o bigger-130"></i>
														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content btn-info no-hover">Catalogo en línea</div>
												</li>
												<li class="dd-item dd2-item" data-id="18">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon fa fa-eye green bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content">Compras por Internet</div>
												</li>
												<li class="dd-item dd2-item" data-id="18">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon fa fa-eye green bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content">Trabaja con nosotros</div>
												</li>
											</ol>
										</li>
										<li class="dd-item dd2-item" data-id="15">
												<div class="dd-handle dd2-handle">
													<i class="normal-icon ace-icon fa fa-signal orange bigger-130"></i>

													<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
												</div>
												<div class="dd2-content bg-origin">Ofertas</div>
												<ol class="dd-list">
													<li class="dd-item dd2-item" data-id="16">
														<div class="dd-handle dd2-handle">
															<i class="normal-icon ace-icon fa fa-user red bigger-130"></i>

															<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
														</div>
														<div class="dd2-content">Active Users</div>
													</li>

													<li class="dd-item dd2-item dd-colored" data-id="17">
														<div class="dd-handle dd2-handle btn-info">
															<i class="normal-icon ace-icon fa fa-pencil-square-o bigger-130"></i>

															<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
														</div>
														<div class="dd2-content btn-info no-hover">Published Articles</div>
													</li>

													<li class="dd-item dd2-item" data-id="18">
														<div class="dd-handle dd2-handle">
															<i class="normal-icon ace-icon fa fa-eye green bigger-130"></i>

															<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
														</div>
														<div class="dd2-content">Visitors</div>
													</li>
												</ol>
											</li>

										
									</ol>
								</div>
							</div>
							<div class="col-md-9">
								<div class="row">						
									<div class="well">
										<div id="dc_animated" class="banner"></div>
										<br>
										<div class="row">
											<div class="widget-box transparent">
												<div class="widget-header">
													<div class="btn-group btn-corner">
														<button class="btn btn-white btn-primary">
															<i class="ace-icon fa fa-envelope bigger-130"></i>
															Seguir
														</button>
														<button class="btn btn-white btn-primary">Seguir</button>
														<button class="btn btn-white btn-primary">Seguir</button>
													</div>
													<div class="widget-toolbar no-border">
														<ul class="nav nav-tabs" id="myTab2">
															<li class="active">
																<a data-toggle="tab" href="#tab_contactos">
																<i class="blue ace-icon fa fa-inbox bigger-130"></i>
																Contactos
																</a>
															</li>
															<li>
																<a data-toggle="tab" href="#profile2">
																	<i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
																	Información
																</a>
															</li>
															<li>
																<a data-toggle="tab" href="#tab_redes_sociales">
																	<i class="green ace-icon fa fa-globe bigger-130"></i>
																	Redes sociales
																</a>
															</li>
															<li>
																<a data-toggle="tab" href="#info2">
																	<i class="purple ace-icon fa fa-database bigger-130"></i>
																	Empresas similares
																</a>
															</li>
														</ul>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main padding-12 no-padding-left no-padding-right">
														<div class="tab-content padding-4">
															<div id="tab_contactos" class="tab-pane in active">
																<div class="scrollable-horizontal" data-size="800">
																	<div class="row">								

																		<div class="col-sm-6">
																			<h4 class="blue">
																				<span class="middle">Localización</span>
																				<i class="fa fa-map-marker light-orange bigger-110"></i>
																			</h4>
																			<div class="profile-user-info">
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						Web Site
																						<i class="ace-icon fa fa-globe bigger-125 green"></i>
																					</div>
																					<div class="profile-info-value">
																						<span class="editable" id="editable_web_site">https://www.miempresa.com</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						Dirección 
																						<i class="ace-icon glyphicon glyphicon-road bigger-125 red"></i>
																					</div>
																					<div class="profile-info-value">
																						
																						<i class="ace-icon fa fa-map-marker orange"></i>
																						<span id="editable_direccion"><?php print substr( $_SESSION['sucursal']['direccion'], 0, 50); ?>...</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																					Mapa
																					<i class="ace-icon glyphicon glyphicon-map-marker bigger-125 orange"></i>
																					</div>
																					<div class="profile-info-value">
																						<span id="editable_mapa">seleccionar</span>
																						<button type="button" class="btn btn-white btn-success btn-round" id="btn_buscar_mapa">
																							<i class="ace-icon fa fa-search blue "></i> 
																								Mapa
																						</button>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<h4 class="blue">
																				<span class="middle">Correos</span>
																			</h4>
																			<div class="profile-user-info">
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						Empresarial
																						<i class="ace-icon fa fa-user bigger-125 blue"></i>
																					</div>
																					<div class="profile-info-value">
																						<span>alexdoeasas</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name"> Correo 1 </div>
																					<div class="profile-info-value">
																						<span>alexdoeasas</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name"> Correo 2 </div>
																					<div class="profile-info-value">
																						<span>3 hours ago</span>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-3">
																			<h4 class="blue">
																				<span class="middle">Teléfonos</span>
																			</h4>
																			<div class="profile-user-info">
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						Empresarial
																						<i class="ace-icon fa fa-user bigger-125 blue"></i>
																					</div>
																					<div class="profile-info-value">
																						<span>alexdoeasas</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name"> Teléfono 1 </div>
																					<div class="profile-info-value">
																						<span>3 hours ago</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name"> Teléfono 2 </div>
																					<div class="profile-info-value">
																						<span>3 hours ago</span>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>

															<div id="profile2" class="tab-pane">
																<div class="scrollable" data-size="100" data-position="left">
																	<div class="row">
																		<div class="col-sm-8">
																			<h4 class="blue">
																				<span class="label label-purple arrowed-in-right">
																					<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
																					online
																				</span>
																				<span class="middle">Cuéntanos un poco, a que se dedica tu empresa..??</span>
																			</h4>
																			<div class="profile-user-info">
																				<div class="profile-info-row">
																					<div class="profile-info-name"> Descripción </div>

																					<div class="profile-info-value">
																						<span>Se dedica a… ?</span>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4">
																			mijines
																		</div>
																	</div>
																</div>
															</div>

															<div id="tab_redes_sociales" class="tab-pane">
																<div class="scrollable" data-size="100">
																	<div class="row">
																		<div class="col-sm-4">
																			<div class="profile-user-info">
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						Twitter 
																						<i class="ace-icon fa fa-twitter bigger-125 blue"></i>
																					</div>
																					<div class="profile-info-value">
																						<span class="editable" id="editable-twitter">alexdoeasas</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						Facebook
																						<i class="ace-icon fa fa-facebook bigger-125 blue"></i>
																					</div>
																					<div class="profile-info-value">
																						<span class="editable" id="editable-facebook">alexdoeasas</span>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4">
																			<div class="profile-user-info">
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						LinkedIn
																						<i class="ace-icon fa fa-linkedin-square bigger-125 blue"></i>
																					</div>
																					<div class="profile-info-value">
																						<span class="editable" id="editable-facebook">alexdoeasas</span>
																					</div>
																				</div>
																				<div class="profile-info-row">
																					<div class="profile-info-name">
																						Pinterest
																						<i class="ace-icon fa fa-pinterest-square bigger-125 red"></i>
																					</div>
																					<div class="profile-info-value">
																						<span class="editable" id="editable-facebook">alexdoeasas</span>
																					</div>
																				</div>
																			</div>																			
																		</div>
																		<div class="col-sm-4">
																			<div class="profile-info-row">
																				<div class="profile-info-name">
																					YouTube
																					<i class="ace-icon fa fa-youtube bigger-125 red"></i>
																				</div>
																				<div class="profile-info-value">
																					<span class="editable" id="editable-facebook">alexdoeasas</span>
																				</div>
																			</div>
																			<div class="profile-info-row">
																				<div class="profile-info-name">
																					Google+
																					<i class="ace-icon fa fa-facebook bigger-125 blue"></i>
																				</div>
																				<div class="profile-info-value">
																					<span class="editable" id="editable-facebook">alexdoeasas</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								<div class="row">

								</div>
								<div class="row">
									<div class="well">
										<div class="row">
											<div class="mapa" id="map"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php 
				$classmenu->footer();
			?>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>			
		</div><!-- /.main-container -->

		<!-- modal -->
		<div id="my-modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">A modal with a slider in it!</h3>
					</div>

					<div class="modal-body" id="map_select">
						
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cerrar
						</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>

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
		<script src="next/assets/js/jquery.nestable.min.js"></script>
		<script src="next/assets/js/trianglify.min.js"></script>
		<script src="next/assets/js/bootstrap-editable.min.js"></script>
		<script src="next/assets/js/ace-editable.min.js"></script>
		<script src="next/assets/js/ace-editable.min.js"></script>
		<script src="next/assets/js/html5imageupload.min.js"></script>
		<script src="next/assets/js/readmore.js"></script>
		<script src="http://js.arcgis.com/3.14/"></script>
		
		

		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>


		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script type="text/javascript" src="next/empresa/app.js"></script>
	</body>
</html>
