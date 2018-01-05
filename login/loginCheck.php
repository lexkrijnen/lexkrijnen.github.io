<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
	<meta name="author" content="Nard Wemes">
	<link rel="icon" href="../images/Logo%20bouwbedrijf%20Wegro.png">
	<title>Een moment geduld A.U.B.</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/global.css" rel="stylesheet">
	<link href="../css/index.css" rel="stylesheet">
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<?php
session_start();
include '../login/loginFunction.php';

if(isset($_POST['btn-login']))
{

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








    $queryresult = GetLogin($_POST['emailadres'], $_POST['wachtwoord']);

    if (empty($queryresult)) {
        print('<nav class="navbar navbar-default" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="../index.php"><img class="brand-logo" src="../images/wegrobanner.png" alt="logo"></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div></div></nav>');
        print('<div class="alert alert-warning container page-box" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span> Gebruikersnaam of wachtwoord is onjuist, je word automatisch teruggestuurd naar de inlogpagina.</div>');
        print('<meta http-equiv="refresh" content="5;url=../login.php" />');
    }elseif ($captchagevuld == FALSE){
        print('<nav class="navbar navbar-default" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="../index.php"><img class="brand-logo" src="../images/wegrobanner.png" alt="logo"></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div></div></nav>');
        print('<div class="alert alert-warning container page-box" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>Vul alstublieft de reCAPTCHA in, je word automatisch teruggestuurd naar de inlogpagina.</div>');
        print('<meta http-equiv="refresh" content="5;url=../login.php" />');
    }elseif ($captcharesultaat == FALSE){
        print('<nav class="navbar navbar-default" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="../index.php"><img class="brand-logo" src="../images/wegrobanner.png" alt="logo"></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div></div></nav>');
        print('<div class="alert alert-warning container page-box" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>U heeft de reCAPTCHA niet correct ingevuld, probeer het a.u.b. opnieuw.</div>');
        print('<meta http-equiv="refresh" content="5;url=../login.php" />');
    }else {
        print('<nav class="navbar navbar-default" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="../index.php"><img class="brand-logo" src="../images/wegrobanner.png" alt="logo"></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div></div></nav>');
        print('<div class="alert alert-success container page-box"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Een moment geduld A.U.B.</div>');
        print('<meta http-equiv="refresh" content="0.5;url=../account.php" />');
        foreach ($queryresult as $a => $b){
            $klant_id = $b['klant_nummer'];
            $klant_voornaam = $b['voornaam'];
        }
        $_SESSION['klant_id'] = $klant_id;
        $_SESSION['voornaam'] = $klant_voornaam;
    }
}
?>
