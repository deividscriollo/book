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
							
						</div>
						<div class="row">
							<div class="col-md-3">
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
								<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
								    <!-- Carousel indicators -->
								    <ol class="carousel-indicators">
								        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								        <li data-target="#myCarousel" data-slide-to="1"></li>
								        <li data-target="#myCarousel" data-slide-to="2"></li>
								    </ol>   
								    <!-- Carousel items -->
								    <div class="carousel-inner">
								        <div class="item active">
								            <img src="next/dashboard/img/banner.jpg" alt="First Slide">
								            <div class="carousel-caption">
								                <h3>First slide label</h3>
								                <p>Lorem ipsum dolor sit amet...</p>
								            </div>
								        </div>
								        <div class="item">
								            <img src="next/dashboard/img/banner.jpg" alt="Second Slide">
								            <div class="carousel-caption">
								                <h3>Second slide label</h3>
								                <p>Aliquam sit amet gravida nibh, facilisis...</p>
								            </div>
								        </div>
								        <div class="item">
								            <img src="next/dashboard/img/banner.jpg" alt="Third Slide">
								            <div class="carousel-caption">
								                <h3>Third slide label</h3>
								                <p>Praesent commodo cursus magna vel...</p>
								            </div>
								        </div>
								    </div>
								    <!-- Carousel nav -->
								    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
								        <span class="glyphicon glyphicon-chevron-left"></span>
								    </a>
								    <a class="carousel-control right" href="#myCarousel" data-slide="next">
								        <span class="glyphicon glyphicon-chevron-right"></span>
								    </a>
								</div>
							</div>
						</div>
						<div class="row">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7443260775435!2d-78.12452172193899!3d0.34894804814544716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e2a3cb8112674c7%3A0x534db44e277f860e!2sJaime+Rivadeneira%2C+Ibarra!5e0!3m2!1ses!2sec!4v1447773698416" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
		
		

		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script type="text/javascript">
			jQuery(function($){
			
				$('.dd').nestable();
			
				$('.dd-handle a').on('mousedown', function(e){
					e.stopPropagation();
				});
				
				$('[data-rel="tooltip"]').tooltip();
			
			});
		</script>
	</body>
</html>



