<?php
session_start();


if (isset($_POST['submitmail'])){
    $response = $_POST["g-recaptcha-response"];
    if(!empty($response)){
        $_SESSION['captchagevuld'] = TRUE;
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
        $verify = file_get_contents($url, FALSE, $context);
        $captcha_success=json_decode($verify);
        if ($captcha_success->success==FALSE) {
            $_SESSION['captcharesultaat'] = FALSE;
            $_SESSION['verzonden'] = FALSE;
        } else if ($captcha_success->success==true) {
            $_SESSION['captcharesultaat'] = TRUE;
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
    }elseif(empty($response)){
        $_SESSION['captchagevuld'] = FALSE;
    }
}

$_SESSION['captchawaarde'] = $_POST["g-recaptcha-response"];

?>
