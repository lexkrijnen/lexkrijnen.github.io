<?php
	session_start();
	@$klant_id = $_SESSION['klant_id'];
	@$medewerker_nummer = $_SESSION['medewerker_nummer'];
	if (!empty($klant_id OR $medewerker_nummer)) {
		$ingelogd = "Mijn Account";
	} else {
		$ingelogd = "Inloggen";
	}
?>
<?php include 'includes.php';?>
<?php headTop() ?>

		<title>Metselbedrijf Wegro</title>

		<?php headMiddle() ?>

		<!-- Css linken -->
		<link href="css/home.css" rel="stylesheet">
<!-- Navbar inroepen-->
		<?php headBottom() ?>

		<?php navTop() ?>
			<li class="nav-item"><a href="index.php">Home</a></li>
			<li class="nav-item"><a href="#Ons_bedrijf">Ons Bedrijf</a></li>
			<li class="nav-item"><a href="#Kwaliteiten">Kwaliteiten</a></li>
			<li class="nav-item"><a href="#Metselwerk">Metselwerk</a></li>
			<li class="nav-item"><a href="#Projecten">Projecten</a></li>
			<li class="nav-item"><a href="#Vergunningen">Vergunningen</a></li>
			<li class="nav-item"><a href="Contact/contact.php">Contact</a></li>
			<li class="nav-item">
				<a href="login.php">
					<?php print($ingelogd);?>
				</a>
			</li>
		<?php navBottom() ?>
<!-- achtergrond afbeelding en contact knop -->
    <div class="container-fluid">
    	<div class="row MBhomeRow">
    		<div class="col-xs-12 MBhomeBackground">
    			<img class="MBhome-img" src="images/cement.jpg">
				</div>
				<div class="col-xs-12 MBhomeContent">
					<img class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4 logo" src="images/Logo%20metselbedrijf%20Wegro.png">
					<a href="/Contact/contact.php">
						<div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4 select-btn">
							Contact
						</div>
					</a>
				</div>
			</div><!-- .row -->
		</div><!-- .container-fluid -->
