<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


if (isset($_POST['submit'])) {
  $name = $_POST['naam'];
  $subject = $_POST['onderwerp'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['bericht'];


  $mailTo = "markxjansen@gmail.com";
  $headers = "From: ".$mailFrom;
  $txt = "You have received an e-mail from ".$name.".\n\n".$message;

    $mail = mail($mailTo, $subject, $txt);
    if($mail){
        echo "Thank you for using our mail form";
    }else{
        echo "Mail sending failed.";
    }
}