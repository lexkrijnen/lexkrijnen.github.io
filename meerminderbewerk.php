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
    $db = "mysql:host=localhost; dbname=wegro; port=3306";
    $user = "root";
    $pass = "";
    $pdo = new PDO($db, $user, $pass);

    if (isset($_GET["opslaan"])) {
        $sql = "UPDATE mutatie SET beschrijving=?, prijs=? WHERE mutatie_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET["beschrijving"], $_GET["prijs"], $_GET["nummer"]));
        print('<div class="container"><div class="col-xs-4"><p>De wijzigingen zijn opgeslagen.</p></div></div>');
        ## print('<meta http-equiv="refresh" content="2;url=http://localhost/WEGRO.Sandbox/index.php" />');
    }

    $sql = "SELECT * FROM mutatie WHERE mutatie_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_GET["nummer"]));
    $werk = $stmt->fetch();

    $pdo = NULL;
    ?>
</head>
<body>
<div class="container">
    <div class="col-xs-4">
        <h2>Meer Werk Bewerken</h2>
        <form method="get" action="meerminderbewerk.php">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Nr.</th>
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
        <a href="index.php"><button type="button" class="btn btn-primary btn-return">Terug</button></a>
    </div>
</div>
</body>
</html>