<!-- pagebox  met informatie -->
    <div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 paragraphleft page-box">
				<a name="Ons_bedrijf" id="Ons_bedrijf"></a>
				<p>
					<titel>Ons bedrijf</titel>
					<br><br>
					<img class="col-xs-12 col-md-5 col-md-offset-1 imgright" src="images/IMG_9165.JPG">
					Wij heten u van harte welkom op de site van Metselbedrijf Wegro bv.
					<br><br>
					Bouwbedrijf Wegro bv beschikt over eigen timmerlieden, metselaars, tegelzetter en voegers. Bouwbedrijf Wegro bv heeft een schat van ervaring in de bouw. Als bouwbedrijf zijn wij breed georiënteerd, wij richten ons op nieuwbouw, verbouw, renovatie en onderhoud van woningen en bedrijfsgebouwen. Mede door onze vakbekwame vaklieden die al vele jaren in de bouw actief zijn, zijn wij breed inzetbaar op elk gebied.
					<br>
					Ook op gebied van metselwerk zijn wij zeer actief, zo verzorgen wij het complete metsel-, voeg-, en steigerwerk op aanneemwerk en in regie. De klant is bij ons koning, wij kunnen aan alle wensen van de klant voldoen, zo helpen wij ook met het begeleiden van bouwvergunningen. Het tekenwerk wordt door ons zelf vervaardigd, zodat eventuele aanpassingen op een korte en snelle manier gerealiseerd kunnen worden.
					<br><br>
					Onze kleinschaligheid en open werkwijze zorgen voor een direct contact en veel overleg met de opdrachtgever, waardoor u verzekert kunt zijn van het gewenste resultaat. Wanneer u geïnteresseerd bent om ons bouwbedrijf uit te nodigen, dan zijn wij zeker bereid om u van het begin tot het eind zorgvuldig te helpen en begeleiden zodat het eindresultaat geheel aan u verwachtingen zal voldoen.
					<br><br>
					U kunt op onderstaande ‘link’ klikken voor het aanvragen van een vrijblijvende prijsopgave. Wanneer u al uw gegevens heeft ingevuld en een korte omschrijving van de betreffende bouwplannen heeft gemaakt dan zullen wij zo spoedig mogelijk contact met u opnemen!
					<br><br>
				</p>
			</div>
		</div>
        <!-- pagebox  met informatie -->
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 page-box">
				<a name="Kwaliteiten" id="Kwaliteiten"></a>
				<p class="paragraphleft ">
					<titel>Kwaliteiten</titel>
				</p>
				<br>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/muur.png" alt="">
						<div class="overlay">
							<h1>METSELWERK</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/keuken.png" alt="">
						<div class="overlay">
							<h1>LIJM / KITWERK</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/steiger.png" alt="">
						<div class="overlay">
							<h1>STEIGERWERK</h1>
							<p>

							</p>
						</div>
					</div>
				</div>
			</div><!-- .col page-box -->
		</div><!-- .row -->
        <!-- pagebox  met informatie -->
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 paragraphright page-box">
				<a name="Metselwerk" id="Metselwerk"></a>
				<p>
					<titel>Metselwerk</titel>
					<br><br>
					<img src="images/IMG_7453.JPG" class="col-xs-12 col-md-5 col-md-offset-1 imgleft">
					Bouwbedrijf Wegro bv voert ook metsel-, lijm-, voeg-, en steigerwerk uit.
					Door onze ruime ervaring op het gebied van metselwerk enonze vakbekwame metselaars zijn wij al geruime tijd werkzaam voor diverse grote en kleine bouwondernemers, die door ons het complete metselwerk laten uitvoeren.
					Een belangrijk aspect is dat u door ons het gehele metselwerk laat uitvoeren, er altijd een vast aanspreekpunt op de bouw aanwezig is in de vorm van een voorman.
					Hierdoor kan snel en adequaat worden gehandeld als er zich tijdens de bouw veranderingen doen voorkomen.
				</p>
			</div>
		</div>
        <!-- pagebox  met informatie -->
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 page-box">
					<a name="Projecten" id="Projecten"></a>
					<p class="paragraphleft ">
						<titel>Projecten</titel>
					</p>
					<br>

					<div class="col-sm-4 col-xs-12 hover-img">
						<div class="hovereffect">
							<img class="img-responsive" src="images/metselmuur.png" alt="">
							<div class="overlay">
								<h1>KWALITEIT</h1>
								<p>

								</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4 col-xs-12 hover-img">
						<div class="hovereffect">
							<img class="img-responsive" src="images/huus.png" alt="">
							<div class="overlay">
								<h1>VEILIGHEID</h1>
								<p>

								</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4 col-xs-12 hover-img">
						<div class="hovereffect">
							<img class="img-responsive" src="images/raam.png" alt="">
							<div class="overlay">
								<h1>DUURZAAMHEID</h1>
								<p>

								</p>
							</div>
						</div>
					</div>
				</div><!-- .col page-box -->
			</div><!-- .row -->
        <!-- pagebox  met informatie -->
			<div class="row">
     		<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 paragraphleft page-box">
      		<a name="Vergunningen" id="Vergunningen"></a>
					<p>
						<titel>Vergunningen</titel>
						<br><br>
						<img src="images/IMG_2450.JPG" class="col-xs-12 col-md-5 col-md-offset-1 imgright">
						Om u als klant zo veel mogelijk werk uit handen te nemen vervaardigen wij in eigen beheer de bouwvergunningen.
						<br><br>
						Dit houd in dat wij zowel het tekenwerk als de benodigde berekeningen maken.
						Ook houden wij contact met de gemeente om ervoor te zorgen dat u de bouwvergunning z.s.m. binnen heeft.
						<br><br>
						Met het vervaardigen van de bouwvergunning proberen wij uw eisen in combinatie met onze bouwkennis om te zetten in een prachtig ontwerp, wat als solide basis staat voor de ver/nieuwbouw.
						<br><br>
					</p>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
<!-- footer -->
		<div class="container-fluid">
			<div class="row">
				<div class="google-maps">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2437.878581983825!2d5.627317716021184!3d52.336348757575266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c633c22a95401d%3A0xc7d3b89f5cf90a07!2sBouwbedrijf+Wegro+B.V.!5e0!3m2!1snl!2snl!4v1513166724420" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container-fluid -->

		<?php footTop() ?>

		<!-- JQuery Basic Slider -->
		<script src="js/jquery.bscslider.js"></script>
<!-- scrolt naar gedeelte van pagina -->
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
<!-- slideshow -->
		<script>
			$(document).ready(function() {
				$('.slider-demo').bscSlider({
					effect: 1
				});
			})

		</script>
<!-- code om facebook toe te voegen -->
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

		<?php footBottom() ?>
