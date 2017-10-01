<?php
/**
 * Created by PhpStorm.
 * User: Isaac
 * Date: 8/11/2017
 * Time: 8:44 PM
 */
include "conndb.php";
//create variables for the data that is entered by user
$name = $_POST['uname'];
$email = $_POST['email'];
$pass = $_POST['pwd'];
$pass1 = $_POST['pwd1'];
//verify that the two passwords match
if ($pass == $pass1){
    //insert the data to a database
    $sql = "INSERT INTO `users`(`userName`, `email`, `password`) VALUES ('$name','$email','$pass')";
    if (mysqli_query($conn, $sql)) {
        echo "user registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}else{
    echo "passwords entered do not match";
}

