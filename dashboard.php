<?php 	
	if(!isset($_SESSION)){
        session_start();
    }
    if (!$_SESSION['m']) {
    	header('Location: index.php');
    }    
    include_once('next/admin/class.php');
	$class=new constante();
	// procesos de asignaciond e variables
	include_once('next/menu/app.php');
	$classmenu=new menu();	
?>
<!DOCTYPE html>
<html lang="es">
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
		<!-- menu principal -->
		<?php 
			$classmenu->navbar();
		?>
		<!-- estructura genera accesso -->
		<div class="main-container ace-save-state container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<div class="action-buttons">
							<a href="#" class="green">
								<i class="ace-icon fa fa-signal bigger-130"></i>
							</a>						
							<span class="vbar"></span>
							<a href="#" class="blue">
								<i class="ace-icon fa fa-pencil bigger-130"></i>
							</a>
							<span class="vbar"></span>
							<a href="#" class="hellow">
								<i class="ace-icon fa fa-users bigger-130"></i>
							</a>
							<span class="vbar"></span>
							<a href="#" class="red">
								<i class="ace-icon fa fa-cogs bigger-130"></i>
							</a>
						</div>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						<span class="btn btn-info ace-icon fa fa-cogs"></span>

						<span class="btn btn-info"></span>
						<span class="btn btn-warning"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						PERSONALIZAR
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->
				<ul class="nav nav-list">
					<li class="active">
						<a href="perfil.php" class="blue">							
							<span class="menu-text">
								<span class="user-info">
									<span class="element_text_nom_personal">
										<i class="ace-icon fa fa-spinner fa-spin write bigger-125"></i>
									</span>
								</span>
							</span>
							<i class="menu-icon fa fa-user bigger-125 pull-right"></i>
						</a>
					</li>
					<li>
						<a href="empresa.php" class="green">							
							<span class="menu-text">
								<span class="user-info">
									<span class="element_text_nom_empresa">
										
									</span>
								</span>
							</span>
							<i class="menu-icon fa fa-building-o bigger-125 pull-right"></i>
						</a>
					</li>
				</ul><!-- /.nav-list -->
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						Aplicaciones
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-save-state ace-icon fa fa-angle-double-right" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-sm-9">
					         	<div class="timeline-container">												
									<div class="timeline-label">
										<span class="label label-primary arrowed-in-right label-lg">
											<b>Publicaciones recientes</b>
										</span>
									</div>
									<div class="timeline-items">
										<div class="timeline-item clearfix">
											<div class="timeline-info">
												<img alt="Susan't Avatar" src="next/assets/avatars/avatar1.png" />
											</div>

											<div class="widget-box transparent">
												<div class="widget-header widget-header-small">
													<h5 class="widget-title smaller">
														<a href="#" class="blue">Nextbook</a>
														<span class="grey element_text_nom_personal"></span>
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
														Estimado/a 
														<h3>
															Estamos muy contentos de que te hayas unido a nextbook.ec 
														</h3>
														<h2>
															Haz que tus empresas trabajen con nuestras aplicaciones, esta echa para ti y tus procesos comerciales. :)
														</h2>
														

														Feliz EMprendimiento, 
														Tu Equipo de Nextbook
														<div class="space-6"></div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- /.timeline-items -->
								</div><!-- /.timeline-container -->								
					      	</div>					      
							<div class="col-sm-3">
								<!-- <div class="widget-main" id="element_acordeon_empresas"></div>						         -->
								<div class="row affix">
									<div class="widget-box ">
										<div class="widget-header widget-header-flat widget-header-small">
											<h5 class="widget-title">
												<i class="ace-icon fa fa-signal"></i>
												Mis Empresas
											</h5>

											<div class="widget-toolbar no-border">
												<div class="inline dropdown-hover">
													<button class="btn btn-minier btn-primary">
														Opciones
														<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
													</button>

													<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
														<li class="active">
															<a href="#" class="blue">
																<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																Sincronizar SRI
															</a>
														</li>

														<li>
															<a href="#">
																<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																Configuración Generarl
															</a>
														</li>

														<li>
															<a href="#">
																<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																Ver Estados
															</a>
														</li>

														<li>
															<a href="#">
																<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																Otros
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="item-list" id="element_acordeon_empresas">
													<li><i class="ace-icon fa fa-spinner fa-spin write bigger-125"></i>	</li>
												</ul>
											</div><!-- /.widget-main -->
										</div><!-- /.widget-body -->
									</div><!-- /.widget-box -->
								</div>
	   					    </div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->


			
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="next/assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='next/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='next/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<!-- required -->
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
		<script src="next/assets/js/pace.min.js"></script>
		<script src="next/assets/js/wow.min.js"></script>
		<script src="next/assets/js/angular.min.js"></script>
		
		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>
		<script src="next/assets/js/app.js"></script>

		<!-- personal plugins -->
		<script src="next/dashboard/app.js"></script>
	</body>
</html>
<style type="text/css">
	/* Template-specific stuff
 *
 * Customizations just for the template; these are not necessary for anything
 * with disabling the responsiveness.
 */

/* Account for fixed navbar */
.wrapper { 
        background:#EFEFEF; 
        box-shadow: 1px 1px 10px #999; 
        margin: auto; 
        text-align: center; 
        position: relative;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        margin-bottom: 20px !important;
        width: 800px;
        padding-top: 5px;
    }
    .scrolls { 
        overflow-x: scroll;
        overflow-y: hidden;
        height: 80px;
    white-space:nowrap
    } 
    .imageDiv img { 
        box-shadow: 1px 1px 10px #999; 
        margin: 2px;
        max-height: 50px;
        cursor: pointer;
    display:inline-block;
    *display:inline;
    *zoom:1;
    vertical-align:top;
    }

    html, body {margin: 0; padding: 0;}

.no-skin{
    width: auto;
    height:210px;
    border: 13px solid #bed5cd;
    overflow-x: scroll;
    overflow-y: hidden;
    white-space: nowrap;
}
.no-skin a {
    display: inline-block;
    vertical-align: middle;
}
</style>