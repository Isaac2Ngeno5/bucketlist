<?php
/**
 * Created by PhpStorm.
 * User: Isaac
 * Date: 8/13/2017
 * Time: 5:59 PM
 */
include "conndb.php";

function redirect($url){
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * from users WHERE email LIKE '{$email}' AND password LIKE '{$password}' LIMIT 1";
$result = $conn->query($sql);
if (!$result->num_rows == 1) {
    echo "<p>Invalid username/password combination</p>";
} else {
    redirect("index.php");
    // do stuffs
}