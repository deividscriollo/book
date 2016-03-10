<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Config</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../dist/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="../dist/css/animate.min.css" rel="stylesheet" media="screen" />
    	<link href="../dist/css/creative/gsdk-base.css" rel="stylesheet" />  
    	<link href="../dist/css/color.css" rel="stylesheet" /> 

		<!-- text fonts -->
		<link rel="stylesheet" href="../dist/css/sweetalert.css"/>
		<link rel="shortcut icon" href="../dist/img/favicon.png">

	</head>

	<body class="image-container1">
		<div class="image-container">
	        <div class="container">
	            <div class="row animated fadeIn">
	                <div class="col-sm-8 col-sm-offset-2">
	                    <!-- Wizard container -->   
	                    <div class="wizard-container "> 
	                        <div class="card wizard-card ct-wizard-sky" id="wizard">
	                            <div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<div class="login-container">
											<div class="text-center">
												<h1>
													<i class="fa fa-database green"></i>
													<span class="red">Red</span>
													<span class="white" id="id-text2">de Negocios</span>
												</h1>
												<h4 class="blue" id="id-company-text">&copy; Nextbook.ec</h4>
											</div>
											<div class="space-6"></div>							
										</div>
									</div><!-- /.col -->
								</div><!-- /.row -->
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
		<!-- basic scripts -->
		<script src="../dist/js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="../dist/js/sweetalert.min.js"></script>
		<script src="../dist/js/jquery.blockUI.js"></script>
		<script type="text/javascript" src="app.js"></script>

	</body>
</html>
<style type="text/css">
	.image-container{
		background-image: linear-gradient(0deg,#2F85C8, #3B3A3A);
	}
	.image-container1{
		background: #2F85C8;
	}
</style>