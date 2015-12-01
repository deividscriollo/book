<!--if(!isset($_SESSION))
    {
        session_start();        
    } 
    echo $_SESSION['id'];
	if(!isset($_SESSION['id'])) {
	
    //header('Location: http://www.nextbook.ec/');
	}  -->
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

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/config.css" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
							Facturanext.com
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
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

						</li>

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
										Configura
									</a>
								</li>

								<li>
									<a href="profile.html">
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
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Inicio</a>
							</li>

							<li>
								<a href="#">Facturas</a>
							</li>							
							<li class="active">Facturas Electrónicas</li>
						</ul><!-- /.breadcrumb -->
					</div>

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
											<i class="red ace-icon fa fa-search bigger-120"></i>
											Buscar											
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#facturas">
											<i class="blue ace-icon fa fa-files-o bigger-120"></i>
											Facturas Físicas											
										</a>
									</li>
								</ul>

								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div class="row">
											<div class="col-sm-2">
												<form class="form-horizontal" id="id-envio">
													<div class="form-group ">
														<div class="col-sm-12">
															<input type="text" class="form-control"  name="txt_clave" placeholder="Clave de Acceso" id="txt_clave" />
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-12">
															<select id="slt_consumo" name="slt_consumo" class="select2" data-placeholder="Haga clic para elegir...">										
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
													<div class="form-group">
														<div class="col-sm-12">
															<button type="button" id="btn_envio" lass="form-control" class="btn btn-primary btn-block">Agregar Factura</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-sm-10" id="obj_tabla_contenedor">
												<table id="grid-table"></table>
												<div id="grid-pager"></div>	
											</div>
										</div>
									</div>

									<div id="buscar" class="tab-pane fade">									
										<div class="row">
											<div class="col-sm-2">
												<form class="form-horizontal" id="id-consulta">
													<div class="form-group">
														<div class="col-xs-12 col-sm-12">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar bigger-110"></i>
																</span>
																<input class="col-md-12 col-sm-12 col-xs-12" type="text" name="date-range-picker" id="id-date-range-picker-1" />													
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="col-xs-12 col-sm-12">																																					
															<select id="slt_consumo_1" name="slt_consumo_1" class="select2" data-placeholder="Haga clic para elegir...">										
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
													<div class="form-group">
														<div class="col-xs-12 col-sm-12">																																																														
															<select id="slt_tipo_documento_1" name="slt_tipo_documento_1" class="select2" data-placeholder="Haga clic para elegir...">																							
																<option value="01">FACTURA</option>
																<option value="04">NOTA DE CRÉBITO</option>
																<option value="05">NOTA DE DÉBITO</option>
																<option value="06">GUÍA DE REMISIÓN</option>
																<option value="07">COMPROBANTE DE RETENCIÓN</option>
																<option value="no">FACTURA FISICA</option>
															</select>
														</div>
													</div>
													<div class="form-group col-xs-12 col-sm-12">
														<div class="col-sm-12">
															<button type="button" id="btn_consulta" class="btn btn-primary btn-block">Buscar</button>
														</div>
													</div>	
												</form>
											</div>																								
											<div class="col-sm-10" id="obj_tabla_contenedor_1">
												<table id="grid-table_busqueda"></table>
												<div id="grid-pager_busqueda"></div>	
											</div>
										</div>
									</div>
									<div id="facturas" class="tab-pane fade">									
										<form class="form-horizontal" id="id-facturas">	
											<div class="row">
												<div class="form-group col-xs-12 col-sm-4">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Proveedor:</label>
													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<div class="input-group">
														      <!--<input type="text" class="form-control" id="txt_0" name="txt_0" placeholder="Ingrese nombre del cargo">-->
														      <select name="sel_proveedor" id="sel_proveedor" class="select2" data-placeholder="Haga clic para elegir...">
														      	<option value=""></option>
														      </select>															      
														      <span class="input-group-btn">													        
														        <a href="#modal-form" role="button"class="btn btn-purple btn-sm blue" data-toggle="modal"> Agregar </a>
														      </span>
														    </div><!-- /input-group -->
														</div>
													</div>
												</div>																																							
												<div class="form-group col-xs-12 col-sm-4">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Proveedor:</label>
													<div class="col-xs-12 col-sm-9">																													
														<input type="text" class="form-control" id="txt_1" name="txt_1" placeholder="Nombre Proveedor" readonly=""> 
													</div>
												</div>
												<div class="form-group col-xs-12 col-sm-4">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Tipo Consumo:</label>
													<div class="col-xs-12 col-sm-9">																													
														<select name="sel_consumo" id="sel_consumo" class="select2" data-placeholder="Haga clic para elegir...">
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
											<div class="row">
												<div class="form-group col-xs-12 col-sm-4">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="">Tipo Documento:</label>
													<div class="col-xs-12 col-sm-9">																													
														<select name="sel_documento" id="sel_documento" class="select2" data-placeholder="Haga clic para elegir...">
													    	<option value="01" selected="">FACTURA</option>
															<option value="04">NOTA DE CRÉBITO</option>
															<option value="05">NOTA DE DÉBITO</option>
															<option value="06">GUÍA DE REMISIÓN</option>
															<option value="07">COMPROBANTE DE RETENCIÓN</option>
															<option value="no">FACTURA FISICA</option>
													    </select>															      														    
													</div>
												</div>
												<div class="form-group col-xs-12 col-sm-4">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha Emisión:</label>
													<div class="col-xs-12 col-sm-9">																													
														<input type="text" class="form-control" id="txt_2" name="txt_2" placeholder="Fecha Emisión"> 
													</div>
												</div>
												<div class="form-group col-xs-12 col-sm-4">
													<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fecha Creación:</label>
													<div class="col-xs-12 col-sm-9">																													
														<input type="text" class="form-control" id="txt_3" name="txt_3" placeholder="Fecha Emisión"> 
													</div>
												</div>												
											</div>											
											<div class="row">
												<div class="col-xs-12 col-sm-2" style="text-align=left">													
													<label class="control-label col-xs-12 col-sm-12" style="text-align:left"for="email">Subtotal:</label>
													<div class="form-group  col-xs-12 col-sm-12">																													
														<input type="text" class="form-control" id="txt_4" name="txt_4" placeholder="Subtotal"> 
													</div>
													<label class="control-label col-xs-12 col-sm-12 " style="text-align:left"for="email">Iva 12%:</label>
													<div class="form-group  col-xs-12 col-sm-12">																													
														<input type="text" class="form-control" id="txt_5" name="txt_5" placeholder="Iva 12 %"> 
													</div>
													<label class="control-label col-xs-12 col-sm-12 "style="text-align:left" for="email">Iva 0%:</label>
													<div class="form-group  col-xs-12 col-sm-12">																													
														<input type="text" class="form-control" id="txt_6" name="txt_6" placeholder="Iva 0 %"> 
													</div>
													<label class="control-label col-xs-12 col-sm-12 " style="text-align:left"for="email">Total factura:</label>
													<div class="form-group  col-xs-12 col-sm-12">																													
														<input type="text" class="form-control" id="txt_7" name="txt_7" placeholder="Total"> 
													</div>
													<div class="form-group  col-xs-12 col-sm-12">																																											
														<button type="button" id="btn_agregar"  class="btn btn-primary btn-block">Agregar Factura</button>
													</div>
												</div>																																				
												<div class="form-group col-xs-12 col-sm-10" >	
													<div class="col-xs-12 col-sm-12" id="tabla_agregar">
														<table id="grid-table_agregar"></table>
														<div id="grid-pager_agregar"></div>	
													</div>
												</div>
												
											</div>
										</form>										
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
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">RUC.:</label>
							<div class="col-xs-12 col-sm-9">																													
								<input type="text" class="form-control validar" maxlength="13" id="txt_m_1" name="txt_m_1" placeholder="Ruc Proveedor"> 
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Nombres:</label>
							<div class="col-xs-12 col-sm-9">																													
								<input type="text" class="form-control" id="txt_m_2" name="txt_m_2" placeholder="Nombres Proveedor"> 
							</div>
						</div>	
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Dir. Matriz:</label>
							<div class="col-xs-12 col-sm-9">																													
								<input type="text" class="form-control" id="txt_m_3" name="txt_m_3" placeholder="Dir. Matriz"> 
							</div>
						</div>	

					</div>
					<div class="modal-footer">
						<button class="btn btn-sm" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Cancelar
						</button>

						<button class="btn btn-sm btn-primary" id="btn_agregar_proveedor">
							<i class="ace-icon fa fa-check"></i>
							Guardar
						</button>
					</div>
				</div>
			</div>
		</div><!-- PAGE CONTENT ENDS -->
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.jqGrid.min.js"></script>
		<script src="assets/js/grid.locale-en.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<script src="app.js"></script>
		<script src="agregar.js"></script>

		<!-- inline scripts related to this page -->
		
	</body>
</html>

<script type="text/javascript">
	//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					format: 'YYYY-MM-DD',
					locale: {
						applyLabel: 'Aplicar',
						cancelLabel: 'Cancelar',						
					},
					
				})
</script>