<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meer & Minder Werk</title>
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
    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    if (isset($_GET["toevoegenmeerwerk"]) && isset($_GET["beschrijving"])) {
        if ($_GET["beschrijving"] != "") {
            $sql = "INSERT INTO Mutatie (beschrijving, prijs, contract_nummer, soort_nummer)VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($_GET["beschrijving"], $_GET["prijs"], 1, 1)); ## 1,1 Vervangen door CONTRACT_NUMMER (te halen uit de URL) en SOORTNUMMER (Meer of MINDER werk) ##
        } else {
            print("Vul A.U.B. een beschrijving in.");
        }
    }

    if (isset($_GET["toevoegenminderwerk"]) && isset($_GET["beschrijving"])) {
        if ($_GET["beschrijving"] != "") {
            $sql = "INSERT INTO Mutatie (beschrijving, prijs, contract_nummer, soort_nummer)VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($_GET["beschrijving"], $_GET["prijs"], 1, 2)); ## 1,1 Vervangen door CONTRACT_NUMMER (te halen uit de URL) en SOORTNUMMER (Meer of MINDER werk) ##
        } else {
            print("Vul A.U.B. een beschrijving in.");
        }
    }

    $stmt = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 1");
    $stmt->execute();
    $meerwerk = $stmt->fetchAll();

    $stmt2 = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 2");
    $stmt2->execute();
    $minderwerk = $stmt2->fetchAll();
    ?>
</head>
<body>
<!--MEER WERK-->
<div class="container">
    <div class="col-xs-4">
        <h1>Meer Werk</h1>
        <h5>Projectnaam: De Tuinbaksteen</h5>
        <form method="get" action="meermindertoevoegen.php">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Nr.</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                foreach ($meerwerk AS $werk) {
                    print("<tr>");
                    print("<td>" . $werk["mutatie_id"] . "</td>");
                    print("<td>" . $werk["beschrijving"] . "</td>");
                    print("<td>€ " . $werk["prijs"] . "</td>");
                    print("<td> <a href=\"meerminderbewerk.php?nummer=" . $werk["mutatie_id"] . "\">Bewerk</a> </td>");
                    print("<td> <a href=\"meerminderverwijder.php?nummer=" . $werk["mutatie_id"] . "\">Verwijder</a></td>");
                    print("</tr>");

                }
                ?>
                <tr>
                    <td></td>
                    <td><input type="text" name="beschrijving" size="15"></td>
                    <td><input type="text" name="prijs"size="3"></td>
                    <td><input type="submit" name="toevoegenmeerwerk" value="Toevoegen"></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>


    <div class="col-xs-2"></div> <!-- LEGE RUIMTE TUSSEN KOLOMMEN-->


    <!--MINDER WERK-->
    <div class="col-xs-4">
        <h1>Minder Werk</h1>
        <h5>Projectnaam: De Tuinbaksteen</h5>
        <form method="get" action="meermindertoevoegen.php">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Nr.</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                foreach ($minderwerk AS $werk2) {
                    print("<tr>");
                    print("<td>" . $werk2["mutatie_id"] . "</td>");
                    print("<td>" . $werk2["beschrijving"] . "</td>");
                    print("<td>- € " . $werk2["prijs"] . "</td>");
                    print("<td> <a href=\"bewerk.php?nummer=" . $werk2["mutatie_id"] . "\">Bewerk</a> </td>");
                    print("<td> <a href=\"verwijder.php?nummer=" . $werk2["mutatie_id"] . "\">Verwijder</a></td>");
                    print("</tr>");
                }
                ?>
                <tr>
                    <td></td>
                    <td><input type="text" name="beschrijving" size="15"></td>
                    <td><input type="text" name="prijs"size="3"></td>
                    <td><input type="submit" name="toevoegenminderwerk" value="Toevoegen"></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php $pdo = NULL; ?>
</body>
</html>
