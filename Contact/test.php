<?php
$response = $_POST["g-recaptcha-response"]; //ingevulde captcha waarde
    if(!empty($response)){ //check of captcha is ingevuld
        $captchagevuld = TRUE;
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
            $captcharesultaat = FALSE;
        } else if ($captcha_success->success==true) { //check of de captcha succesvol is ingevuld, nu volgt successcenario
            $captcharesultaat = TRUE;
        }
    }elseif(empty($response)){ //check of captcha is ingevuld
        $captchagevuld = FALSE;
    }

?>
