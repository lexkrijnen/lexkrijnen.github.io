<?php
session_start();
@$klant_id = $_SESSION['klant_id'];
@$klant_voornaam = $_SESSION['voornaam'];
@$medewerker_nummer = $_SESSION['medewerker_nummer']
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Meer Werk: Verwijderen</title>
	<link rel="stylesheet" href="css/meerminderwerk.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
	<meta name="author" content="Nard Wemes">
	<link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Global styles for this website -->
	<link href="css/global.css" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="css/index.css" rel="stylesheet">

    <?php
    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    if ($klant_id == "" AND $medewerker_nummer != ""){
        $rol = "medewerker";
    } elseif($klant_id != "" AND $medewerker_nummer == ""){
        $rol = "klant";
    }

    $stmt = $pdo->prepare("SELECT * FROM Project");
    $stmt->execute();
    $projecten = $stmt->fetchAll();
    ?>
</head>

<body>
	<!--NAVBAR-->
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
					<li class="nav-item"><a href="login.php">Uitloggen</a></li>
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
                            <h4><b>Functies</b></h4>
                        </li>
                        <li class="nav-divider"></li>
                        <li><a href="profile_medewerker.php">Mijn Account</a></li>
                        <li><a href="mw_accountoverview.php">Accountgegevens</a></li>
                        <li><a href="klant_zoeken.php">Klantbeheer</a></li>
                        <li><a href="klant_toevoegen.php">Klant toevoegen</a></li>
                        <li><a href="project_aanmaken.php">Project Aanmaken</a></li>
                        <li><a href="meerminderadminlanding.php">Meer/Minder Werk</a></li>
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
		<div class="col-xs-4">
			<h2>Meer/Minder Werk Verwijderen</h2>
			<?php
        if (isset($_GET["nummer"]) && $_GET["nummer"] != "") {
            $nummer = $_GET["nummer"];

            if (isset($_GET['bevestiging'])) {
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=Wegro;port=3306", "wegro", "SQLWegro@101");
                    $stmt = $pdo->prepare("DELETE FROM Mutatie WHERE mutatie_id=?");
                    $stmt->execute(array($nummer));
                    if ($stmt->rowCount() == 1) {
                        print("De mutatie is verwijderd.<br>");
                        print('<META HTTP-EQUIV="Refresh" Content="2;URL=meerminderadminlanding.php">');
                    } else {
                        print("Er is iets misgegaan, probeer het A.U.B. opnieuw.");
                    }
                } catch (PDOException $e) {
                    $melding = "Er is iets misgegaan, probeer het A.U.B. opnieuw.";
                }
                $pdo = NULL;
            } else {
                print("Weet u zeker dat u deze mutatie wilt verwijderen?<br><br>");
                print("<form method=\"get\" action=\"meerminderverwijder.php\" >");
                print("<input class=\"btn btn-danger btn-return\" type=\"submit\" name=\"bevestiging\" value=\"Verwijderen\">");
                print("<input type=\"hidden\" name=\"nummer\" value=\"" . $nummer . "\">");
                print("</form>");
            }
        } else {
            print("Het nummer ontbreekt. Probeer het A.U.B. opnieuw.");
        }
        ?>
				<br>
				<?php
        print('<a href="meerminderadminlanding.php"><button type="button" id="button1" class="btn btn-primary btn-return">Terug</button></a>');
        ?>
		</div>
	</div>
</body>

</html>
