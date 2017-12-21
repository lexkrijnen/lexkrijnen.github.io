<?php
session_start();
@$klant_id = $_SESSION['klant_id'];
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_functie = $_SESSION['medewerker_functie'];
if (!empty($klant_id OR $medewerker_nummer)) {
    $ingelogd = "Mijn Account";
} else {
    $ingelogd = "Inloggen";
}
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
		<link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">

		<title>Tekenbureau Wegro</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- JQuery Basic Slider -->
		<link rel="stylesheet" href="css/jquery.bscslider.css">

		<!-- Global styles for this website -->
		<link href="css/global.css" rel="stylesheet">

		<!-- Custom styles for this page -->
		<link href="css/home.css" rel="stylesheet">

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
					<a class="navbar-brand" href="index.php"><img class="brand-logo" src="images/wegrobanner.png" alt="logo"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="index.php">Home</a></li>
						<li class="nav-item"><a href="#Ons_bedrijf">Ons Bedrijf</a></li>
						<li class="nav-item"><a href="#Kwaliteiten">Kwaliteiten</a></li>
						<li class="nav-item"><a href="#Vergunningen">Vergunningen</a></li>
						<li class="nav-item"><a href="#Projecten">Projecten</a></li>
						<li class="nav-item"><a href="#Ontwerp">Ontwerp</a></li>
						<li class="nav-item"><a href="#Contact">Contact</a></li>
						<li class="nav-item">
							<a href="login.php">
								<?php print($ingelogd);?>
							</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		<!--<div class="">-->
        <div class="row TBhomeBackground">
            <img src="images/Wegroleeg.png" class="logo">

            <a href="/Contact/contact.php">
                <div class="col-xs-2 col-xs-offset-5 btn contbutton">
                    Contact
                </div>
            </a>
