<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    @$medewerker_nummer = $_SESSION['medewerker_nummer'];
    @$medewerker_voornaam = $_SESSION['medewerker_voornaam'];
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
    if (empty($medewerker_nummer)) {
        print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
        print('<meta http-equiv="refresh" content="2;url=../index.php" />');
    } else {

    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    $sql = "SELECT * FROM Project";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $queryresult = $stmt->fetchAll();
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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container page-box">
    <div class="col-xs-12 col-md-12">
        <h1>Meer/Minder Werk</h1>
        <p>Meer/Minder Werk inzien van alle projecten:</p>
        <ul>
            <?php
            foreach ( $queryresult as $value ) {
                print ("<li>Project: <a href=\"meermindertoevoegen.php?id=" . $value['contract_nummer'] . "\">" . $value['naam'] . "</a></li>");
            }
            ?>
        </ul>
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
