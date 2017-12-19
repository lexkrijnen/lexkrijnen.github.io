<?php
session_start();
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

$error = "";

//TELLEN HOEVEEL PROJECTEN ER AL BESTAAN:
$sql1 = "SELECT max(project_nummer) FROM Project";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$sqlresult = $stmt1->fetch();

foreach ($sqlresult as $a => $b) {
    $lastprojectnr = $b['project_nummer'];
}
$projectnummer = $lastprojectnr + 1;

//NIEUW PROJECT TOEVOEGEN:
if (isset($_GET["opslaan"])) {
    if ($_GET['project_nummer'] = "" OR $_GET['naam'] = "" OR $_GET['klant_nummer'] = "" OR $_GET['contract_nummer'] = "" OR $_GET['status_nummer'] = "") {
        $error = "Vul A.U.B. alle velden in. ";
    } else {
        print("SQL QUERY word succesvol uitgevoerd!");
        $sql = "INSERT INTO Project(project_nummer, naam, klant_nummer, contract_nummer, status_nummer) VALUES (?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($projectnummer, $_GET["naam"], $_GET["klant_nummer"], $_GET["contract_nummer"], $_GET["status_nummer"]));
        var_dump($stmt);
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
                <li class="nav-item"><a href="login.php">Inloggen</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container page-box">
    <div class="col-xs-12 col-md-12">
        <h1>Project Toevoegen</h1>
        <table>
            <form action='project_aanmaken.php' method='get'>
                <tr><td>Project Nummer</td><td><input type="text" class="form-control" name="project_nummer" <?php print("value=\"$projectnummer\""); ?> disabled></td></tr>
                <tr><td>Project Naam</td><td><input type="text" class="form-control" name="naam"></td></tr>
                <tr><td>Klant Nummer</td><td><input type="text" class="form-control" name="klant_nummer"></td></tr>
                <tr><td>Contract Nummer </td><td><input type="text" class="form-control" name="contract_nummer"></td></tr>
                <tr><td>Status Nummer</td><td><input type="text" class="form-control" name="status_nummer"></td></tr>
                <tr><td><input class="btn oranje white" type="submit" name="opslaan" value="Opslaan"></td></tr>
            </form>
        </table>
        <br><a href="admin.php" class="btn btn-primary" role="button">Terug</a>
        <?php
        if ($error != "") {
        print('<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"> ' . $error . '</span></div>');
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
