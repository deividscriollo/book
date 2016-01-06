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
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="bootstrap social network template">
    <meta name="author" content="">
    <title>Update Info</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../dist/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../dist/css/animate.min.css" rel="stylesheet" media="screen" />
    <link href="../dist/css/creative/gsdk-base.css" rel="stylesheet" />  
    <link href="../dist/css/dayday/register.css" rel="stylesheet" />  

    <script src="../dist/js/creative/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../dist/js/creative/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="../dist/js/formValidation.min.js" type="text/javascript"></script>
    <script src="../dist/js/bootstrap.validation.min.js" type="text/javascript"></script>
    
    <script src="../dist/js/creative/wizard.js" type="text/javascript"></script>
    <script src="../dist/js/lockr.js" type="text/javascript"></script>
    
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
<body>
  <div class="image-container register-bg">
    <!--   Big container   -->
    <div class="container">
      <div class="row  animated fadeIn">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="wizard-container">
          <form id="installationForm" class="form-horizontal">
            <div class="card wizard-card ct-wizard-sky" id="wizard">
              
                <div class="wizard-header text-center">
                  <h1 class="app-title">
                    Nextbook
                  </h1>
                </div>

                <ul>
                    <li class="active">
                      <a href="#basic-tab" data-toggle="tab">
                        Datos Basicos
                      </a>
                    </li>
                    <li>
                      <a href="#database-tab" data-toggle="tab">
                        Empresa
                      </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- First tab -->
                    <div class="tab-pane active" id="basic-tab">
                      <div class="row">
                        <h4 class="info-text"> Vamos a empezar con la información básica</h4>
                        <div class="col-sm-4 col-sm-offset-1">
                          <div class="picture-container">
                            <div class="picture">
                              <img src="../dist/img/Profile/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                              <input type="file" id="wizard-picture">
                            </div>
                            <h6 class="element_usuario"></h6>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label class="col-xs-12 control-label">Nombres (*)</label>
                              <div class="col-xs-12">
                                  <input type="text" class="form-control" name="txt_nombre" placeholder="Andres..."/>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-xs-12 control-label">Apellidos (*)</label>
                              <div class="col-xs-12">
                                  <input type="text" class="form-control" name="txt_apellido" placeholder="Morales..."/>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Second tab -->
                    <div class="tab-pane" id="database-tab">
                        <div class="form-group">
                            <label class="col-xs-3 control-label">Server IP</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="dbServer" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Database name</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="dbName" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Database user</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="dbUser" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Password</label>
                            <div class="col-xs-5">
                                <input type="password" class="form-control" name="dbPassword" />
                            </div>
                        </div>
                    </div>

                    <!-- Previous/Next buttons -->
                    <ul class="pager wizard">
                        <li class="previous"><a href="javascript: void(0);">Atras</a></li>
                        <li class="next"><a href="javascript: void(0);" class="btn-sky btn-wd">Adelante</a></li>
                    </ul>
                </div>              
              </div>
            </form>
          </div>
        </div>
        <div class="modal fade" id="completeModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Complete</h4>
                    </div>

                    <div class="modal-body">
                        <p class="text-center">The installation is completed</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Visit the website</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div><!-- end row -->
    </div> <!--  big container -->
  </div>
</body>
</html>