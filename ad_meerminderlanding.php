<!DOCTYPE html>
<html lang="en">

<head>
	<?php
    session_start();
    @$medewerker_nummer = $_SESSION['medewerker_nummer'];
    @$medewerker_functie = $_SESSION['medewerker_functie'];
    ?>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
		<meta name="author" content="Nard Wemes">
		<link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">
		<title>Welkom bij Wegro</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/global.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<?php
    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    $sql = "SELECT * FROM Project P JOIN Contract C ON C.project_nummer = P.project_nummer";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $queryresult = $stmt->fetchAll();

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
					<li class="nav-item"><a href="logout.php">Uitloggen</a></li>
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

	<?php //LOGINCHECK Medewerker
    if (empty($medewerker_nummer)) {
        print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
        print('<meta http-equiv="refresh" content="2;url=../index.php" />');
    } elseif ($medewerker_functie == "2") {
				print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>U heeft geen rechten op deze pagina.</h5></div><br>');
				print('<meta http-equiv="refresh" content="2;url=../profile_medewerker.php" />');
		}else {
    ?>

	<div class="container page-box">
		<div class="col-xs-12 col-md-12">
			<h1>Meer/Minder Werk</h1>
			<p>Meer/Minder Werk inzien van alle projecten:</p>
			<ul>
				<?php
            foreach ( $queryresult as $value ) {
                print ("<li>Project: <a href=\"ad_meermindertoevoegen.php?id=" . $value['contract_nummer'] . "\">" . $value[1] . " - Contractnaam: " . $value['document'] . "</a></li>");
            }
            ?>
			</ul>
			<br><a href="login.php"><button type="button" id="button1" class="btn btn-primary btn-return">Terug</button></a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 text-center footer-rights">
			<p>© Bouwbedrijf Wegro - Powered by <a href="#">Bootstrap</a> and <a href="#">Glyphicons</a>.</p>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>
