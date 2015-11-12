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
		
		

		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script src="next/dashboard/app.js"></script>
	</body>
</html>



