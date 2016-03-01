<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="dist/img/docs.png">

    <title>Nextbook</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="dist/css/color.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="index/app.css" rel="stylesheet">
  </head>

  <body>
    <div class="navbar navbar-fixed-top" role="navigation">
      <div class="container"> 
          <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                  <li class="hide" id="element-nabar-menu-nom"><a href="dashboard/" class="blue element_usuario">Usuario nombre</a></li>
                  <li class="dropdown hide" id="element-nabar-menu-app">
                      <a  href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-th blue"></i>
                      </a>  
                      <ul class="dropdown-menu">
                          <li>
                              <div class="navbar-login purple">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <!-- START widget-->
                                      <a href="facturanext/">
                                        <div class="panel widget">
                                           <div class="panel-body bg-danger text-center">
                                              <img src="dist/avatars/default-avatar.png" width="30px">
                                              <h4 class="mt0">Facturanext</h4>
                                           </div>
                                        </div>
                                      </a>
                                      <!-- END widget-->
                                   </div>
                                   <div class="col-md-4">
                                      <!-- START widget-->
                                      <!-- END widget-->
                                   </div>
                                </div>
                              </div>
                          </li>
                      </ul>
                  </li>
                  <li class="dropdown hide" id="element-nabar-menu-user">
                      <a  href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="nav-user-photo" src="dist/avatars/default-avatar.png" id="element_img_personal_data">                        
                      </a>  
                      <ul class="dropdown-menu">
                          <li>
                              <div class="navbar-login blue">
                                  <div class="row">
                                      <div class="col-lg-4">
                                          <p class="text-center">
                                              <span class="glyphicon glyphicon-user icon-size"></span>
                                          </p>
                                      </div>
                                      <div class="col-lg-8">
                                          <p class="text-left"><strong class="element_usuario"></strong></p>
                                          <p class="text-left small element_correo">correoElectronico@email.com</p>
                                          <p class="text-left">
                                              <a href="perfil/" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="divider"></li>
                          <li>
                              <div class="navbar-login navbar-login-session">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <p>
                                              <a href="exit/" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </li>
                  <li id="element-nabar-menu-btn" class="hide">
                    <form class="navbar-form navbar-right" role="search">
                      <div class="input-group"><a href="login/" class="btn btn-primary">Iniciar Sesión</a></div>
                    </form>
                  </li>
              </ul>
          </div>
      </div>
  </div>
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">
          
          <div class="inner cover">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="dist/img/publi1.png" alt="Chania">
                    </div>

                    <div class="item">
                      <img src="dist/img/publi2.png" alt="Chania">
                    </div>

                    <div class="item">
                      <img src="dist/img/publi3.png" alt="Flower">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div id="custom-search-input">
                  <div class="input-group col-md-12">
                      <input type="text" class="search-query form-control" placeholder="Empresas, servicios, locales comerciales"/>
                      <span class="input-group-btn">
                          <button class="btn btn-danger" type="button">
                              <span class=" glyphicon glyphicon-search"></span>
                          </button>
                      </span>
                  </div>
              </div>
          </div>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p class="green">
                nextbook para 
                <a href="" class="red">empresas</a>
                , por 
                <a href="" class="blue">conceptual business group.</a>
              </p>
              <p >
                <a href="terminos/" title="" class="purple" target="_blank">Términos y condiciones</a>
              </p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script type="text/javascript"  src="dist/js/lockr.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="dist/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="index/app.js"></script>
  </body>
</html>




