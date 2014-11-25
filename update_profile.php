<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/24/14
 * Time: 4:28 PM
 */

if (isset($_POST['artist_name'], $_POST['biography'])) {
    include_once 'includes/pre-header.php';

    $artist_name = $_POST['artist_name'];
    $biography = $_POST['biography'];

    if ($stmt = $mysqli->prepare("UPDATE artists SET artist_name=?, biography=? WHERE artist_id={$_SESSION['artist_id']}")) {
        $stmt->bind_param("ss",$_POST['artist_name'],$_POST['biography']  );
        if ($stmt->execute()) {
            header("Location: profile.php?status=1 ");
        } else {
            header("Location: profile.php?status=0");
        }
    }
} else {
    header('Location: error.php?err=InvalidRequest');
}

?>