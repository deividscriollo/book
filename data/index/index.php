<?php require_once('../../admin/menu.php'); $class_menu=new menu(); ?>
<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>NextBook</title>
    <link href="../../dist/css/application.min.css" rel="stylesheet">    
    <link href="../../dist/css/dashboard.css" rel="stylesheet">    
    <link rel="icon" type="image/png" href="../../dist/img/favicons.png" />
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

<!-- This is the white navigation bar seen on the top. A bit enhanced BS navbar. See .page-controls in _base.scss. -->
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
                        <span class="thumb-sm avatar pull-left">
                            <img class="img-circle" src="../../dist/img/book.png" alt="...">
                        </span>
                        &nbsp;
                        Philip <strong>Smith</strong>&nbsp;
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


<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <h1 class="page-title">Dashboard <small><small>The Lucky One</small></small></h1>
    </main>
</div>
<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="../../dist/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../dist/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="../../dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="../../dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="../../dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="../../dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="../../dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="../../dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="../../dist/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../dist/vendor/widgster/widgster.js"></script>
<script src="../../dist/vendor/pace.js/pace.min.js"></script>
<script src="../../dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="../../dist/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- page specific libs -->
<script id="test" src="../../dist/vendor/underscore/underscore.js"></script>
<script src="../../dist/vendor/jquery.sparkline/index.js"></script>
<script src="../../dist/vendor/jquery.sparkline/index.js"></script>
<script src="../../dist/vendor/d3/d3.min.js"></script>
<script src="../../dist/vendor/rickshaw/rickshaw.min.js"></script>
<script src="../../dist/vendor/raphael/raphael-min.js"></script>
<script src="../../dist/vendor/jQuery-Mapael/js/jquery.mapael.js"></script>
<script src="../../dist/vendor/jQuery-Mapael/js/maps/usa_states.js"></script>
<script src="../../dist/vendor/jQuery-Mapael/js/maps/world_countries.js"></script>
<script src="../../dist/vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
<script src="../../dist/vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="../../dist/vendor/jquery-animateNumber/jquery.animateNumber.min.js"></script>

<!-- requeridos -->
<script src="../../dist/js/settings.js"></script>
<script src="../../dist/js/app.js"></script>


</body>
</html>