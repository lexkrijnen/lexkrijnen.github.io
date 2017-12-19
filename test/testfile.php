<?php
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

//MEER WERK
$stmt3 = $pdo->prepare("SELECT klant_nummer, voornaam FROM Klant");
$stmt3->execute();
$queryresult3 = $stmt3->fetchAll();
var_dump($queryresult3);