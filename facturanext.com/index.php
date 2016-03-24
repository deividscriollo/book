<?php 
	if(!isset($_SESSION)) {
	    session_start();       
	}
	if (!$_SESSION) {
		// sin iniciar session
		header("Location: login/");	
	}
?>
<!DOCTYPE html>
<html lang="es" ng-app="dcApp">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>facturanext.com</title>
		<link rel="shortcut icon" href="assets/avatars/docs.png"> </head>

		<meta name="description" content="facturanext, control, negocios">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/ui.jqgrid.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<!-- <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" type="text/css"/> -->
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets/css/select2.min.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/colorbox.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/config.css" />

		<!-- Angular -->
	    <script src="../dist/angular-1.5.0/angular.js"></script>
	    <script src="../dist/angular-1.5.0/angular-route.js"></script>
	    <script src="../dist/angular-1.5.0/angular-animate.js"></script>
	    <script src="../dist/angular-1.5.0/ngStorage.min.js"></script>
	    <script src="../dist/angular-1.5.0/angular-route-segment.min.js"></script>

	    <!-- controlador procesos angular -->
	    <script src="controller/controller.js"></script> 
	    <script src="controller/main.js"></script>
	    <script src="controller/inicio.js"></script>
	    <script src="controller/facturas.js"></script>
	    
	    <!-- <script src="data/mibussines/app.js"></script> -->
	    <!-- <script src="data/perfil/app.js"></script> -->
	    <!-- ace script -->
		<script src="assets/js/ace-extra.min.js"></script>
		<!-- <script src="../dist/js/pace.min.js"></script> -->
	</head>

	<body class="no-skin" ng-controller="MainCtrl">	
		<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
			<div class="navbar-container ace-save-state container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Facturanext
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li>
							<a href="#">
								<img class="nav-user-photo" src="assets/avatars/default-avatar.png" alt="Jason's Photo" />
								<span class="user-info">
		      						<span>Usuario X</span>
		      					</span>
							</a>
						</li>
						<li>
							<a href="#/">
							<span class="user-info">
								<i class="green ace-icon fa fa-home icon-animated-bell bigger-120"></i>
	      						<span>Inicio</span>
	      					</span>
	      					</a>
						</li>
						<li>
							<a href="#/buscar" >
								<span class="user-info">
									<i class="red ace-icon fa fa-search icon-animated-bell bigger-120"></i>
		      						<span>Buscar</span>
		      					</span>
							</a>
						</li>
						<li>
							<a href="#/reportes">
								<span class="user-info">
									<i class="blue ace-icon fa fa-file-pdf-o icon-animated-bell bigger-120"></i>
		      						<span>Reportes</span>
		      					</span>
							</a>
						</li>
						<li>
							<a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true">
								<i class="ace-icon fa fa-globe"></i>
								<span class="badge badge-important">8</span>
							</a><div class="dropdown-backdrop"></div>

							<ul class="dropdown-menu-right dropdown-navbar navbar-purple dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content">
									<ul class="dropdown-menu dropdown-navbar navbar-purple">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-purple fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</div></li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a data-toggle="dropdown" class="dropdown-toggle" href="">
								<i class="ace-icon fa fa-database orange icon-animated-bell"></i>
								Ingreso
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									Facturas
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-green">
										<li>
											<a href="#/facturas_fisicas" class="dropdown-header">
												<i class="fa fa-th blue"></i>
												Facturas Fisicas
											</a>
										</li>
										<li>
											<a href="#/facturas_electronicas">
												<i class="fa fa-cloud blue"></i>
												Facturas Electrónicas
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<i class="fa fa-cogs"></i>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="">
										<i class="ace-icon fa fa-cog"></i>
										Configurar
									</a>
								</li>

								<li>
									<a href="">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="exit/">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-container" id="main-container">
			<div class="main-content" app-view-segment="0">
				
			</div>
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">by nextbook.ec</span>
							& facturanext &copy; 2015-2016
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
		</div>

		<!---->
		<div id="modal-form" class="modal" tabindex="-1">
			<div class="modal-dialog form-horizontal">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="blue bigger">Agregar Proveedor</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="txt_m_1">RUC.:</label>
							<div class="col-xs-12 col-sm-9">	
								<div class="input-group">																												
									<input type="text" class="form-control validar" id="txt_m_1" name="txt_m_1"  maxlength="13" placeholder="Ruc Proveedor">
									<span class="input-group-btn">	
										<button type="button" id="btn_verificar" class="btn btn-sm btn-primary"><i class = "ace-icon fa fa-check"> Verificar</i></button>												        
								    </span>	 
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="txt_m_2">Razón Social:</label>
							<div class="col-xs-12 col-sm-9">																													
								<input type="text" class="form-control" id="txt_m_2" name="txt_m_2" placeholder="Nombres Proveedor"> 
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="txt_m_3">Dir. Matriz:</label>
							<div class="col-xs-12 col-sm-9">																													
								<input type="text" class="form-control" id="txt_m_3" name="txt_m_3" placeholder="Dir. Matriz"> 
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="txt_m_4">Nombre Comercial:</label>
							<div class="col-xs-12 col-sm-9">																													
								<input type="text" class="form-control" id="txt_m_4" name="txt_m_4" placeholder="Nombre Comercial"> 
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancelar
						</button>
						<button class="btn btn-sm btn-primary" id="btn_agregar_proveedor">
							<i class="ace-icon fa fa-save"></i>
							Guardar
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title">BUSCAR FACTURAS FÍSICAS</h4>
			        </div>
			        <div class="modal-body">
			            <table id="table"></table>
						<div id="pager"></div>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
			        </div>
		        </div>
		    </div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="Confirma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title">BUSCAR FACTURAS FÍSICAS</h4>
			        </div>

			        <div class="modal-body">
			            <table id="table"></table>
						<div id="pager"></div>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
			        </div>
		        </div>
		    </div>
		</div>

		<script src='assets/js/jquery.min.js'></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="assets/js/jqGrid/jquery.jqGrid.min.js"></script>
		<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/jquery.raty.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/bootstrap-multiselect.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>		
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/jquery.colorbox.min.js"></script>

		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>


		<script src="../dist/js/sweetalert.min.js"></script>
		<script src="../dist/js/jquery.blockUI.js"></script>
   		
   		
		<!-- <script src="data/app.js"></script> -->

		
	</body>
</html>