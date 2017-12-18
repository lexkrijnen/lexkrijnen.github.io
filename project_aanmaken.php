<?php
session_start();
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


if (isset($_GET["opslaan"])) {
    if ($_SESSION["rol"] == "klant") {
        $sql = "UPDATE Klant SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=? where klant_nummer=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET["voornaam"], $_GET["tussenvoegsel"], $_GET["achternaam"], $_GET["emailadres"], $_GET["telefoonnummer"], $_GET["adres"], $_GET["postcode"], $_GET["woonplaats"], $_GET["klantnummer"]));
    } elseif ($_SESSION["rol"] == "medewerker") {
        $sql = "UPDATE Medewerker SET voornaam=?, tussenvoegsel=?, achternaam=?, emailadres=?, telefoon_nummer=?, adres=?, postcode=?, woonplaats=?, functie=? where medewerker_nummer=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET["voornaam"], $_GET["tussenvoegsel"], $_GET["achternaam"], $_GET["emailadres"], $_GET["telefoonnummer"], $_GET["adres"], $_GET["postcode"], $_GET["woonplaats"], $_GET["functie"], $_GET["medewerkernummer"]));
    } else {
        print("Query is niet uitgevoerd! Fock you!");

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
                <tr><td>Voornaam</td><td><input type="text" class="form-control" name="voornaam" ></td></tr>
                <tr><td>Tussenvoegsel</td><td><input type="text" class="form-control" name="tussenvoegsel"></td></tr>
                <tr><td>Achternaam</td><td><input type="text" class="form-control" name="achternaam"></td></tr>
                <tr><td>Telefoonnummer  </td><td><input type="text" class="form-control" name="telefoonnummer"></td></tr>
                <tr><td>Emailadres</td><td><input type="text" class="form-control" name="emailadres"></td></tr>
                <tr><td>Adres</td><td><input type="text" class="form-control" name="adres"></td></tr>
                <tr><td>Postcode</td><td><input type="text" class="form-control" name="postcode"></td></tr>
                <tr><td>Woonplaats</td><td><input type="text" class="form-control" name="woonplaats"></td></tr>
                <tr></tr>
                <tr><td><a href="accountoverview.php" class="btn btn-primary" role="button">Terug</a></td>
                    <td align='right'><input class="btn oranje white" type="submit" name="opslaan" value="Opslaan"></td></tr>
            </form>
        </table>
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