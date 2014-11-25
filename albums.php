<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/21/14
 * Time: 9:52 PM
 */
include_once 'includes/header.php';
?>

    <!-- Page Content
        ================================================== -->

    <!-- Title Header -->
    <div class="row">
        <div class="span12">
            <h2>Raul Seixas</h2>
            <p class="lead">Do que ter aquela velha opiniao formada sobre tudo...</p>

            <!-- Carousel
            ================================================== -->

            <div class="row">
                <div class="span6">
                    <div class="flexslider">
                        <ul class="slides">
                            <li><a href="gallery-single.htm"><img src="img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                            <li><a href="gallery-single.htm"><img src="img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                            <li><a href="gallery-single.htm"><img src="img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                            <li><a href="gallery-single.htm"><img src="img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                            <li><a href="gallery-single.htm"><img src="img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                        </ul>
                    </div>
                </div>

                <div class="span6">
                    <h5>Lorem ipsum dolor sit amet</h5>
                    <p>Vivamus augue nulla, vestibulum ac ultrices posuere, vehicula ac arcu. Quisque nisi lacus, bibendum quis commodo eget, lobortis eget elit. Cras venenatis mauris eu tortor consequat a convallis nulla molestie. Phasellus malesuada malesuada velit et fermentum. Proin ut leo nec mauris pulvinar volutpat. Sed ac neque nec leo condimentum rhoncus. Nunc dapibus odio et lacus elementum congue. Praesent nulla arcu, condimentum eu lobortis sit amet, pretium vitae metus. </p>

                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. Praesent nulla arcu, condimentum eu lobortis.</p>
                        <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                    </blockquote>

                    <button class="btn btn-small btn-inverse" type="button">Find out more</button>
                </div>

            </div>

            <h3 class="title-bg"> Albums</h3>

            <div class="row">
                <div class="span4">
                    <img src="img/gallery/gallery-img-1-3col.jpg" alt="image">
                    <h5>Rock das Aranha</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>

                    <div class="accordion" id="accordion2">
                        <a  data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            <button class="btn btn-large btn-inverse" type="button">View Songs</button>
                        </a>
                        <div id="collapseOne" class="accordion-body collapse out">
                            <div class="accordion-inner">
                                <ul class="list-group">
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="span4">
                    <img src="img/gallery/gallery-img-1-3col.jpg" alt="image">
                    <h5>Anos 80</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>
                    <div class="accordion">
                        <a  data-toggle="collapse" href="#collapseTwo">
                            <button class="btn btn btn-inverse" type="button">View Songs</button>
                        </a>
                        <div id="collapseTwo" class="accordion-body collapse out">
                            <div class="accordion-inner">
                                <ul>
                                    <p><li >Dapibus ac facilisis in</li></p>
                                    <p><li >Dapibus ac facilisis in</li></p>
                                    <p><li >Dapibus ac facilisis in</li></p>
                                    <p><li >Dapibus ac facilisis in</li></p>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="span4">
                    <img src="img/gallery/gallery-img-1-3col.jpg" alt="image">
                    <h5>Metamorfose Ambulante</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna. Nulla faucibus ligula eget ante varius ac euismod odio placerat. Nam sit amet felis non lorem faucibus rhoncus vitae id dui.</p>
                    <div class="accordion">
                        <a  data-toggle="collapse" href="#collapseThree">
                            <button class="btn btn btn-inverse" type="button">View Songs</button>
                        </a>
                        <div id="collapseThree" class="accordion-body collapse out">
                            <div class="accordion-inner">
                                <ul class="list-group">
                                    <p><li class="list-group-item"><a href="songs.php">Minha Viola</a></li></p>
                                    <p><li class="list-group-item">Dapibus ac facilisis in</li></p>
                                    <p><li class="list-group-item">Dapibus ac facilisis in</li></p>
                                    <p><li class="list-group-item">Dapibus ac facilisis in</li></p>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>











<?php include_once 'includes/footer.php' ?>