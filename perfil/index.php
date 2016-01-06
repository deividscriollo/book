<?php   
  if(!isset($_SESSION)){
        session_start(); 
      if(!isset($_SESSION["modelo"])) {
        header('Location: ../login/');
      }       
    } 
    // if (!$_SESSION['m']) {
    //   header('Location: index.php');
    // }    
    include_once('../admin/class.php');
  $class=new constante();
  // procesos de asignaciond e variables
  // include_once('../menu/app.php');
  // $classmenu=new menu();  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Negocios, Facturación, todo en uno, nextbook, Nextbook.com, Nextbook.com.ec, Nextbook.ec, 
      facturación electrónica, herramienta de negocios, organizar facturas nube gestionar compras, correo facturación, beneficios nextbook" />
    <meta name="author" content="Una iniciativa de concepto intelectual /business group, nextbook.ec">
    
    <title>Perfil - Nextbook.ec</title>
    <!-- Bootstrap and css styles -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../dist/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/dayday.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/timeline.css" rel="stylesheet" media="screen">
    <link href="../dist/css/color.css" rel="stylesheet" media="screen">
    <link href="app.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="../dist/img/favicon.png">
    
    <!-- Bootstrap, Jquery and page scripts -->
    <script type="text/javascript"  src="../dist/js/jquery.min.js"></script>
    <script type="text/javascript"  src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="../dist/js/dayday/dayday.js"></script>
    <script type="text/javascript"  src="../dist/js/lockr.js"></script>
    <script type="text/javascript"  src="app.js"></script>
    
  </head>
  <body>
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
              <div class="form-group" style="display:inline;">
                <div class="input-group" style="display:table;">
                  <input class="form-control" name="search" placeholder="Empresas, Servicios" autocomplete="off" autofocus="autofocus" type="text">
                  <span class="input-group-addon" style="width:1%;">
                    <span class="glyphicon glyphicon-search"></span>
                  </span>
                </div>
              </div>
            </form>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li>
            <a href="../perfil">
              <img class="nav-user-photo" src="../dist/img/Profile/default-avatar.png" id="element_img_personal_data">
              <span class="user-info">
                <small><span class="element_usuario"></span></small>
              </span>
            </a>                
            </li>
            <li>
              <a href="../dashboard/" class="tooltip-error" data-rel="tooltip" data-placement="bottom" title="" data-original-title="INICIO">
                <i class="ace-icon glyphicon glyphicon-globe"></i>
              </a>
            </li>
            <li>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle tooltip-error" data-rel="tooltip" data-placement="bottom" data-original-title="MIS EMPRESAS">
                <i class="ace-icon fa fa-building-o"></i>
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu" role="menu">
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
                  <a href="../exit/index.php">
                    <i class="ace-icon fa fa-power-off"></i>
                    Cerrar Sesión
                  </a>
                </li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav><!-- end top navigation -->

    <!-- Timeline content -->
    <div class="col-md-7 col-sm-9 timeline-container col-md-offset-1 animated fadeIn">
      <!-- Cover content -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-8 col-sm-8 hidden-xs cover-photo"></div>
          <div class="col-md-4 col-sm-4 col-xs-12 text-center profile-photo-container">
            <img src="../dist/img/Profile/default-avatar.png" class="profile-photo img-circle show-in-modal" id="element_img_personal_data"/>
            <h4 class="text-white text-center name element_usuario"></h4>
            <h5 class="text-white text-center ocupation"><span class="element_tipo"></span>, <span class="element_acceso"></span></h5>
            <hr class="name-separator">
            <div class="text-center">
              <button role="button" class="btn btn-default" type="button">
                <span>configuración</span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-12  col-sm-12 col-xs-12">
          <div class="panel-options">
            <div class="navbar navbar-cover">
              <!-- <div class="container-fluid"> -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#profile-opts-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse navdux" id="profile-opts-navbar">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="../perfil/"><i class="fa fa-tasks"></i> Perfil</a></li>
                    <li><a href="../miempresa/"><i class="fa fa-info-circle"></i> Mi empresa</a></li>
                    <li><a href="../similares/"><i class="fa fa-database"></i> Empresas Similares</a></li>
                    <li><a href="../colaboradores/"><i class="fa fa-users"></i> Colaboradores</a></li>
                    <li><a href="../fotos/"><i class="fa fa-file-image-o"></i> Fotos</a></li>
                  </ul>
                </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>

      <!-- user detail -->
      <div class="row"> 
        <div class="col-md-12 user-detail">
          <!-- left details -->
          <div class="col-md-5 col-sm-5 col-xs-12 col-detail">
            <div class="col-md-12">
              <div class="panel panel-default panel-user-detail">
                <div class="panel-body">
                  <ul class="list-unstyled">
                    <li><i class="fa fa-suitcase"></i>Works at <a href="#">software development</a></li>
                    <li><i class="fa fa-calendar"></i>Born on August 12, 1991</li>
                    <li><i class="fa fa-rss"></i>Followed by <a href="#">51 People</a></li>
                  </ul>
                </div>
                <div class="panel-footer text-center">
                  <a href="#" class="btn btn-success">Read more...</a>
                </div>
              </div>
            </div>
          </div><!-- end left details-->

          <!-- update status -->
          <div class="col-md-7 col-sm-7 col-xs-12 col-posts">
            <div class="col-md-12">
              <div class="well"> 
                 <form class="form-horizontal" role="form">
                  <h4>What's New</h4>
                   <div class="form-group" style="padding:14px;">
                    <textarea class="form-control" placeholder="Update your status"></textarea>
                  </div>
                  <button class="btn btn-primary pull-right" type="button">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div><!-- end user details -->
    </div><!-- end timeline content-->

    <div class="col-md-2 col-sm-3 sponsor-container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-volume-up"></i> Sponsored</p>
          <div style="border:1px solid #3b5998"></div>
        </div>
        <div class="col-md-12 sponsor-list">
          <img src="../dist/img/Sponsor/sponsor-1.jpg" class="img-responsive  img-rounded show-in-modal">
          <p class="sponsor-name">sponsor name</p>
          <p class="sponsor-url"><a href="#">sponsor-url.com</a></p>
          <p class="sponsor-description"> put here a short description, for example. Bootstrap is the most popular HTML, CSS, and JS framework</p>
        </div>
        <div class="col-md-12 sponsor-list">
          <img src="../dist/img/Sponsor/sponsor-2.png" class="img-responsive  img-rounded show-in-modal">
          <p class="sponsor-name">sponsor name</p>
          <p class="sponsor-url"><a href="#">sponsor-url.com</a></p>
          <p class="sponsor-description"> put here a short description, for example. Bootstrap is the most popular HTML, CSS, and JS framework</p>
        </div>
      </div>
    </div>

    <!--Info Modal Templates for show photos on click-->
    <div id="modal-show" class="modal modal-message modal-primary fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-image"></i>
                </div>
                <div class="modal-body text-center">
                  <div class="img-content">
                    
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>

    <div class="col-md-12 col-sm-12">
      <footer class="footer">
        <P>&copy; Company 2015</P>
      </footer>
    </div>
  </body>
</html>