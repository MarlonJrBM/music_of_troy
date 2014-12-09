<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/5/14
 * Time: 11:25 PM
 */
include_once 'includes/pre-header.php';
if (isset($_GET['album_id']))
{
    $stmt = $mysqli->prepare("SELECT artist_id, image_path, album_name, year, album_description FROM albums WHERE album_id=?");
    $stmt->bind_param("i",$_GET['album_id'] );
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($artist_id, $image_path, $album_name, $year, $album_description);
    $stmt->fetch();
    if (($stmt->num_rows==0) || ($artist_id!=$_SESSION['artist_id'])) {
        header('Location: artist_album.php');
    }
    $mysqli->query("DELETE FROM albums WHERE album_id={$_GET['album_id']}");
}
    header('Location: artist_album.php');



?>