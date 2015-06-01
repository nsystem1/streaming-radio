<?php 
      
       include 'libraries/Database.php'; 
       include 'helpers/format_helper.php'; 
//Start session 
   session_start();
if (isset($_SESSION['SESS_USERNAME']))
{
require_once('../config/connection.php');
$id_member=$_SESSION['SESS_MEMBER_ID'];
$user   = mysql_query("SELECT * FROM member  where id='$id_member'" );
while ($user_row = mysql_fetch_assoc($user))  $img=$user_row['img'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/custom.css" rel="stylesheet">
<link rel="icon" type="image/png" href="../favicon.png">
<link href="css/bootstrap.min.css" rel="stylesheet">


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/manager.js"></script>
<!-- google recaptcha -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
  </head>

<body>
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="col-md-12 column">
      <nav  class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
           <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
           <span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-fire">Radio</span></a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li >
              <a href="../index.php"><span class="glyphicon glyphicon-home">Home</span></a>
            </li>
            <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="glyphicon glyphicon-book">Blog<strong class="caret"></strong></a>
                      <ul class="dropdown-menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="posts.php">All Posts</a>
                        </li>
                     </ul>
                  </li>               
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input id="Search" type="text" class="form-control" placeholder="Search">
            </div> <button type="submit" class="btn btn-default">search</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
          <?php

                
            if (isset($_SESSION['SESS_USERNAME']))
            {
            $name=$_SESSION['SESS_USERNAME'];
            echo '
            <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="../'.$img.'" height="20" width="20" class="profile-image img-circle"> '.$name.' <b class="caret"></b></a>
                 <ul  class="dropdown-menu">
                   <li><a href="../profile.php"><i class="fa fa-square"></i> Profile</a></li>
                   <li class="divider"></li>
                   <li><a href="../account.php"><i class="fa fa-cog"></i> Account</a></li>
                   <li class="divider"></li>
                   <li><a href="../signout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                 </ul>
                 </li>
                 <li margin-left:20px;>/<li>';  
          }
            else
              echo '<li margin-left:10px;>
                 <a id="modal-signup" href="#modal-container-signup" role="button" class="btn" data-toggle="modal">SIGN UP</a>
                 </li>
                 <li margin-right:20px;>
                 <a id="modal-login" href="#modal-container-login" role="button" class="btn" data-toggle="modal">LOGIN</a>
                 </li>
                 <li>/<li>';
                ?>
          </ul>
        </div>
        
      </nav>
      </div>
    </div><br><br><br>

  <div class="row clearfix">
    <div class="col-md-12 column">
<h1 class="blog-title">Blog</h1>
        <p class="lead blog-description">Human rights & Privacy</p>
      <div class="logo">
        <img src="images/blog-cover-photo.png" width="1200" height="300" />
      </div>

        <br>
        <?php
if (!isset($_SESSION['SESS_USERNAME'])){
echo '<!--SIGNUP dialog-->      
      <div class="modal fade" id="modal-container-signup" role="dialog" aria-labelledby="signup" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="signupLabel">
                Sign Up
              </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                              <div class="col-md-8 col-sm-8 col-xs-12 login-box">
                                   <form  id="signup" action="../signup_json.php" method="post" >
                                  <div class="input-group">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                       <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
                                  </div>
                                  <div class="input-group">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                      <input type="password" class="form-control" placeholder="Password" name="npassword" required />
                                  </div>
                                  <div class="input-group">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                      <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required />
                                  </div>
                                  <div class="input-group">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                      <input type="text" class="form-control" placeholder="Email" name="email" required />
                                  </div>
                                  <br>
                                  <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="g-recaptcha" data-sitekey="6LdEhgITAAAAAGigEVKR5jrozGcVwVr0gva8EzmT"></div>
                      </div>
                    </div><br>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                          <button class="btn btn-labeled btn-success" id="signup-button">Sign Up</button>
                        </div>
                                </form>
                                    <br><br><div id="div_signup_response" class="alert alert-info alert-dismissable" style="display: none;" >
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i id="signup_response" class="fa fa-coffee"></i>
                      </div><br>
                              </div>
                        </div>
            </div>
          </div>
        </div>
      </div>
<!--Login dialog-->     
      <div class="modal fade" id="modal-container-login" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="loginLabel">
                Login
              </h4>
            </div>
            <div class="modal-body">
              <div class="row">
                              <div class="col-md-8 col-sm-8 col-xs-12 login-box">
                                   <form id="login" action="../login_json.php" method="post" >
                                  <div class="input-group">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                       <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
                                  </div>
                                  <div class="input-group">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                      <input type="password" class="form-control" placeholder="Password" name="password" required />
                                  </div>
                                  <div class="checkbox">
                                     <label>
                                         <input type="checkbox" value="Remember">
                                         Remember me
                                    </label>
                                   </div>
                                  
                                     <a href="init.php" >Find Your Account?</a>
                                     <br>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                        <button class="btn btn-labeled btn-success" id="login-button">LogIn</button>
                      </div>
                                </form>
                                    <br><br><div id="div_login_response" class="alert alert-info alert-dismissable" style="display: none;" >
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i id="login_response" class="fa fa-coffee"></i>
                      </div><br>
                              </div>
                        </div>
            </div>
          </div>
        </div>
      </div>';}
      ?>
    <div class="row clearfix">
            <div class="col-md-12 column">
