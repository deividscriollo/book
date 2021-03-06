<?php 
if(!isset($_SESSION)) {
    session_start();       
}
?>

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
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php print $_SESSION['id_empresa_miempresa'] ?>
								</span>

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
									<a href="">
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

		<br />

		<div class="main-container" id="main-container">
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-home icon-animated-bell bigger-120"></i>
											Inicio
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#buscar">
											<i class="red ace-icon fa fa-search icon-animated-bell bigger-120"></i>
											Buscar											
										</a>
									</li>

									<li class="dropdown">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">
											<i class="pink ace-icon fa fa-files-o icon-animated-bell bigger-120"></i>
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
											<i class="blue ace-icon fa fa-file-pdf-o icon-animated-bell bigger-120"></i>
											Reportes &nbsp;
											<i class="ace-icon fa fa-caret-down bigger-110 width-auto"></i>
										</a>

										<ul class="dropdown-menu dropdown-info">
											<li>
												<a  href="#" onclick='window.open("facturas.php","","width=900,height=800,scrollbars=NO");' >Reporte Facturas Electrónicas</a>
											</li>

											<li>
												<a  href="#" onclick='window.open("proveedores_pdf.php","","width=900,height=800,scrollbars=NO");'>Reporte Proveedores</a>
											</li>
										</ul>
									</li>
								</ul>

								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div class="row">
											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-5"></div>
													<div class="col-sm-2"></div>	
												</div>	
											</div>

											<div class="col-sm-12" id="obj_tabla_contenedor">
												<h3 class="header smaller lighter blue"></h3>
												<table id="grid-table"></table>
												<div id="grid-pager"></div>	
											</div>
										</div>
									</div>

									<div id="buscar" class="tab-pane fade">									
										<div class="row">
											<div class="col-sm-12">
												<form class="form-horizontal" id="id-consulta">
													<div class="form-group col-xs-12 col-sm-3">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Fechas:</label>
														<div class="col-xs-12 col-sm-9">																													
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar bigger-110"></i>
																</span>
																<input class="col-md-12 col-sm-12 col-xs-12" type="text" name="date-range-picker" id="id-date-range-picker-1" readonly />													
															</div>
														</div>
													</div>

													<div class="form-group col-xs-12 col-sm-4">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Tipo Consumo:</label>
														<div class="col-xs-12 col-sm-9">																													
															<select id="slt_consumo_1" name="slt_consumo_1" class="chosen-select">										
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

													<div class="form-group col-xs-12 col-sm-4">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Tipo Documento:</label>
														<div class="col-xs-12 col-sm-9">																													
															<select id="slt_tipo_documento_1" name="slt_tipo_documento_1" class="chosen-select">																							
																<option value="01">FACTURA</option>
																<option value="04">NOTA DE CRÉBITO</option>
																<option value="05">NOTA DE DÉBITO</option>
																<option value="06">GUÍA DE REMISIÓN</option>
																<option value="07">COMPROBANTE DE RETENCIÓN</option>	
																<option value="00">FACTURAS FÍSICAS</option>																	
															</select>
														</div>
													</div>

													<div class="form-group col-xs-12 col-sm-1">
														<button type="button" id="btn_consulta" class="btn btn-purple btn-sm blue"><i class = "ace-icon fa fa-search"> Buscar</i></button>
													</div>
												</form>
											</div>

											<div class="col-sm-12" id="obj_tabla_contenedor_1">
												<h3 class="header smaller lighter blue"></h3>
												<table id="grid-table_busqueda"></table>
												<div id="grid-pager_busqueda"></div>	
											</div>
										</div>
									</div>

									<div id="facturas" class="tab-pane fade">									
										<form id="id-facturas" rol="form" method="POST">	
											<div class="row">
												<div class="col-sm-12">
													<div class="col-sm-3">
														<div class="form-group col-xs-12">
															<label for="txt_nombre_proveedor">Razón Social:</label>
															<input type="hidden" id="id_proveedor" name="id_proveedor">
															<select name="txt_nombre_proveedor" id="txt_nombre_proveedor" class="chosen-select">
														    	<option value=""></option>
														    </select>	
														</div>	
													</div>

													<div class="col-sm-3">
														<div class="form-group col-xs-12">
															<label for="txt_nombre_proveedor">Nombre Comercial:</label>
															<select name="txt_nombre_comercial" id="txt_nombre_comercial" class="chosen-select">
														    	<option value=""></option>
														    </select>	
														</div>	
													</div>

													<div class="col-sm-3">
														<div class="form-group col-xs-10">
															<label for="txt_2">Fecha Emisión:</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar bigger-110"></i>
																</span>																													
																<input type="text" class="form-control date-picker" id="txt_2" name="txt_2" placeholder="Fecha Emisión" readonly>
															</div>	
														</div>	
													</div>

													<div class="col-sm-3">
														<div class="form-group col-xs-10">
															<label for="txt_3">Fecha Creación:</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-calendar bigger-110"></i>
																</span>																													
																<input type="text" class="form-control date-picker" id="txt_3" name="txt_3" placeholder="Fecha Emisión" readonly>
															</div>	
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-12">
													<div class="col-sm-3 ">
														<div class="form-group col-xs-10">
															<label  for="email">RUC:</label>
															<div class="input-group">
															    <select name="txt_nro_identificacion" id="txt_nro_identificacion" class="chosen-select">
															    	<option value=""></option>
															    </select>															      
															    <span class="input-group-btn">													        
															        <a href="#modal-form" role="button"class="btn btn-purple btn-sm blue" data-toggle="modal"> Agregar </a>
															    </span>
														    </div><!-- /input-group -->
														</div>
													</div>

													<div class="col-sm-3">
														<div class="form-group col-xs-10">
															<label for="txt_4">Serie:</label>
															<input type="text" class="form-control" id="txt_4" name="txt_4" placeholder="Serie de la Factura">	
														</div>	
													</div>

													<div class="col-sm-3">
														<div class="form-group col-xs-10">
															<label for="sel_consumo">Tipo Consumo:</label>
																<select name="sel_consumo" id="sel_consumo" class="chosen-select" >
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
													
													<div class="col-sm-3">
														<div class="form-group col-xs-10">
															<label for="sel_documento">Tipo Documento:</label>
															<select name="sel_documento" id="sel_documento" class="chosen-select">
														    	<option value="01" selected="">FACTURA</option>
																<option value="04">NOTA DE CRÉBITO</option>
																<option value="05">NOTA DE DÉBITO</option>
																<option value="06">GUÍA DE REMISIÓN</option>
																<option value="07">COMPROBANTE DE RETENCIÓN</option>																														
														    </select>	
														</div>	
													</div>
												</div>	
											</div>

											<div class="row">
												<div class="col-sm-12">
													<h3 class="header smaller lighter blue"></h3>
													<div class="col-sm-10">	
														<div id="grid_container">
															<table id="grid-table_agregar"></table>
															<div id="grid-pager_agregar"></div>	
														</div>	
													</div>

													<div class="col-sm-2">
														<div class="form-group">
							                                <label class="col-md-5">Tarifa 0:</label>
							                                <div class="form-group col-md-7">
							                                  <div class="input-group">
							                                    <div class="input-group-addon">
							                                      <i class="glyphicon glyphicon-usd"></i>
							                                    </div>
							                                    <input type="text" name="txt_5" id="txt_5" value="0.00" readonly class="form-control"/>
							                                  </div>                                
							                                </div> 
							                            </div>

							                            <div class="form-group">
							                                <label class="col-md-5">Tarifa 12:</label>
							                                <div class="form-group col-md-7">
							                                  <div class="input-group">
							                                    <div class="input-group-addon">
							                                      <i class="glyphicon glyphicon-usd"></i>
							                                    </div>
							                                    <input type="text" name="txt_6" id="txt_6" value="0.00" readonly class="form-control"/>
							                                  </div>                                
							                                </div> 
							                            </div>

							                            <div class="form-group">
							                                <label class="col-md-5">Subtotal:</label>
							                                <div class="form-group col-md-7">
							                                  <div class="input-group">
							                                    <div class="input-group-addon">
							                                      <i class="glyphicon glyphicon-usd"></i>
							                                    </div>
							                                    <input type="text" name="txt_7" id="txt_7" value="0.00" readonly class="form-control"/>
							                                  </div>                                
							                                </div> 
							                            </div>

							                            <div class="form-group">
							                                <label class="col-md-5">12 %Iva:</label>
							                                <div class="form-group col-md-7">
							                                  <div class="input-group">
							                                    <div class="input-group-addon">
							                                      <i class="glyphicon glyphicon-usd"></i>
							                                    </div>
							                                    <input type="text" name="txt_8" id="txt_8" value="0.00" readonly class="form-control"/>
							                                  </div>                                
							                                </div> 
							                            </div>

							                            <div class="form-group">
							                                <label class="col-md-5">Descuento:</label>
							                                <div class="form-group col-md-7">
							                                  <div class="input-group">
							                                    <div class="input-group-addon">
							                                      <i class="glyphicon glyphicon-usd"></i>
							                                    </div>
							                                    <input type="text" name="txt_9" id="txt_9" value="0.00" readonly class="form-control"/>
							                                  </div>                                
							                                </div> 
							                            </div>

							                            <div class="form-group">
							                                <label class="col-md-5">Total Factura:</label>
							                                <div class="form-group col-md-7">
							                                  <div class="input-group">
							                                    <div class="input-group-addon">
							                                      <i class="glyphicon glyphicon-usd"></i>
							                                    </div>
							                                    <input type="text" name="txt_10" id="txt_10" value="0.00" readonly class="form-control"/>
							                                  </div>                                
							                                </div> 
							                            </div>
													</div>
												</div>	
											</div>

											<div class="row">
												<div class="col-sm-12">
												<h3 class="header smaller lighter blue"></h3>
													<div class="col-xs-12 col-sm-4"></div>
													<div class="col-xs-12 col-sm-2">
														<button type="button" id="btn_agregar"  class="btn btn-primary btn-block"><i class="ace-icon fa fa-save"></i> Agregar Factura</button>
													</div>
													<div class="col-xs-12 col-sm-2">
														<button type="button" id="btn_buscar" data-toggle="modal" href="#myModal" class="btn btn-primary btn-block"><i class="ace-icon fa fa-search"></i> Buscar Factura</button>																																											
													</div>
												</div>
											</div>
										</form>										
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
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

		<!-- Modal -->
		<!-- <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> -->
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
		    <div class="modal-dialog modal-lg">
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
		<div class="modal fade bs-example-modal-sm" id="confirma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content">
			        <div class="modal-header widget-header-blue">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title">Control de Acceso</h4>
			        </div>

			        <div class="widget-body">
						<div class="widget-main no-padding">
							<form>
								<fieldset>
									<label>Contraseña:</label>
									<input type="password" name="txt_confirmar" id="txt_confirmar" placeholder="" />
								</fieldset>

								<div class="form-actions center">
									<button type="button" class="btn btn-sm btn-danger" id="btn_cancelar" >
										Cancelar
										<i class="ace-icon fa fa-times"></i>
									</button>
									<button type="button" class="btn btn-sm btn-success" id="btn_confirmar">
										Confirmar
										<i class="ace-icon fa fa-check"></i>
									</button>
								</div>
							</form>
						</div>
					</div>

			       
		        </div>
		    </div>
		</div>

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
		<script src="../dist/js/sweetalert.min.js"></script>
		<script src="../dist/js/jquery.blockUI.js"></script>
   		<script src="../dist/js/lockr.js"></script>
   		<script src="../dist/js/pace.min.js"></script>

		<script src="app.js"></script>
	</body>
</html>