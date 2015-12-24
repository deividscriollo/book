
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="description" content="Red de Negocios, Herramientas de Negocios, facturación electrónica, facturanext es un servicio gratuito que te permite concentrar todas las facturas electrónicas que recibes en un solo lugar
      " />
      <meta name="msvalidate.01" content="64BBD913ED7E771F678671292BB6E9C7" />
      <meta name="keywords" content="Negocios, Facturación, todo en uno, nextbook, Nextbook.com, Nextbook.com.ec, Nextbook.ec, 
      facturación electrónica, herramienta de negocios, organizar facturas nube gestionar compras, correo facturación, beneficios nextbook" />
      <meta name="author" content="Una iniciativa de concepto intelectual /business group, nextbook.ec">
    <link rel="icon" type="image/png" href="next/assets/images/favicon.png"/>

    <title>Buscar</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- Static navbar -->
    <!-- <nav class="navbar navbar-fixed-top">
      <div class="content">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">            
          <a href="registrar.php" class="btn btn-primary">Iniciar Sesión</a>
          </form>
          
        </div>
      </div>
    </nav> -->
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="registrar.php" class="navbar-toggle btn btn-primary">Iniciar Sesión</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <a href="registrar.php" class="btn btn-primary">Iniciar Sesión</a>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <div class="container">

      <form class="form-signin">
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
        <div class="row">
          <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class=" search-query form-control" placeholder="Search" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
          </div>
      </form>

    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="dist/js/ie10-viewport-bug-workaround.js"></script>
    <script src="dist/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>

<style type="text/css">
  body{
    background: #dfe0e2 url(dist/img/pattern.jpg) repeat;
  }
   

  #custom-search-input {
    margin:0;
    margin-top: 10%;
    padding: 0;
    width: 100%;
    float: center
  }
.navbar-toggle {
    position: relative;
    float: right;
    padding: 9px 10px;
    margin-top: 8px;
    margin-right: 15px;
    margin-bottom: 8px;
    background-color: #337ab7;
    background-image: none;
  }
  #custom-search-input .search-query {
    padding-right: 3px;
    padding-right: 4px \9;
    padding-left: 3px;
    padding-left: 4px \9;
    /* IE7-8 doesn't have border-radius, so don't indent the padding */

    margin-bottom: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
  }

  #custom-search-input button {
    border: 0;
    background: none;
    /** belows styles are working good */
    padding: 2px 5px;
    margin-top: 2px;
    position: relative;
    left: -28px;
    /* IE7-8 doesn't have border-radius, so don't indent the padding */
    margin-bottom: 0;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    color:#D9230F;
  }

  .search-query:focus + button {
    z-index: 3;   
  }
  .form-signin {
    max-width: 60%;
    padding: 15px;
    margin: 0 auto;
    padding-top: 15%;
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin .checkbox {
    font-weight: normal;
  }
  .form-signin .form-control {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
  @media (max-width: 668px){
     .form-signin {
      max-width: 100%;
      padding: 15px;
      margin: 0 auto;
      padding-top: 10%;
    }   
  }

</style>