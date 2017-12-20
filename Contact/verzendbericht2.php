<?php

$name = $_SESSION["mailnaam"];
$email = "jeroen.e99@gmail.com";
$message = $_SESSION["bericht"];
$formcontent="From: $name \n Message: $message";
$recipient = $_SESSION["mailadres];
$subject = "Testmail";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
print("Thank You!");

?>
