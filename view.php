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
                    <li class="active "><a href="index.php" style="color:#ffffff">Home</a></li>
                    <li><a href="login.html" style="color:#ffffff">Sign in</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div style="margin-top: 60px;">
            <div class="row">
                <div class="col-md-4" id="left" >
                    <?php
                    $sql = "SELECT `title` FROM `bucket_items` ORDER BY `item_id` DESC LIMIT 5";
                    $result = $conn->query($sql);
                        echo "<ul id='list' onclick='showUser(this.value)'>";
                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){
                                    echo "<li>".$row["title"]."</li>";
                                }
                            }
                        echo "</ul>";
                    ?>
                </div>
                <div class="col-md-8" id="right" >
                    <?php
                    $sql = "SELECT `title`, `content` FROM `bucket_items` ORDER BY `item_id` DESC LIMIT 4 ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            echo "<h1>".$row["title"]."</h1>";
                            echo "<p>".$row["content"]."</p>";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>