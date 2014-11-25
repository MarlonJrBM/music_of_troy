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
$artist_name="VAISEFUDER";


if ($stmt = $mysqli->prepare("SELECT artist_name, username, biography FROM artists WHERE artist_id = ?")) {
    $stmt->bind_param("i", $_SESSION['artist_id'] );
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($artist_name, $username, $biography);
    $stmt->fetch();
}
?>




<!-- Page Content
   ================================================== -->

<!-- Title Header -->
<div class="row">
    <div class="span12">
        <h2>My Profile</h2>
        <h4><?php echo $username ?></h4>

        <br/><br/>


        <form action="update_profile.php" method="post">

            <h5>Name: </h5>
            <input name="artist_name" value="<?php echo $artist_name ?>" class="span2" id="appendedInputButton" size="16" type="text">

            <h5>Biography: </h5>
            <textarea rows="3" name="biography" class="span6" id="appendedInputButton" size="16" ><?php echo $biography ?></textarea>

            <br/><br/>
            <button class="btn btn-primary" type="submit">
                Update Profile
            </button>
        </form>

        <hr/>
        <h5 ><a href=""> Manage My Albums</a></h5>

    </div>
</div>



<?php include_once 'includes/footer.php' ?>