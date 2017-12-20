<?php
session_start();
if (isset($_POST['submitmail'])) {
    $name = $_POST['naam'];
    $email = $_POST['mail'];
    $message = $_POST['bericht'];
    $formcontent="Verzonden door:\n $name \n $email \n\n Bericht: \n $message";
    $recipient = "markxjansen@gmail.com";
    $subject = $_POST['onderwerp'];
    $mailheader = "From: $email \r\n";

    mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
    $_POST['verzonden'] = TRUE;
    header('Location: ../Contact/contact.php');
}
?>