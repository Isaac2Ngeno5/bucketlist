<?php

session_start();

function redirect($url){
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    exit();
}

if (isset($_SESSION['type']) || isset($_SESSION['name'])) {
    session_destroy();
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="animate.css">
  <link rel="stylesheet" href="fonts/lato/latofonts.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
  <nav class="navbar  navbar-fixed-top">
    <div  class="container">
      <div class="navbar-header">
        <a class="navbar-brand lato-semibold" href="#" style="color:#ffffff">
            <i class="fa fa-dollar"></i>CRI<i class="fa fa-bitcoin"></i><i class="fa fa-bold"></i>LE
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right lato-light" style="color:#ffffff">
        <li class="active "><a href="index.php" style="color:#ffffff; background-color:rgba(94, 55, 88,0.5)">Home</a></li>
        <li><a href="login.html" style="color:#ffffff;">Sign in</a></li>
      </ul>
    </div>
  </nav>

  <div class="container" style="padding:30px; margin-top: 50px; color:#ffffff; ">
    <div class="jumbotron text-center" style="background-color: rgba(94, 55, 88,0.7)">
      <h1 class="lato-semibold">SCRIBBLE</h1>
      <p style="color:#0f97ee;">
          <i class="lato-light">Face the future with certainity by planning,<br>failure to plan is a plan to fail.</i>
      </p>
      <a href="reg.html">
          <button type="button" class="btn btn-success btn-lg animated bounceInDown" > Sign Up</button>
      </a>
      <div class="container lato-regular">
        <div class="row">
          <div class="col-md-12"><h3>Features include;</h3></div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <a href="add.html">
              <i class="fa fa-plus-square-o fa-3x" style="color:#1866a1"></i>
              <p style="color:#e8e8e8">Add List</p>
                <?php
                 if (isset($_SESSION['type']) || isset($_SESSION['name']))
                 {
                    redirect(login.html);
                 }
                ?>
            </a>
          </div>
          <div class="col-md-4">
            <a href="view.php">
              <i class="fa fa-list fa-3x" style="color:#1866a1"></i>
              <p style="color:#e8e8e8">View List</p>
            </a>
          </div>
          <div class="col-md-4">
            <a href="#">
              <i class="fa fa-share-alt fa-3x" style="color:#1866a1"></i>
              <p style="color:#e8e8e8">Share</p>
            </a>
          </div>
        </div>
        <div class="row">
          ...
        </div>
      </div>

    </div>
    <p class="lato-thin" align="center" style="color: #f5f5f5">Designed by <span class="lato-semibold">Isaac Ngeno</span></p>
  </div>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/jquery.min.js"></script>
</body>
</html>