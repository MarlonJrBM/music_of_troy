<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/21/14
 * Time: 9:58 PM
 */

include_once 'includes/pre-header.php';

if (!$is_logged) {
    header('Location: index.php');
} else {
    include_once 'includes/header.php';
}



if ($stmt = $mysqli->prepare("SELECT artist_name, username, biography, artist_image_path FROM artists WHERE artist_id = ?")) {
    $stmt->bind_param("i", $_SESSION['artist_id'] );
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($artist_name, $username, $biography, $image_path);
    $stmt->fetch();
}
?>




<!-- Page Content
   ================================================== -->

<!-- Title Header -->
<div class="row">
    <div class="span10">
        <h2>My Profile</h2>
        <h4><?php echo $username ?></h4>

    </div>
    <div class="span2 text-right "><h4 ><a href="artist_album.php"> Manage My Albums</a></h4><br/></div>

        <br/><br/>

        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status']=='1') {
                echo '<div class="span12 alert alert-success">
                <a class="close" data-dismiss="alert" href="#">×</a>Profile successfully updated!
            </div>';
            } elseif ($_GET['status']=='0') {
                echo '<div class="span12 alert alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>There was a problem updating your profile, please try again.
            </div>';

            }
        }
        ?>

        <form enctype="multipart/form-data" action="update_profile.php" method="post">

            <div class="span12"><h5>Name: </h5>
            <input name="artist_name" value="<?php echo $artist_name ?>" class="span2" id="appendedInputButton" size="16" type="text"></div>

            <div class="span12"><h5>Profile Picture: </h5>
            <img style="width:370px"src="<?php echo $image_path ?>" alt="image">
            <input name="artist_image" value="Change picture" type="file">
                <br/><br/></div>

            <div class="span12"><h5>Biography: </h5>
            <textarea rows="3" name="biography" class="span6" id="appendedInputButton" size="16" ><?php echo $biography ?></textarea><br/><br/></div>


            <div class="span12"><button class="btn btn-primary" type="submit">
                Update Profile
            </button><br/><br/></div>
        </form>
        <hr/>



</div>



<?php include_once 'includes/footer.php' ?>