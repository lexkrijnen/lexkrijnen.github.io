<?php
session_start();
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

//BESTAANDE KLANTEN OPHALEN:
$sql5 = "SELECT klant_nummer, voornaam FROM Klant";
$stmt5 = $pdo->prepare($sql5);
$stmt5->execute();
$sqlresult5 = $stmt5->fetch();
var_dump($sqlresult5);