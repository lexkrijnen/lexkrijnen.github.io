<?php
session_start();
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_voornaam = $_SESSION['medewerker_voornaam'];
@$medewerker_functie = $_SESSION['medewerker_functie'];

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

$error = "";


//TELLEN HOEVEEL PROJECTEN ER AL BESTAAN:
$stmt4 = $pdo->query('SELECT max(project_nummer) FROM Project');
$lastprojectnr = $stmt4->fetchColumn(0);
if ($lastprojectnr !== false) {
    $projectnummer = $lastprojectnr + 1;
}

//BESTAANDE KLANTEN OPHALEN:
$stmt3 = $pdo->prepare("SELECT klant_nummer, voornaam, tussenvoegsel, achternaam FROM Klant ORDER BY voornaam");
$stmt3->execute();
$queryresult3 = $stmt3->fetchAll();

foreach ($queryresult3 as $a => $b) {
    $klant_nummer = $b['klant_nummer'];
    $klant_voornaam = $b['voornaam'];
    $klant_tussenvoegsel = $b['tussenvoegsel'];
    $klant_achternaam = $b['achternaam'];
}


//NIEUW PROJECT TOEVOEGEN:
if (isset($_GET["opslaan"])) {
    if ($_GET["naam"] == "" OR $_GET["klant_nummer"] == "" OR $_GET["status_nummer"] == "") {
        $error = ("Vul A.U.B. alle velden in.");
    } else {
        $sql = "INSERT INTO Project (project_nummer, naam, klant_nummer, status_nummer) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($projectnummer, $_GET["naam"], $_GET["klant_nummer"], $_GET["status_nummer"]));
    }
}

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
    <meta name="author" content="Nard Wemes">
    <link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">
    <title>Project Toevoegen</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
    <link href="css/klant_pagina.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
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
                        <li><a href="ad_project_aanmaken.php">Project Aanmaken</a></li>
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
} else {
?>

<div class="container page-box">
    <div class="col-xs-12 col-md-12">
        <h1>Project Toevoegen</h1>
        <table>
            <form action='project_aanmaken.php' method='get'>
                <tr><td>Project Nummer  </td><td><input type="text" class="form-control" name="project_nummer" <?php print("value=\"$projectnummer\""); ?> disabled></td></tr>
                <tr><td>Project Naam</td><td><input type="text" class="form-control" name="naam"></td></tr>
                <tr><td>Klant</td><td>
                <select name="klant_nummer" class="form-control">
                    <?php
                    foreach ($queryresult3 AS $klant) {
                        print ('<option value="' . $klant["klant_nummer"] . '">' . $klant["voornaam"] . ' ' . $klant["tussenvoegsel"] . ' ' . $klant["achternaam"] . '</option>');
                    }
                    ?>
                </select></td></tr>
                <tr><td>Status</td><td>
                <select name="status_nummer" class="form-control">
                    <option value="1">[1] Plannen</option>
                    <option value="2">[2] Bouwen</option>
                    <option value="3">[3] Afronden</option>
                    <option value="4">[4] Opleveren</option>
                </select></td></tr>
                <tr>
									<td>
										<br>
										<a href="login.php" class="btn btn-primary" role="button">Terug</a>
									</td>
									<td>
										<div align="right">
											<br>
											<input class="btn oranje white" type="submit" name="opslaan" value="Opslaan">
										</div>
									</td>
								</tr>
            </form>
        </table>

        <?php
				if (isset($_GET["opslaan"])) {
					if ($error != "") {
        			print('<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"> ' . $error . '</span></div>');
                } else {
					print('<div class="alert alert-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' . $_GET["naam"] . '  is successvol toegevoegd als project.</div>');
					}
				}
        ?>
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
