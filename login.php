<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <title>Sing in</title>
    <style type="text/css">
        a{
            text-decoration: none;
        }
        .content{
            width:50%;
            padding:40px;
            margin:80px auto;
            background-color: rgba(94, 55, 88, 0.7);
            color:#ffffff;
        }
        input[type="text"], input[type="email"],input[type="password"]{
            background-color: rgba(94, 55, 88, 0.3);
            color: #ffffff;
        }
        .text-danger{
            background-color: white;
            color: #802420;
            padding:5px;
            font-size: 16px;

        }
    </style>
</head>
<body>
<nav class="navbar  navbar-fixed-top">
    <div  class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color:#ffffff">
                <i class="fa fa-dollar"></i>CRI<i class="fa fa-bitcoin"></i><i class="fa fa-bold"></i>LE
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="color:#ffffff">
            <li class="active "><a href="home.php" style="color:#ffffff">Home</a></li>
            <li><a href="login.html" style="color:#ffffff">Sign in</a></li>
        </ul>
    </div>
</nav>
    <div class="content" >
        <div id="head">
            <h1> SIGN IN</h1>
        </div>
        <form class="form-vertical" action="login.php" method="post" role="form">
            <?php
                if(isset($_POST['login'])){

                    try{
                        include "conndb.php";
                        $email = $_POST['email'];
                        $pwd = $_POST['password'];
                        $statement = $pdo->prepare("SELECT * FROM `users` WHERE email = ?");
                        $statement->execute([$email]);
                       // $log =
                       /* if ($statement){
                            $pdo->prepare("UPDATE `users` SET `times_log`=[value-2] WHERE 1");
                        }*/
                        

                        if($statement->rowCount()==1){
                            $user = $statement->fetch();
                            if(password_verify($pwd, $user['password'])){
                                session_start();
                                $_SESSION['user'] = $user;
                                function redirect($url){//authored by robin
                                    ob_start();
                                    header('Location: '.$url);
                                    ob_end_flush();
                                    exit();
                                }
                                redirect('home.php');

                            }else{
                                echo '<p class="text-danger text-center animated shake">Invalid password/email</p>';
                            }
                        }else{
                            echo '<p class="text-danger text-center animated shake">Invalid password/email</p>';
                        }
                    }catch (PDOException $e){
                        echo '<p class="text-danger text-center animated shake">something went wrong<br>'.$e->getMessage().'</p>';
                    }

                }
            ?>
            <div class="form-group">
                <label class="control-label " for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label class="control-label "  for="pwd">Password:</label>
                <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default" name="login">Submit</button>
            </div>
        </form>
        <div>Don't have an account? <a href="reg.php">sign up</a> </div>
    </div>


</body>
</html>