<?php
	session_start(); //sessie starten en sessievariabelen ophalen
	@$klant_id = $_SESSION['klant_id'];
	@$klant_voornaam = $_SESSION['voornaam'];
	@$medewerker_nummer = $_SESSION['medewerker_nummer'];
	@$medewerker_voornaam = $_SESSION['medewerker_voornaam'];
	@$medewerker_functie = $_SESSION['medewerker_functie'];



	//connectie met database maken
	$db = "mysql:host=localhost; dbname=Wegro; port=3306";
	$user = "wegro";
	$pass = "SQLWegro@101";
	$pdo = new PDO($db, $user, $pass);

	if ($klant_id != "" AND $medewerker_id == "") {//check of er een klant is ingelogd, haal vervolgens de gegevens van deze klant uit de databse op, geef tevens rol 'klant'
			$rol = "klant";
			$stmt = $pdo->prepare("SELECT * FROM Klant WHERE klant_nummer='$klant_id'");
			$stmt->execute();
			$sqlresult = $stmt->fetch();
			$klant_nummerdb = $sqlresult["klant_nummer"];
	}elseif ($klant_id == "" AND $medewerker_nummer != "") {//check of er een medewerker is ingelogd, haal vervolgens de gegevens van deze medewerker uit de database, geef tevens rol 'medewerker'
			$rol = "medewerker";
			$stmt = $pdo->prepare("SELECT * FROM Medewerker WHERE medewerker_nummer='$medewerker_nummer'");
			$stmt->execute();
			$sqlresult = $stmt->fetch();
			$medewerker_nummerdb = $sqlresult["medewerker_nummer"];
	}

	$stmt = $pdo->prepare("SELECT * FROM Project WHERE klant_nummer = '$klant_id'");
	$stmt->execute();
	$projecten = $stmt->fetchAll();


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

	//sessievariabelen updaten
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

	$pdo = NULL;
?>

	<?php include 'includes.php';?>
	<?php headTop() ?>

	<title>Accountoverview</title>

	<?php headMiddle() ?>

	<!--- custom stylesheet ophalen --->
	<link href="css/login.css" rel="stylesheet">

	<?php headBottom() ?>

	<!-- Navbar inroepen-->
	<?php navTop() ?>
	<li class="nav-item"><a href="index.php">Home</a></li>
	<li class="nav-item"><a href="Contact/contact.php">Contact</a></li>
	<li class="nav-item"><a href="logout.php">Uitloggen</a></li>
	<?php navBottom() ?>

	<div class="container">

		<!--- tabel met klant- of medewerkergegevens --->
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 page-box">
				<h1>Uw gegevens</h1>
				<table class="table table-hover table-bordered table-responsive">
					<tr>
						<th>Veld</th>
						<th>Gegevens</th>
					</tr>
					<?php
                    if ($klant_nummerdb != "" OR $medewerker_nummerdb != "") {//checkt of klantnummer of medewerkernummer niet leeg is
                        print("<tr><td>Naam: </td><td>$naam</td></tr>");
                        if ($klant_nummerdb != "") {//checkt of er een klant is ingelogd zodat het klantnummer wordt weergegeven
                            print("<tr><td>Klantnummer: </td><td>$klant_nummerdb</td></tr>");
                        }elseif ($medewerker_nummerdb != "") {//checkt of er een medewerker is ingelogd zodat het medewerkernummer wordt weergegeven
                            print("<tr><td>Medewerkernummer: </td><td>$medewerker_nummerdb");
                            print("<tr><td>Rol: </td><td>$rol");
                        }
                        print("<tr><td>Telefoonnummer: </td><td>$telefoonnummer</td></tr>");
                        print("<tr><td>Emailadres: </td><td>$emailadres</td></tr>");
                        print("<tr><td>Adres: </td><td>$adres</td></tr>");
                        print("<tr><td>Postcode: </td><td>$postcode</td></tr>");
                        print("<tr><td>Woonplaats: </td><td>$woonplaats</td></tr>");
                        print("</table><form action='accountwijzigen.php' method='get'><input id=\"button1\" class=\"btn btn-default select-btn white\" type=\"submit\" name=\"wijzigen\" value=\"Wijzigen\"></form></div>"); //button om accountgegevens te wijzigen
                ?>
				</table>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-2 col-md-offset-0" id="sidebar" role="navigation">
				<div class="sidebar-nav">
					<ul class="nav">
						<li class="nav-divider"></li>
						<li class="active">
							<h4>Menu</h4>
						</li>
						<li class="nav-divider"></li>
						<li><a href='<?php if($rol=="klant" ){print( "account.php");}elseif($rol=="medewerker" ){print( "profile_medewerker.php");}//check of er een medewerker of klant is ingelogd ?>'>Mijn Account</a></li>
						<li><a href="accountoverview.php">Mijn gegevens</a></li>
						<li class="nav-divider"></li>
						<li>
							<h4>Mijn projecten</h4>
						</li>
						<li class="nav-divider"></li>
						<?php
                        foreach ( $projecten as $value ) {
                            print ("<li><a href=\"project.php?id=" . $value['project_nummer'] . "&pdf=voorbeeld.pdf\">" . $value['naam'] . "</a></li>"); //print projecften van een klant
                        }
                        ?>
					</ul>
				</div>
				<!--/.well -->
			</div>
			<!--/span-->
		</div>
	</div>

	<?php
    if (empty($klant_id) AND empty($medewerker_nummer)) {
        print('<div class="container"><div class="row"><div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 page-box"><h5>Sorry, u bent niet ingelogd.</h5></div></div></div><br>'); //check of er wel is ingelogd
        print('<meta http-equiv="refresh" content="2;url=../login.php" />');
    }else {
    ?>

		<?php footAlt() ?>
		<?php } ?>
		<?php } ?>
