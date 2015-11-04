<?php 

	if(!isset($_SESSION)){
		session_start();		
	}
// inform.. menu navbar
/**
* calase menu y contenido general
*/
class menu
{
	
	function navbar(){
		$nombre=explode(' ', $_SESSION['empresa']);
		print
			'
			<nav class="page-controls navbar navbar-default">
			    <div class="container-fluid">
			        <!-- .navbar-header contains links seen on xs & sm screens -->
			        

			        <!-- this part is hidden for xs screens -->
			        <div class="collapse navbar-collapse">
			        	<ul class="nav navbar-nav navbar-left">
			        		<li><a class="navbar-brannd pull-left" href="#"><img src="assets/dist/img/empresa_index.png"></a></li>
			        		<li>
			        			<form class="navbar-form navbar-left" role="search">
					                <div class="form-group">
					                    <div class="input-group input-group-no-border">
					                    <span class="input-group-addon">
					                        <i class="fa fa-search"></i>
					                    </span>
					                        <input class="form-control" type="text" placeholder="Search Dashboard">
					                    </div>
					                </div>
					            </form>
			        		</li>
			        	</ul>
			        	
			        	

			            <ul class="nav navbar-nav navbar-right">
			            	<li class="dropdown">
			                    <a href="#" class="dropdown-toggle dropdown-toggle-notifications" id="notifications-dropdown-toggle" data-toggle="dropdown">
			                        <span class="thumb-sm avatar pull-left" id="facebook-session">
			                        
			                        	
			                            <img class="" src="'.$_SESSION['img'].'" alt="...">
			                        </span>
			                        <span class="sum_menu_obj">
			                        <strong>'.$nombre[1].'</strong>
			                        </span>;
			                    </a>
			                </li>
			                <li class="dropdown">
			                    <a href="#" class="dropdown-toggle dropdown-toggle-notifications" id="notifications-dropdown-toggle" data-toggle="dropdown">
			                        <span class="thumb-sm avatar pull-left" id="facebook-session">
			                        

			                            <img class="" src="'.$_SESSION['img'].'" alt="...">
			                        </span>
			                        &nbsp;
			                        '.$nombre[0].' <strong>'.$nombre[1].'</strong>&nbsp;
			                    </a>
			                </li>
			                <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                        <div class="icon_menu user_"></div>
			                    </a>
			                    <ul class="dropdown-menu">
			                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mi Cuenta</a></li>
			                        <li class="divider"></li>
			                        <li><a href="#">Calendario</a></li>
			                        <li><a href="#">Inbox &nbsp;&nbsp;<span class="badge bg-danger animated bounceIn">9</span></a></li>
			                        <li class="divider"></li>
			                        <li><a href="exit/"><i class="fa fa-sign-out"></i> &nbsp; Salir</a></li>
			                    </ul>
			                </li>
			                <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                        <div class="icon_menu msm_"></div>
			                    </a>
			                    <ul class="dropdown-menu">
			                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mi Cuenta</a></li>
			                        <li class="divider"></li>
			                        <li><a href="#">Calendario</a></li>
			                        <li><a href="#">Inbox &nbsp;&nbsp;<span class="badge bg-danger animated bounceIn">9</span></a></li>
			                        <li class="divider"></li>
			                        <li><a href="exit/"><i class="fa fa-sign-out"></i> &nbsp; Salir</a></li>
			                    </ul>
			                </li>
			                <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                        <div class="icon_menu word_"></div>
			                    </a>
			                    <ul class="dropdown-menu">
			                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mi Cuenta</a></li>
			                        <li class="divider"></li>
			                        <li><a href="#">Calendario</a></li>
			                        <li><a href="#">Inbox &nbsp;&nbsp;<span class="badge bg-danger animated bounceIn">9</span></a></li>
			                        <li class="divider"></li>
			                        <li><a href="exit/"><i class="fa fa-sign-out"></i> &nbsp; Salir</a></li>
			                    </ul>
			                </li>
			                <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                        <div class="icon_menu block_"></div>
			                    </a>
			                    <ul class="dropdown-menu">
			                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mi Cuenta</a></li>
			                        <li class="divider"></li>
			                        <li><a href="#">Calendario</a></li>
			                        <li><a href="#">Inbox &nbsp;&nbsp;<span class="badge bg-danger animated bounceIn">9</span></a></li>
			                        <li class="divider"></li>
			                        <li><a href="exit/"><i class="fa fa-sign-out"></i> &nbsp; Salir</a></li>
			                    </ul>
			                </li>
			                <li class="dropdown">
			                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                        <div class="icon_menu down_"></div>
			                    </a>
			                    <ul class="dropdown-menu animated zoomInUp">
			                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mi Cuenta</a></li>
			                        <li class="divider"></li>
			                        <li><a href="#">Calendario</a></li>
			                        <li><a href="#">Inbox &nbsp;&nbsp;<span class="badge bg-danger animated bounceIn">9</span></a></li>
			                        <li class="divider"></li>
			                        <li><a href="exit/"><i class="fa fa-sign-out"></i> &nbsp; Salir</a></li>
			                    </ul>
			                </li>
			                
			            </ul>
			        </div>
			    </div>
			</nav>
		';
	}
}
?>