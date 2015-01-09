<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/8/14
 * Time: 2:58 PM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../includes/psl-config.php';

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$rs = $mysqli->query("SELECT * FROM artists WHERE is_admin=0");

$outp = "[";


while ($artist = $rs->fetch_assoc() ) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"artist_name":"'  . $artist["artist_name"] . '",';
    $outp .= '"_id":"'  . $artist["artist_id"] . '",';
    $outp .= '"image_data":"'  . get_base64_from_image($artist["artist_image_path"]) . '",';
    $outp .= '"biography":"'  . $artist["biography"] . '"}';
}

$outp .="]";


echo $outp;



function get_base64_from_image($path) {
    $path = "../" . $path;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $prefix  = 'data:image/' . $type . ';base64,' ;
    $base64 = base64_encode($data);
    return $base64;
}

?>