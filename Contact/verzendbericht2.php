<?php

$name = "jeroen";
$email = "jeroen.e99@gmail.com";
$message = "testtest";
$formcontent="From: $name \n Message: $message";
$recipient = "jeroenelferink13@gmail.com";
$subject = "Testmail";
$mailheader = "From: $email \r\n";
print($name . $email . $message . $formcontent . $recipient . $subject . $mailheader);
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
print("Thank You!");

?>
