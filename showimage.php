<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 12/1/14
 * Time: 3:02 PM
 */

include_once 'includes/pre-header.php';

/*** some basic sanity checks ***/
if(filter_has_var(INPUT_GET, "artist_id") !== false && filter_input(INPUT_GET, 'artist_id', FILTER_VALIDATE_INT) !== false)
{
    /*** assign the image id ***/
    $artist_id = filter_input(INPUT_GET, "artist_id", FILTER_SANITIZE_NUMBER_INT);
    try     {
        /*** connect to the database ***/
//        $dbh = new PDO("mysql:host=localhost;dbname=testblob", 'username', 'password');
//
//        /*** set the PDO error mode to exception ***/
//        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** The sql statement ***/
        $sql = "SELECT image, image_type FROM artist_images WHERE artist_id=$artist_id";

        /*** prepare the sql ***/
        $stmt = $mysqli->prepare($sql);

        /*** exceute the query ***/
        $stmt->execute();

        /*** set the fetch mode to associative array ***/
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);


        $stmt->store_result();
        $stmt->bind_result($image, $image_type);
        /*** set the header for the image ***/
        $stmt->fetch();

        /*** check we have a single image and type ***/

            /*** set the headers and display the image ***/
            header("Content-type: ".$image_type);

            /*** output the image ***/
            echo $image;



    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
else
{
    echo 'Please use a real id number';
}

?>