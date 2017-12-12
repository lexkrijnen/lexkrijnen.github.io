<?php
$voornaam = $_GET["voornaam"];
$tussenvoegsel = $_GET["tussenvoegsel"];
$achternaam = $_GET["achternaam"];
$naam = $voornaam . " " . $tussenvoegsel . " " . $achternaam;
$emailadres = $_GET["emailadres"];
$telefoonnummer = $_GET["telefoonnummer"];
$woonplaats = $_GET["woonplaats"];
$straat = $_GET["straat"];
$postcode = $_GET["postcode"];



$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


if (isset($_GET["aanmaken"])) {

	$sql = "INSERT INTO Medewerker (voornaam, tussenvoegsel, achternaam, emailadres, wachtwoord, salt, telefoon_nummer, adres, postcode, woonplaats, functie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($_GET["voornaam"], $_GET["tussenvoegsel"], $_GET["achternaam"], $_GET["emailadres"], $_GET["hash"], $_GET["salt"], $_GET["telefoonnummer"], $_GET["straat"], $_GET["postcode"], $_GET["woonplaats"]), $_GET["functie"]);

}

$pdo = NULL;

//random string voor wachtwoord
function random($keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = "";
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < 10; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

$wachtwoord = random();
$salt = random_bytes(32);
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

		<title>Medewerker toevoegen</title>

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
				<!-- Brand and toggle GET grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-tarGET="#bs-example-navbar-collapse-1" aria-expanded="false">
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

		<div class="container">
			<table>
            <form action="mw_toevoegen.php" method="GET">
        	<tr>
          	 <td>Voornaam</td>
                <td>
                    <input type="text" class="form-control" name="voornaam" placeholder="Voornaam" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $voornaam"); } ?>>
                </td>
            </tr>
            <tr>
                <td>Tussenvoegsel(s)</td>
                <td>
                <input type="text" class="form-control" name="tussenvoegsel" placeholder="Tussenvoegsel(s)" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $tussenvoegsel"); } ?>>
                </td>
          </tr>
          <tr>
          	<td>Achternaam</td>
            <td>
            	<input type="text" class="form-control" name="achternaam" placeholder="Achternaam" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $achternaam"); } ?>>
            </td>
          </tr>
          <tr>
          	<td>E-mailadres</td>
            <td>
           		<input type="email" class="form-control" name="emailadres" placeholder="E-mailadres" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $emailadres"); } ?> >
            </td>
          </tr>
          <tr>
          	<td>Wachtwoord</td>
            <td>
            	<input type="text" class="form-control" placeholder="wachtwoord" <?php if (isset($_GET["genereer_wachtwoord"])) { print("value='$wachtwoord' disable"); } ?>>
            </td>
            <td>
            	<input type="hidden" name="hash" <?php if (isset($_GET["genereer_wachtwoord"])) { print("value=$hash"); } ?>>
            </td>
            <td>
            	<input type="hidden" name="salt" <?php if (isset($_GET["genereer_wachtwoord"])) { print("value=$salt"); } ?>>
            </td>
            <td>
            	<input type="submit" class="btn oranje white" name="genereer_wachtwoord" value="Genereer Wachtwoord">
            </td>
          </tr>
          <tr>
          	<td>Telefoonnummer</td>
            <td>
            	<input type="text" class="form-control" name="telefoonnummer" placeholder="Telefoonnummer" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $telefoonnummer"); } ?>>
            </td>
          </tr>
          <tr>
          	<td>Adres</td>
            <td>
            	<input type="text" class="form-control" name="woonplaats" placeholder="Woonplaats" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $woonplaats"); } ?>>
            </td>
          </tr>
          <tr>
          	<td>

          	</td>
            <td>
            	<input type="text" class="form-control" name="straat" placeholder="Straat + huisnummer" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $straat"); } ?>>
            </td>
          </tr>
          <tr>
          	<td>

          	</td>
            <td>
            	<input type="text" class="form-control" name="postcode" placeholder="postcode" <?php if(isset($_GET["genereer_wachtwoord"]) || isset($_GET["aanmaken"])) { print("value = $postcode"); } ?>>
            </td>
          </tr>
          <tr>
            <td>Functie</td>
            <td>
                <input type="radio" name="functie" value="1" checked> Medewerker
            </td>
          </tr>
          <tr>
            <td>

            </td>
          	<td>
            	<input type="radio" name="functie" value="2"> Admin
            </td>
          </tr>
          <tr>
          	<td>
            	<input type="submit" class="btn oranje white" name="aanmaken" value="Account aanmaken">
            </td>
          </tr>
        </form>
      </table>
    </div>

		<?php
        if(isset($_GET["aanmaken"])) {
            ///gegevens niet ingevuld
            if($_GET["voornaam"] == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">");
                print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                print("<span class=\"sr-only\">Error:</span>");
                print(" Vul een voornaam in.");
                print("</div>");
            } elseif ($_GET["achternaam"] == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">");
                print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                print("<span class=\"sr-only\">Error:</span>");
                print(" Vul een achternaam in.");
                print("</div>");
            } elseif ($_GET["emailadres"] == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">");
                print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                print("<span class=\"sr-only\">Error:</span>");
                print(" Vul een e-mailadres in.");
                print("</div>");
            } elseif ($_GET["woonplaats"] == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">");
                print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                print("<span class=\"sr-only\">Error:</span>");
                print(" Vul een woonplaats in.");
                print("</div>");
            } elseif ($_GET["straat"] == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">");
                print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                print("<span class=\"sr-only\">Error:</span>");
                print(" Vul een straat + huisnummer in.");
                print("</div>");
            } elseif ($_GET["postcode"] == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">");
                print("<span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>");
                print("<span class=\"sr-only\">Error:</span>");
                print(" Vul een postcode in.");
                print("</div>");
            } else {
                ///succes
                print("<div class=\"alert alert-success\" role=\"alert\">");
                print("<br>" . $naam . " is successvol toegevoegd als medewerker.");
                print("</div>");
            }
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