<?php
/**
 * Created by PhpStorm.
 * User: Isaac
 * Date: 8/11/2017
 * Time: 5:18 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bucketlist";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}