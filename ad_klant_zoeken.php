<?php
session_start();
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_voornaam = $_SESSION['medewerker_voornaam'];
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


if (isset($_GET["vinden"])) {
	if ($_GET["rol"] == "klant") {
		$sql = "SELECT * FROM Klant where voornaam = ? AND tussenvoegsel = ? AND achternaam = ?";
	} elseif ($_GET["rol"] == "medewerker") {
		$sql = "SELECT * FROM Medewerker where voornaam = ? AND tussenvoegsel = ? AND achternaam = ?";

		//ophalen van de functie van de medwerker
		$sql2 = "SELECT * FROM Functie where functie_nummer = ?";
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->execute(array($functie));
		$functie = $stmt2->fetch();
	}
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET["ingevuldevoornaam"], $_GET["ingevuldetussenvoegsel"], $_GET["ingevuldeachternaam"]));
    $klant = $stmt->fetch();

    $voornaam = ucfirst($klant["voornaam"]);
    $tussenvoegsel = $klant["tussenvoegsel"];
    $achternaam = ucfirst($klant["achternaam"]);
    $telefoonnummer = $klant["telefoon_nummer"];
    $emailadres =  $klant["emailadres"];
    $adres = $klant["adres"];
    $postcode = $klant["postcode"];
    $woonplaats = ucfirst($klant["woonplaats"]);
    $naam = $voornaam . " " . $tussenvoegsel . " " . $achternaam;
		$zoekrol = $_GET["rol"];

		if ($_GET["rol"] == "klant") {
			$klant_nummer = $klant["klant_nummer"];
			$_SESSION["klantnummer2"] = $klant_nummer;
		} elseif ($_GET["rol"] == "medewerker") {
			$medewerker_nummer2 = $klant["medewerker_nummer"];
			$functie = $klant["functie"];
			$functienaam = $functie["functie_naam"];
			$_SESSION["medewerkernummer2"] = $medewerker_nummer2;
			$_SESSION["functie2"] = $functie;
			$_SESSION["functienaam2"] = $functienaam;
		}

		//informatie van de klant oplslaan in een session voor het verwijderen/wijzigen
		//er staat een 2 achter de session zodat ze niet door elkaar gehaald worden met de session met de gegevens van de gebruiker
    $_SESSION["voornaam2"] = $voornaam;
    $_SESSION["tussenvoegsel2"] = $tussenvoegsel;
    $_SESSION["achternaam2"] =  $achternaam;
    $_SESSION["naam2"] = $naam;
    $_SESSION["telefoonnummer2"] = $telefoonnummer;
    $_SESSION["emailadres2"] = $emailadres;
    $_SESSION["adres2"] = $adres;
    $_SESSION["postcode2"] = $postcode;
    $_SESSION["woonplaats2"] = $woonplaats;
		$_SESSION["rol2"] = $zoekrol;

		//de ingevulde gegevens opslaan voor de error message
    $ingevuldevoornaam = $_GET["ingevuldevoornaam"];
    $ingevuldetussenvoegsel = $_GET["ingevuldetussenvoegsel"];
    $ingevuldeachternaam = $_GET["ingevuldeachternaam"];
		$ingevulderol =	$_GET["rol"];
}

$stmt3 = $pdo->prepare("SELECT * FROM Project");
$stmt3->execute();
$projecten = $stmt3->fetchAll();

