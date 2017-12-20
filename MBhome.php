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

		<title>Metselfbedrijf Wegro</title>

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
						<li class="nav-item"><a href="#Metselwerk">Metselwerk</a></li>
						<li class="nav-item"><a href="#Projecten">Projecten</a></li>
						<li class="nav-item"><a href="#Vergunningen">Vergunningen</a></li>
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
        <div class="row MBhomeBackground">
            <img src="images/Logo%20metselbedrijf%20Wegro.png" class="logo">

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
				<img src="images/IMG_9165.JPG" class="col-xs-5 col-xs-offset-1 imgright">

                <titel>Ons bedrijf</titel><br><br> Wij heten u van harte welkom op de site van Metselbedrijf Wegro bv.
				<br><br> Bouwbedrijf Wegro bv beschikt over eigen timmerlieden, metselaars, tegelzetter en voegers. Bouwbedrijf Wegro bv heeft een schat van ervaring in de bouw. Als bouwbedrijf zijn wij breed georiënteerd, wij richten ons op nieuwbouw, verbouw, renovatie en onderhoud van woningen en bedrijfsgebouwen. Mede door onze vakbekwame vaklieden die al vele jaren in de bouw actief zijn, zijn wij breed inzetbaar op elk gebied.
				<br> Ook op gebied van metselwerk zijn wij zeer actief, zo verzorgen wij het complete metsel-, voeg-, en steigerwerk op aanneemwerk en in regie. De klant is bij ons koning, wij kunnen aan alle wensen van de klant voldoen, zo helpen wij ook met het begeleiden van bouwvergunningen. Het tekenwerk wordt door ons zelf vervaardigd, zodat eventuele aanpassingen op een korte en snelle manier gerealiseerd kunnen worden.<br><br> Onze kleinschaligheid en open werkwijze zorgen voor een direct contact en veel overleg met de opdrachtgever, waardoor u verzekert kunt zijn van het gewenste resultaat. Wanneer u geïnteresseerd bent om ons bouwbedrijf uit te nodigen, dan zijn wij zeker bereid om u van het begin tot het eind zorgvuldig te helpen en begeleiden zodat het eindresultaat geheel aan u verwachtingen zal voldoen.
                    <br><br> U kunt op onderstaande ‘link’ klikken voor het aanvragen van een vrijblijvende prijsopgave. Wanneer u al uw gegevens heeft ingevuld en een korte omschrijving van de betreffende bouwplannen heeft gemaakt dan zullen wij zo spoedig mogelijk contact met u opnemen!<br><br>
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
						<img class="img-responsive" src="images/muur.png" alt="">
						<div class="overlay">
							<h1>METSELWERK</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/keuken.png" alt="">
						<div class="overlay">
							<h1>LIJM/KITWERK</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/steiger.png" alt="">
						<div class="overlay">
							<h1>STEIGERWERK</h1>
							<p>


							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<a name="Metselwerk" id="Metselwerk"></a>
		<div class="row">
			<p class="col-xs-10 col-xs-offset-1  paragraphright page-box">
				<img src="images/IMG_7453.JPG" class="col-xs-5 col-xs-offset-1 imgleft">

				<titel>Metselwerk</titel><br><br> Bouwbedrijf Wegro bv voert ook metsel-, lijm-, voeg-, en steigerwerk uit. Door onze ruime ervaring op het gebied van metselwerk enonze vakbekwame metselaars zijn wij al geruime tijd werkzaam voor diverse grote en kleine bouwondernemers, die door ons het complete metselwerk laten uitvoeren. Een belangrijk aspect is dat u door ons het gehele metselwerk laat uitvoeren, er altijd een vast aanspreekpunt op de bouw aanwezig is in de vorm van een voorman. Hierdoor kan snel en adequaat worden gehandeld als er zich tijdens de bouw veranderingen doen voorkomen.
			</p>
		</div>


		<div class="row"><a name="Projecten" id="Projecten"></a>
			<div class="col-xs-10 col-xs-offset-1  page-box">
				<p class="paragraphleft ">
					<titel>Projecten</titel>
				</p><br>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/metselmuur.png" alt="">
						<div class="overlay">
							<h1>KWALITEIT</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/huus.png" alt="">
						<div class="overlay">
							<h1>VEILIGHEID</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="hovereffect">
						<img class="img-responsive" src="images/raam.png" alt="">
						<div class="overlay">
							<h1>DUURZAAMHEID</h1>
							<p>

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="row"><a name="Vergunningen" id="Vergunningen"></a>
		<div class="row">
			<p class="col-xs-10 col-xs-offset-1  paragraphleft page-box">
				<img src="images/IMG_2450.JPG" class="col-xs-5 col-xs-offset-1 imgright">

				<titel>Vergunningen</titel><br><br> Om u als klant zo veel mogelijk werk uit handen te nemen vervaardigen wij in eigen beheer de bouwvergunningen. <br><br> Dit houd in dat wij zowel het tekenwerk als de benodigde berekeningen maken. Ook houden wij contact met de gemeente om ervoor te zorgen dat u de bouwvergunning z.s.m. binnen heeft.<br><br> Met het vervaardigen van de bouwvergunning proberen wij uw eisen in combinatie met onze bouwkennis om te zetten in een prachtig ontwerp, wat als solide basis staat voor de ver/nieuwbouw.<br><br>
			</p>
		</div>
		<div class="google-maps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2437.878581983825!2d5.627317716021184!3d52.336348757575266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c633c22a95401d%3A0xc7d3b89f5cf90a07!2sBouwbedrijf+Wegro+B.V.!5e0!3m2!1snl!2snl!4v1513166724420" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<footer id="footer-Section">
			<div class="footer-top-layout">
				<div class="container">
					<div class="row">
						<div class="OurBlog">
							<h4>Bouwbedrijf Wegro</h4>
						</div>
						<div class=" col-lg-9 col-lg-offset-3">
							<div class="col-sm-3">
								<div class="footer-col-item">
									<h4>Contact</h4>
									<div class="item-contact"> <a href="tel:0341-412054"><span class="link-id">TEL:</span>:<span>0341-412054</span></a> <br><a href="mailto:info@bouwbedrijfwegro.nl"><span class="link-id">MAIL</span>:<span>info@bouwbedrijfwegro.nl</span></a>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<a href="#" class="btn " data-toggle="modal" data-target="#basicModal">Facebook</a>
								<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">

											<div class="modal-body">
												<div class="fb-page" data-href="https://www.facebook.com/Bouwbedrijf-Wegro-1708331486161176/?ref=br_rs" data-tabs="timeline" data-width="600" data-height="800" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false">
													<blockquote cite="https://www.facebook.com/Bouwbedrijf-Wegro-1708331486161176/?ref=br_rs" class="fb-xfbml-parse-ignore">
														<a href="https://www.facebook.com/Bouwbedrijf-Wegro-1708331486161176/?ref=br_rs">Bouwbedrijf Wegro</a></blockquote>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">sluiten</button>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="footer-col-item">
									<h4>Locatie</h4>
									<address>

                                  Gelreweg 38
                                  <br>
                                  3843AN Harderwijk, NL
                              </address>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom-layout">
				<div class="copyright-tag">© Bouwbedrijf Wegro - Klik hier voor <a href="#">Algemene Voorwaarden</a> en <a href="#">Disclaimer<a/></div>
      </div>
      <a name="Contact" id="Contact"></a>
		</footer>










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
