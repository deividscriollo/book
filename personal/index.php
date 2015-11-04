<?php 
    // print $_COOKIE['id']; 
    // if(!isset($_SESSION)){
    //     session_start();        
    // }
    // print $_SESSION['nombre'];
    require_once('../../assets/dist/admin/menu.php'); 
    $class_menu=new menu(); 
?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>NextBook</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link href="../../assets/dist/css/application.min.css" rel="stylesheet">    
    <link href="../../assets/dist/css/dashboard.css" rel="stylesheet">    
    <link rel="icon" type="image/png" href="../../assets/dist/img/favicons.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    </head>
<body>
<!-- menu bar -->
<?php 
    $class_menu->navbar();
?>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <div class="row">
            <div class="col-sm-2">
                <h1>LOGOTIPO</h1>
                <div class="live-tile" data-mode="flip" data-direction="horizontal"
                     data-speed="600" data-delay="3000" data-height="373"
                     data-play-onhover="true">
                    <div>
                        <section class="widget windget-padding-lg widget-md bg-gray-dark text-white">
                            <div class="widget-body widget-body-container">
                                <div class="text-align-center">
                                    <i class="fa fa-child text-warning fa-5x"></i>
                                </div>
                                <h3 class="fw-normal">Sing Web App</h3>
                                <div class="widget-footer-bottom">
                                    <div class="mb-sm">Cutting-edge tech and design delivered</div>
                                    <p><button class="btn btn-default btn-block">Hover over me!</button></p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div>
                        <section class="widget windget-padding-lg widget-md">
                            <div class="widget-body widget-body-container">
                                <div class="text-align-center">
                                    <i class="fa fa-globe text-primary fa-5x"></i>
                                </div>
                                <h3 class="fw-normal">Join The Web Now!</h3>
                                <div class="widget-footer-bottom">
                                    <div class="mb-sm">Cutting-edge tech and design delivered</div>
                                    <p><button class="btn btn-gray btn-block">Join now!</button></p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div id="cxzccarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="..." alt="...">
                      <div class="carousel-caption">
                        ...
                      </div>
                    </div>
                    <div class="item">
                      <img src="..." alt="...">
                      <div class="carousel-caption">
                        ...
                      </div>
                    </div>
                    ...
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="../../assets/dist/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="../../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="../../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="../../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="../../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="../../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="../../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="../../assets/dist/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../assets/dist/vendor/widgster/widgster.js"></script>
<script src="../../assets/dist/vendor/pace.js/pace.min.js"></script>
<script src="../../assets/dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="../../assets/dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- page specific libs -->
<script id="test" src="../../assets/dist/vendor/underscore/underscore.js"></script>
<script src="../../assets/dist/vendor/jquery.sparkline/index.js"></script>
<script src="../../assets/dist/vendor/jquery.sparkline/index.js"></script>
<script src="../../assets/dist/vendor/d3/d3.min.js"></script>
<script src="../../assets/dist/vendor/rickshaw/rickshaw.min.js"></script>
<script src="../../assets/dist/vendor/raphael/raphael-min.js"></script>
<script src="../../assets/dist/vendor/jQuery-Mapael/js/jquery.mapael.js"></script>
<script src="../../assets/dist/vendor/jQuery-Mapael/js/maps/usa_states.js"></script>
<script src="../../assets/dist/vendor/jQuery-Mapael/js/maps/world_countries.js"></script>
<script src="../../assets/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
<script src="../../assets/dist/vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="../../assets/dist/vendor/jquery-animateNumber/jquery.animateNumber.min.js"></script>
<script src="../../assets/dist/vendor/messenger/build/js/messenger.js"></script>
<script src="../../assets/dist/vendor/messenger/build/js/messenger-theme-flat.js"></script>


<!-- requeridos -->
<script src="../../assets/dist/js/settings.js"></script>
<script src="../../assets/dist/js/app.js"></script>
<script type="../../assets/dist/js/bootstrap-carousel.js"></script>
</body>
</html>



<script type="text/javascript">
   $('.carousel').carousel({
  interval: 2000
})
</script>