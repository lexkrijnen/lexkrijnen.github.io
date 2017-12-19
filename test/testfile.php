<?php
session_start();
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

//BESTAANDE KLANTEN OPHALEN:
$stmt3 = $pdo->prepare("SELECT klant_nummer, voornaam FROM Klant");
$stmt3->execute();
$sqlresult3 = $stmt3->fetchAll();
var_dump($sqlresult5);