<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    @$klant_id = $_SESSION['klant_id'];
    @$klant_voornaam = $_SESSION['voornaam'];
    ?>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="css/accountoverview.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
    <meta name="author" content="Nard Wemes">
    <link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <?php
    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    $stmt = $pdo->prepare("SELECT * FROM Klant");
    $stmt->execute();
    $klantgegevens = $stmt->fetchAll();

    ?>
</head>
<body>
<!--NAVBAR-->
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

    <?php
    if (empty($klant_id)) {
        print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
        print('<meta http-equiv="refresh" content="2;url=../login.php" />');
    } else {
    ?>



    <div class="row page-box col-xs-4 col-xs-offset-1">
        <h1>Meer Werk</h1>
        <form method="get" action="meermindertoevoegen.php">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Nr.</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                </tr>
                <?php
                $meerwerkcount = 1;
                foreach ($meerwerk AS $werk) {
                    print("<tr>");
                    print("<td>" . $meerwerkcount . "</td>");
                    print("<td>" . $werk["beschrijving"] . "</td>");
                    print("<td>€ " . $werk["prijs"] . "</td>");
                    print("</tr>");
                    $meerwerkcount++;
                }
                ?>
            </table>
        </form>

    </div>


    <div class="page-box col-xs-4 col-xs-offset-1">
        <h1>Meer Werk</h1>
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                </tr>
                <?php
                $meerwerkcount = 1;
                foreach ($klantgegevens AS $werk) {
                    print("<tr>");
                    print("<td>" . $werk["voornaam"] . "</td>");
                    print("<td>" . $werk["achternaam"] . "</td>");
                    print("<td>" . $werk["emailadres"] . "</td>");
                    print("</tr>");
                    $meerwerkcount++;
                }
                ?>
            </table>




    </div>




<?php $pdo = NULL; ?>
</body>
</html>
<?php } ?>
