<?php
session_start();
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_functie = $_SESSION['medewerker_functie'];

$voornaam = $_POST["voornaam"];
$tussenvoegsel = $_POST["tussenvoegsel"];
$achternaam = $_POST["achternaam"];
$naam = ucfirst($voornaam) . " " . $tussenvoegsel . " " . ucfirst($achternaam);
$emailadres = $_POST["emailadres"];
$telefoonnummer = $_POST["telefoonnummer"];
$woonplaats = ucfirst($_POST["woonplaats"]);
$straat = $_POST["straat"];
$postcode = $_POST["postcode"];

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

if (isset($_POST["aanmaken"])) {

    $sql = "INSERT INTO Klant (voornaam, tussenvoegsel, achternaam, emailadres, wachtwoord, salt, telefoon_nummer, adres, postcode, woonplaats) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_POST["voornaam"], $_POST["tussenvoegsel"], $_POST["achternaam"], $_POST["emailadres"], $_POST["hash"], $_POST["salt"], $_POST["telefoonnummer"], $_POST["straat"], $_POST["postcode"], $_POST["woonplaats"]));

}

    $stmt = $pdo->prepare("SELECT * FROM Project");
    $stmt->execute();
    $projecten = $stmt->fetchAll();

$pdo = NULL;

//random string voor wachtwoord
function random($keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ?!/\:;@#$%^&*')
{
    $str = "";
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < 10; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

$wachtwoord = random();
$salt = rand();
$hash = sha1($salt . $wachtwoord);
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

		<title>Klant toevoegen</title>

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
			<div class="container">
				<div class="col-xs-12 col-md-12">
					<h1>Klant toevoegen</h1>
					<table>
						<form action="ad_klant_toevoegen.php" method="POST">
							<tr>
								<td>Voornaam</td>
								<td>
									<input type="text" class="form-control" name="voornaam" placeholder="Voornaam" required <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $voornaam"); } ?>>
								</td>
							</tr>
							<tr>
								<td>Tussenvoegsel(s) </td>
								<td>
									<input type="text" class="form-control" name="tussenvoegsel" placeholder="Tussenvoegsel(s)" <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $tussenvoegsel"); } ?>>
								</td>
							</tr>
							<tr>
								<td>Achternaam</td>
								<td>
									<input type="text" class="form-control" name="achternaam" placeholder="Achternaam" required <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $achternaam"); } ?>>
								</td>
							</tr>
							<tr>
								<td>E-mailadres</td>
								<td>
									<input type="email" class="form-control" name="emailadres" placeholder="E-mailadres" required <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $emailadres"); } ?> >
								</td>
							</tr>
							<tr>
								<td>Wachtwoord</td>
								<td>
									<input type="text" class="form-control" placeholder="wachtwoord" disabled <?php if (isset($_POST[ "genereer_wachtwoord"])) { print( "value=$wachtwoord"); } ?>>
								</td>
								<td>
									<input type="hidden" name="hash" <?php if (isset($_POST[ "genereer_wachtwoord"])) { print( "value=$hash"); } ?>>
								</td>
								<td>
									<input type="hidden" name="salt" <?php if (isset($_POST[ "genereer_wachtwoord"])) { print( "value=$salt"); } ?>>
								</td>
								<td>
									<input type="submit" id="button1" class="btn oranje white" name="genereer_wachtwoord" value="Genereer">
								</td>
							</tr>
							<tr>
								<td>Telefoonnummer</td>
								<td>
									<input type="tel" class="form-control" name="telefoonnummer" placeholder="Telefoonnummer" <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $telefoonnummer"); } ?>>
								</td>
							</tr>
							<tr>
								<td>Adres</td>
								<td>
									<input type="text" class="form-control" name="woonplaats" placeholder="Woonplaats" <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $woonplaats"); } ?>>
								</td>
							</tr>
							<tr>
								<td>

								</td>
								<td>
									<input type="text" class="form-control" name="straat" placeholder="Straat + huisnummer" <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $straat"); } ?>>
								</td>
							</tr>
							<tr>
								<td>

								</td>
								<td>
									<input type="text" class="form-control" name="postcode" placeholder="postcode" <?php if(isset($_POST[ "genereer_wachtwoord"]) || isset($_POST[ "aanmaken"])) { print( "value = $postcode"); } ?>>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" id="button1" class="btn oranje white" name="aanmaken" value="Aanmaken">
								</td>
							</tr>
						</form>
					</table>
				</div>
			</div>

			<?php
            if(isset($_POST["aanmaken"])) {
                ///gegevens niet ingevuld
                if($_POST["voornaam"] == "") {
                    print("<div class=\"alert alert-warning\" role=\"alert\">");
                    print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                    print("<span class=\"sr-only\">Error:</span>");
                    print(" Vul een voornaam in.");
                    print("</div>");
                } elseif ($_POST["achternaam"] == "") {
                    print("<div class=\"alert alert-warning\" role=\"alert\">");
                    print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                    print("<span class=\"sr-only\">Error:</span>");
                    print(" Vul een achternaam in.");
                    print("</div>");
                } elseif ($_POST["emailadres"] == "") {
                    print("<div class=\"alert alert-warning\" role=\"alert\">");
                    print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                    print("<span class=\"sr-only\">Error:</span>");
                    print(" Vul een e-mailadres in.");
                    print("</div>");
                } elseif ($_POST["woonplaats"] == "") {
                    print("<div class=\"alert alert-warning\" role=\"alert\">");
                    print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                    print("<span class=\"sr-only\">Error:</span>");
                    print(" Vul een woonplaats in.");
                    print("</div>");
                } elseif ($_POST["straat"] == "") {
                    print("<div class=\"alert alert-warning\" role=\"alert\">");
                    print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                    print("<span class=\"sr-only\">Error:</span>");
                    print(" Vul een straat + huisnummer in.");
                    print("</div>");
                } elseif ($_POST["postcode"] == "") {
                    print("<div class=\"alert alert-warning\" role=\"alert\">");
                    print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                    print("<span class=\"sr-only\">Error:</span>");
                    print(" Vul een postcode in.");
                    print("</div>");
                } elseif ($wachtwoord == "") {
                    print("<div class=\"alert alert-warning\" role=\"alert\">");
                    print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                    print("<span class=\"sr-only\">Error:</span>");
                    print(" Druk op de genereer knop om een wachtwoord te genereren.");
                    print("</div>");
                } else {
                    ///succes
										print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' . $naam . '  is successvol toegevoegd als klant.</div>');
                }
            }

						if (isset($_POST["genereer_wachtwoord"])) {
								print("<div class=\"alert alert-warning\" role=\"alert\">");
								print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
								print("<span class=\"sr-only\">Error:</span>");
								print(" Let op! zorg ervoor dat u dit wachtwoord nu kopieert en ergens opslaat, het kan later niet meer gewijzigd worden.");
								print("</div>");
						}
            ?>
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
