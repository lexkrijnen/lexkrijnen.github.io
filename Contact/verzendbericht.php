<?php
session_start();


if (isset($_POST['submitmail'])){
	$response = $_POST["g-recaptcha-response"];
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array(
		'secret' => '6LeINj8UAAAAAAPJ4THvzlrX8bSNIUncQoyH9qes',
		'response' => $_POST["g-recaptcha-response"]
	);
	$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);
	if ($captcha_success->success==false) {
		print("<p>You are a bot! Go away!</p>");
	} else if ($captcha_success->success==true) {
		print("<p>You are not not a bot!</p>");
        $name = $_POST['naam'];
        $email = $_POST['mail'];
        $message = $_POST['bericht'];
        $formcontent="Verzonden door:\n $name \n $email \n\n Bericht: \n $message";
        $recipient = "jeroenelferink13@gmail.com";//"markxjansen@gmail.com";
        $subject = $_POST['onderwerp'];
        $mailheader = "From: $email \r\n";

        mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
        $_SESSION['verzonden'] = TRUE;
        header('Location: ../Contact/contact.php');
	}
}




/*

if (isset($_POST['submitmail'])) {
    $name = $_POST['naam'];
    $email = $_POST['mail'];
    $message = $_POST['bericht'];
    $formcontent="Verzonden door:\n $name \n $email \n\n Bericht: \n $message";
    $recipient = "jeroenelferink13@gmail.com";//"markxjansen@gmail.com";
    $subject = $_POST['onderwerp'];
    $mailheader = "From: $email \r\n";

    mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
    $_SESSION['verzonden'] = TRUE;
    header('Location: ../Contact/contact.php');
}*/
?>
