<?php
session_start();

if (isset($_POST['submitmail'])){ //check of form gesubmit is
    $_SESSION['formsubmit'] = TRUE; //formsubmit variabele
    $response = $_POST["g-recaptcha-response"]; //ingevulde captcha waarde
    if(!empty($response)){ //check of captcha is ingevuld
        $_SESSION['captchagevuldklant'] = TRUE; //captcha is gevuld
        //verstuur captchawaarde naar Google en laat Google checken of er geen robot is die de captcha heeft ingevuld
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
        if ($captcha_success->success==FALSE) { //check of de captcha succesvol is ingevuld
            $_SESSION['captcharesultaatklant'] = FALSE; //captcha niet succesvol ingevuld
            $_SESSION['verzonden'] = FALSE; //bericht dus niet verzonden
        } else if ($captcha_success->success==true) { //check of de captcha succesvol is ingevuld, nu volgt successcenario
            $_SESSION['captcharesultaatklant'] = TRUE; //captcha succesvol ingevuld
            //parameters klaarmaken om mail te versturen
            $name = $_POST['naam'];
            $email = $_POST['mail'];
            $message = $_POST['bericht'];
            $formcontent="Verzonden door:\n $name \n $email \n\n Bericht: \n $message";
            $recipient = "markxjansen@gmail.com";
            $subject = $_POST['onderwerp'];
            $mailheader = "From: $email \r\n";

            mail($recipient, $subject, $formcontent, $mailheader) or die("Error!"); // verstuur mail
            $_SESSION['verzonden'] = TRUE; //laat weten dat mail verzonden is d.m.v. een variabele
            header('Location: ../Contact/contact.php'); //redirect user terug naar contactpagina
        }
    }elseif(empty($response)){ //check of captcha is ingevuld
        $_SESSION['captchagevuldklant'] = FALSE; //captcha niet ingevuld
        header('Location: ../Contact/contact.php'); //redirect user terug naar contactpagina
    }
}else{
    $_SESSION['formsubmit'] = FALSE; //form niet gesubmit
}

?>
