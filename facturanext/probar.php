
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>FacturaNext - Admin</title>

		<meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/ui.jqgrid.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/select2.min.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/config.css" />		
		<script src="assets/js/ace-extra.min.js"></script>
		
	</head>

	<body class="no-skin">	
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
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
						<!-- <li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								Mis Facturas <i class="ace-icon fa fa-search"></i>
							</a>
						</li>

						<li class="red">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								Facturas Rechazadas
								<i class="ace-icon fa fa-times-circle icon-animated-bell"></i>
							</a>
						</li>
						<li class="label-pink">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								Proveedores
								<i class="ace-icon fa fa-shopping-cart icon-animated-bell"></i>
							</a>
						</li>
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								Reportes
								<i class="ace-icon fa fa-file-pdf-o icon-animated-bell"></i>
							</a>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span id= 'id_nro_msg'class="badge badge-success"></span>
							</a>
						</li> -->

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									Cliente
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Configurar
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-home bigger-120"></i>
											Inicio
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#buscar">
											<i class="green ace-icon fa fa-search bigger-120"></i>
											Buscar
										</a>
									</li>

									<li class="dropdown">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										<i class="green ace-icon fa fa-file bigger-120"></i>
											Ingresos &nbsp;
											<i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
										</a>

										<ul class="dropdown-menu dropdown-info">
											<li>
												<a data-toggle="modal" href="#modal-form2">Facturas Electrónicas</a>
											</li>

											<li>
												<a data-toggle="tab" href="#facturas">Facturas Físicas</a>
											</li>
										</ul>
									</li>

									<li class="dropdown">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										<i class="green ace-icon fa fa-file-pdf-o bigger-120"></i>
											Reportes &nbsp;
											<i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
										</a>

										<ul class="dropdown-menu dropdown-info">
											<li>
												<a data-toggle="tab" href="#">Reporte Facturas Electrónicas</a>
											</li>

											<li>
												<a data-toggle="tab" href="#">Reporte Facturas Físicas</a>
											</li>
										</ul>
									</li>
								</ul>

								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div class="row">
											<div class="col-sm-12">
														
												<div class="col-sm-10" >
													<div id="grid_container">
														<table id="list4"></table>
													</div>

											        	

											       
												</div>
												<div class="col-sm-2">sdfsdfsdfsfsfsdfsdfsdfsdfsdfs</div>
												
											</div>
										</div>
									</div>

									<div id="buscar" class="tab-pane fade">									
										
									</div>

									<div id="facturas" class="tab-pane fade">									
																		
									</div>
								</div>
							</div>							
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

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
		</div><!-- /.main-container -->

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
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="txt_m_2">Nombres:</label>
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
		</div><!-- PAGE CONTENT ENDS -->

		<div id="modal-form2" class="modal" tabindex="-1">
			<div class="modal-dialog form-horizontal">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="blue bigger">Clave de Acceso de tu Documento</h4>
					</div>
					<br />
					<p align="center">Este número es el identificador de tu factura en el SRI.</p>
					<hr />

					<form  id="form_proceso" class="form-horizontal">
						<div class="row">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Clave de Acceso:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="txt_clave" id="txt_clave" class="col-xs-12 col-sm-11" maxlength="49"  autocomplete="off"/>
									</div>
								</div>
							</div>

							<div class="form-group" style="display:none">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Tipo de Consumo:</label>
								<div class="col-xs-12 col-sm-9">																													
									<select id="slt_consumo" name="slt_consumo" class="select2" data-placeholder="Seleccione una Opción ...">										
										<option value=""></option>
										<option value="4">Alimentación</option>
										<option value="1">Auto y Transporte</option>
										<option value="2">Educación</option>
										<option value="9">Electrónicos</option>
										<option value="3">Entretenimiento</option>
										<option value="12">Financiero / Banco</option>
										<option value="6">Hogar</option>
										<option value="17">Honorarios Profesionales</option>
										<option value="18">Impuestos y Tributos</option>
										<option value="15">Mascota</option>
										<option value="11">Otros</option>
										<option value="5">Salud</option>
										<option value="13">Seguro</option>
										<option value="16">Servicios Básicos</option>
										<option value="14">Telecomunicación / Internet</option>
										<option value="7">Vestimenta</option>
										<option value="8">Viajes</option>
										<option value="10">Vivienda</option>
									</select> 
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-sm" data-dismiss="modal">
								<i class="ace-icon fa fa-times"></i>
								Cancelar
							</button>

							<button type="submit" class="btn btn-sm btn-primary" id="btn_envio" >
								<i class="ace-icon fa fa-save"></i>
								Guardar Documento
							</button>
						</div>
					</form>
				</div>
			</div>
		</div><!-- PAGE CONTENT ENDS -->
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="assets/js/jquery.validate.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jqGrid/jquery.jqGrid.min.js"></script>
		<script src="assets/js/grid.locale-en.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/jqGrid/i18n/grid.locale-en.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="../dist/js/sweetalert.min.js"></script>
		<script src="../dist/js/jquery.blockUI.js"></script>
   		<script src="../dist/js/lockr.js"></script>
   		<script src="../dist/js/pace.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="probar.js"></script>
	</body>
</html>
