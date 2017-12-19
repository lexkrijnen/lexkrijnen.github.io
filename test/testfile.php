<?php
session_start();

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);


//TELLEN HOEVEEL PROJECTEN ER AL BESTAAN:
$stmt = $pdo->query('SELECT max(project_nummer) FROM Project');
$id = $stmt->fetchColumn(0);
if ($lastprojectnr !== false) {
    echo $lastprojectnr;
}

$projectnr = $lastprojectnr + 1;
print ($projectnr);