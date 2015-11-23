<?php 
if(!isset($_SESSION)){
    session_start();        
}   

class menu{
	
	function navbar(){
		$perfil=$_SESSION['m']['representante_legal'];
    	$nombre = explode(' ', $_SESSION['m']['representante_legal']);
    	$nombre_empresa= $_SESSION['m']['nom_comercial'];
		print'
			<div id="navbar" class="navbar navbar-default">
				<script type="text/javascript">
					try{ace.settings.check("navbar" , "fixed")}catch(e){}
				</script>
				<div class="navbar-container" id="navbar-container">
					<div class="navbar-header pull-left">
						<a href="index.php" class="navbar-brand">
							<img src="next/assets/login/logo_empresa.png">
						</a>
					</div>	
					<div class="navbar-buttons navbar-header pull-right" role="navigation">
						<ul class="nav ace-nav">
							<li class="grey">
								<a href="perfil.php">
									<img class="nav-user-photo" src="next/assets/avatars/user.jpg" alt="Jasons Photo" />
									'.$nombre[2].'
								</a>
							</li>
							<li class="grey">
								<a href="empresa.php">
									<img class="nav-user-photo" src="next/assets/avatars/user.jpg" alt="Jasons Photo" />
									'.$nombre_empresa.'
								</a>
							</li>
							<li class="grey">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									Mis Empresa
									<i class="ace-icon glyphicon glyphicon-hand-up"></i>
								</a>
							</li>
							
							<li class="grey">
								<a href="#">
									Inicio
									<span class="badge badge-important">4</span>
								</a>
							</li>

							<li class="grey">
								<a href="#">
									<i class="ace-icon fa fa-building-o"></i>
									<span class="badge badge-success">5</span>
								</a>
							</li>
							<li class="grey">
								<a href="#">
									<i class="ace-icon glyphicon glyphicon-globe"></i>
									<span class="badge badge-grey">2</span>
								</a>
							</li>
							<li class="grey">
								<a href="#">
									<i class="ace-icon fa fa-lock"></i>
								</a>
							</li>
							<li class="grey">
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