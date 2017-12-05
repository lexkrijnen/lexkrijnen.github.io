<?php
session_start();
function GetLogin($username, $password) {
    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    $stmt2 = $pdo->prepare("SELECT * FROM Klant WHERE emailadres = '$username' AND wachtwoord = '$password'");
    $stmt2->execute();
    $result = $stmt2->fetchAll();

    return $result;
}