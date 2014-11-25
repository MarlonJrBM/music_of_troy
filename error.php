<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/22/14
 * Time: 12:31 AM
 */

$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
include_once 'includes/header.php';

?>

    <div class="row">
        <div class="span12">
            <h2>Musicians of Troy</h2>
            <p class="lead">Sorry, we had a problem!</p>

            <div class="row">
                <p>Error! <?php echo $error; ?></p>
            </div>

        </div>
    </div>








<?php include_once 'includes/footer.php' ?>