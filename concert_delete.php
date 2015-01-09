<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/5/14
 * Time: 11:25 PM
 */
include_once 'includes/pre-header.php';
if (isset($_GET['concert_id']))
{
    $stmt = $mysqli->prepare("SELECT artist_id FROM concerts WHERE concert_id=?");
    $stmt->bind_param("i",$_GET['concert_id'] );
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($artist_id);
    $stmt->fetch();
    if (($stmt->num_rows==0) || ($artist_id!=$_SESSION['artist_id'])) {
        header('Location: artist_album.php');
    }
    $mysqli->query("DELETE FROM concerts WHERE concert_id={$_GET['concert_id']}");
}
header('Location: artist_concert.php');



?>