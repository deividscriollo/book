<?php 
  session_start();
  if($_SESSION){
      // print_r($_SESSION);
      // sin session
      // header('Location: ../login/');
  }else{
    // con session
    $vec = explode('/', $_SERVER['REQUEST_URI']);
    $localname = $vec[count($vec)-2];
    $acuaccesos=$_SESSION['acceso'];
    print_r($_SESSION['acceso']);
    if ($_SESSION['acceso'][$localname]!='1') {
      // header('Location: ../dashboard/');
    }      
  }
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
    
    <!-- editable -->
    <link href="../dist/css/bootstrap-editable.css" rel="stylesheet"/>
    <link href="../dist/css/select2.min.css" rel="stylesheet" />

     <!-- material desin -->
    <link href="../dist/css/material-desing.min.css" rel="stylesheet" />

    <!-- programing setting local-->
    <link href="app.css" rel="stylesheet" />

    <script src="../dist/js/creative/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../dist/js/creative/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="../dist/js/formValidation.min.js" type="text/javascript"></script>
    <script src="../dist/js/bootstrap.validation.min.js" type="text/javascript"></script>
    
    <!-- editable -->
    <script src="../dist/js/bootstrap-editable.min.js"></script>
    <script src="../dist/js/select2.min.js" type="text/javascript"></script>

     <!-- material desin -->
    <script src="../dist/js/material_desing.min.js" type="text/javascript"></script>  
    
    <!-- config -->
    <script src="app.js" type="text/javascript"></script>
    
  <!-- zsdfas <script src="../dist/js/creative/wizard.js" type="text/javascript"></script> -->
    <script src="../dist/js/lockr.js" type="text/javascript"></script>
    
    <link rel="shortcut icon" href="../dist/img/docs.png">
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
                      <a href="#seguridad-tab" data-toggle="tab">
                        Seguridad
                      </a>
                    </li>
                    <li>
                      <a href="#database-tab" data-toggle="tab">
                        Seleccionar Sucursal
                      </a>
                    </li>
                    <li>
                      <a href="#dataupdate-tab" data-toggle="tab">
                        Actualizar informacion
                      </a>
                    </li>
                    <li>
                      <a href="#datacat-tab" data-toggle="tab">
                        Categoría
                      </a>
                    </li>
                  </ul>
                  <div class="tab-content">
                      <!-- First tab -->
                      <div class="tab-pane active" id="basic-tab">
                        <div class="row">
                          <h4 class="info-text"> Vamos a empezar con la información básica</h4>
                          <div class="col-sm-4">
                            <div class="picture-container">
                              <div class="picture">
                                <img src="../dist/img/Profile/empresa-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                              </div>
                              <h6 class="element_empresa"></h6>
                            </div>
                          </div>
                          <div class="col-sm-7">
                            <div class="form-group">
                                <label class="col-xs-12 control-label">Nombres (*)</label>
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" name="txt_nombre" placeholder="Andres..."/>
                                    <input type="hidden" name="btn_guardar">
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
                      <!-- second tab -->
                      <div class="tab-pane" id="seguridad-tab">
                        <div class="row">
                          <h4 class="info-text"> Continuemos con algo de seguridad</h4>
                          <div class="col-sm-4">
                            <div class="picture-container">
                              <div class="picture">
                                <img src="../dist/img/Profile/seguridad-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                              </div>
                              <h6 class="element_empresa"></h6>
                            </div>
                          </div>
                          <div class="col-sm-7">
                            <div class="form-group">
                                <label class="col-xs-12 control-label">Nueva Password (*)</label>
                                <div class="col-xs-12">
                                    <input type="password" class="form-control" name="txt_pass" placeholder="********"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 control-label">Repita nueva Password (*)</label>
                                <div class="col-xs-12">
                                    <input type="password" class="form-control" name="txt_repita_pass" placeholder="********"/>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- three tab -->
                      <div class="tab-pane" id="database-tab">
                        <div class="row">
                          <div class="col-sm-11 col-sm-offset-1">
                            <div class="form-group" id="element-sucursal">
                              <!-- informacion de las sucursales que disponga -->
                            </div>
                          </div>                       
                        </div>
                      </div>
                      <!-- tree tab -->
                      <div class="tab-pane" id="dataupdate-tab">
                        <div class="row">
                          <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                              <label for="inputEmail" class="col-md-3 control-label">Nombre Empresa</label>

                              <div class="col-md-9">
                                <span id="editable-empresa">---------</span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-md-3 control-label">Dirección</label>

                              <div class="col-md-9">
                                <span id="editable-direccion">--------------</span>
                              </div>
                            </div>
                          </div>                       
                        </div>
                      </div>
                      <div class="tab-pane" id="datacat-tab">
                        <div class="row">
                          <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                              <label for="inputEmail" class="col-md-3 control-label">Categoría</label>
                              <div class="col-md-9">
                                <select id="sel_categoria1" name="sel_categoria1"style="width: 100%" class="form-control">                                  
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail" class="col-md-3 control-label">Seleccione actividades relacionadas con su empresa</label>
                              <div class="col-md-9">
                                <select id="sel_categoria2" name="sel_categoria2[]" multiple="multiple" style="width: 100%" >
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="textArea" class="col-md-3 control-label">Descripción</label>
                              <div class="col-md-9">
                                <textarea class="form-control" rows="3" id="textarea" name="textarea" ></textarea>
                                <span class="help-block">Coméntenos un poco, a que se dedica su empresa..?</span>
                              </div>
                            </div>
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
        </div>
      </div><!-- end row -->
    </div> <!--  big container -->
  </div>
</body>
</html>