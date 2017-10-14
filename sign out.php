<?php
/**
 * Created by PhpStorm.
 * User: Isaac
 * Date: 10/6/2017
 * Time: 2:58 PM
 */
session_start();
unset($_SESSION['user']);
function redirect($url){//authored by robin
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    exit();
}
redirect('home.php');
die();