<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/5/14
 * Time: 10:37 PM
 */

include_once 'includes/pre-header.php';

if ($is_logged && is_admin($mysqli, $_SESSION['artist_id']) && isset($_GET['artist_id'])) {
    $_GET['artist_id'] = mysqli_escape_string($mysqli,$_GET['artist_id']);
    if ($mysqli->query("DELETE FROM artists WHERE artist_id={$_GET['artist_id']}") && $mysqli->query("DELETE FROM albums WHERE artist_id={$_GET['artist_id']}")) {
        header("Location: manager.php");
//    if ($stmt = $mysqli->prepare("DELETE FROM artists WHERE artist_id=?") && $stmt2 = $mysqli->prepare("DELETE FROM albums WHERE artist_id=?") ) {
//        $stmt->bind_param("i", $_GET['artist_id']);
//        $stmt2->bind_param("i", $_GET['artist_id']);
//        if ($stmt->execute() && $stmt2->execute()) {
//            header("Location: manager.php");
//        }
    }
}
echo $mysqli->error;
header("Location: index.php");


?>