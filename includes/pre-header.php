<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/22/14
 * Time: 2:18 AM
 */
include_once 'includes/psl-config.php';

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
    $is_logged = true;
    $username = $_SESSION['username'];
} else {
    $logged = 'out';
    $is_logged = false;
}

//var_dump($_SESSION);


//ho@usc.edu Rednose11
//lennon@usc.edu    Beatles9
//leng@usc.edu      aNakin51
//thesir@usc.edu    SoyAdmin666
?>