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
    <meta name="description" content="bootstrap social network template">
    <meta name="author" content="">
    <title>NextBook</title>
    <!-- Bootstrap and css styles -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../dist/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/dayday.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/timeline.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/home.css" rel="stylesheet" media="screen">
    <link href="../dist/css/color.css" rel="stylesheet" media="screen">
    <link href="app.css" rel="stylesheet" media="screen">
    
    
    <link rel="shortcut icon" href="../dist/img/favicon.png">
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
                  <input class="form-control" name="search" placeholder="Empresas, servicios..." autocomplete="off" autofocus="autofocus" type="text">
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
					<img class="nav-user-photo" src="../next/assets/avatars/user.jpg" id="element_img_personal_data">
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
    <div style="margin-top:56px;"></div>
    <div class="col-md-9 col-sm-12 col-xs-12 animated fadeIn">
      <!-- user options -->
      <!-- user options -->
      <div class="col-md-2 col-sm-3 col-xs-12 col-md-offset-1 left-content hidden-xs">
        <div  class="left-user-options text-center" data-spy="affix">         
          <img src="../dist/img/Profile/default-avatar.png" class="img-thumbnail img-circle img-user">
          <div class="row">
            <div class="col-md-12">
              <ul class="list-unstyled">
                  <li> <span clas="fa fa-suitcase element_usuario"></span><span class="green element_usuario"></span></li>
                  <li> <span class="blue element_tipo"></span></li>
                  <li> <small class="pink element_acceso"></small></li>
              </ul>
            </div>
          </div>
          <div class="text-center">
            <button role="button" class="btn btn-default" type="button">
              <i class="fa fa-user"></i>
              <span> Mi perfil </span>
            </button>
          </div>
          <div class="list-group text-left">
            <a href="messages.html" class="list-group-item">
              <i class="fa fa-database"></i>
              Empresa
            </a>
            <a href="../facturanext/" class="list-group-item">
              <i class="fa fa-server"></i>
              Facturanext
            </a>
          </div>
        </div>
      </div><!-- en user options -->

      <!-- middle container -->
      <div class="col-md-6 col-sm-6">
        <!-- update status -->
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
        </div><!-- end update status -->
        <!-- first post -->
        <div class="col-md-12">
          <div class="panel panel-white post panel-shadow">
              <div class="post-heading">
                <div class="pull-left image">
                    <img src="../dist/img/Profile/default-avatar.png" class="img-rounded avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#" class="post-user-name">Nickson Bejarano</a>
                        uploaded a photo.
                    </div>
                    <h6 class="text-muted time">5 seconds ago</h6>
                </div>
              </div>
              <div class="post-image">
                  <img src="dist/img/Post/place-234-87.jpg" class="image" alt="image post">
              </div>
              <div class="post-description">
                <p>This is a short description</p>
                <div class="stats">
                    <a href="#" class="btn btn-default stat-item">
                        <i class="fa fa-thumbs-up icon"></i>
                        228
                    </a>
                    <a href="#" class="btn btn-default stat-item">
                        <i class="fa fa-share icon"></i>
                        128
                    </a>
                </div>
              </div>
              <div class="post-footer">
                <div class="input-group"> 
                    <input class="form-control" placeholder="Add a comment" type="text">
                    <span class="input-group-addon">
                        <a href="#"><i class="fa fa-edit"></i></a>  
                    </span>
                </div>
                <ul class="comments-list">
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="dist/img/Friends/guy-3.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="comment-user-name"><a href="#">Antony andrew lobghi</a></h4>
                                <h5 class="time">7 minutes ago</h5>
                            </div>
                            <p>This is a comment bla bla bla</p>
                        </div>
                    </li>
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="dist/img/Friends/guy-2.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="comment-user-name"><a href="#">Jeferh Smith</a></h4>
                                <h5 class="time">3 minutes ago</h5>
                            </div>
                            <p>This is another comment bla bla bla</p>
                        </div>
                    </li>
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="dist/img/Friends/woman-2.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="comment-user-name"><a href="#">Maria fernanda coronel</a></h4>
                                <h5 class="time">10 seconds ago</h5>
                            </div>
                            <p>Wow! so cool my friend</p>
                        </div>
                    </li>
                </ul>
            </div>
          </div>
        </div><!-- end first post -->
      </div><!-- end middle container -->
      
    <!-- right container -->
    <div class="col-md-3 col-sm-3 col-xs-12 right-content">
      <div class="col-md-12 col-sm-12 sponsor-container">
        <div class="row">
          <div class="col-md-12">
            <p><i class="fa fa-volume-up"></i> Sponsored</p>
            <div style="border:1px solid #3b5998"></div>
          </div>
          <div class="col-md-12 sponsor-list">
            <img src="../dist/img/Sponsor/sponsor-1.jpg" class="img-responsive  img-rounded ">
            <p class="sponsor-name">sponsor name</p>
            <p class="sponsor-url"><a href="#">sponsor-url.com</a></p>
            <p class="sponsor-description"> put here a short description, for example. Bootstrap is the most popular HTML, CSS, and JS framework</p>
          </div>
          <div class="col-md-12 sponsor-list">
            <img src="../dist/img/Sponsor/sponsor-2.png" class="img-responsive  img-rounded ">
            <p class="sponsor-name">sponsor name</p>
            <p class="sponsor-url"><a href="#">sponsor-url.com</a></p>
            <p class="sponsor-description"> put here a short description, for example. Bootstrap is the most popular HTML, CSS, and JS framework</p>
          </div>
        </div>
      </div>

    </div><!-- end right container -->

    <!-- <div class="col-md-12">
      <footer class="footer">
        <P>&copy; nextbook 2015- 2016 por conceptual business group</P>
      </footer>
    </div> -->
  </body>
  <!-- Bootstrap, Jquery and page scripts -->
    <script type="text/javascript"  src="../dist/js/jquery.min.js"></script>
    <script type="text/javascript"  src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="../dist/js/dayday/dayday.js"></script>
    <script type="text/javascript"  src="../dist/js/lockr.js"></script>

  <!-- config script -->
    <script type="text/javascript" src="app.js"></script>
</html>
