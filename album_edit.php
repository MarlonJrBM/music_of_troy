<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/4/14
 * Time: 5:40 PM
 */
include_once 'includes/pre-header.php';
$error = "";
$success="";
if (!$is_logged) {
    header('Location: index.php');
} elseif ((!empty($_POST['album_name'])) && (!empty($_POST['album_year']) ) && (isset($_GET['album_id'])) )
     {
         $_POST['album_name'] = $mysqli->escape_string($_POST['album_name']);
         $_POST['year'] = $mysqli->escape_string($_POST['year']);
         $_POST['album_description'] = $mysqli->escape_string($_POST['album_description']);
         if ((isset($_FILES['album_image'])) && !empty($_FILES['album_image']['name'])) {
             try {
                 $filepath = upload_path('album_image');
             } catch(Exception $e)
             {
                 $error = "There was a problem uploading the image.";
//            echo '<h4>'.$e->getMessage().'</h4>';
             }
         }

         $sql = "UPDATE albums SET album_name='{$_POST['album_name']}', year='{$_POST['album_year']}', album_description='{$_POST['album_description']}'";
         if (isset($filepath)) {
             $sql .= ", image_path='{$filepath}'";
         }
         $sql .= " WHERE album_id={$_GET['album_id']}";

         if ($mysqli->query($sql)) {
             $success = "Album successfully updated.";
         }
         else {
             $error = "There was a problem with the connection. Please try again in a few hours. " . $sql ;
         }

    }

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
} else {
    header('Location: artist_album.php');
}

include_once 'includes/header.php';

?>


<div class="row">
    <div class="span10">
        <h2>Edit Album</h2>
        <h4><?php echo $album_name ?></h4>
    </div>

    <div class="span2 text-right "><h4 ><a href="artist_album.php"> Manage My Albums</a></h4><br/></div>


    <?php
    if (!empty($success)) {
        echo "<div class=' span12 alert alert-success'>
                <a class='close' data-dismiss='alert' href='#'>×</a>$success
            </div>";}
    elseif (!empty($error)) {
        echo "<div class='span12 alert alert-error'>
                <a class='close' data-dismiss='alert' href='#'>×</a>$error
            </div>";;

    }

    ?>


    <form enctype="multipart/form-data" action="<?php echo (esc_url($_SERVER['PHP_SELF']) . "?album_id={$_GET['album_id']}"); ?>" method="post">

        <div class="span12"><h5> Album Name: </h5>
            <input name="album_name" value="<?php echo $album_name ?>"  class="span2" id="appendedInputButton" size="16" type="text"></div>

        <div class="span12"><h5>Album Picture: </h5>
            <img style="width:300px"src="<?php echo $image_path ?>" alt="image">
            <input name="album_image" value="Change picture" type="file">
            <br/><br/></div>

        <div class="span12"><h5>Album Year: </h5>
            <input value="<?php echo $year ?>" name="album_year" class="span2" id="appendedInputButton" size="16" type="text"></div>

        <div class="span12"><h5>Album Description: </h5>
            <textarea rows="3" name="album_description" class="span6" id="appendedInputButton" size="16" ><?php echo $album_description ?></textarea><br/><br/></div>


        <div class="span12"><button class="btn btn-large btn-primary" type="submit">
                Edit Album
            </button><br/><br/></div>
    </form>

    <hr/>



</div>