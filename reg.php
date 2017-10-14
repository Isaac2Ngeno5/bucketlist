<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="animate.css">
    <title>Sign up</title>
    <style type="text/css">
        input[type="text"], input[type="email"], input[type="password"] {
            background-color: rgba(94, 55, 88, 0.3);
            color: #ffffff;
        }

        .text-danger {
            background-color: white;
            color: #802420;
            padding: 5px;
            font-size: 16px;

        }
    </style>
</head>
<body>
<nav class="navbar  navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color:#ffffff">
                <i class="fa fa-dollar"></i>CRI<i class="fa fa-bitcoin"></i><i class="fa fa-bold"></i>LE
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right" style="color:#ffffff">
            <li class="active "><a href="home.php" style="color:#ffffff">Home</a></li>
            <li><a href="login.php" style="color:#ffffff">Sign in</a></li>
        </ul>
    </div>
</nav>
<div class="container" style="margin-top: 50px;">
    <div id="content" style="margin-top: 50px;">
        <div id="head">
            <h1> SIGN IN</h1>
        </div>
        <form class="form-vertical" action="" method="post" role="form">
            <?php
            if (isset($_REQUEST['submit'])) {
                try {
                    include "conndb.php";
                    $name = $_REQUEST['uname'];
                    $email = $_REQUEST['email'];
                    $pwd = $_REQUEST['pwd'];//robin said i use assembly language:)
                    $pwd1 = $_REQUEST['pwd1'];
                    $log = 0;
                    if ($pwd == $pwd1) {
                        $statement = $pdo->prepare("SELECT `id` FROM `users` WHERE email=?");
                        $statement->execute([$email]);
                        if ($statement->rowCount() == 0) {
                            $statement = $pdo->prepare("INSERT INTO `users`(`id`, `times_log`, `userName`, `email`, `password`)  VALUES (?,?,?,?)");
                            if ($statement->execute([$name, $log, $email, password_hash($pwd, PASSWORD_BCRYPT)])) {
                                session_start();
                                $_SESSION['user'] = $statement->fetch();
                                function redirect($url)
                                {//authored by robin
                                    ob_start();
                                    header('Location: ' . $url);
                                    ob_end_flush();
                                    exit();
                                }

                                redirect('home.php');
                                // echo '<p class="text-info text-center animated slideInRight">Welcome '.$name.'</p>';
                            } else {
                                echo '<p class="text-danger text-center animated shake">Something went wrong please try again</p>';
                            }
                        } else {
                            echo "<p class=\"text-danger text-center animated shake\">Email is already registered</p>";
                        }

                    } else {
                        echo '<p class="text-danger text-center animated shake">passwords do not match</p>';
                    }

                } catch (PDOException $e) {
                    echo "<p class=\"text-danger text-center animated shake\">An error occurred" . $e->getMessage() . "</p>";
                }

            }

            ?>
            <div class="form-group">
                <label class="control-label " for="uname">Username:</label>
                <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
                <label class="control-label " for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label class="control-label " for="pwd">Password:</label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <label class="control-label " for="pwd">Password:</label>
                <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Confirm password"
                       required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
            </div>
        </form>
        <div> have an account? <a href="login.php">Login</a></div>
    </div>

</div>
</body>
</html>