<?php 
    session_start();
    // print_r($_SESSION);
    if($_SESSION){
        
      //con session
      // $vec = explode('/', $_SERVER['REQUEST_URI']);
      // $localname = $vec[count($vec)-2];      
      // $array=$_SESSION['acceso'];
      // if ($_SESSION['acceso'][$localname]!='1') {
      //   // header('Location: ../dashboard/');
      //   if ($_SESSION['acceso']['mibussines']==1)
      //     header('Location: ../mibussines/');
      //   if ($_SESSION['acceso']['update']==1)
      //     header('Location: ../update/');
      //   if ($_SESSION['acceso']['login']==1)
      //     header('Location: ../login/');
      // }
    }else{
      
      header('Location: ../login/');
    };
?>
<!DOCTYPE html>
<html ng-app="dcApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="facturanes, control, negocios">
    <meta name="author" content="una iniciativa de conceptual group, desarrollo modelo david criollo">
    <title>NextBook</title>
    <!-- Bootstrap and css styles -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    <!-- OPTINAL -->
    <link href="../dist/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/select2.min.css" rel="stylesheet">
    <link href="../dist/css/select2-bootstrap.css" rel="stylesheet">

    <link href="../dist/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/dayday.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/timelinex.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/home.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/big-cover.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/about.css" rel="stylesheet" media="screen">
    <link href="../dist/css/color.css" rel="stylesheet" media="screen">
    
    
        
    <link href="app.css" rel="stylesheet" type="text/css">

    <!-- map -->
    <link href="../dist/map/leaflet.css" rel="stylesheet" media="screen">
    <script src="../dist/map/leaflet.js"></script>

    <!-- storage -->
    <link rel="shortcut icon" href="img/favicon.png"> </head>

    <!-- croping -->
    <link href="../dist/html5imageupload/style.css" rel="stylesheet" media="screen">

    <!-- nexta -->
    <script type="text/javascript"  src="../dist/js/lockr.js"></script>
    <!-- Angular -->
    <script src="../dist/angular-1.5.0/angular.js"></script>
    <script src="../dist/angular-1.5.0/angular-route.js"></script>
    <script src="../dist/angular-1.5.0/angular-animate.js"></script>
    <script src="../dist/angular-1.5.0/ngStorage.min.js"></script>
    <script src="../dist/angular-1.5.0/angular-route-segment.min.js"></script>
    
  
    <!-- controlador procesos angular -->
    <script src="data/app.js"></script> 
    <script src="data/home/app.js"></script>
    <script src="data/mibussines/app.js"></script>
    <script src="data/perfil/app.js"></script>
    
    <link rel="shortcut icon" href="../dist/img/favicon.png">    
  </head>
  <body class="ng-cloak" ng-controller="MainCtrl">
    <!-- top navigation -->
    <nav class="navbar navbar-fixed-top navbar-default navbar-principal">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../"><b>Nextbook.ec</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="col-md-5 col-sm-4">         
           <form class="navbar-form">
              <div class="form-group">
                <div class="input-group">
                  <input class="form-control" name="search" placeholder="Empresas, servicios..." autocomplete="off" autofocus="autofocus" type="text">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span>
                  </span>
                </div>
              </div>
            </form>
          </div>
    			<ul class="nav navbar-nav navbar-right">
    				<li>
      				<a href="#/{{perfil.nombre}}{{perfil.apellido}}" data-toggle="tooltip" data-placement="bottom" title="Perfil de {{perfil.nombre}}">
      					<img class="nav-user-photo" src="../dist/avatars/default-avatar.png" id="element_img_personal_data">
      					<span class="user-info">
      						<small><span>{{perfil.nombre}}</span></small>
      					</span>
      				</a>								
    				</li>
            <li>
              <a href="#/" data-toggle="tooltip" data-placement="bottom" title="Inicio">
                Inicio 
              </a>
            </li>
    				<li id="btn_notificaciones">
    					<a href="" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="true" id="">
    						<i class="glyphicon glyphicon-globe"></i>

                <span class="badge badge-notify" id="element_notificaciones">1</span>

                <ul class="dropdown-menu" role="menu">
                    <div class="list-notification">
                      <li>
                        <img src="../dist/img/logos/facturanext.png" class="img-circle" >
                        <h4>
                          Facturanext.com
                          <br>
                          <small>Tienes nuevas facturas.</small>
                        </h4>
                      </li>
                      <li>
                        <img src="http://lorempixum.com/100/100/nature/1" class="img-circle" >
                        <h4>
                          Comercial 2 
                          <br>
                          <small>Tienes nuevas facturas.</small>
                        </h4>
                      </li>
                    </div>
                </ul>
    					</a>
    				</li>

    				<li>
    					<a href="#/{{perfil_sucursal}}" data-toggle="tooltip" data-placement="bottom" title="Empresa">
    						<i class="fa fa-building-o"></i>
    					</a>
    				</li>
    				<li class="dropdown">
    					<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
    						<i class="fa fa-cogs"></i> <i class="fa fa-caret-down"></i>
    					</a>
    					<ul class="dropdown-menu" role="menu">
    				    <li>
    							<a href="#">
    								<i class="fa fa-cog"></i>
    								Configuración
    							</a>
    						</li>
    						<li>
    							<a href="empresa.php">
    								<i class="fa fa-user"></i>
    								Perfil Empresa
    							</a>
    						</li>
                <li>
                  <a href="" id="btn_cambiar_empresa">
                    <i class="fa fa-database"></i>
                    Cambiar Empresa
                  </a>
                </li>
                <li class="divider"></li>
    						<li>
    							<a href="../exit/index.php">
    								<i class="fa fa-power-off"></i>
    								Cerrar Sesión
    							</a>
    						</li>
    				  </ul>
    				</li>
    			</ul>
        </div>
      </div>
    </nav><!-- end top navigation -->
    <div class="row anim" app-view-segment="0"></div>
      
    <div class="col-md-12">
      <footer class="footer">
        <P>&copy; Nextbook.ec</P>
      </footer>
    </div>
  </body>
  <!-- Bootstrap, Jquery and page scripts -->
    <script type="text/javascript"  src="../dist/js/jquery.min.js"></script>
    <script type="text/javascript"  src="../dist/js/attrjquery.js"></script>
    
    <script type="text/javascript"  src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="../dist/js/dayday/dayday.js"></script>
    <script type="text/javascript"  src="../dist/js/pace.min.js"></script>
    <script type="text/javascript"  src="../dist/html5imageupload/script.js"></script>
    <script type="text/javascript"  src="../dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"  src="../dist/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript"  src="../dist/js/jquery.validate.js"></script>
    <script type="text/javascript"  src="../dist/js/additional-methods.js"></script>
    <script type="text/javascript"  src="../dist/js/bootstrap-notify.js"></script>
    <script type="text/javascript"  src="../dist/js/select2.min.js"></script>
    <script type="text/javascript"  src="../dist/js/jquery.blockUI.js"></script>



    

  <!-- config script -->
  <script type="text/javascript" src="app.js"></script>
</html>
