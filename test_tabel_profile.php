<!DOCTYPE html>
        <?php
        $db = "mysql:host=localhost; dbname=wegro; port=3306";
        $user = "root";
        $pass = "";
        $pdo = new PDO($db, $user, $pass);

        if (isset($_GET["vieuw"])) {
        $sql = "SELECT document FROM Contract";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET["document"]));
        }

        $stmt = $pdo->prepare("SELECT document FROM Contract");
        $stmt->execute();
        $documenten1 = $stmt->fetchAll();

        if (isset($_GET["vieuw"])) {
        $sql = "SELECT document FROM Tekening";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_GET["document"]));
        }

        $stmt = $pdo->prepare("SELECT document FROM Tekening");
        $stmt->execute();
        $documenten2 = $stmt->fetchAll();
        ?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Mijn profiel</title>
    </head>
    <body>
    <from method="get" action="3.php">

        <table>
            <tr>
                <th><h3>Contract</h3></th>
            </tr>

        <?php
        foreach ($documenten1 as $contarct){
            print("<tr>");
            print("<td>" . $contarct["document"] . "</td>");
            print("</tr>");
            }
        ?>
        </table>
        <br>
        <table>
            <tr>
                <th><h3>Tekeningen</h3></th>
            </tr>

        <?php
        foreach ($documenten2 as $tekening){
            print("<tr>");
            print("<td>" . $tekening["document"] . "</td>");
            print("</tr>");
            }
        ?>
        </table>
    </from>
    </body>
</html>
