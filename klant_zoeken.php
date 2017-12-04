<?php
session_start();


$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);





if (isset($_GET["vinden"])) {
    $sql = "SELECT * FROM klant k JOIN adres a ON k.klant_nummer=a.persoons_id where voornaam = ? AND tussenvoegsel = ? AND achternaam = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET["Voornaam"], $_GET["Tussenvoegsel"], $_GET["Achternaam"]));

    $klant = $stmt->fetch();

    $voornaam = $klant["Voornaam"];
    $tussenvoegsel = $klant["Tussenvoegsel"];
    $achternaam = $klant["Achternaam"];
    $klant_nummer = $klant["Klant_nummer"];
    $telefoonnummer = $klant["Telefoon_nummer"];
    $emailadres =  $klant["E-mailadres"];
    $adres = $klant["Adres"];
    $postcode = $klant["Postcode"];
    $woonplaats = $klant["Woonplaats"];
    $naam = $voornaam . " " . $tussenvoegsel . " " . $achternaam;

    $_SESSION["Voornaam"] = $voornaam;
    $_SESSION["Tussenvoegsel"] = $tussenvoegsel;
    $_SESSION["Achternaam"] =  $achternaam;
    $_SESSION["Naam"] = $naam;

    $ingevuldevoornaam = $_GET["Voornaam"];
    $ingevuldetussenvoegsel = $_GET["Tussenvoegsel"];
    $ingevuldeachternaam = $_GET["Achternaam"];

}



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

    <title>Welkom bij Wegro</title>

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






      <div class=container>
       <table>
            <form action="klant_zoeken.php" method="get">
                <div class="row">
                      <tr><td>Voornaam: </td><td><input type="text" class="form-control" name="voornaam" required <?php if (isset($_GET["vinden"])) { print("value = $ingevuldevoornaam"); } else { print("placeholder='voornaam'"); }?> ></td></tr>
                  </div>
                  <div class="">
                      <tr><td>Tussenvoegsel: </td><td><input type="text" class="form-control" name="tussenvoegsel" <?php if (isset($_GET["vinden"])) { print("value = $ingevuldetussenvoegsel"); } else { print("placeholder='tussenvoegsel'"); }?> ></td></tr>
                  </div>
                  <div class="">
                      <tr><td>Achternaam: </td><td><input type="text" class="form-control" name="achternaam" required <?php if (isset($_GET["vinden"])) { print("value = $ingevuldeachternaam"); } else { print("placeholder='achternaam'"); }?> ></td>
                  </div>
                  <td><input class="btn oranje white" type="submit" name="vinden" value="vinden"></td>
            </form>
        </table>
      </div>


    <?php
    //informatie van de gezochte klant tonen
    if (isset($_GET["vinden"])) {
        //Geen voornaam en achternaam ingevuld
        if ($_GET["Voornaam"] == "" && $_GET["Achternaam"] == "") {
            print("<div class=\"alert alert-warning\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>
                    Vul een voornaam en een achternaam in.
                  </div>");
        } elseif ($stmt->rowCount()>0) {
            print("<table>");
            print("<tr><td>Naam: $naam</td></tr>");
            print("<tr><td>Klantnummer: $klant_nummer</td></tr>");
            print("<tr><td>Telefoonnummer: $telefoonnummer</td></tr>");
            print("<tr><td>Emailadres: $emailadres</td></tr>");
            print("<tr><td>Adres: $adres</td></tr>");
            print("<tr><td>Postcode: $postcode</td></tr>");
            print("<tr><td>Woonplaats: $woonplaats</td></tr>");
            print("<tr><td><form action='klant_verwijderen.php' method='get'></td>");
            print("<td><input class=\"btn btn-danger\" type=\"submit\" name=\"verwijderen\" value=\"klant verwijderen\"></td></tr>");
            print("</form>");
            print("</table>");
        } else {
            //geen klant gevonden met die naam
            print("<div class=\"alert alert-warning\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>
                    Geen klant gevonden met de naam " . $_GET["Voornaam"] ." ". $_GET["Tussenvoegsel"] ." ". $_GET["Achternaam"] . ".
                  </div>");
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
