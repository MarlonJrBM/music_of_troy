<?php
/**
 * Created by PhpStorm.
 * User: marlon
 * Date: 11/24/14
 * Time: 2:24 PM
 */

if (!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['name']) && !empty($_POST["msg"])) {
    $to = "marlonbr1@gmail.com";
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['name'] ." sent you a message: \n" . $_POST['msg'];
    $headers = "From: <$email>\n";
    if (mail($to, $subject, $msg, $headers)) {
        $msg_success = true;
    }
    else {
        $msg_success = false;
    }

    header("Location: contact.php?msg_success=$msg_success");

} else {
    header('Location: error.php');
}


?>