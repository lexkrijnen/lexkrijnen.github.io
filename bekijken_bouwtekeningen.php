<?php

$db = "mysql:host=localhost; dbname=wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


if (isset($_GET["vinden"])) {
    $sql = "SELECT * FROM project p join contract  c on c.contract_nummer=p.contract_nummer join status s on s.status_nummer=p.status_nummer join klant k on k.klant_nummer=p.klant_nummer WHERE naam = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET["projectnaam"]));

    $project = $stmt->fetch();

    $naam = $project["naam"];
    $project_nummer = $project["project_nummer"];
    $status = $project["status_titel"];
    $klant_nummer = $project["klant_nummer"];
    $contract_nummer = $project["contract_nummer"];
    $document = $project["document"];
    $klantnaam = $project['voornaam'] ." ". $project['tussenvoegsel'] ." ". $project['achternaam'];
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
    <link href="css/index.css" rel="stylesheet">

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





        <form action="bekijken_bouwtekeningen.php" method="get">
            <input type="text" name="projectnaam" placeholder="projectnaam">
            <input class="btn btn-primary" type="submit" name="vinden" value="vinden">
        </form>


        <?php

        //projectnaam niet ingevuld
        if(isset($_GET["vinden"])) {
             if ($_GET["projectnaam"] == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">
                        <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                        <span class=\"sr-only\">Error:</span>
                        Vul een projectnaam in.
                      </div>");
            //geen project gevonden met dat projectnaam
            } elseif ($project_nummer == "") {
                print("<div class=\"alert alert-warning\" role=\"alert\">
                        <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                        <span class=\"sr-only\">Error:</span>
                        Geen project gevonden met de naam " . $_GET['projectnaam'] .
                      "</div>");
            //project gevonden
            } elseif ($project_nummer != "") {
                print("<table>");
                print("<tr><td>Projectnaam: $naam</td></tr>");
                print("<tr><td>Projectnummer: $project_nummer</td></tr>");
                print("<tr><td>Status: $status</td></tr>");
                print("<tr><td>Klantnummer: $klant_nummer</td></tr>");
                print("<tr><td>Naam klant: $klantnaam</td></tr>");
                print("<tr><td>Contractnummer: $contract_nummer</td></tr>");
                print("<tr><td>
                        <div class=\"embed-responsive pdf-viewer\">
    				        <object data=$document type=\"application/pdf\"></object>
					   </div>
                    </td></tr>");
                print("</table>");

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
