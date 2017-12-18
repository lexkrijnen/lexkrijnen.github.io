<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Accountoverview</title>
	<link rel="stylesheet" href="css/accountoverview.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
	<meta name="author" content="Nard Wemes">
	<link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">

	<?php
    session_start();
    @$klant_id = $_SESSION['klant_id'];
    @$klant_voornaam = $_SESSION['voornaam'];
    @$medewerker_nummer = $_SESSION['medewerker_nummer'];
    @$medewerker_voornaam = $_SESSION['medewerker_voornaam'];
    @$medewerker_functie = $_SESSION['medewerker_functie'];





    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    if ($klant_id != "" AND $medewerker_id == "") {
    $stmt = $pdo->prepare("SELECT * FROM Klant WHERE klant_nummer='$klant_id'");
    $stmt->execute();
    $sqlresult = $stmt->fetch();
    $klant_nummerdb = $sqlresult["klant_nummer"];
    }elseif ($klant_id == "" AND $medewerker_nummer != "") {
    $stmt = $pdo->prepare("SELECT * FROM Medewerker WHERE medewerker_nummer='$medewerker_nummer'");
    $stmt->execute();
    $sqlresult = $stmt->fetch();
    $medewerker_nummerdb = $sqlresult["medewerker_nummer"];
    }




    $voornaam = ucfirst($sqlresult["voornaam"]);
    $tussenvoegsel = $sqlresult["tussenvoegsel"];
    $achternaam = ucfirst($sqlresult["achternaam"]);
    $telefoonnummer = $sqlresult["telefoon_nummer"];
    $emailadres =  $sqlresult["emailadres"];
    $adres = $sqlresult["adres"];
    $postcode = $sqlresult["postcode"];
    $woonplaats = ucfirst($sqlresult["woonplaats"]);
    $naam = $voornaam . " " . $tussenvoegsel . " " . $achternaam;
    @$functie = $sqlresult["functie"];


    $_SESSION["voornaam"] = $voornaam;
    $_SESSION["tussenvoegsel"] = $tussenvoegsel;
    $_SESSION["achternaam"] =  $achternaam;
    $_SESSION["naam"] = $naam;
    $_SESSION["telefoonnummer"] = $telefoonnummer;
    $_SESSION["emailadres"] = $emailadres;
    $_SESSION["adres"] = $adres;
    $_SESSION["postcode"] = $postcode;
    $_SESSION["woonplaats"] = $woonplaats;
    $_SESSION["medewerker_nummer"] = $medewerker_nummerdb;
    $_SESSION["functie"] = $medewerker_functie;


if($klant_id == "" AND $medewerker_nummer != ""){
    $rol = "medewerker";
}elseif($klant_id != "" AND $medewerker_nummer == ""){
    $rol = "klant";
}

    $_SESSION["rol"] = $rol;



    $pdo = NULL;
?>


</head>

<body>
	<!--NAVBAR-->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
				<a class="navbar-brand" href="index.php"><img class="brand-logo" src="images/wegrobanner.png" alt="logo"></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item"><a href="account.php">Mijn Account</a></li>
					<li class="nav-item"><a href="logout.php">Uitloggen</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<?php
    if (empty($klant_id) AND empty($medewerker_nummer)) {
        print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
        print('<meta http-equiv="refresh" content="2;url=../login.php" />');
    }else {
    ?>


		<div class="page-box col-xs-4 col-xs-offset-1">
			<h1>Uw gegevens</h1>
			<table class="table table-hover table-bordered">
				<tr>
					<th>Veld</th>
					<th>Gegevens</th>
				</tr>
				<?php
                    if ($klant_nummerdb != "" OR $medewerker_nummerdb != "") {
                        print("<tr><td>Naam: </td><td>$naam</td></tr>");
                        if ($klant_nummerdb != "") {
                            print("<tr><td>Klantnummer: </td><td>$klant_nummerdb</td></tr>");
                        }elseif ($medewerker_nummerdb != "") {
                            print("<tr><td>Medewerkernummer: </td><td>$medewerker_nummerdb");
                            print("<tr><td>Rol: </td><td>$rol");
                        }
                        print("<tr><td>Telefoonnummer: </td><td>$telefoonnummer</td></tr>");
                        print("<tr><td>Emailadres: </td><td>$emailadres</td></tr>");
                        print("<tr><td>Adres: </td><td>$adres</td></tr>");
                        print("<tr><td>Postcode: </td><td>$postcode</td></tr>");
                        print("<tr><td>Woonplaats: </td><td>$woonplaats</td></tr>");
                        print("</table><form action='accountwijzigen.php' method='get'><input class=\"btn btn-succes\" type=\"submit\" name=\"wijzigen\" value=\"Wijzigen\"></form></div>");
                    }elseif ($klant_nummerdb == "") {
                        print("<br>Error! Waarschijnlijk een onbekend klantnummer, neem a.u.b. contact op met iemand die hier verstand van heeft.");
                    }elseif ($medewerker_nummerdb == ""){
                        print("<br>Error! Waarschijnlijk een onbekend medewerkernummer, neem a.u.b. contact op met iemand die hier verstand van heeft.");
                    }


                ?>

			</table>



		</div>








		<?php $pdo = NULL; ?>
</body>

</html>
<?php } ?>
