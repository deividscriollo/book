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

		<link rel="stylesheet" href="next/assets/font-awesome/4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="next/assets/fonts/fonts.googleapis.com.css" />

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
								<a href="perfil.php"><h5 class="header smaller lighter blue">
									<i class="ace-icon glyphicon glyphicon-user bigger-160"></i>
									<?php print $nombre[2].' '.$nombre[0]; ?>
								</h5></a>
								<a href="empresa.php">
								<h5 class="header smaller lighter blue">
									<i class="ace-icon fa fa-envelope bigger-160"></i>
									Perfil Empresa
								</h5></a>
								<img src="next/assets/images/mobilimg.fw.png" width="100%">						
								<div class="widget-box">

									<div class="widget-header">
										<h4 class="widget-title lighter grey">Aplicaciones</h4>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<a href="http://www.facturanext.com"><button class="btn btn-pink btn-block">Facturanext</button></a>
											<button type="button" class="btn btn-lg btn-white btn-primary">Facturanext</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
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
			<div id="modal-wizard" class="modal">
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

									<li data-step="3">
										<span class="step">3</span>
										<span class="title">Payment Info</span>
									</li>

									<li data-step="4">
										<span class="step">4</span>
										<span class="title">Other Info</span>
									</li>
								</ul>
							</div>

							<div class="modal-body step-content">
								<div class="step-pane active" data-step="1">
									<div class="center">
										<h4 class="blue">Step 1</h4>
									</div>
								</div>

								<div class="step-pane" data-step="2">
									<div class="center">
										<h4 class="blue">Step 2</h4>
									</div>
								</div>

								<div class="step-pane" data-step="3">
									<div class="center">
										<h4 class="blue">Step 3</h4>
									</div>
								</div>

								<div class="step-pane" data-step="4">
									<div class="center">
										<h4 class="blue">Step 4</h4>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer wizard-actions">
							<button class="btn btn-sm btn-prev">
								<i class="ace-icon fa fa-arrow-left"></i>
								Prev
							</button>

							<button class="btn btn-success btn-sm btn-next" data-last="Finish">
								Next
								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
							</button>

							<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
								<i class="ace-icon fa fa-times"></i>
								Cancel
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
		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script src="next/dashboard/app.js"></script>
	</body>
</html>



