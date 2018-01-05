<?php
session_start();
@$klant_id = $_SESSION['klant_id'];
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_functie = $_SESSION['medewerker_functie'];
@$verzonden = $_SESSION['verzonden'];
@$captcharesultaat = $_SESSION['captcharesultaat'];
@$captchagevuld = $_SESSION['captchagevuld'];
@$formsubmit = $_SESSION['formsubmit'];
if (!empty($klant_id OR $medewerker_nummer)) {
    $ingelogd = "Mijn Account";
} else {
    $ingelogd = "Inloggen";
}

//reCAPTCHA functies loader
require_once('captchafuncties.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
    <meta name="author" content="Nard Wemes">
    <link rel="icon" href="../images/Logo%20bouwbedrijf%20Wegro.png">

    <title>Contact</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Global styles for this website -->
    <link href="../css/global.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../css/contact.css" rel="stylesheet">

    <!--- reCAPTCHA script loader --->
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
            'sitekey' : '6LeINj8UAAAAAL23qoLUp4GzzpLWgtMY5_qfG69o',
            'callback': captcha_filled,
            'expired-callback': captcha_expired,
        });
      };
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                <a class="navbar-brand" href="../index.php"><img class="brand-logo" src="../images/wegrobanner.png" alt="logo"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="../index.php">Home</a></li>
                    <li class="nav-item"><a href="../login.php"><?php print($ingelogd);?></a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



    <div class="container">
        <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 b ">
            <div class="panel ">
                <div class="panel-heading oranje">
                    <div class="panel-title white">Neem contact met ons op</div>

                </div>
                <div class="panel-body a lowborder">
                    <form class="contact-form" action="verzendbericht.php" onsubmit="check_if_captcha_is_filled()" method="post">
                        <input type="text" class="form-control c" name="naam" placeholder="Naam" required>
                        <input type="email" class="form-control c" name="mail" placeholder="e-mail" required>
                        <input type="text" class="form-control c" name="onderwerp" placeholder="Onderwerp" required>
                        <textarea name="bericht" class="form-control c" rows="10" cols="30" placeholder="Vul hier uw bericht in" required></textarea>
                        <div id="html_element"></div>
                        <!---<div class="g-recaptcha" data-callback="captcha_filled" data-expired-callback="captcha_expired" data-sitekey="6LeINj8UAAAAAL23qoLUp4GzzpLWgtMY5_qfG69o"></div>---><br>
                        <button type="submit" class="btn oranje white" name="submitmail">Verstuur bericht</button>
                    </form>
                </div>
            </div>
            <?php
            if ($formsubmit == TRUE){
                if ($verzonden == TRUE) { //check of het bericht is verzonden en geef hiervan een melding als het bericht verzonden is
                    print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Het bericht is verzonden, wij nemen zo spoedig mogelijk contact met u op!</div>');
                }elseif ($captchagevuld == FALSE){ //check of de reCAPTCHA is ingevuld en geef een melding als dit niet zo is
                    print('<div class="alert alert-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Uw bericht is nog niet verzonden, vul alstublieft de Captcha in.</div>');
                }elseif ($captcharesultaat == FALSE){ //check of de reCAPTCHA correct is ingevuld en geef een melding als dit niet zo is
                    print('<div class="alert alert-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Uw bericht is niet verzonden. Onze spambeveiliging vermoedt dat u een robot bent, bent u dit niet? Probeer het formulier dan nogmaals in te vullen. Lukt dit niet? Ga dan naar de contactpagina en neem op een ander manier contact met ons op.</div>');
                }
            }
            ?>
        </div>
    </div>


<?php
    /*$_SESSION["mailnaam"] = $_POST["naam"];
    $_SESSION["mailadres"] = $_POST["mail"];
    $_SESSION["onderwerp"] = $_POST["onderwerp"];
    $_SESSION["bericht"] = $_POST["bericht"];*/
?>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Framework -->
    <script src="../js/bootstrap.min.js"></script>

    <!--- reCAPTCHA loader --->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</body>

</html>
<?php $_SESSION['verzonden'] = FALSE; // RESET zodat je eventueel nog een 2e bericht kan versturen ?>
