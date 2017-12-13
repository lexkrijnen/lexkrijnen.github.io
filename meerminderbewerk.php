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
        //print('<div class="container"><div class="col-xs-4"><p>De wijzigingen zijn opgeslagen.</p></div></div>');
        //print('<meta http-equiv="refresh" content="2;url=/meermindertoevoegen.php" />');
        print('<META HTTP-EQUIV="Refresh" Content="2;URL=meermindertoevoegen.php?id=' . $_GET["id"] . '>');
    }

    $sql = "SELECT * FROM Mutatie WHERE mutatie_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET["nummer"]));
    $werk = $stmt->fetch();

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
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container page-box">
    <div class="col-xs-4">
        <h2>Meer/Minder Werk Bewerken</h2>
        <form method="get" action="meerminderbewerk.php">
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
        print("<a href=\"meermindertoevoegen.php?id=" . $_GET["id"] . "\"><button type=\"button\" class=\"btn btn-primary btn-return\">Terug</button></a>");
        $message = ""; //CLEARS OUT MESSAGES
        ?>
    </div>
</div>
</body>
</html>
