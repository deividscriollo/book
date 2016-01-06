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
    
    <title>Mi Empresa - Nextbook.ec</title>
    <!-- Bootstrap and css styles -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../dist/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
    <link href="../dist/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/dayday.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/timeline.css" rel="stylesheet" media="screen">
    <link href="../dist/css/dayday/about.css" rel="stylesheet" media="screen">
    <link href="../dist/css/color.css" rel="stylesheet" media="screen">
    <link href="app.css" rel="stylesheet" media="screen">
    
    <!-- Bootstrap, Jquery and page scripts -->
    <script type="text/javascript"  src="../dist/js/jquery.min.js"></script>
    <script type="text/javascript"  src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="../dist/js/dayday/dayday.js"></script>
    <script type="text/javascript"  src="../dist/js/lockr.js"></script>
    <script type="text/javascript"  src="app.js"></script>
    <link rel="shortcut icon" href="img/favicon.png">
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

    <!-- about content -->
    <div class="col-md-7 col-sm-9 timeline-container col-md-offset-1  animated fadeIn">
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
                    <li><a href="../perfil/"><i class="fa fa-tasks"></i> Perfil</a></li>
                    <li class="active"><a href="../miempresa/"><i class="fa fa-info-circle"></i> Mi empresa</a></li>
                    <li><a href="../similares/"><i class="fa fa-database"></i> Empresas Similares</a></li>
                    <li><a href="../colaboradores/"><i class="fa fa-users"></i> Colaboradores</a></li>
                    <li><a href="../fotos/"><i class="fa fa-file-image-o"></i> Fotos</a></li>
                  </ul>
                </div>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div><!-- en cover content-->

      <!-- user detail -->
      <div class="row"> 
        <div class="col-md-12 user-detail">
          <!-- tabs user info -->
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default panel-about">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i>&nbsp;Mi empresa</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12 about-tab-container">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 about-tab-menu">
                    <div class="list-group text-right">
                      <a href="#" class="list-group-item active">
                        <h4 class="fa fa-child"></h4> Corporativo
                      </a>
                      <a href="#" class="list-group-item">
                        <h4 class="fa fa-briefcase"></h4> Trabajos
                      </a>
                      <a href="#" class="list-group-item">
                        <h4 class="fa fa-map-marker"></h4> Mapa
                      </a>
                      <a href="#" class="list-group-item">
                        <h4 class="fa fa-newspaper-o"></h4> Información Contacto
                      </a>
                      <a href="#" class="list-group-item">
                        <h4 class="fa fa-calendar"></h4> Aventos
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 about-tab">
                    <!-- Overview section -->
                    <div class="about-tab-content active">
                       <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-briefcase blue"></i>&nbsp; Work at software developer</li>
                        <li class="list-group-item"><i class="fa fa-mobile orange"></i>&nbsp; +57 328 999 444 2</li>
                        <li class="list-group-item"><i class="fa fa-cubes purple"></i>&nbsp;@username (twitter)</li>
                        <li class="list-group-item"><i class="fa fa-birthday-cake green"></i>&nbsp; August 12, 1990</li>
                        <li class="list-group-item"><i class="fa fa-envelope pink"></i>&nbsp; username@email.com</li>
                      </ul>
                    </div>
                    <!-- Work section -->
                    <div class="about-tab-content">
                       <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-briefcase"></i>&nbsp; Software developer at <a href="#">Deystrap</a></li>
                        <li class="list-group-item"><i class="fa fa-cubes"></i>&nbsp;Web designer at <a href="#">Dey-Dey</a></li>
                      </ul>
                    </div>

                    <!-- Places search -->
                    <div class="about-tab-content">
                      <ul class="photos">
                        <li>
                            <a href="#">
                              <img src="img/Post/staticmap.png" alt="map 1" class="img-responsive show-in-modal tip">
                            </a>
                        </li>
                      </ul>
                    </div>
                    <!-- Contact section -->
                    <div class="about-tab-content">
                      <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-phone"></i>&nbsp; 533 44 55</li>
                        <li class="list-group-item"><i class="fa fa-mobile"></i>&nbsp; +57 328 999 444 2</li>
                        <li class="list-group-item"><i class="fa fa-cubes"></i>&nbsp;@username (twitter) <i class="fa fa-twitter text-twitter"></i></li>
                        <li class="list-group-item"><i class="fa fa-envelope"></i>&nbsp; username@email.com</li>
                      </ul>
                    </div>
                    <!-- Events section-->
                    <div class="about-tab-content">
                      <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-calendar text-danger"></i>&nbsp; <a href="#">August 12 welcome to my like</a></li>
                        <li class="list-group-item"><i class="fa fa-calendar text-danger"></i>&nbsp; <a href="#">August 5 Nach concert at barcelona</a></li>
                        <li class="list-group-item"><i class="fa fa-calendar text-danger"></i>&nbsp; <a href="#">July 13 El grones concert on medellin</a></li>
                        <li class="list-group-item"><i class="fa fa-calendar text-danger"></i>&nbsp; <a href="#">June 30 final of ty</a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- end tabs user info -->
        </div>
      </div><!-- end user details -->
    </div><!-- end about content-->

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

    <!-- Chat sidebar content-->
    <div class="chat-sidebar focus">
      <div class="list-group text-left">
        <p class="text-center visible-xs"><a href="#" class="hide-chat">Hide chat</a></p> 
        <p class="text-center chat-title"><i class="fa fa-weixin">Chat</i></p>  
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-2.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Jeferh Smith</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-1.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Dapibus acatar</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-3.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Antony andrew lobghi</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-2.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Maria fernanda coronel</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/guy-4.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Markton contz</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-3.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Martha creaw</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="img/Friends/woman-8.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Yira Cartmen</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-4.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Jhoanath matew</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-5.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Ryanah Haywofd</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-9.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Linda palma</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/woman-10.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Andrea ramos</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="img/Friends/child-1.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Dora ty bluekl</p>
        </a>
      </div>
    </div><!-- end chat content-->

    <!-- chat box content -->
    <div class="chat-window col-xs-10 col-md-3 col-sm-8 col-md-offset-5">
      <div class="col-xs-12 col-md-12 col-sm-12">
          <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span>Dapibus acatar</h3>
                    </div>
                    <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close"></span></a>
                    </div>
                </div>
                <div class="panel-body msg_container_base">
                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                                <p>Hi!</p>
                                <time>51 min</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="img/Profile/profile.jpg" class=" img-responsive ">
                        </div>
                    </div>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="img/Friends/woman-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p>Hello my friend</p>
                                <time>51 min</time>
                            </div>
                        </div>
                    </div>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="img/Friends/woman-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-xs-10 col-md-10">
                            <div class="messages msg_receive">
                                <p>How are you?</p>
                                <time>51 min</time>
                            </div>
                        </div>
                    </div>
                    <div class="row msg_container base_sent">
                        <div class="col-xs-10 col-md-10">
                            <div class="messages msg_sent">
                                <p>I'm fine, and you?</p>
                                <time>51 min</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="img/Profile/profile.jpg" class=" img-responsive ">
                        </div>
                    </div>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="img/Friends/woman-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-xs-10 col-md-10">
                            <div class="messages msg_receive">
                                <p>Bootstrap is the most popular HTML, CSS, and JS framework 
                                for developing responsive, mobile first projects on the web</p>
                                <time> 51 min</time>
                            </div>
                        </div>
                    </div>
                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10 ">
                            <div class="messages msg_sent">
                                <p>Bootstrap makes front-end web development faster and easier. 
                                It's made for folks of all skill levels, 
                                devices of all shapes, and projects of all sizes.</p>
                                <time>51 min</time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="img/Profile/profile.jpg" class=" img-responsive ">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                          <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                    </div>
                </div>
          </div>
      </div>
    </div><!-- end chat box content -->

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

    <div class="col-md-12">
      <footer class="footer">
        <P>&copy; Company 2015</P>
      </footer>
    </div>
  </body>
</html>