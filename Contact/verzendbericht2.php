<?php

$name = $_SESSION["mailnaam"];
$email = $_SESSION["mailadres"];
$message = $_SESSION["bericht"];
$formcontent="From: $name \n Message: $message";
$recipient = "jeroenelferink13@gmail.com";
$subject = "Testmail";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
print("Thank You!");

?>
