<?php
session_start();


$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


if (isset($_GET["opslaan"])) {
		if ($_SESSION["rol"] == "klant") {
				$sql = "UPDATE Klant SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=? where klant_nummer=?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array($_GET["voornaam"], $_GET["tussenvoegsel"], $_GET["achternaam"], $_GET["emailadres"], $_GET["telefoonnummer"], $_GET["adres"], $_GET["postcode"], $_GET["woonplaats"], $_GET["klantnummer"]));
		} elseif ($_SESSION["rol"] == "medewerker") {
				$sql = "UPDATE Medewerker SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=?, functie=? where medewerker_nummer=?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array($_GET["voornaam"], $_GET["tussenvoegsel"], $_GET["achternaam"], $_GET["emailadres"], $_GET["telefoonnummer"], $_GET["adres"], $_GET["postcode"], $_GET["woonplaats"], $_GET["functie"], $_GET["medewerkernummer"]));
		} else {
                print("Query is niet uitgevoerd! Fock you!");

        }

}

$voornaam = $_SESSION["voornaam"];
$tussenvoegsel = $_SESSION["tussenvoegsel"];
$achternaam = $_SESSION["achternaam"];
$naam = $_SESSION["naam"];
$telefoonnummer = $_SESSION["telefoonnummer"];
$emailadres = $_SESSION["emailadres"];
$adres = $_SESSION["adres"];
$postcode = $_SESSION["postcode"];
$woonplaats = $_SESSION["woonplaats"];

if ($_SESSION["rol"] == "klant") {
		$klant_nummer = $_SESSION["klantnummer"];
}

if ($_SESSION["rol"] == "medewerker") {
		$functie = $_SESSION["functie"];
		$medewerker_nummer = $_SESSION["medewerkernummer"];
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
		if ($_SESSION["rol"] == "klant") {
				$klant_nummer = $_GET["klantnummer"];
		}
		if ($_SESSION["rol"] == "medewerker") {
				$functie = $_GET["functie"];
				$medewerker_nummer = $_GET["medewerker_nummer"];
		}
}

$rol = $_SESSION["rol"];

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
                    <li class="nav-item"><a href="login.php">Inloggen</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>




      <div class="col-xs-10 col-xs-offset-1 col-md-8 page-box">
          <div class=pagebox>
							<h1>Wijzigen</h1>
              <table>
                  <form action='accountwijzigen.php' method='get'>
                      <tr><td>Voornaam</td><td><input type="text" class="form-control" name="voornaam" <?php print("value=\"$voornaam\""); ?> ></td></tr>
                      <tr><td>Tussenvoegsel</td><td><input type="text" class="form-control" name="tussenvoegsel" <?php print("value=\"$tussenvoegsel\""); ?>></td></tr>
                      <tr><td>Achternaam</td><td><input type="text" class="form-control" name="achternaam" <?php print("value=\"$achternaam\""); ?>></td></tr>
                      <tr><td>Telefoonnummer  </td><td><input type="text" class="form-control" name="telefoonnummer" <?php print("value=\"$telefoonnummer\""); ?>></td></tr>
                      <tr><td>Emailadres</td><td><input type="text" class="form-control" name="emailadres" <?php print("value=\"$emailadres\""); ?>></td></tr>
                      <tr><td>Adres</td><td><input type="text" class="form-control" name="adres" <?php print("value=\"$adres\""); ?>></td></tr>
                      <tr><td>Postcode</td><td><input type="text" class="form-control" name="postcode" <?php print("value=\"$postcode\""); ?>></td></tr>
                      <tr><td>Woonplaats</td><td><input type="text" class="form-control" name="woonplaats" <?php print("value=\"$woonplaats\""); ?>></td></tr>
											<?php
												if ($_SESSION["rol"] == "medewerker") {
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

														print("<input type=\"hidden\" name=\"medewerkernummer\" value=$medewerker_nummer>");
												} elseif ($_SESSION["rol"] == "klant") {
														print("<input type=\"hidden\" name=\"klantnummer\" value=$klant_nummer>");
												}
											?>
                      <tr><td><a href="accountoverview.php" class="btn btn-primary" role="button">Terug</a></td>
											<td align='right'><input class="btn oranje white" type="submit" name="opslaan" value="Opslaan"></td></tr>
                  </form>
              </table>
						<br>



            <?php
             print($_GET["voornaam"] . ' ' . $_GET["tussenvoegsel"] . ' ' . $_GET["achternaam"] . ' ' . $_GET["emailadres"] . ' ' . $_GET["telefoonnummer"] . ' ' . $_GET["adres"] . ' ' . $_GET["postcode"] . ' ' . $_GET["woonplaats"] . ' ' . $_GET["functie"] . ' ' . $_GET["medewerkernummer"]);
            if(isset($_GET["opslaan"])) {
								print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> De wijzigingen zijn opgeslagen</div>');
            }


            ?>
          </div>
      </div>





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
