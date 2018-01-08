<?php
session_start();


$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


if (isset($_POST["opslaan"])) {
		if ($_SESSION["rol"] == "klant") {
				$sql = "UPDATE Klant SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=? where klant_nummer=?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array($_POST["voornaam"], $_POST["tussenvoegsel"], $_POST["achternaam"], $_POST["emailadres"], $_POST["telefoonnummer"], $_POST["adres"], $_POST["postcode"], $_POST["woonplaats"], $_POST["klantnummer"]));
		} elseif ($_SESSION["rol"] == "medewerker") {
				$sql = "UPDATE Medewerker SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=?, functie=? where medewerker_nummer=?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute(array($_POST["voornaam"], $_POST["tussenvoegsel"], $_POST["achternaam"], $_POST["emailadres"], $_POST["telefoonnummer"], $_POST["adres"], $_POST["postcode"], $_POST["woonplaats"], $_POST["functie"], $_POST["medewerkernummer"]));
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
		$klant_nummer = $_SESSION["klant_id"];
}

if ($_SESSION["rol"] == "medewerker") {
		$functie = $_SESSION["functie"];
		$medewerker_nummer = $_SESSION["medewerker_nummer"];
}

if(isset($_POST["opslaan"])) {
    $voornaam = $_POST["voornaam"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
    $achternaam = $_POST["achternaam"];
    $naam = $_POST["naam"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $emailadres = $_POST["emailadres"];
    $adres = $_POST["adres"];
    $postcode = $_POST["postcode"];
    $woonplaats = $_POST["woonplaats"];
		if ($_SESSION["rol"] == "klant") {
				$klant_nummer = $_POST["klantnummer"];
		}
		if ($_SESSION["rol"] == "medewerker") {
				$functie = $_POST["functie"];
				$medewerker_nummer = $_POST["medewerkernummer"];
		}
}

$rol = $_SESSION["rol"];

$stmt = $pdo->prepare("SELECT * FROM Project WHERE klant_nummer = '$klant_nummer'");
$stmt->execute();
$projecten = $stmt->fetchAll();

$pdo = NULL;
?>

	<?php include 'includes.php';?>
	<?php headTop() ?>

	<title>Gegevens wijzigen</title>

	<?php headMiddle() ?>

	<!--- custom stylesheet ophalen --->
	<link href="css/klant_pagina.css" rel="stylesheet">

	<?php headBottom() ?>

	<!-- Navbar inroepen-->
	<?php navTop() ?>
	<li class="nav-item"><a href="index.php">Home</a></li>
	<li class="nav-item"><a href="Contact/contact.php">Contact</a></li>
	<li class="nav-item"><a href="logout.php">Uitloggen</a></li>
	<?php navBottom() ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12" id="sidebar" role="navigation">
				<div class="sidebar-nav">
					<ul class="nav">
						<li class="nav-divider"></li>
						<li class="active">
							<h4>Menu</h4>
						</li>
						<li class="nav-divider"></li>
						<li><a href='<?php if($rol=="klant" ){print( "account.php");}elseif($rol=="medewerker" ){print( "profile_medewerker.php");}?>'>Mijn Account</a></li>
						<li><a href="accountoverview.php">Mijn gegevens</a></li>
						<li class="nav-divider"></li>
						<li>
							<h4>Mijn projecten</h4>
						</li>
						<li class="nav-divider"></li>
						<?php
                        foreach ( $projecten as $value ) {
                            print ("<li><a href=\"project.php?id=" . $value['project_nummer'] . "&pdf=voorbeeld.pdf\">" . $value['naam'] . "</a></li>");
                        }
                        ?>
					</ul>
				</div>
				<!--/.well -->
			</div>
			<!--/span-->
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 page-box">
				<h1>Wijzigen</h1>
				<table>
					<form action='accountwijzigen.php' method='post'>
						<tr>
							<td>Voornaam</td>
							<td><input type="text" class="form-control" name="voornaam" <?php print( value=\ "$voornaam\ " "); ?> ></td>
					</tr>
					<tr>
						<td>Tussenvoegsel</td>
						<td><input type="text " class="form-control " name="tussenvoegsel " <?php print( "value=\ "$tussenvoegsel\ " "); ?>></td>
					</tr>
					<tr>
						<td>Achternaam</td>
						<td><input type="text " class="form-control " name="achternaam " <?php print( "value=\ "$achternaam\ " "); ?>></td>
					</tr>
					<tr>
						<td>Telefoonnummer  </td>
						<td><input type="text " class="form-control " name="telefoonnummer " <?php print( "value=\ "$telefoonnummer\ " "); ?>></td>
					</tr>
					<tr>
						<td>Emailadres</td>
						<td><input type="text " class="form-control " name="emailadres " <?php print( "value=\ "$emailadres\ " "); ?>></td>
					</tr>
					<tr>
						<td>Adres</td>
						<td><input type="text " class="form-control " name="adres " <?php print( "value=\ "$adres\ " "); ?>></td>
					</tr>
					<tr>
						<td>Postcode</td>
						<td><input type="text " class="form-control " name="postcode " <?php print( "value=\ "$postcode\ " "); ?>></td>
					</tr>
					<tr>
						<td>Woonplaats</td>
						<td><input type="text " class="form-control " name="woonplaats " <?php print( "value=\ "$woonplaats\ " "); ?>></td>
					</tr>
					<?php
												if ($_SESSION["rol "] == "medewerker ") {
														print("<input type=\ "hidden\" name=\ "medewerkernummer\" value=$medewerker_nummer>"); print("
								<input type=\ "hidden\" name=\ "functie\" value=$functie>"); } elseif ($_SESSION["rol"] == "klant") { print("
								<input type=\ "hidden\" name=\ "klantnummer\" value=$klant_nummer>"); } ?>
								<tr>
									<td><a href="accountoverview.php" id="button2" class="btn btn-default select-btn btn-responsive white" role="button">Terug</a></td>
									<td align='right'><input id="button1" class="btn btn-default select-btn btn-responsive white" type="submit" name="opslaan" value="Opslaan"></td>
								</tr>
					</form>
				</table>
				<br>



				<?php
            if(isset($_POST["opslaan"])) {
								print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> De wijzigingen zijn opgeslagen</div>');
            }

            ?>
			</div>
		</div>

		<?php footAlt() ?>
