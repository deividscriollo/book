<?php 
    if(!isset($_SESSION)){
        session_start();        
    }
    require_once('../../admin/menu.php'); 
    $class_menu=new menu(); 
?>
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
<script src="../../dist/vendor/messenger/build/js/messenger.js"></script>
<script src="../../dist/vendor/messenger/build/js/messenger-theme-flat.js"></script>


<!-- requeridos -->
<script src="../../dist/js/settings.js"></script>
<script src="../../dist/js/app.js"></script>


</body>
</html>