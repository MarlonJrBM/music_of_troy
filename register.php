<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/22/14
 * Time: 12:13 AM
 */
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
include_once 'includes/header.php';
if (!empty($error_msg)) {
    echo $error_msg;
}

?>

    <div class="container">
        <div class="row">
            <div class="span4 offset4 well">
                <legend>Registration</legend>
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"  method="POST" name="registration_form">
                    <input type="text" id="email" class="span4" name="email" placeholder="Email">
                    <input type="text" id="username" class="span4" name="username" placeholder="Username">
                    <input type="password" id="password" class="span4" name="password" placeholder="Password">
                    <input type="password" id="confirmpwd" class="span4" name="confirmpwd" placeholder="Password Confirmation">
                    <button type="submit" name="submit" class="btn btn-info btn-block" onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);">Sign up</button>
                </form>
            </div>
        </div>
    </div>








    <?php include_once 'includes/footer.php' ?>