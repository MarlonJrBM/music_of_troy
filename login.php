<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/21/14
 * Time: 10:03 PM
 */



include_once 'includes/pre-header.php';

if ($is_logged) {
    header('Location: index.php');
} else {
    include_once 'includes/header.php';
}

?>


<div class="container">
    <div class="row">
        <div class="span4 offset4 well">
            <legend>Please Sign In</legend>
            <?php
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
            </div>';
            }
            ?>
            <form action="includes/process_login.php" method="POST">
                <input type="text" id="username" class="span4" name="email" placeholder="Email">
                <input type="password" id="password" class="span4" name="password" placeholder="Password">
                <button type="submit" name="submit" class="btn btn-info btn-block" onclick="formhash(this.form, this.form.password);">Sign in</button>
            </form>
        </div>
    </div>
</div>



<?php include_once 'includes/footer.php' ?>