<?php
session_start();
function GetLogin($username, $password) {
    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    $stmt3 = $pdo->prepare("SELECT salt FROM Klant WHERE emailadres = '$username'");
    $stmt3->execute();
    $salt = $stmt3->fetchAll();

    foreach ($salt as $a => $b) {
        $salt = $b['salt'];
    }
    $hash = sha1($salt . $password);

    $stmt2 = $pdo->prepare("SELECT * FROM Klant WHERE emailadres = '$username' AND wachtwoord = '$hash'");
    $stmt2->execute();
    $result = $stmt2->fetchAll();

    return $result;
}
