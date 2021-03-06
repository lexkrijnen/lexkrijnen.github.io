<?php
session_start();
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_functie = $_SESSION['medewerker_functie'];

//CONTROLER OP RECHTEN
if (empty($medewerker_nummer)) {
		print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
		print('<meta http-equiv="refresh" content="2;url=../login.php" />');
} elseif ($medewerker_functie == "2") {
		print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>U heeft geen rechten op deze pagina.</h5></div><br>');
    print('<meta http-equiv="refresh" content="2;url=../profile_medewerker.php" />');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Meer werk: Bewerken</title>
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
    $message = "";

    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    if (isset($_GET["opslaan"])) {
        $sql = "UPDATE Mutatie SET beschrijving=?, prijs=? WHERE mutatie_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET["beschrijving"], $_GET["prijs"], $_GET["nummer"]));
        $message = "De wijzigingen zijn opgeslagen.";
        //print('<META HTTP-EQUIV="Refresh" Content="2;URL=meermindertoevoegen.php?id=' . $_GET['id'] . '">');      DEFECT, ID WORD NIET MEEGENOMEN!
        //print('<META HTTP-EQUIV="Refresh" Content="2;URL=meerminderadminlanding.php>');
    }

    $sql = "SELECT * FROM Mutatie WHERE mutatie_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET["nummer"]));
    $werk = $stmt->fetch();

    if ($klant_id == "" AND $medewerker_nummer != ""){
        $rol = "medewerker";
    } elseif($klant_id != "" AND $medewerker_nummer == ""){
        $rol = "klant";
    }

    $stmt = $pdo->prepare("SELECT * FROM Project");
    $stmt->execute();
    $projecten = $stmt->fetchAll();

    $pdo = NULL;
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
                        <li><a href="profile_admin.php">Mijn Account</a></li>
                        <li><a href="ad_accountoverview.php">Accountgegevens</a></li>
                        <li><a href="mw_toevoegen.php">Medewerkers toevoegen</a></li>
                        <li><a href="ad_klant_toevoegen.php">Klanten toevoegen</a></li>
                        <li><a href="ad_klant_zoeken.php">Klanten Wijzigen/Verwijderen</a></li>
                        <li><a href="ad_project_aanmaken.php">Project Aanmaken</a></li>
                        <li><a href="ad_meerminderlanding.php">Meer/Minder Werk</a></li>
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
			<h2>Meer/Minder Werk Bewerken</h2>
			<form method="get" action="ad_meerminderbewerk.php">
				<table class="table table-hover table-bordered">
					<tr>
						<th>ID</th>
						<th>Beschrijving</th>
						<th>Prijs</th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" name="nummer" value="<?php print($_GET["nummer"]);?>" disabled="yes" size="3px"></td>
						<td><input type="text" name="beschrijving" value="<?php print($werk["beschrijving"]); ?>"></td>
						<td><input type="text" name="prijs" size="8px" value="<?php print($werk["prijs"]); ?>"></td>
						<td><input class="btn btn-default" type="submit" name="opslaan" value="Opslaan"></td>
					</tr>
					<input type="hidden" name="nummer" value="<?php print($_GET["nummer"]);?>">
				</table>
			</form>
			<?php
        if ($message != "") {
            print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> '. $message . '</div>');
        }
        print("<a href=\"ad_meermindertoevoegen.php?id=" . $_GET["id"] . "\"><button type=\"button\" id=\"button1\" class=\"btn btn-primary btn-return\">Terug</button></a>");
        $message = ""; //CLEARS OUT MESSAGES
        ?>
		</div>
	</div>
</body>

</html>
