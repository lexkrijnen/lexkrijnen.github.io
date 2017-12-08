<?php
// The message
$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");


$to      = 'nobody@example.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: jeroenelferink13@gmail.com' . "\r\n" .
    'Reply-To: jeroenelferink13@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>
