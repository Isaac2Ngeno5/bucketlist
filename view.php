<?php
    include "conndb.php";
?>
<html>
<head>
    <title>view</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="fonts/lato/latofonts.css">
    <link rel="stylesheet" href="style.css">
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("list").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("list").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET","getuser.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar  navbar-fixed-top">
            <div  class="container">
                <div class="navbar-header">
                    <a class="navbar-brand lato-semibold" href="#" style="color:#ffffff">
                        <i class="fa fa-dollar"></i>CRI<i class="fa fa-bitcoin"></i><i class="fa fa-bold"></i>LE
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right lato-light" style="color:#ffffff">
                    <li class="active "><a href="home.php" style="color:#ffffff">Home</a></li>
                    <li><a href="login.php" style="color:#ffffff">Sign in</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div style="margin-top: 60px;">
            <div class="row">
                <div class="col-lg-3" id="left" >
                    <form class="role" action="" method="get">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8"> <input type="text" class="form-control" name="list"></div>
                                <div class="col-md-1"> <button type="submit" class="btn btn-default " name="save">search</button></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9" id="right" >

                </div>
            </div>
        </div>
    </div>
</body>
</html>