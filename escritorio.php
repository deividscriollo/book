
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="bootstrap social network template">
    <meta name="author" content="">
    <title>Day-Day social network</title>
    <!-- Bootstrap and css styles -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="dist/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/animate.min.css" rel="stylesheet" media="screen">
    <link href="dist/css/dayday/dayday.css" rel="stylesheet" media="screen">
    <link href="dist/css/dayday/timeline.css" rel="stylesheet" media="screen">
    <link href="dist/css/dayday/home.css" rel="stylesheet" media="screen">
    
    <!-- Bootstrap, Jquery and page scripts -->
    <script type="text/javascript"  src="dist/js/jquery.min.js"></script>
    <script type="text/javascript"  src="dist/js/bootstrap.min.js"></script>
    <script type="text/javascript"  src="dist/js/dayday/dayday.js"></script>
    <link rel="shortcut icon" href="dist/img/favicon.png">
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
          <a class="navbar-brand" href="home.html"><b>Day-Day</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <div class="col-md-5 col-sm-4">         
           <form class="navbar-form">
              <div class="form-group" style="display:inline;">
                <div class="input-group" style="display:table;">
                  <input class="form-control" name="search" placeholder="Search..." autocomplete="off" autofocus="autofocus" type="text">
                  <span class="input-group-addon" style="width:1%;">
                    <span class="glyphicon glyphicon-search"></span>
                  </span>
                </div>
              </div>
            </form>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
              <i class="fa fa-home"></i>Pages <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="home.html">Home</a></li>
                <li><a href="index.html">Timeline 1</a></li>
                <li><a href="time-line2.html">Timeline 2</a></li>
                <li><a href="blank-profile.html">Blank profile</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="error404.html">Error 404</a></li>
                <li><a href="error500.html">Error 500</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                <i class="fa fa-user"></i>Nickson <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                <li><a href="#">One option</a></li>
                <li><a href="#">Another option</a></li>
                <li class="divider"></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
            <li><a href="#" class="nav-controller"><i class="fa fa-comment"></i>Chat</a></li>
          </ul>
        </div>
      </div>
    </nav><!-- end top navigation -->
    <div style="margin-top:56px;"></div>
    <div class="col-md-9 col-sm-12 col-xs-12 animated fadeIn">
      <!-- user options -->
      <div class="col-md-2 col-sm-3 col-xs-12 col-md-offset-1 left-content hidden-xs">
        <div  class="left-user-options" data-spy="affix">         
          <img src="dist/img/Profile/profile.jpg" class="img-thumbnail img-circle img-user">
          <div class="list-group">
            <a href="index.html" class="list-group-item">
              <i class="fa fa-bars"></i>
              Timeline
            </a>
            <a href="photos.html" class="list-group-item">
              <i class="fa fa-image"></i>
              Photos
            </a>
            <a href="friends.html" class="list-group-item">
              <i class="fa fa-users"></i>
              Friends
            </a>
            <a href="messages.html" class="list-group-item">
              <i class="fa fa-comment"></i>
              Messages
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
                    <img src="dist/img/Profile/profile.jpg" class="img-rounded avatar" alt="user profile image">
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
        
        <!-- second post -->
        <div class="col-md-12">
          <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                    <img src="dist/img/Profile/profile.jpg" class="img-rounded avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#" class="post-user-name">Nickson Bejarano</a>
                        made a post.
                    </div>
                    <h6 class="text-muted time">1 minute ago</h6>
                </div>
            </div> 
            <div class="post-description"> 
                <p>Bootdey is a gallery of free snippets resources templates and utilities 
                for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                <div class="stats">
                    <a href="#" class="btn btn-default stat-item">
                        <i class="fa fa-thumbs-up icon"></i>2
                    </a>
                    <a href="#" class="btn btn-default stat-item">
                        <i class="fa fa-share icon"></i>12
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
                            <img class="avatar" src="dist/img/Friends/guy-8.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="comment-user-name"><a href="#">Gavhin dahg martb</a></h4>
                                <h5 class="time">5 minutes ago</h5>
                            </div>
                            <p>This is a first comment</p>
                        </div>
                        <ul class="comments-list">
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="dist/img/Friends/woman-5.jpg" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="comment-user-name"><a href="#">Ryanah Haywofd</a></h4>
                                        <h5 class="time">3 minutes ago</h5>
                                    </div>
                                    <p>Relax my friend</p>
                                </div>
                            </li> 
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="dist/img/Friends/woman-7.jpg" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="comment-user-name"><a href="#">Maria dh heart</a></h4>
                                        <h5 class="time">3 minutes ago</h5>
                                    </div>
                                    <p>Ok, cool.</p>
                                </div>
                            </li> 
                        </ul>
                    </li>
                </ul>
            </div>
          </div>
        </div><!-- end second post -->    
        
        <!-- third post -->
        <div class="col-md-12">
          <div class="panel panel-white post panel-shadow">
              <div class="post-heading">
                  <div class="pull-left image">
                      <img src="dist/img/Profile/profile.jpg" class="img-rounded avatar" alt="user profile image">
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
                  <img src="dist/img/Post/place1-full2.jpg" class="image " alt="image post">
              </div>
              <div class="post-description">
                  <p>I am visiting a new place on the globe</p>
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
                              <img class="avatar" src="dist/img/Friends/guy-4.jpg" alt="avatar">
                          </a>
                          <div class="comment-body">
                              <div class="comment-heading">
                                  <h4 class="comment-user-name"><a href="#">Markton contz</a></h4>
                                  <h5 class="time">7 minutes ago</h5>
                              </div>
                              <p>this is a good place, and this is a comment</p>
                          </div>
                      </li>
                      <li class="comment">
                          <a class="pull-left" href="#">
                              <img class="avatar" src="dist/img/Friends/woman-8.jpg" alt="avatar">
                          </a>
                          <div class="comment-body">
                              <div class="comment-heading">
                                  <h4 class="comment-user-name"><a href="#">Yira Cartmen</a></h4>
                                  <h5 class="time">3 minutes ago</h5>
                              </div>
                              <p>Ya vamos llegando a penjamo, ja ja ja good luck!</p>
                          </div>
                      </li>
                      <li class="comment">
                          <a class="pull-left" href="#">
                              <img class="avatar" src="dist/img/Friends/child-1.jpg" alt="avatar">
                          </a>
                          <div class="comment-body">
                              <div class="comment-heading">
                                  <h4 class="comment-user-name"><a href="#">Dora ty bluekl</a></h4>
                                  <h5 class="time">10 seconds ago</h5>
                              </div>
                              <p>Friend, good luck!</p>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
        </div><!-- third post -->    
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
            <img src="dist/img/Sponsor/sponsor-1.jpg" class="img-responsive  img-rounded ">
            <p class="sponsor-name">sponsor name</p>
            <p class="sponsor-url"><a href="#">sponsor-url.com</a></p>
            <p class="sponsor-description"> put here a short description, for example. Bootstrap is the most popular HTML, CSS, and JS framework</p>
          </div>
          <div class="col-md-12 sponsor-list">
            <img src="dist/img/Sponsor/sponsor-2.png" class="img-responsive  img-rounded ">
            <p class="sponsor-name">sponsor name</p>
            <p class="sponsor-url"><a href="#">sponsor-url.com</a></p>
            <p class="sponsor-description"> put here a short description, for example. Bootstrap is the most popular HTML, CSS, and JS framework</p>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12 frind-suggest">
        <div class="col-md-12 col-sm-12 " >
            <div class="row row-suggest-title text-center">
             <i class="fa fa-users"></i>&nbsp;People you may know
            </div>
            <div class="row row-suggest">
              <div class="col-md-6 col-sm-4 col-xs-4">
                <img src="dist/img/Friends/guy-2.jpg" class="img-responsive  img-circle  img-suggest">
              </div>
              <div class="col-md-6 col-sm-8 col-xs-8">
                <a href="#" class="suggest-name">Mario alberto conrado</a>
                <a href="#" class="btn btn-default btn-responsive">
                  <i class="fa fa-plus"></i>
                  Add Frind
                </a>
              </div>
            </div>
            <div class="row row-suggest">
              <div class="col-md-6 col-sm-4 col-xs-4">
                <img src="dist/img/Friends/woman-10.jpg" class="img-responsive  img-circle  img-suggest">
              </div>
              <div class="col-md-6 col-sm-8 col-xs-8">
                <a href="#" class="suggest-name">Josethik ingoth</a>
                <a href="#" class="btn btn-default btn-responsive">
                  <i class="fa fa-plus"></i>
                  Add Frind
                </a>
              </div>
            </div>
            <div class="row row-suggest">
              <div class="col-md-6 col-sm-4 col-xs-4">
                <img src="dist/img/Friends/woman-6.jpg" class="img-responsive  img-circle  img-suggest">
              </div>
              <div class="col-md-6 col-sm-8 col-xs-8">
                <a href="#" class="suggest-name">Emmai Roshglopdx</a>
                <a href="#" class="btn btn-default btn-responsive">
                  <i class="fa fa-plus"></i>
                  Add Frind
                </a>
              </div>
            </div>
            <div class="row row-suggest">
              <div class="col-md-6 col-sm-4 col-xs-4">
                <img src="dist/img/Friends/guy-5.jpg" class="img-responsive  img-circle  img-suggest">
              </div>
              <div class="col-md-6 col-sm-8 col-xs-8">
                <a href="#" class="suggest-name">Guytenht zukerbtrek</a>
                <a href="#" class="btn btn-default btn-responsive">
                  <i class="fa fa-plus"></i>
                  Add Frind
                </a>
              </div>
            </div>
            <div class="row row-suggest">
              <div class="col-md-6 col-sm-4 col-xs-4">
                <img src="dist/img/Friends/woman-7.jpg" class="img-responsive  img-circle  img-suggest">
              </div>
              <div class="col-md-6 col-sm-8 col-xs-8">
                <a href="#" class="suggest-name">Martha bitkerset</a>
                <a href="#" class="btn btn-default btn-responsive">
                  <i class="fa fa-plus"></i>
                  Add Frind
                </a>
              </div>
            </div>
        </div>
      </div>
    </div><!-- end right container -->

    <!-- Chat sidebar content-->
    <div class="chat-sidebar focus">
      <div class="list-group text-left">
        <p class="text-center visible-xs"><a href="#" class="hide-chat">Hide chat</a></p> 
        <p class="text-center chat-title"><i class="fa fa-weixin">Chat</i></p>  
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/guy-2.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Jeferh Smith</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="dist/img/Friends/woman-1.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Dapibus acatar</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/guy-3.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Antony andrew lobghi</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/woman-2.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Maria fernanda coronel</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/guy-4.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Markton contz</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="dist/img/Friends/woman-3.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Martha creaw</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-times-circle absent-status"></i>
          <img src="dist/img/Friends/woman-8.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Yira Cartmen</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/woman-4.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Jhoanath matew</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/woman-5.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Ryanah Haywofd</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/woman-9.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Linda palma</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/woman-10.jpg" class="img-chat img-thumbnail">
          <p class="chat-user-name">Andrea ramos</p>
        </a>
        <a href="#" class="list-group-item">
          <i class="fa fa-check-circle connected-status"></i>
          <img src="dist/img/Friends/child-1.jpg" class="img-chat img-thumbnail">
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
                            <img src="dist/img/Profile/profile.jpg" class=" img-responsive ">
                        </div>
                    </div>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="dist/img/Friends/woman-1.jpg" class=" img-responsive ">
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
                            <img src="dist/img/Friends/woman-1.jpg" class=" img-responsive ">
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
                            <img src="dist/img/Profile/profile.jpg" class=" img-responsive ">
                        </div>
                    </div>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar-chat-box">
                            <img src="dist/img/Friends/woman-1.jpg" class=" img-responsive ">
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
                            <img src="dist/img/Profile/profile.jpg" class=" img-responsive ">
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
