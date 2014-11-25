<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/24/14
 * Time: 2:16 PM
 */

include_once 'includes/header.php';

?>


<div class="row"><!--Container row-->

    <div class="span8 contact"><!--Begin page content column-->

        <h2>Contact Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna.</p>

        <?php if (isset($_GET['msg_success'])) {
            if ($_GET['msg_success'] == 1) {
                echo '<div class="alert alert-success" ><a class="close" data-dismiss="alert" href="#">×</a>
            Well done! Your email was successfully sent!
        </div>';
            }
            else {
                echo '<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>
            There was a problem sending your message. Please fill out all fields and try again.
        </div>';
            }

        } ?>


        <form method="post" action="email_confirm.php" id="contact-form">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input class="span4" name="name" id="prependedInput" size="16" type="text" placeholder="Name">
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                <input class="span4" name="email" id="prependedInput" size="16" type="email" placeholder="Email Address">
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i></span>
                <input class="span4" name="subject" id="prependedInput" size="16" type="text" placeholder="Subject">
            </div>
            <textarea name="msg" class="span6"></textarea>
            <div class="row">
                <div class="span2">
                    <input type="submit" class="btn btn-inverse" value="Send Message">
                </div>
            </div>
        </form>

    </div> <!--End page content column-->

    <!-- Sidebar
    ================================================== -->
    <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->
        <h5 class="title-bg">Our Location</h5>
        <address>
            <strong>Piccolo</strong><br>
            123 Main St, Suite 600<br>
            San Francisco, CA 94107<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
        </address>

        <address>
            <strong>Jimmy Doe</strong><br>
            <a href="mailto:#">first.last@gmail.com</a>
        </address>

        <h5 class="title-bg">Map Us</h5>
        <img src="img/location-map.jpg" alt="map">

    </div><!-- End sidebar column -->

</div><!-- End container row -->


<?php include_once 'includes/footer.php' ?>