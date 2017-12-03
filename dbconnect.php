
<?php
$db = "mysql:host=localhost; dbname=wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);
$sql = "SELECT * FROM `klant`";
print("$sql");
?>


