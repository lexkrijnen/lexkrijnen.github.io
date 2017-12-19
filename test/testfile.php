<?php
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

//MEER WERK
$stmt3 = $pdo->prepare("SELECT * FROM Klant");
$stmt3->execute();
$meerwerk = $stmt3->fetchAll();
var_dump($meerwerk);