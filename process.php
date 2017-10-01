<?php
/**
 * Created by PhpStorm.
 * User: Isaac
 * Date: 8/11/2017
 * Time: 5:30 PM
 */

function redirect($url){
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bucketlist";
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y/m/d") ;


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "INSERT INTO `bucket_items`(`date`, `title`, `content`) VALUES ('$date','$title','$content')";
if (mysqli_query($conn, $sql)) {
    redirect("view.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

