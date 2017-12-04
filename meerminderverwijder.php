<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meer Werk: Verwijderen</title>
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
</head>
<body>
<div class="container">
    <div class="col-xs-4">
        <h2>Meer Werk Verwijderen</h2>
        <?php
        if (isset($_GET["nummer"]) && $_GET["nummer"] != "") {
            $nummer = $_GET["nummer"];

            if (isset($_GET['bevestiging'])) {
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=Wegro;port=3306", "wegro", "SQLWegro@101");
                    $stmt = $pdo->prepare("DELETE FROM Mutatie WHERE mutatie_id=?");
                    $stmt->execute(array($nummer));
                    if ($stmt->rowCount() == 1) {
                        print("De mutatie is verwijderd.<br>");
                        ## print('<meta http-equiv="refresh" content="2;url=http://localhost/WEGRO.Sandbox/index.php" />');
                    } else {
                        print("Er is iets misgegaan, probeer het A.U.B. opnieuw.");
                    }
                } catch (PDOException $e) {
                    $melding = "Er is iets misgegaan, probeer het A.U.B. opnieuw.";
                }
                $pdo = NULL;
            } else {
                print("Weet u zeker dat u deze mutatie wilt verwijderen?<br><br>");
                print("<form method=\"get\" action=\"meerminderverwijder.php\" >");
                print("<input class=\"btn btn-danger btn-return\" type=\"submit\" name=\"bevestiging\" value=\"Verwijderen\">");
                print("<input type=\"hidden\" name=\"nummer\" value=\"" . $nummer . "\">");
                print("</form>");
            }
        } else {
            print("Het nummer ontbreekt. Probeer het A.U.B. opnieuw.");
        }
        ?>
        <br>
        <a href="meermindertoevoegen.php"><button type="button" class="btn btn-primary btn-return">Terug</button></a>
    </div>
</div>
</body>
</html>