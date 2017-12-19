<?php
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

$username = "djurn@mail.nl";

$stmt3 = $pdo->prepare("SELECT salt FROM Klant WHERE emailadres = '$username'");
$stmt3->execute();
$salt = $stmt3->fetchAll();

$hash = sha1($salt . $password);

var_dump($salt);