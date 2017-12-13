<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    @$medewerker_nummer = $_SESSION['medewerker_nummer'];
    @$medewerker_voornaam = $_SESSION['medewerker_voornaam'];
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a href="logout.php">Uitloggen</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php
if (empty($medewerker_nummer)) {
    print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
    print('<meta http-equiv="refresh" content="2;url=../login.php" />');
} elseif ($medewerker_functie == "2") {
    print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>U heeft geen rechten op deze pagina.</h5></div><br>');
    print('<meta http-equiv="refresh" content="2;url=../profile_medewerker.php" />');
} else {
?>

<div class="container page-box">
    <div class="col-xs-12 col-md-12">
        <?php
        $hour = date('H', time());

        if( $hour > 6 && $hour <= 11) {
            print("<h1>Goedemorgen, " . $medewerker_voornaam . "</h1>");
        }
        else if($hour > 11 && $hour <= 16) {
            print("<h1>Goedemiddag, " . $medewerker_voornaam . "</h1>");
        }
        else if($hour > 16 && $hour <= 23) {
            print("<h1>Goedenavond, " . $medewerker_voornaam . "</h1>");
        }
        else {
            print("<h1>Hallo, " . $medewerker_voornaam . "</h1>");
        }
        ?>
        <h6>Welkom op uw profielpagina, hier kunt u de volgende onderdelen inzien en aanpassen:</h6>
        <ul>
            <li><a href="#">Projecten</a></li>
            <li><a href="#">Klanten</a></li>
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
