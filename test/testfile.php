<?php
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

//MEER WERK
$stmt = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 1");
$stmt->execute();
$meerwerk = $stmt->fetchAll();
var_dump($meerwerk);