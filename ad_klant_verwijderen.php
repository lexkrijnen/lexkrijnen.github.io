<?php
session_start();
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_voornaam = $_SESSION['medewerker_voornaam'];

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

if ($klant_id == "" AND $medewerker_nummer != ""){
    $rol = "medewerker";
} elseif($klant_id != "" AND $medewerker_nummer == ""){
    $rol = "klant";
}

//klant verwijderen

if (isset($_GET["echtverwijderen"])) {
		if ($_SESSION["rol2"] == 'klant') {
				$sql = "DELETE FROM Klant WHERE klant_nummer = ?";
				$stmt = $pdo->prepare($sql);
    		$stmt->execute(array($_SESSION["klantnummer2"]));
		} elseif ($_SESSION["rol2"] == 'medewerker') {
				$sql = "DELETE FROM Medewerker WHERE medewerker_nummer = ?";
				$stmt = $pdo->prepare($sql);
    		$stmt->execute(array($_SESSION["medewerkernummer2"]));
		}


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

		<title>verwijderen</title>

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
						<li class="nav-item"><a href="account.php">Mijn account</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-12 sidebar-offcanvas" id="sidebar" role="navigation">
                <div class="sidebar-nav">
                    <ul class="nav">
                        <li class="active">
                            <h4><b>Gegevens</b></h4>
                        </li>
                        <li class="nav-divider"></li>
                        <li><a href="profile_admin.php">Mijn Account</a></li>
                        <li><a href="ad_accountoverview.php">Accountgegevens</a></li>
                        <li><a href="mw_toevoegen.php">Medewerkers toevoegen</a></li>
                        <li><a href="ad_klant_toevoegen.php">Klanten toevoegen</a></li>
                        <li><a href="ad_klant_zoeken.php">Klanten Wijzigen/Verwijderen</a></li>
                        <li class="nav-divider"></li>
                        <li>
                            <h4><b>Projecten</b></h4>
                        </li>
                        <li class="nav-divider"></li>
                        <li><a href="ad_project_aanmaken.php">Project Aanmaken</a></li>
						<li><a href="meerminderadminlanding.php">Meer/Minder Werk</a></li>
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
				<h1>Verwijderen</h1>
				<br>
				<?php print("Weet u zeker dat u " . $_SESSION["naam2"] . " wilt verwijderen?"); ?>
				<br>
				<form action="ad_klant_verwijderen.php" method="get">
					<input class="btn btn-danger" type="submit" name="echtverwijderen" value="verwijderen">
					<input class="btn btn-primary" type="button" value="annuleren" onclick="window.location.href='ad_klant_zoeken.php'" />
				</form>
			</div>



			<?php
            if (isset($_GET["echtverwijderen"])) {
								print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' . $_SESSION["naam2"] . ' is successvol verwijderd.</div>');
            }
            ?>
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
