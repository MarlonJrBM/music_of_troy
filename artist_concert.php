<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/9/14
 * Time: 9:39 PM
 */

include_once 'includes/pre-header.php';

if (!$is_logged) {
    header('Location: index.php');
} else {
    include_once 'includes/header.php';
}

$error = "";
$success="";

if ((!empty($_POST['location'])) && (!empty($_POST['concert_date']) )) {

        if ($stmt = $mysqli->prepare("INSERT INTO concerts(artist_id,concert_date,concert_name,location, time) VALUES(?,?,?,?,?)")) {
            $stmt->bind_param("issss", $_SESSION['artist_id'], $_POST['concert_date'], $_POST['concert_name'], $_POST['location'], $_POST['time']);
            if ($stmt->execute()) {
                $success = "Concert successfully added.";
            } else {
                $error = "There was an error with the provided information. Please try again.";
            }

        } else {
            $error = "There was an error connecting to the database. Please try again.";
        }


}





$rs = $mysqli->query("SELECT * FROM concerts WHERE artist_id={$_SESSION['artist_id']}");
if (!$rs) {
    trigger_error('Wrong SQL: ' . ' Error: ' . $mysqli->error, E_USER_ERROR);
} else {
    $rows_returned = $rs->num_rows;
}

?>




<div class="row">
    <div class="span12">
        <h2>My Concerts</h2>
        <h4><?php echo $username ?></h4>

    </div>



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

    <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">

        <div class="span12"><h5>Location: </h5>
            <input name="location" class="span2" id="appendedInputButton" size="16" type="text"></div>

        <div class="span12"><h5>Date: </h5>
            <input name="concert_date" class="span2" id="appendedInputButton" size="16" type="text"></div>

        <div class="span12"><h5>Time: </h5>
            <input name="time" class="span2" id="appendedInputButton" size="16" type="text"></div>


        <div class="span12"><h5>Concert Name: (optional) </h5>
            <input name="concert_name" class="span2" id="appendedInputButton" size="16" type="text"></div>

        <div class="span12"><button class="btn  btn-primary" type="submit">
                Create Concert
            </button><br/><br/></div>

        <input name="validation_token" type="hidden" value="<?php echo $validation_token   ?>">
    </form>

    <hr/>
    <div class="span12"><h3 class="title-bg" >Concerts</a></h3></div>



        <?php while ($concert = $rs->fetch_assoc()) { ?>

            <div class="span4">
                <h4><?php echo $concert['concert_name'] ?> </h4>
                <h6><strong>Location:</strong> <?php echo $concert['location'] ?> </h6>
                <h6><strong>Date:</strong> <?php echo $concert['concert_date'] ?> @ <?php echo $concert['time'] ?> </h6>
                <a  href="concert_delete.php?concert_id=<?php echo $concert['concert_id']?>">
                    <button class="btn btn-small btn-danger" type="button">Delete Concert</button>
                </a><br/><br/>
            </div>


        <?php } ?>








</div>


<?php include_once 'includes/footer.php' ?>