<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/21/14
 * Time: 9:52 PM
 */
include_once 'includes/pre-header.php';
if (!isset($_GET['artist_id'])) {
    header("Location: index.php");
} else {
    $stmt = $mysqli->prepare("SELECT artist_name, artist_image_path, biography FROM artists WHERE artist_id=?");
    $stmt->bind_param("i",$_GET['artist_id'] );
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows==0) {
        header("Location: index.php");
    }
    $stmt->bind_result($artist_name, $image_path, $biography);
    $stmt->fetch();

    $rs = $mysqli->query("SELECT * FROM albums WHERE artist_id={$_GET['artist_id']} ORDER BY year");
    if (!$rs) {
        trigger_error('Wrong SQL: ' . ' Error: ' . $mysqli->error, E_USER_ERROR);
    } else {
        $rows_returned = $rs->num_rows;
    }
}
include_once 'includes/header.php';

?>

    <!-- Page Content
        ================================================== -->

    <!-- Title Header -->
    <div class="row">
        <div class="span12">
            <h2><?php echo $artist_name ?></h2>
            <p class="lead"></p>

            <!-- Carousel
            ================================================== -->

            <div class="row">
                <div class="span6">
                    <div class="flexslider">
                        <ul class="slides">
                            <li><img src="<?php echo $image_path ?>" alt="slider"/></li>
                        </ul>
                    </div>
                </div>

                <div class="span6">
                    <h5>Artist's Biography</h5>
                    <p><?php echo $biography ?></p>

                    <button class="btn btn-small btn-inverse" type="button">Find out more</button>
                </div>

            </div>

            <h3 class="title-bg"> Albums</h3>

            <div class="row">


<!--                <div class="span4">-->
<!--                    <img src="img/gallery/gallery-img-1-3col.jpg" alt="image">-->
<!--                    <h5>Rock das Aranha</h5>-->
<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>-->
<!---->
<!--                    <div class="accordion" id="accordion2">-->
<!--                        <a  data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">-->
<!--                            <button class="btn btn-large btn-inverse" type="button">View Songs</button>-->
<!--                        </a>-->
<!--                        <div id="collapseOne" class="accordion-body collapse out">-->
<!--                            <div class="accordion-inner">-->
<!--                                <ul class="list-group">-->
<!--                                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                                    <li class="list-group-item">Dapibus ac facilisis in</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->

                <?php while ($album = $rs->fetch_assoc()) { ?>

                    <div class="span4">
                        <img src="<?php echo $album['image_path'] ?>" alt="image">
                        <h5><?php echo $album['album_name'] ?> (<?php echo $album['year'] ?>)</h5>
                        <p><?php echo $album['album_description'] ?></p>

                    </div>


                <?php } ?>

            </div>

        </div>
    </div>











<?php include_once 'includes/footer.php' ?>