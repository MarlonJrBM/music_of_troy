<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/4/14
 * Time: 11:51 AM
 */


header("Content-Type: application/json; charset=UTF-8");


include_once 'psl-config.php';

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
    $outp .= '"artist_id":"'  . $artist["artist_id"] . '",';
    $outp .= '"image_path":"'  . $artist["artist_image_path"] . '",';
    $outp .= '"biography":"'  . $artist["biography"] . '"}';
}

$outp .="]";

echo $outp;

?>