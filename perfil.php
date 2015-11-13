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
										<div id="master-perfil" class="tab-pane in active">
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
																<span>Ecuador</span>
																<span>Colombia</span>
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
										<div id="edit-basic" class="tab-pane">
											<h4 class="header blue bolder smaller">General</h4>
											<form class="form-horizontal">
												<div class="row">
													<div class="col-xs-12 col-sm-4">
														<input type="file" />
													</div>

													<div class="vspace-12-sm"></div>

													<div class="col-xs-12 col-sm-8">
														<div class="form-group">
															<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Username</label>

															<div class="col-sm-8">
																<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
															</div>
														</div>

														<div class="space-4"></div>

														<div class="form-group">
															<label class="col-sm-4 control-label no-padding-right" for="form-field-first">Name</label>

															<div class="col-sm-8">
																<input class="input-small" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
																<input class="input-small" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
															</div>
														</div>
													</div>
												</div>
												<hr />
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-date">Birth Date</label>

													<div class="col-sm-9">
														<div class="input-medium">
															<div class="input-group">
																<input class="input-medium date-picker" id="form-field-date" type="text" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" />
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right">Gender</label>

													<div class="col-sm-9">
														<label class="inline">
															<input name="form-field-radio" type="radio" class="ace" />
															<span class="lbl middle"> Male</span>
														</label>

														&nbsp; &nbsp; &nbsp;
														<label class="inline">
															<input name="form-field-radio" type="radio" class="ace" />
															<span class="lbl middle"> Female</span>
														</label>
													</div>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Comment</label>
													<div class="col-sm-9">
														<textarea id="form-field-comment"></textarea>
													</div>
												</div>
												<div class="space"></div>
												<h4 class="header blue bolder smaller">Contact</h4>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email</label>

													<div class="col-sm-9">
														<span class="input-icon input-icon-right">
															<input type="email" id="form-field-email" value="alexdoe@gmail.com" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</div>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-website">Website</label>

													<div class="col-sm-9">
														<span class="input-icon input-icon-right">
															<input type="url" id="form-field-website" value="http://www.alexdoe.com/" />
															<i class="ace-icon fa fa-globe"></i>
														</span>
													</div>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone</label>

													<div class="col-sm-9">
														<span class="input-icon input-icon-right">
															<input class="input-medium input-mask-phone" type="text" id="form-field-phone" />
															<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
														</span>
													</div>
												</div>
												<div class="space"></div>
												<h4 class="header blue bolder smaller">Social</h4>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook">Facebook</label>

													<div class="col-sm-9">
														<span class="input-icon">
															<input type="text" value="facebook_alexdoe" id="form-field-facebook" />
															<i class="ace-icon fa fa-facebook blue"></i>
														</span>
													</div>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-twitter">Twitter</label>

													<div class="col-sm-9">
														<span class="input-icon">
															<input type="text" value="twitter_alexdoe" id="form-field-twitter" />
															<i class="ace-icon fa fa-twitter light-blue"></i>
														</span>
													</div>
												</div>
												<div class="space-4"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-gplus">Google+</label>

													<div class="col-sm-9">
														<span class="input-icon">
															<input type="text" value="google_alexdoe" id="form-field-gplus" />
															<i class="ace-icon fa fa-google-plus red"></i>
														</span>
													</div>
												</div>
											</form>
										</div>

										<div id="edit-settings" class="tab-pane">
											<div class="space-10"></div>

											<div>
												<label class="inline">
													<input type="checkbox" name="form-field-checkbox" class="ace" />
													<span class="lbl"> Make my profile public</span>
												</label>
											</div>

											<div class="space-8"></div>

											<div>
												<label class="inline">
													<input type="checkbox" name="form-field-checkbox" class="ace" />
													<span class="lbl"> Email me new updates</span>
												</label>
											</div>
											<div class="space-8"></div>
											<div>
												<label>
													<input type="checkbox" name="form-field-checkbox" class="ace" />
													<span class="lbl"> Keep a history of my conversations</span>
												</label>

												<label>
													<span class="space-2 block"></span>

													for
													<input type="text" class="input-mini" maxlength="3" />
													days
												</label>
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

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="next/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="next/assets/js/jquery-ui.custom.min.js"></script>
		<script src="next/assets/js/jquery.ui.touch-punch.min.js"></script>
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
		
		

		<!-- ace scripts -->
		<script src="next/assets/js/ace-elements.min.js"></script>
		<script src="next/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<!-- plugins media -->
		<script src="next/perfil/app.js"></script>
	</body>
</html>



