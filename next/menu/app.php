<?php 
if(!isset($_SESSION)){
    session_start();        
}   
include_once('next/admin/class.php');
class menu{	
	function navbar(){
		print'
			<div id="navbar" class="navbar navbar-default navbar-fixed-top">
				<script type="text/javascript">
					try{ace.settings.check("navbar" , "fixed")}catch(e){}
				</script>
				<div class="navbar-container" id="navbar-container">
					<div class="navbar-header pull-left">
						<a href="index.php" class="navbar-brand">
							<img src="next/assets/login/logo_empresa.png">
						</a>
					</div>
					<div class="navbar-header pull-center">
						<form class="navbar-form navbar-left form-search" role="search">
							<div class="form-group">
								<input type="text" placeholder="search">
							</div>

							<button type="button" class="btn btn-mini btn-info2">
								<i class="ace-icon fa fa-search icon-only bigger-110"></i>
							</button>
						</form>
					</div>
					<div class="navbar-buttons navbar-header pull-right" role="navigation">
						<ul class="nav ace-nav">
							<li>
								<a href="perfil.php">
									<img class="nav-user-photo" src="next/assets/avatars/user.jpg" id="element_img_personal_data"/>
									<span id="element_nav_nom_personal"><i class="ace-icon fa fa-spinner fa-spin write bigger-125"></i></span>
								</a>
							</li>
							<li>
								<a href="empresa.php">
									<img class="nav-user-photo" src="next/assets/avatars/empresa.jpg" id="element_img_empresarial_data"/>
									<span id="element_nav_nom_empresa"><i class="ace-icon fa fa-spinner fa-spin write bigger-125"></i></span>
								</a>
							</li>
							<li>
								<a href="dashboard.php">
									<i class="ace-icon glyphicon glyphicon-globe"></i>
									INICIO									
								</a>
							</li>
							<li>
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="ace-icon fa fa-building-o"></i>
									Mis Empresas									
								</a>
							</li>							
							<li>
								<a href="#">
									<i class="ace-icon fa fa-lock"></i>
								</a>
							</li>
							<li>
								<a data-toggle="dropdown" href="#" >

									<i class="ace-icon fa fa-caret-down"></i>
								</a>

								<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
									<li>
										<a href="#">
											<i class="ace-icon fa fa-cog"></i>
											Configuración
										</a>
									</li>

									<li>
										<a href="empresa.php">
											<i class="ace-icon fa fa-user"></i>
											Perfil Empresa
										</a>
									</li>

									<li class="divider"></li>

									<li>
										<a href="exitsalir.php">
											<i class="ace-icon fa fa-power-off"></i>
											Cerrar Sesión
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>			
				</div><!-- /.navbar-container -->
			</div>

		';
	}
	function footer(){
		print'
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Nextbook.ec</span>&copy; 2015-2016
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
		';
	}
}

 ?>