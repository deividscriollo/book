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
											<div class="dd2-content bg-origin"><?php print_r($_SESSION['m']['nom_comercial']); ?></div>

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
										<div id="dc_animated"></div>
										<br>
										<div class="row">
											<div class="col-sm-3">
											<address>
												<strong>Redes Sociales.</strong>
												<br />
												<div>
													<div class="pull-right">Twitter, Inc.</div>
													<a href="https://twitter.com/CKGrafico" class="btn btn-link" target="_blank">
														<i class="ace-icon fa fa-twitter bigger-125 blue"></i>
														CKGrafico
													</a>
												</div>
												<div>
													<div class="pull-right">Facebook, Inc.</div>
													<a href="https://twitter.com/CKGrafico" class="btn btn-link" target="_blank">
														<i class="ace-icon fa fa-facebook bigger-125 blue"></i>
														CKGrafico
													</a>
												</div>
												
												<br />
												
												<abbr title="Phone">P:</abbr>
												(123) 456-7890
											</address>

											<address>
												<strong>Full Name</strong>

												<br />
												<a href="mailto:#">first.last@example.com</a>
											</address>
										</div>
										<div class="col-sm-6">
											<address>
												<strong>Twitter, Inc.</strong>

												<br />
												795 Folsom Ave, Suite 600
												<br />
												San Francisco, CA 94107
												<br />
												<abbr title="Phone">P:</abbr>
												(123) 456-7890
											</address>

											<address>
												<strong>Full Name</strong>

												<br />
												<a href="mailto:#">first.last@example.com</a>
											</address>
										</div>
										<div class="col-sm-3">
											<address>
												<strong>Twitter, Inc.</strong>

												<br />
												795 Folsom Ave, Suite 600
												<br />
												San Francisco, CA 94107
												<br />
												<abbr title="Phone">P:</abbr>
												(123) 456-7890
											</address>

											<address>
												<strong>Full Name</strong>

												<br />
												<a href="mailto:#">first.last@example.com</a>
											</address>
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
		<script src="next/assets/js/jquery.nestable.min.js"></script>
		<script src="next/assets/js/trianglify.min.js"></script>
		<script src="next/assets/js/bootstrap-editable.min.js"></script>
		<script src="next/assets/js/ace-editable.min.js"></script>
		<script src="next/assets/js/ace-editable.min.js"></script>
		<script src="next/assets/js/html5imageupload.min.js"></script>
		<script src="http://js.arcgis.com/3.14/"></script>
		
		

		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>


		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script type="text/javascript" src="next/empresa/app.js"></script>
	</body>
</html>



