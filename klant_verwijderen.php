<?php
session_start();

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);



//klant verwijderen

if (isset($_GET["echtverwijderen"])) {
		if ($_SESSION["rol"] == 'klant') {
				$sql = "DELETE FROM Klant WHERE klant_nummer = ?";
				$stmt = $pdo->prepare($sql);
    		$stmt->execute(array($_SESSION["klantnummer"]));
		} elseif ($_SESSION["rol"] == 'medewerker') {
				$sql = "DELETE FROM Medewerker WHERE medewerker_nummer = ?";
				$stmt = $pdo->prepare($sql);
    		$stmt->execute(array($_SESSION["medewerker"]));
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






        <div id="viewer-box" class="col-xs-10 col-xs-offset-1 col-md-8 page-box">
            <div class=container>

                <?php print("Weet u zeker dat u " . $_SESSION["naam"] . " wilt verwijderen?"); ?>

                <form action="klant_verwijderen.php" method="get">
                    <input class="btn btn-danger" type="submit" name="echtverwijderen" value="verwijderen">
                    <input class="btn btn-primary" type="button" value="annuleren" onclick="window.location.href='klant_zoeken.php'"/>
                </form>

                <br>
                <a href="klant_zoeken.php">terug</a>
            </div>



            <?php
            if (isset($_GET["echtverwijderen"])) {
                print("<div class=\"alert alert-success\" role=\"alert\">");
                print("<br>" . $_SESSION["naam"] . " is successvol verwijderd.");
                print("</div>");
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
