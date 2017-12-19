<?php
session_start();

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


//TELLEN HOEVEEL PROJECTEN ER AL BESTAAN:
$sql1 = "SELECT max(project_nummer) FROM Project";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$sqlresult = $stmt1->fetch();

var_dump($sqlresult);

foreach ($sqlresult as $a => $b) {
    $lastprojectnr = $b[0];
}
$projectnummer = $lastprojectnr + 1;

print("Dit wordt het nieuwe projectnummer: " . $projectnummer);