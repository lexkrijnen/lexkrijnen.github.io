<?php $name = "Jeroen"//$_POST['name'];
$email = "jeroen.e99@gmail.com"//$_POST['email'];
$message = "This is a test email"//$_POST['message'];
$formcontent="From: $name \n Message: $message";
$recipient = "jeroenelferink13@gmail.com";
$subject = "Testmail";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
print("Thank You!");
?>
