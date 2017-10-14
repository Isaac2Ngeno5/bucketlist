<?php
/**
 * Created by PhpStorm.
 * User: Isaac
 * Date: 8/11/2017
 * Time: 5:18 PM
 */
$host = '127.0.0.1';
$db   = 'bucketlist';
$user = 'root';
$pass = '';
$charset = 'utf8';
try{
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
}catch (PDOException $e){
    echo $e->getMessage();
}
