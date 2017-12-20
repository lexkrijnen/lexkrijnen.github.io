<?php
if (isset($_POST['submitmail'])) {
    $name = $_POST['naam'];
    $email = $_POST['email'];
    $message = $_POST['bericht'];
    $formcontent="Verzonden door:\n $name \n $email \n Bericht: \n $message";
    $recipient = "markxjansen@gmail.com";
    $subject = $_POST['onderwerp'];
    $mailheader = "From: $email \r\n";

    mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
    //header('Location: contact.php?mailsend');
    print("MOOI MAN!!! hij lijkt verzonden.");
}
?>