<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/10/14
 * Time: 5:08 PM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../includes/psl-config.php';

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$rs = $mysqli->query("SELECT * FROM concerts");

$outp = "[";

while ($concert = $rs->fetch_assoc() ) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"concert_name":"'  . $concert["concert_name"] . '",';
    $outp .= '"concert_date":"'  . $concert["concert_date"] . '",';
    $outp .= '"_id":"'  . $concert["concert_id"] . '",';
    $outp .= '"location":"'  . $concert["location"] . '",';
    $outp .= '"time":"'  . $concert["time"] . '",';
    $outp .= '"artist_id":"'  . $concert["artist_id"] . '"}';

}


$outp .="]";


echo $outp;

?>