<?php
session_start();
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_voornaam = $_SESSION['medewerker_voornaam'];

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


if (isset($_GET["opslaan"])) {
		if ($_SESSION["rol2"] == "klant") {
				$sql = "UPDATE Klant SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=? where klant_nummer=?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array($_GET["voornaam"], $_GET["tussenvoegsel"], $_GET["achternaam"], $_GET["emailadres"], $_GET["telefoonnummer"], $_GET["adres"], $_GET["postcode"], $_GET["woonplaats"], $_GET["klantnummer"]));
		} elseif ($_SESSION["rol2"] == "medewerker") {
				$sql = "UPDATE Medewerker SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=?, functie=? where medewerker_nummer=?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array($_GET["voornaam"], $_GET["tussenvoegsel"], $_GET["achternaam"], $_GET["emailadres"], $_GET["telefoonnummer"], $_GET["adres"], $_GET["postcode"], $_GET["woonplaats"], $_GET["functie"], $_GET["medewerkernummer"]));
		}

}


$voornaam = $_SESSION["voornaam2"];
$tussenvoegsel = $_SESSION["tussenvoegsel2"];
$achternaam = $_SESSION["achternaam2"];
$naam = $_SESSION["naam2"];
$telefoonnummer = $_SESSION["telefoonnummer2"];
$emailadres = $_SESSION["emailadres2"];
$adres = $_SESSION["adres2"];
$postcode = $_SESSION["postcode2"];
$woonplaats = $_SESSION["woonplaats2"];

if ($_SESSION["rol2"] == "klant") {
		$klant_nummer = $_SESSION["klantnummer2"];
}

if ($_SESSION["rol2"] == "medewerker") {
		$functie = $_SESSION["functie2"];
		$medewerker_nummer = $_SESSION["medewerkernummer2"];
}

if(isset($_GET["opslaan"])) {
    $voornaam = $_GET["voornaam"];
    $tussenvoegsel = $_GET["tussenvoegsel"];
    $achternaam = $_GET["achternaam"];
    $naam = $_GET["naam"];
    $telefoonnummer = $_GET["telefoonnummer"];
    $emailadres = $_GET["emailadres"];
    $adres = $_GET["adres"];
    $postcode = $_GET["postcode"];
    $woonplaats = $_GET["woonplaats"];
		if ($_SESSION["rol2"] == "klant") {
				$klant_nummer = $_GET["klantnummer"];
		}
		if ($_SESSION["rol2"] == "medewerker") {
				$functie = $_GET["functie"];
				$medewerker_nummer = $_GET["medewerkernummer"];
		}
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

		<title>wijzigen</title>

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
				<h1>Wijzigen</h1>
				<table>
					<form action='ad_klant_wijzigen.php' method='get'>
						<tr>
							<td>Voornaam</td>
							<td><input type="text" class="form-control" name="voornaam" <?php print( "value=\"$voornaam\""); ?> ></td>
						</tr>
						<tr>
							<td>Tussenvoegsel</td>
							<td><input type="text" class="form-control" name="tussenvoegsel" <?php print( "value=\"$tussenvoegsel\""); ?>></td>
						</tr>
						<tr>
							<td>Achternaam</td>
							<td><input type="text" class="form-control" name="achternaam" <?php print( "value=\"$achternaam\""); ?>></td>
						</tr>
						<tr>
							<td>Telefoonnummer  </td>
							<td><input type="text" class="form-control" name="telefoonnummer" <?php print( "value=\"$telefoonnummer\""); ?>></td>
						</tr>
						<tr>
							<td>Emailadres</td>
							<td><input type="text" class="form-control" name="emailadres" <?php print( "value=\"$emailadres\""); ?>></td>
						</tr>
						<tr>
							<td>Adres</td>
							<td><input type="text" class="form-control" name="adres" <?php print( "value=\"$adres\""); ?>></td>
						</tr>
						<tr>
							<td>Postcode</td>
							<td><input type="text" class="form-control" name="postcode" <?php print( "value=\"$postcode\""); ?>></td>
						</tr>
						<tr>
							<td>Woonplaats</td>
							<td><input type="text" class="form-control" name="woonplaats" <?php print( "value=\"$woonplaats\""); ?>></td>
						</tr>
						<?php
							if ($_SESSION["rol2"] == "medewerker") {
									print("<input type=\"hidden\" name=\"medewerkernummer\" value=$medewerker_nummer>");
									if ($_SESSION["medewerker_functie"] == "1") {
											print("<tr><td>Functie</td>");
											print("<td><input type=\"radio\" name=\"functie\" value=\"2\" ");
											if($functie=='2'){
													print("checked");
											}
											print(" > Medewerker</td></tr>");
											print("<tr><td></td><td><input type=\"radio\" name=\"functie\" value=\"1\" ");
											if($functie=='1') {
													print("checked");
											}
											print("> Admin </td></tr>");
									}
							} elseif ($_SESSION["rol2"] == "klant") {
									print("<input type=\"hidden\" name=\"klantnummer\" value=$klant_nummer>");
							}
							?>
							<tr>
								<td><a href="ad_klant_zoeken.php" id="button2" class="btn btn-primary" role="button">Terug</a></td>
								<td align='right'><input id="button1" class="btn oranje white" type="submit" name="opslaan" value="Opslaan"></td>
							</tr>
					</form>
				</table>
				<br>



				<?php

				if(isset($_GET["opslaan"])) {
						print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> De wijzigingen zijn opgeslagen</div>');
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

