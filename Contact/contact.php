<?php
	//start sessie en haal sessievariabelen op
	session_start();
	@$klant_id = $_SESSION['klant_id'];
	@$medewerker_nummer = $_SESSION['medewerker_nummer'];
	@$medewerker_functie = $_SESSION['medewerker_functie'];
	@$verzonden = $_SESSION['verzonden'];
	@$captcharesultaatklant = $_SESSION['captcharesultaatklant'];
	@$captchagevuldklant = $_SESSION['captchagevuldklant'];
	@$formsubmit = $_SESSION['formsubmit'];
	if (!empty($klant_id OR $medewerker_nummer)) { //check of er is ingelogd
			$ingelogd = "Mijn Account";
	} else {
			$ingelogd = "Inloggen";
	}
?>

	<?php include 'includes.php';?>
	<?php headTop() ?>

		<link rel="icon" href="../images/Logo%20bouwbedrijf%20Wegro.png">
    <title>Contact opnemen</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles for this website -->
    <link href="../css/global.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../css/contact.css" rel="stylesheet">
    <!--- reCAPTCHA loader --->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<?php headBottom() ?>

	<!-- Navbar inroepen-->
	<?php navTop() ?>
		<li class="nav-item"><a href="../index.php">Home</a></li>
		<li class="nav-item"><a href="../login.php"><?php print($ingelogd);?></a></li>
	<?php navBottom() ?>



    <div class="container">
        <div class="row mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 margintop">
            <?php
            if ($formsubmit == TRUE){
                if ($verzonden == TRUE) { //check of het bericht is verzonden en geef hiervan een melding als het bericht verzonden is
                    print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Het bericht is verzonden, wij nemen zo spoedig mogelijk contact met u op!</div>');
                }elseif ($captchagevuldklant == FALSE){ //check of de reCAPTCHA is ingevuld en geef een melding als dit niet zo is
                    print('<div class="alert alert-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Uw bericht is nog niet verzonden, vul alstublieft de Captcha in.</div>');
                }elseif ($captcharesultaatklant == FALSE){ //check of de reCAPTCHA correct is ingevuld en geef een melding als dit niet zo is
                    print('<div class="alert alert-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Uw bericht is niet verzonden. Onze spambeveiliging vermoedt dat u een robot bent, bent u dit niet? Probeer het formulier dan nogmaals in te vullen. Lukt dit niet? Ga dan naar de contactpagina en neem op een ander manier contact met ons op.</div>');
                }
            }
            ?>
            <div class="panel ">
                <div class="panel-heading oranje">
                    <div class="panel-title white">Neem contact met ons op</div>

                </div>
                <div class="panel-body paddingtop lowborder">
                    <form class="contact-form" action="verzendbericht.php" method="post"> <!--- in te vullen contactfomulier --->
                        <input type="text" class="form-control marginbottom" name="naam" placeholder="Naam" required>
                        <input type="email" class="form-control marginbottom" name="mail" placeholder="e-mail" required>
                        <input type="text" class="form-control marginbottom" name="onderwerp" placeholder="Onderwerp" required>
                        <textarea name="bericht" class="form-control marginbottom" rows="10" cols="30" placeholder="Vul hier uw bericht in" required></textarea>
                        <div class="g-recaptcha" data-sitekey="6LeINj8UAAAAAL23qoLUp4GzzpLWgtMY5_qfG69o"></div><br> <!--- reCAPTCHA --->
                        <button type="submit" class="btn oranje white" name="submitmail">Verstuur bericht</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<?php footAlt() ?>
<?php $_SESSION['verzonden'] = FALSE; // RESET zodat je eventueel nog een 2e bericht kan versturen
$_SESSION['formsubmit'] = FALSE //RESET zodat er geen errormessage van de reCAPTCH bovenin blijft staan als je later weer terugkomt op de pagina ?>
