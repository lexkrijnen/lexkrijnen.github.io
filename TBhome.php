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

		<title>Tekenbureau Wegro</title>

		<?php headMiddle() ?>

		<!-- Custom styles for this page -->
		<link href="css/home.css" rel="stylesheet">

		<?php headBottom() ?>

		<?php navTop() ?>
			<li class="nav-item"><a href="index.php">Home</a></li>
			<li class="nav-item"><a href="#Ons_bedrijf">Ons Bedrijf</a></li>
			<li class="nav-item"><a href="#3D">2D en 3D</a></li>
			<li class="nav-item"><a href="#Vergunningen">Vergunningen</a></li>
			<li class="nav-item"><a href="#Kwaliteiten">Projecten</a></li>
			<li class="nav-item"><a href="#Ontwerp">Ontwerp</a></li>
			<li class="nav-item"><a href="Contact/contact.php">Contact</a></li>
			<li class="nav-item">
				<a href="login.php">
					<?php print($ingelogd);?>
				</a>
			</li>
		<?php navBottom() ?>

    <div class="container-fluid">
    	<div class="row MBhomeRow">
    		<div class="col-xs-12 MBhomeBackground">
    			<img class="MBhome-img" src="images/DSC02245.jpg">
				</div>
				<div class="col-xs-12 MBhomeContent">
					<img class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4 logo" src="images/Wegrotekenbureaulogo.png">
					<a href="/Contact/contact.php">
						<div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4 select-btn">
							Contact
						</div>
					</a>
				</div>
			</div><!-- .row -->
		</div><!-- .container-fluid -->

    <div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 paragraphleft page-box">
				<a name="Ons_bedrijf" id="Ons_bedrijf"></a>
				<p>
					<titel>Ons bedrijf</titel>
					<br><br>
					<img class="col-xs-12 col-md-5 col-md-offset-1 imgright" src="images/IMG_8588.JPG">
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

		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 page-box">
				<a name="Kwaliteiten" id="Kwaliteiten"></a>
				<p class="paragraphleft ">
					<titel>2D en 3D ontwerp</titel>
				</p>
				<br>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/Impressie-living.png" alt="">
						<div class="overlay">
							<h1>BETERE IMPRESSIE</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/DSC02245.jpg" alt="">
						<div class="overlay">
							<h1>HOGE KWALITEIT</h1>
							<p>

							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/Impressie-woonkeuken.png" alt="">
						<div class="overlay">
							<h1>RUIMTELIJKE ORIËNTATIE</h1>
							<p>

							</p>
						</div>
					</div>
				</div>
			</div><!-- .col page-box -->
		</div><!-- .row -->

		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 paragraphleft page-box">
				<a name="Vergunningen" id="Vergunningen"></a>
				<p>
					<titel>Vergunningen</titel>
					<br><br>
					<img src="images/vergunning.jpg" class="col-xs-12 col-md-5 imgleft">
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

		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 page-box">
				<a name="Kwaliteiten" id="Kwaliteiten"></a>
				<p class="paragraphleft ">
					<titel>Projecten</titel>
				</p>
				<br>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/DSC02232.jpg" alt="">
						<div class="overlay">
							<h1>TEKENING</h1>
							<p>
								Bouwkundig Tekenbureau Wegro maakt een ontwerp waar uw wensen centraal staan.
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/IMG_9270.JPG" alt="">
						<div class="overlay">
							<h1>BOUW</h1>
							<p>
								Door samenwerking tussen Tekenbureau Wegro en Bouwbedrijf Wegro bv is het mogelijk uw project bij Bouwbedrijf Wegro bv te laten realiseren.
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-xs-12 hover-img">
					<div class="hovereffect">
						<img class="img-responsive" src="images/2017-11-21-PHOTO-00000620.jpg" alt="">
						<div class="overlay">
							<h1>REALISATIE</h1>
							<p>
								De Nauwe samenwerking tussen Tekenbureau Wegro en Bouwbedrijf-/Metselbedrijf Wegro zorgt ervoor dat Projecten zeer efficient  verlopen.
							</p>
						</div>
					</div>
				</div>
			</div><!-- .col page-box -->
		</div><!-- .row -->

		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-12 col-md-offset-0 paragraphleft page-box">
				<a name="Ontwerp" id="Ontwerp"></a>
				<p>
					<titel>Ontwerp</titel>
					<br><br>
					<img src="images/IMG_8639.JPG" class="col-xs-12 col-md-5 col-md-offset-1 imgright">
					Of het nu gaat om een dakkapel of een volledige nieuwbouwwoning, wij zorgen voor een bouwkundig ontwerp of schetsontwerp.
					Uw wensen staan hierbij centraal! Een goed en gedetailleerd ontwerp is belangrijk voor de omgevingsvergunning, maar ook voor de uiteindelijke uitvoeringsfase.
					Het kan veel verwarring en narigheid voorkomen.
					Voor het digitaliseren van tekeningen bij verbouwingen maken we gebruik van de bestaande tekeningen.
					Mochten deze er niet meer zijn dan komen we inmeten.
					<br><br>
				</p>
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->

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

		<?php footBottom() ?>
