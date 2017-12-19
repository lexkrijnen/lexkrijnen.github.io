<?php
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

$sql1 = "SELECT max(project_nummer) FROM Project";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$sqlresult = $stmt1->fetch();

foreach ($sqlresult as $a => $b) {
    $lastprojectnr = $b['project_nummer'];
}
print("$projectnummer");
$projectnummer = $lastprojectnr + 1;
print("projectnrKHUTTTT: ". $projectnummer);