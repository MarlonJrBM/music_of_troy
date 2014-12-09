<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/2/14
 * Time: 10:30 PM
 */

include_once 'includes/pre-header.php';

if (!$is_logged) {
    header('Location: index.php');
} else {
    include_once 'includes/header.php';
}

$error = "";
$success="";

if ((!empty($_POST['album_name'])) && (!empty($_POST['album_year']) )) {
    if ((isset($_FILES['album_image'])) && !empty($_FILES['album_image']['name'])) {
        try {
            $filepath = upload_path('album_image');
        } catch(Exception $e)
        {
            $error = "There was a problem uploading the image.";
//            echo '<h4>'.$e->getMessage().'</h4>';
        }
    }

    if ($stmt = $mysqli->prepare("INSERT INTO albums(artist_id, album_name, year, image_path, album_description) VALUES(?, ?, ?, ?, ?)")) {
        if (!isset($filepath)) {
            $filepath = "img/gallery/thumbnail-270x300.jpg";
        }
        $stmt->bind_param("issss",$_SESSION['artist_id'], $_POST['album_name'], $_POST['album_year'], $filepath,  $_POST['album_description'] );
        if (!$stmt->execute()) {
            $error = "There was a problem with the connection. Please try again in a few hours. " . $mysqli->error;
        } else {
            $success = "Album successfully added.";
        }

    } else {
        $error = "There was a problem with the connection. Please try again in a few hours. " . $mysqli->error ;
    }
}

$rs = $mysqli->query("SELECT * FROM albums WHERE artist_id={$_SESSION['artist_id']} ORDER BY year");
if (!$rs) {
    trigger_error('Wrong SQL: ' . ' Error: ' . $mysqli->error, E_USER_ERROR);
} else {
    $rows_returned = $rs->num_rows;
}

?>


    <div class="row">
        <div class="span12">
            <h2>My Albums</h2>
            <h4><?php echo $username ?></h4>

        </div>



            <br/><br/>

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

            <form enctype="multipart/form-data" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">

                <div class="span12"><h5> Album Name: </h5>
                    <input name="album_name" class="span2" id="appendedInputButton" size="16" type="text"></div>

                <div class="span12"><h5>Album Picture: </h5>
                    <img style="width:300px"src="<?php echo $image_path ?>" alt="image">
                    <input name="album_image" value="Change picture" type="file">
                    <br/><br/></div>

                <div class="span12"><h5>Album Year: </h5>
                    <input name="album_year" class="span2" id="appendedInputButton" size="16" type="text"></div>

                <div class="span12"><h5>Album Description: </h5>
                    <textarea rows="3" name="album_description" class="span6" id="appendedInputButton" size="16" ></textarea><br/><br/></div>


                <div class="span12"><button class="btn btn-large btn-primary" type="submit">
                        Create Album
                    </button><br/><br/></div>
            </form>

            <hr/>
            <div class="span12"><h3 class="title-bg" >Albums</a></h3></div>
    </div>

<div class="row">

    <?php while ($album = $rs->fetch_assoc()) { ?>

        <div class="span4">
            <img src="<?php echo $album['image_path'] ?>" alt="image">
            <h5><?php echo $album['album_name'] ?> (<?php echo $album['year'] ?>)</h5>
            <p><?php echo $album['album_description'] ?></p>
            <div class="accordion" id="accordion2">
                <a  href="album_edit.php?album_id=<?php echo $album['album_id']?>">
                    <button class="btn btn-large btn-primary" type="button">Edit Album</button>
                </a>
                <a  href="album_delete.php?album_id=<?php echo $album['album_id']?>">
                    <button class="btn btn-large btn-danger" type="button">Delete Album</button>
                </a>


            </div>

        </div>


    <?php } ?>

</div>



<?php include_once 'includes/footer.php' ?>