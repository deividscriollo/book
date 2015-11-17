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
											<a href="#" id="link_factura"><button class="btn btn-pink btn-block">Facturanext</button></a>
											<button type="button" class="btn btn-lg btn-white btn-primary">Facturanext</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<form class="form-horizontal" id="form-new-pass3" enctype="multipart/form-data">
									<div class="row">
										<div class="col-sm-4">
											<span class="profile-picture">
												<img id="aggvatar" class="editable img-responsive" alt="Alex's Avatar" src="next/dashboard/img/logo.jpg" />
											</span>
										</div>
										<div class="col-sm-8">
											<span class="profile-picture">
												<img id="agvatar" class="editable img-responsive" alt="Alex's Avatar" src="next/dashboard/img/banner.jpg" />
											</span>
										</div>
									</div>											
								</form>

								<div id="user-profile-1" class="user-profile row">
									<div class="col-xs-12 center">
										<div>
											<span class="profile-picture2">
												<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="next/dashboard/img/banner.jpg" />
											</span>
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
									<li data-step="3">
										<span class="step">3</span>
										<span class="title">Imagenes</span>
									</li>
									<li data-step="4">
										<span class="step">4</span>
										<span class="title">Resultado</span>
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
														<input type="password" name="txt_pass_1" id="txt_pass_1" value="" />
													</div>
												</div>
											</div>
											<div class="space-2"></div>

											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirmar Password:</label>

												<div class="col-xs-12 col-sm-9">
													<div class="clearfix">
														<input type="password" name="txt_pass_2" id="txt_pass_2"  value="" />
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

								<div class="step-pane" data-step="3">
									<div class="center">
										<form class="form-horizontal" id="form-new-pass34" enctype="multipart/form-data">
											<div class="row">
												<div class="col-sm-4">
													<input type="file" name="file_1" id="file_1" />
												</div>
												<div class="col-sm-8">
													<input type="file" name="file_1" id="file_2" />
												</div>
											</div>											
										</form>
									</div>
								</div>

								<div class="step-pane" data-step="4">
									<div class="center">
										<h4 class="blue">
											Buen Trabajo, Tu Información se ha almacenado con exito
										</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer wizard-actions">
							<button class="btn btn-success btn-sm btn-next" data-last="Terminar">
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



