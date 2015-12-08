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
		<link rel="stylesheet" href="next/assets/css/bootstrap-editable.min.css" />
		<link rel="stylesheet" href="next/assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="next/assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="next/assets/css/select2.min.css" />
		<link rel="stylesheet" href="next/assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="next/assets/css/bootstrap-editable.min.css" />
		<link rel="stylesheet" href="next/assets/css/demo.html5imageupload.css"/>


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
						<div class="user-profile row">
							<div class="col-sm12">
								<div class="tabbable">
									<ul class="nav nav-tabs padding-16">
										<li class="active">
											<a data-toggle="tab" href="#master-perfil">
												<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
												Perfil Master
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#edit-basic">
												<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
												Colaboradores
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#edit-settings">
												<i class="purple ace-icon fa fa-cog bigger-125"></i>
												Configuracion
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#edit-password">
												<i class="blue ace-icon fa fa-key bigger-125"></i>
												Password
											</a>
										</li>
									</ul>

									<div class="tab-content profile-edit-tab-content">
										<div id="master-perfil" class="tab-pane ">
											<div class="row">
												<div class="col-xs-12 col-sm-3 center">
													<span class="profile-picture">
														<form name="form-img-perfil-update" id="form-img-perfil-update">
															<img class="editable img-responsive" id="avatar" src="next/assets/avatars/profile-pic.jpg" />
														</form>
													</span>

													<div class="space space-4"></div>
												</div><!-- /.col -->
												<div class="col-xs-12 col-sm-9">
													<h4 class="blue">
														<span class="middle"><?php print $nombre[2].' '.$nombre[3].' '.$nombre[0].' '.$nombre[1]; ?></span>

														<span class="label label-success arrowed-in-right">
															<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
															online
														</span>
													</h4>
													<div class="profile-user-info">
														<div class="profile-info-row">
															<div class="profile-info-name"> Nombre </div>

															<div class="profile-info-value">
																<span><?php print $nombre[2].' '.$nombre[3].' '.$nombre[0].' '.$nombre[1]; ?></span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Dirección </div>
															<div class="profile-info-value">
																<i class="fa fa-map-marker light-orange bigger-110"></i>
																<span id="editable_nacionalidad">.....pai</span>
																<span id="editable_provincia" class="hide">.......pro</span>
																<span id="editable_ciudad" class="hide">.......ciiu</span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> F. Nacimiento </div>
															<div class="profile-info-value">
																<span id="editable_f_nacimiento">no ingresado</span>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name"> Edad </div>
															<div class="profile-info-value">
																<span>38</span> años de edad
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Teléfono Móvil </div>
															<div class="profile-info-value">
																<span>(098)711-3522</span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> Teléfono Fijo </div>
															<div class="profile-info-value">
																<span>(062)653-518</span>
															</div>
														</div>
														<div class="profile-info-row">
															<div class="profile-info-name"> + Teléfono </div>
															<div class="profile-info-value">
																<span>(000)000-0000</span>
															</div>
														</div>
													</div>

													<div class="hr hr-8 dotted"></div>

													<div class="profile-user-info">
														<div class="profile-info-row">
															<div class="profile-info-name"> Website </div>

															<div class="profile-info-value">
																<a href="#" target="_blank">www.alexdoe.com</a>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name">
																<i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
															</div>

															<div class="profile-info-value">
																<a href="#">Find me on Facebook</a>
															</div>
														</div>

														<div class="profile-info-row">
															<div class="profile-info-name">
																<i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
															</div>

															<div class="profile-info-value">
																<a href="#">Follow me on Twitter</a>
															</div>
														</div>
													</div>
												</div><!-- /.col -->
											</div>
										</div>
										<div id="edit-basic" class="tab-pane in active">
											<div class="row">
												<div class="col-sm-4">
													<form class="form-horizontal" role="form" id="form-data">
														<div class="space"></div>
														<div class="form-group">
															<label class="col-sm-3 control-label">Foto</label>
															<div class="col-sm-9">
																<div class="dropzone" data-width="200" data-ajax="false" data-height="200" data-ghost="false">
																    <input type="file" name="thumb" id="thumb" required="required" />
																</div>
															</div>
														</div>														
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nombres:</label>

															<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<input type="text" name="txt_1" id="txt_1" class="col-xs-12 col-sm-12" />
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right">Cargo</label>
															<div class="col-xs-12 col-sm-9">
																<select name="sel_cargo" id="sel_cargo" class="select2" data-placeholder="Haga clic para elegir...">
																	<option value="">&nbsp;</option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right">Correo:</label>

															<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<input type="text" name="txt_2" id="txt_2" class="col-xs-12 col-sm-12" />
																</div>
															</div>
														</div>
														<div class="space-4"></div>
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right">Teléfono:</label>

															<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<input type="text" name="txt_3" id="txt_3" class="col-xs-12 col-sm-12" />
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email"></label>

															<div class="col-xs-12 col-sm-9">
																<input type="submit" class="btn btn-white btn-success btn-block btn-round" name="btn_guardar_data" value="GUARDAR">
															</div>
														</div>
													</form>
												</div>
												<div class="col-sm-8">
													<table id="tbl_data" class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th class="center">
																	<label class="pos-rel">
																		
																	</label>
																</th>
																<th>Nombre</th>
																<th>Cargo</th>
																<th class="hidden-480">Correo</th>

																<th>
																	<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																	Teléfono
																</th>
																<th class="hidden-480">Accion</th>
															</tr>
														</thead>

														<tbody>
														</tbody>
													</table>									
												</div>
											</div>
										</div>
										<div id="edit-settings" class="tab-pane">
											<div class="space-10"></div>
											<div class="row">
												<div class="col-sm-6">
													<h4 class="header blue bolder smaller">Información Cargo</h4>
													<form class="form-search" id="form-cargo">
														<div class="row">
														    <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Ingrese cargo:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<div class="input-group">
																	      <input type="text" class="form-control" id="txt_0" name="txt_0" placeholder="Ingrese nombre del cargo">
																	      <span class="input-group-btn">
																	        <button class="btn btn-purple btn-sm" type="submit" name="btn_guardar_cargo">Guardar</button>
																	      </span>
																	    </div><!-- /input-group -->
																	</div>
																</div>
															</div>
														</div>
													</form>
													<div class="space-10"></div>
													<table id="tbl_data_cargo" class="table table-striped table-bordered table-hover">
														<thead>
															<tr>
																<th class="center">
																	Nro
																</th>
																<th>Cargo</th>
																<th>Fecha</th>
																<th class="center">Accion</th>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>	
												</div>
												<div class="col-sm-6">
													
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6"></div>
												<div class="col-sm-6"></div>
											</div>										
										</div>

										<div id="edit-password" class="tab-pane">
											<div class="space-10"></div>
											<form class="form-horizontal">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Password Anterior</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass1" />
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Nuevo Password</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass1" />
													</div>
												</div>

												<div class="space-4"></div>

												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirmar Password</label>

													<div class="col-sm-9">
														<input type="password" id="form-field-pass2" />
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div><!-- /.span -->
						</div><!-- /.user-profile -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php 
				$classmenu->footer();
			?>

			<!-- modales -->
			<!-- <a href="#modal-form" role="button" class="blue" data-toggle="modal"> Form Inside a Modal Box </a> -->
			<div id="modal-form" class="modal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="blue bigger">Modal</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="form-field-username">Nombre</label>
								<div>
									<input type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
								</div>
							</div>																		
						</div>
						<div class="modal-footer">
							<button class="btn btn-sm" data-dismiss="modal">
								<i class="ace-icon fa fa-times"></i>
								Cancelar
							</button>

							<button class="btn btn-sm btn-primary">
								<i class="ace-icon fa fa-check"></i>
								Guardar
							</button>
						</div>
					</div>
				</div>
			</div><!-- PAGE CONTENT ENDS -->

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

		<!--[if lte IE 8]>
		  <script src="next/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="next/assets/js/jquery.gritter.min.js"></script>
		<script src="next/assets/js/bootbox.min.js"></script>
		<script src="next/assets/js/jquery.easypiechart.min.js"></script>
		<script src="next/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="next/assets/js/jquery.hotkeys.min.js"></script>
		<script src="next/assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="next/assets/js/select2.min.js"></script>
		<script src="next/assets/js/fuelux.spinner.min.js"></script>
		<script src="next/assets/js/bootstrap-editable.min.js"></script>
		<script src="next/assets/js/ace-editable.min.js"></script>
		<script src="next/assets/js/jquery.maskedinput.min.js"></script>
		<script src="next/assets/js/sweetalert.min.js"></script>		
		<script src="next/assets/js/html5imageupload.min.js?v1.4.3"></script>
		<script src="next/assets/js/jquery.dataTables.min.js"></script>
		<script src="next/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="next/assets/js/dataTables.tableTools.min.js"></script>
		<script src="next/assets/js/jquery.validate.min.js"></script>
		
		<script src="next/assets/js/pace.min.js"></script>

		<!-- ace scripts-->
		<script src="next/assets/js/html5imageupload.min.js?v1.4.3"></script>
		<script src="next/assets/js/jquery.dataTables.min.js"></script>
		<script src="next/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="next/assets/js/dataTables.tableTools.min.js"></script>
		<script src="next/assets/js/jquery.validate.min.js"></script>
		
		<script src="next/assets/js/pace.min.js"></script>

		<!-- ace scripts  -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>
		<script src="next/assets/js/app.js"></script>

		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script src="next/perfil/app.js"></script>
	</body>
</html>