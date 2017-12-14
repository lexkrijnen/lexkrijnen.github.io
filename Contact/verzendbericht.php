<?php

if (isset($_POST['submit'])) {
  $name = $_POST['naam'];
  $subject = $_POST['onderwerp'];
  $mailFrom = $_POST['mail'];
  $message = $_POST['bericht'];

  $mailTo = "markxjansen@gmail.com";
  $headers = "From: ".$mailFrom;
  $txt = "You have received an e-mail from ".$name.".\n\n".$message;


  mail($mailTo, $subject, $txt, $headers);
  header("Location: contact.php?mailsend");
}
