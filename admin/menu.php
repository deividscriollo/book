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
		$nombre=split(' ', $_SESSION['nombre']);
		print
			'<nav id="sidebar" class="sidebar" role="navigation">
			    <!-- need this .js class to initiate slimscroll -->
			    <div class="js-sidebar-content">
			        <header class="logo hidden-xs">
			            MENU
			        </header>
			        <!-- seems like lots of recent admin template have this feature of user info in the sidebar.
			             looks good, so adding it and enhancing with notifications -->
			        <div class="sidebar-status visible-xs">
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                <span class="thumb-sm avatar pull-right">
			                    <img class="img-circle" src="'.$_SESSION['img'].'" alt="...">
			                </span>
			                <!-- .circle is a pretty cool way to add a bit of beauty to raw data.
			                     should be used with bg-* and text-* classes for colors -->
			                &nbsp;
			                '.$nombre[0].' <strong>'.$nombre[1].'</strong>
			                <b class="caret"></b>
			            </a>
			            <!-- #notifications-dropdown-menu goes here when screen collapsed to xs or sm -->
			        </div>
			        <!-- main notification links are placed inside of .sidebar-nav -->
			        <ul class="sidebar-nav">
			            <li class="active">
			                <!-- an example of nested submenu. basic bootstrap collapse component -->
			                <a href="#sidebar-dashboard" data-toggle="collapse" data-parent="#sidebar">
			                    <span class="icon">
			                        <i class="fa fa-desktop"></i>
			                    </span>
			                    Dashboard
			                    <i class="toggle fa fa-angle-down"></i>
			                </a>
			                <ul id="sidebar-dashboard" class="collapse in">
			                    <li class="active"><a href="index-2.html">Dashboard</a></li>
			                    <li><a href="widgets.html">Widgets</a></li>
			                </ul>
			            </li>
			            <li>
			                <a href="inbox.html">
			                    <span class="icon">
			                        <i class="fa fa-envelope"></i>
			                    </span>
			                    Email
			                    <span class="label label-danger">
			                        9
			                    </span>
			                </a>
			            </li>
			            <li>
			                <a href="charts.html">
			                    <span class="icon">
			                        <i class="glyphicon glyphicon-stats"></i>
			                    </span>
			                    Charts
			                </a>
			            </li>
			        </ul>
			        <!-- every .sidebar-nav may have a title -->
			        <h5 class="sidebar-nav-title">Template <a class="action-link" href="#"><i class="glyphicon glyphicon-refresh"></i></a></h5>
			        <ul class="sidebar-nav">
			            <li>
			                <!-- an example of nested submenu. basic bootstrap collapse component -->
			                <a class="collapsed" href="#sidebar-forms" data-toggle="collapse" data-parent="#sidebar">
			                    <span class="icon">
			                        <i class="glyphicon glyphicon-align-right"></i>
			                    </span>
			                    Forms
			                    <i class="toggle fa fa-angle-down"></i>
			                </a>
			                <ul id="sidebar-forms" class="collapse">
			                    <li><a href="form_elements.html">Form Elements</a></li>
			                    <li><a href="form_validation.html">Form Validation</a></li>
			                    <li><a href="form_wizard.html">Form Wizard</a></li>
			                </ul>
			            </li>
			            <li>
			                <a class="collapsed" href="#sidebar-ui" data-toggle="collapse" data-parent="#sidebar">
			                    <span class="icon">
			                        <i class="glyphicon glyphicon-tree-conifer"></i>
			                    </span>
			                    UI Elements
			                    <i class="toggle fa fa-angle-down"></i>
			                </a>
			                <ul id="sidebar-ui" class="collapse">
			                    <li><a href="ui_components.html">Components</a></li>
			                    <li><a href="ui_notifications.html">Notifications</a></li>
			                    <li><a href="ui_icons.html">Icons</a></li>
			                    <li><a href="ui_buttons.html">Buttons</a></li>
			                    <li><a href="ui_tabs_accordion.html">Tabs & Accordion</a></li>
			                    <li><a href="ui_list_groups.html">List Groups</a></li>
			                </ul>
			            </li>
			            <li>
			                <a href="grid.html">
			                    <span class="icon">
			                        <i class="glyphicon glyphicon-th"></i>
			                    </span>
			                    Grid
			                </a>
			            </li>
			            <li>
			                <a class="collapsed" href="#sidebar-maps" data-toggle="collapse" data-parent="#sidebar">
			                    <span class="icon">
			                        <i class="glyphicon glyphicon-map-marker"></i>
			                    </span>
			                    Maps
			                    <i class="toggle fa fa-angle-down"></i>
			                </a>
			                <ul id="sidebar-maps" class="collapse">
			                    <!-- data-no-pjax turns off pjax loading for this link. Use in case of complicated js loading on the
			                         target page -->
			                    <li><a href="maps_google.html" data-no-pjax>Google Maps</a></li>
			                    <li><a href="maps_vector.html">Vector Maps</a></li>
			                </ul>
			            </li>
			            <li>
			                <!-- an example of nested submenu. basic bootstrap collapse component -->
			                <a class="collapsed" href="#sidebar-tables" data-toggle="collapse" data-parent="#sidebar">
			                    <span class="icon">
			                        <i class="fa fa-table"></i>
			                    </span>
			                    Tables
			                    <i class="toggle fa fa-angle-down"></i>
			                </a>
			                <ul id="sidebar-tables" class="collapse">
			                    <li><a href="tables_basic.html">Tables Basic</a></li>
			                    <li><a href="tables_dynamic.html">Tables Dynamic</a></li>
			                </ul>
			            </li>
			            <li>
			                <a class="collapsed" href="#sidebar-extra" data-toggle="collapse" data-parent="#sidebar">
			                    <span class="icon">
			                        <i class="fa fa-leaf"></i>
			                    </span>
			                    Extra
			                    <i class="toggle fa fa-angle-down"></i>
			                </a>
			                <ul id="sidebar-extra" class="collapse">
			                    <li><a href="calendar.html">Calendar</a></li>
			                    <li><a href="invoice.html">Invoice</a></li>
			                    <li><a href="login.html" target="_blank" data-no-pjax>Login Page</a></li>
			                    <li><a href="error.html" target="_blank" data-no-pjax>Error Page</a></li>
			                    <li><a href="gallery.html">Gallery</a></li>
			                    <li><a href="search.html">Search Results</a></li>
			                    <li><a href="time_line.html" data-no-pjax>Time Line</a></li>
			                </ul>
			            </li>
			            <li>
			                <a class="collapsed" href="#sidebar-levels" data-toggle="collapse" data-parent="#sidebar">
			                    <span class="icon">
			                        <i class="fa fa-folder-open"></i>
			                    </span>
			                    Menu Levels
			                    <i class="toggle fa fa-angle-down"></i>
			                </a>
			                <ul id="sidebar-levels" class="collapse">
			                    <li><a href="#">Level 1</a></li>
			                    <li>
			                        <a class="collapsed" href="#sidebar-sub-levels" data-toggle="collapse" data-parent="#sidebar-levels">
			                            Level 2
			                            <i class="toggle fa fa-angle-down"></i>
			                        </a>
			                        <ul id="sidebar-sub-levels" class="collapse">
			                            <li><a href="#">Level 3</a></li>
			                            <li><a href="#">Level 3</a></li>
			                        </ul>
			                    </li>
			                </ul>
			            </li>
			        </ul>
			        <h5 class="sidebar-nav-title">Labels <a class="action-link" href="#"><i class="glyphicon glyphicon-plus"></i></a></h5>
			        <!-- some styled links in sidebar. ready to use as links to email folders, projects, groups, etc -->
			        <ul class="sidebar-labels">
			            <li>
			                <a href="#">
			                    <!-- yep, .circle again -->
			                    <i class="fa fa-circle text-warning mr-xs"></i>
			                    <span class="label-name">My Recent</span>
			                </a>
			            </li>
			            <li>
			                <a href="#">
			                    <i class="fa fa-circle text-gray mr-xs"></i>
			                    <span class="label-name">Starred</span>
			                </a>
			            </li>
			            <li>
			                <a href="#">
			                    <i class="fa fa-circle text-danger mr-xs"></i>
			                    <span class="label-name">Background</span>
			                </a>
			            </li>
			        </ul>
			        <h5 class="sidebar-nav-title">Projects</h5>
			        <!-- A place for sidebar notifications & alerts -->
			        <div class="sidebar-alerts">
			            <div class="alert fade in">
			                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
			                <span class="text-white fw-semi-bold">Sales Report</span> <br>
			                <div class="progress progress-xs mt-xs mb-0">
			                    <div class="progress-bar progress-bar-gray-light" style="width: 16%"></div>
			                </div>
			                <small>Calculating x-axis bias... 65%</small>
			            </div>
			            <div class="alert fade in">
			                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
			                <span class="text-white fw-semi-bold">Personal Responsibility</span> <br>
			                <div class="progress progress-xs mt-xs mb-0">
			                    <div class="progress-bar progress-bar-danger" style="width: 23%"></div>
			                </div>
			                <small>Provide required notes</small>
			            </div>
			        </div>
			    </div>
			</nav>
			<nav class="page-controls navbar navbar-default">
		    <div class="container-fluid">
		        <!-- .navbar-header contains links seen on xs & sm screens -->
		        <div class="navbar-header">
		            <ul class="nav navbar-nav">
		                <li>
		                    <!-- whether to automatically collapse sidebar on mouseleave. If activated acts more like usual admin templates -->
		                    <a class="hidden-sm hidden-xs" id="nav-state-toggle" href="#" title="Turn on/off sidebar collapsing" data-placement="bottom">
		                        <i class="fa fa-bars fa-lg"></i>
		                    </a>
		                    <!-- shown on xs & sm screen. collapses and expands navigation -->
		                    <a class="visible-sm visible-xs" id="nav-collapse-toggle" href="#" title="Show/hide sidebar" data-placement="bottom">
		                        <span class="rounded rounded-lg bg-gray text-white visible-xs"><i class="fa fa-bars fa-lg"></i></span>
		                        <i class="fa fa-bars fa-lg hidden-xs"></i>
		                    </a>
		                </li>
		                <li class="ml-sm mr-n-xs hidden-xs"><a href="#"><i class="fa fa-refresh fa-lg"></i></a></li>
		                <li class="ml-n-xs hidden-xs"><a href="#"><i class="fa fa-times fa-lg"></i></a></li>
		            </ul>
		            <ul class="nav navbar-nav navbar-right visible-xs">
		                <li>
		                    <!-- toggles chat -->
		                    <a href="#" data-toggle="chat-sidebar">
		                        <span class="rounded rounded-lg bg-gray text-white"><i class="fa fa-globe fa-lg"></i></span>
		                    </a>
		                </li>
		            </ul>
		            <!-- xs & sm screen logo -->
		            <a class="navbar-brand visible-xs" href="index-2.html">
		                <i class="fa fa-circle text-gray mr-n-sm"></i>
		                <i class="fa fa-circle text-warning"></i>
		                &nbsp;
		                sing
		                &nbsp;
		                <i class="fa fa-circle text-warning mr-n-sm"></i>
		                <i class="fa fa-circle text-gray"></i>
		            </a>
		        </div>

		        <!-- this part is hidden for xs screens -->
		        <div class="collapse navbar-collapse">
		            <!-- search form! link it to your search server -->
		            <form class="navbar-form navbar-left" role="search">
		                <div class="form-group">
		                    <div class="input-group input-no-border">
		                    <span class="input-group-addon">
		                        <i class="fa fa-search"></i>
		                    </span>
		                        <input class="form-control" type="text" placeholder="Buscar">
		                    </div>
		                </div>
		            </form>
		           <a class="navbar-brannd" href="#"><img src="../../dist/img/logo.png"></a>
		            <ul class="nav navbar-nav navbar-right">
		                <li class="dropdown">
		                    <a href="#" class="dropdown-toggle dropdown-toggle-notifications" id="notifications-dropdown-toggle" data-toggle="dropdown">
		                        <span class="thumb-sm avatar pull-left" id="facebook-session">
		                            <img class="img-circle" src="'.$_SESSION['img'].'" alt="...">
		                        </span>
		                        &nbsp;
		                        '.$nombre[0].' <strong>'.$nombre[1].'</strong>&nbsp;
		                        </a>
		                                     
		                </li>
		                <li class="dropdown">
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                        <i class="fa fa-cog fa-lg"></i>
		                    </a>
		                    <ul class="dropdown-menu">
		                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> &nbsp; Mi Cuenta</a></li>
		                        <li class="divider"></li>
		                        <li><a href="#">Calendario</a></li>
		                        <li><a href="#">Inbox &nbsp;&nbsp;<span class="badge bg-danger animated bounceIn">9</span></a></li>
		                        <li class="divider"></li>
		                        <li><a href="login.html"><i class="fa fa-sign-out"></i> &nbsp; Salir</a></li>
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