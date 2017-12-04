<?php
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

$sql = "SELECT * FROM Klant";
$stmt = $pdo->prepare($sql);
$werk = $stmt->fetch();

print ($werk);
print_r ($werk);
?>