<!--
			<div class="slider slider-demo ">
				<img src="images/IMG_2442.JPG">
				<img src="images/IMG_2601.JPG">
				<img src="images/IMG_2784.JPG">
				<img src="images/IMG_3134.JPG">
				<img src="images/IMG_6733.JPG">
			</div>

		</div>-->
		<a name="Ons_bedrijf" id="Ons_bedrijf"> </a>
		<div class="row">
			<p class="col-xs-10 col-xs-offset-1 paragraphleft page-box">
				<img src="images/IMG_8588.JPG" class="col-xs-5 col-xs-offset-1 imgright">
                <titel>Ons Bedrijf</titel>
                Heeft u plannen om te gaan bouwen of verbouwen? Dakkapel? Grotere woonkamer of opbouw op uw garage? Een goede bouwkundige tekening is daarbij noodzakelijk. Niet alleen is dit belangrijk voor je vergunningsaanvraag bij de gemeente, ook geeft een bouwkundige tekening duidelijkheid naar de aannemer. Het is de basis voor een goed lopend bouwproject!
                Bouwkundig Tekenbureau Wegro verzorgt digitale bouwkundige tekeningen voor verbouw, nieuwbouw, aanbouw en opbouw. Inclusief technische omschrijvingen, werktekeningen en detaillering. Bovendien maken wij 3D impressies. Hiermee krijgt u een nog beter beeld van wat er gebouwd of verbouwd gaat worden.

                Bouwkundig Tekenbureau Wegro werkt nauw samen met Bouwbedrijf Wegro. Dit heeft als voordeel dat wij grote materialenkennis hebben en op de hoogte blijven van alle innovaties op dit gebied.

                Wilt u liever gebruik maken van een andere aannemer? Dat is geen probleem. U bent altijd vrij in de keuze van uw aannemer.


            </p>
		</div>

		<div class="row">
			<a name="Kwaliteiten" id="Kwaliteiten">

	  	</a>
			<div class="col-xs-10 col-xs-offset-1  page-box">
				<p class="paragraphleft ">
					<titel>Kwaliteiten</titel>
				</p><br>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/Impressie-living.png" alt="">
						<div class="overlay">
							<h1>NIEUWBOUW</h1>
							<p>
								</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/Impressie-voorgevel.png" alt="">
						<div class="overlay">
							<h1>VERBOUW</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/Impressie-woonkeuken.png" alt="">
						<div class="overlay">
							<h1>RENOVATIE</h1>
							<p>

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<a name="Vergunningen" id="Vergunningen"></a>
		<div class="row">
			<p class="col-xs-10 col-xs-offset-1  paragraphright page-box">
				<img src="images/vergunning.jpg" class="col-xs-5 col-xs-offset-1 imgleft">

				<titel>Vergunningen</titel><br><br> Hoe weet u of er een omgevingsvergunning nodig is? Bouwkundig Tekenbureau Wegro kunt u hierbij helpen. Het aanvragen van een bouwvergunning kan een ingewikkelde procedure zijn. Bij kleine bouwwerken is er bijvoorbeeld geen omgevingsvergunning nodig als je voldoet aan bepaalde eisen. Het is belangrijk dat bij een omgevingsvergunning de bouwkundige tekeningen voldoen aan alle vastgestelde bouwregels. Zodoende kan de gemeente precies de informatie lezen die voor hen van toepassing is en bepalen of een bouwvergunning wordt afgegeven. Bouwkundig Tekenbureau Wegro kan voor u de volledige aanvraag voor een omgevingsvergunning verzorgen!

			</p>
		</div>

		<a name="Ontwerp" id="Ontwerp"></a>
		<div class="row">
			<p class="col-xs-10 col-xs-offset-1  paragraphleft page-box">
				<img src="images/IMG_8639.JPG" class="col-xs-5 col-xs-offset-1 imgright">

				<titel>Ontwerp</titel><br><br> Of het nu gaat om een dakkapel of een volledige nieuwbouwwoning, wij zorgen voor een bouwkundig ontwerp of schetsontwerp. Uw wensen staan hierbij centraal! Een goed en gedetailleerd ontwerp is belangrijk voor de omgevingsvergunning, maar ook voor de uiteindelijke uitvoeringsfase. Het kan veel verwarring en narigheid voorkomen. Voor het digitaliseren van tekeningen bij verbouwingen maken we gebruik van de bestaande tekeningen. Mochten deze er niet meer zijn dan komen we inmeten.
			</p>
		</div>
		<div class="google-maps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2437.878581983825!2d5.627317716021184!3d52.336348757575266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c633c22a95401d%3A0xc7d3b89f5cf90a07!2sBouwbedrijf+Wegro+B.V.!5e0!3m2!1snl!2snl!4v1513166724420" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
            <div class="container-fluid footer">
                <div class="col-xs-12">
                    <h4 class="footer-title">Bouwbedrijf Wegro</h4>
                </div>

                <div class="col-xs-12 col-md-6">
                    <ul class="text-fix">
                        <li class="footer-item">Telefoonnummer: <a href="tel:0341-412054" target="_blank">0341-412054</a></li>
                        <li class="footer-item">E-mailadres: <a href="mailto:info@bouwbedrijfwegro.nl" target="_blank">info@bouwbedrijfwegro.nl</a></li>
                        <li class="footer-item">Adres: <a href="https://maps.google.com/maps?ll=52.336346,5.629506&z=16&t=m&hl=en-US&gl=NL&mapclient=embed&cid=14399055428232743431" target="_blank">Gelreweg 38, 3843 AN Harderwijk</a></li>
                        <li class="footer-item">Social media: <a href="https://www.facebook.com/Bouwbedrijf-Wegro-1708331486161176/?ref=br_rs" target="_blank">Facebook</a>,
													<a href="https://www.linkedin.com/in/nard-wemes-43084841/?ppe=1" target="_blank">Linkedin</a></li>
                    </ul>
                </div>

                <div class="col-xs-12 col-md-6 footer-title footer-item text-md-right">
                    <a href="#" data-toggle="modal" data-target="#voor-modal">Algemene voorwaarden</a>
                    - <a href="#" data-toggle="modal" data-target="#disc-modal">Disclaimer</a>
                    <p class="footer-title">© Bouwbedrijf Wegro</p>
                </div>

                <div class="modal fade" id="voor-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Algemene voorwaarden</h4>
                            </div>
                            <div class="modal-body">
                                <p class="modal-text">Van toepassing zijn de algemene voorwaarden voor aannemingen in het bouwbedrijf AVA 1992.</p>
                                <p class="modal-text"><a href="pdf-viewer/web/viewer.html?file=/BBSW Algemene Voorwaarden voor Aannemingen in het bouwbedrijf (AVA) 1992.pdf">Klik hier</a> om deze voorwaarden te bekijken.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="disc-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Disclaimer</h4>
                            </div>
                            <div class="modal-body">
                                <p class="modal-text">Wegro bv stelt het op prijs dat u interesse in onze diensten toont door middel van een bezoek aan onze site. Ondanks de zorg die Wegro bv besteedt aan de correcte weergave van de gegevens van de aangeboden diensten kan Wegro bv niet verantwoordelijk of aansprakelijk worden gehouden voor eventuele onjuistheden, onvolledigheden of actualiteit van de op de site www.bouwbedrijfwegro.nl aangeboden informatie. Wegro bv onderschrijft, keurt goed, erkent of controleert geen externe bronnen (internetsites van derden die door of via verwijzingen op onze website bezocht kunnen worden). Wegro bv is niet aansprakelijk jegens enige partij voor directe of indirecte of gevolgschade (inclusief, maar niet beperkt tot, gederfde winst voor bedrijven of anderszins) die het gevolg is van het gebruik van deze website of van informatie hierop, of die het gevolg is van het gebruik van de website derden en de informatie daarop, die door of via verwijzingen op onze website verkregen, opgevraagd of gedownload zijn.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .container -->










		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>

		<!-- jQuery UI (waaaay to big, needs to be slimmed down after the project is finished) -->
		<script src="js/jquery-ui.min.js"></script>

		<!-- Bootstrap Framework -->
		<script src="js/bootstrap.min.js"></script>

		<!-- JQuery Basic Slider -->
		<script src="js/jquery.bscslider.js"></script>

		<script>
			$('a[href^="#"]').on('click', function(event) {
				var target = $(this.getAttribute('href'));
				if (target.length) {
					event.preventDefault();
					$('html, body').stop().animate({
						scrollTop: target.offset().top
					}, 1000);
				}
			});

		</script>
		<script>
			$(document).ready(function() {
				$('.slider-demo').bscSlider({
					effect: 1
				});
			})

		</script>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s);
				js.id = id;
				js.src = 'https://connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.11';
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));

		</script>
		<!--
  <script>
      $(document).ready(function(){
          $('.parallax').parallax();
      });
  </script>
  <script>
      $(".carousel").swipe({

          swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

              if (direction == 'left') $(this).carousel('next');
              if (direction == 'right') $(this).carousel('prev');

          },
          allowPageScroll:"vertical"

      });
  </script>-->
	</body>

	</html>