$pdo = NULL;
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

		<title>zoeken</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Global styles for this website -->
		<link href="css/global.css" rel="stylesheet">

		<!-- Custom styles for this page -->
		<link href="css/klant_pagina.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    if ($klant_id == "" AND $medewerker_nummer != ""){
        $rol = "medewerker";
    } elseif($klant_id != "" AND $medewerker_nummer == ""){
        $rol = "klant";
    }
    ?>
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
						<li class="nav-item"><a href="logout.php">Uitloggen</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		<?php
		//controle of er een admin is ingelogd
		if (empty($medewerker_nummer)) {
				print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
				print('<meta http-equiv="refresh" content="2;url=../admin.php" />');
		} elseif ($medewerker_functie == "2") {
				print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>U heeft geen rechten op deze pagina.</h5></div><br>');
				print('<meta http-equiv="refresh" content="2;url=../profile_medewerker.php" />');
		} else {
		?>

    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-12 sidebar-offcanvas" id="sidebar" role="navigation">
                <div class="sidebar-nav">
                    <ul class="nav">
                        <li class="active">
                            <h4><b>Functies</b></h4>
                        </li>
                        <li class="nav-divider"></li>
                        <li><a href="profile_admin.php">Mijn Account</a></li>
                        <li><a href="ad_accountoverview.php">Accountgegevens</a></li>
                        <li><a href="mw_toevoegen.php">Medewerkers toevoegen</a></li>
                        <li><a href="ad_klant_toevoegen.php">Klanten toevoegen</a></li>
                        <li><a href="ad_klant_zoeken.php">Klanten Wijzigen/Verwijderen</a></li>
                        <li><a href="ad_project_aanmaken.php">Project Aanmaken</a></li>
                        <li><a href="ad_meerminderlanding.php">Meer/Minder Werk</a></li>
                        <li class="nav-divider"></li>
                        <li>
                            <h4><b>Projecten</b></h4>
                        </li>
                        <li class="nav-divider"></li>
                        <?php
                        foreach ( $projecten as $value ) {
                            print ("<li><a href=\"test_PDF_upload.php?id=" . $value['project_nummer'] . "\">" . $value['naam'] . "</a></li>");
                        }
                        ?>
                        <li class="nav-divider"></li>
                    </ul>
                </div>
                <!--/.well -->
            </div>
            <!--/span-->
        </div>
    </div>

		<div class="container page-box">
		  <div class="col-xs-12 col-md-12">
				<div class=container>
					<h1>Zoeken</h1>
					<table>
						<form action="ad_klant_zoeken.php" method="get">
							<div class="row">
								<tr>
									<td>
										Voornaam:
									</td>
									<td>
										<input type="text" class="form-control" name="ingevuldevoornaam" required <?php if (isset($_GET[ "vinden"])) { print( "value = $ingevuldevoornaam"); } else { print( "placeholder='voornaam'"); }?> >
									</td>
								</tr>

								<tr>
									<td>
										Tussenvoegsel:
									</td>
									<td>
										<input type="text" class="form-control" name="ingevuldetussenvoegsel" <?php if (isset($_GET[ "vinden"])) { print( "value = $ingevuldetussenvoegsel"); } else { print( "placeholder='tussenvoegsel'"); }?> >
									</td>
								</tr>

								<tr>
									<td>
										Achternaam:
									</td>
									<td>
										<input type="text" class="form-control" name="ingevuldeachternaam" required <?php if (isset($_GET[ "vinden"])) { print( "value = $ingevuldeachternaam"); } else { print( "placeholder='achternaam'"); }?> >
									</td>
								</tr>

									<tr>
										<td>
											<input type="radio" name=rol value="klant" <?php if (isset($_GET[ "vinden"]) && $ingevulderol == "klant") { print( "checked"); } else { print( "checked"); } ?>>Klant
										</td>
									</tr>
									<tr>
										<td>
											<input type="radio" name=rol value="medewerker" <?php if (isset($_GET[ "vinden"]) && $ingevulderol == "medewerker") { print( "checked"); } ?>>Medewerker
										</td>
									</tr>

									<tr>
										<td>
										</td>
										<td>
											<div align="right">
												<input id="button1" class="btn oranje white" type="submit" name="vinden" value="Vinden">
											</div>
										</td>
									</tr>
							</div>
						</form>
					</table>
				</div>



				<?php
                //informatie van de gezochte klant tonen
                if (isset($_GET["vinden"])) {
                    //Geen voornaam en achternaam ingevuld
                    if ($_GET["ingevuldevoornaam"] == "" || $_GET["ingevuldeachternaam"] == "") {
                        print("<div class=\"alert alert-warning\" role=\"alert\">
                                <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                                <span class=\"sr-only\">Error:</span>
                                Vul een voornaam en een achternaam in.
                              </div>");
                    } elseif ($klant_nummer != "" || $medewerker_nummer2 != "") {
                        print("<br><div class=\"container col-xs-9 col-md-7\"><table class=\"table table-hover table-bordered\">");
                        print("<tr><td>Naam:</td><td>$naam</td></tr>");
												if ($zoekrol == "medewerker") {
														print("<tr><td>Medewerkernummer:</td><td>$medewerker_nummer2</td></tr>");
														print("<tr><td>functie:</td><td>$functienaam</td></tr>");
												} elseif ($zoekrol == "klant") {
														print("<tr><td>Klantnummer:</td><td>$klant_nummer</td></tr>");
												}
                        print("<tr><td>Telefoonnummer:</td><td>$telefoonnummer</td></tr>");
                        print("<tr><td>Emailadres:</td><td>$emailadres</td></tr>");
                        print("<tr><td>Adres:</td><td>$adres</td></tr>");
                        print("<tr><td>Postcode:</td><td>$postcode</td></tr>");
                        print("<tr><td>Woonplaats:</td><td>$woonplaats</td></tr>");
												print("</table>");
												print("<table>");
												print("<tr><td>");
												print("<form action='ad_klant_wijzigen.php' method='get'>");
                        print("<input id=\"button2\" class=\"btn btn-primary\" type=\"submit\" name=\"wijzigen\" value=\"Wijzigen\">");
                        print("</form>");
												print("</td><td>");
                        print("<form action='ad_klant_verwijderen.php' method='get'>");
                        print("<input id=\"button1\" class=\"btn btn-danger\" type=\"submit\" name=\"verwijderen\" value=\"Verwijderen\">");
                        print("</form>");
												print("</td>");
												print("</table>");
                        print("</div>");
                    } else {
                        //geen klant gevonden met die naam
                        print("<div class=\"alert alert-warning\" role=\"alert\">
                                <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                                <span class=\"sr-only\">Error:</span>
                                Geen $ingevulderol gevonden met de naam " . $_GET["ingevuldevoornaam"] ." ". $_GET["ingevuldetussenvoegsel"] ." ". $_GET["ingevuldeachternaam"] . ".
                              </div>");
                    }
                }
                ?>
			</div>
		</div>

		<?php
		}
		?>

		<div class="row">
			<div class="col-xs-12 text-center footer-rights">
				<p>© Bouwbedrijf Wegro - Powered by <a href="#">Bootstrap</a> and <a href="#">Glyphicons</a>.</p>
			</div>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>

		<!-- Bootstrap Framework -->
		<script src="js/bootstrap.min.js"></script>
	</body>

	</html>

