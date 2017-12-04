

<?php
$dsn = "mysql:host=localhost;dbname=Wegro";
$username = "wegro";
$password = "SQLWegro@101";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try{
    $conn = new PDO($dsn,$username,$password,$options);
} catch (PDOException $e){
    echo "Error!".$e->getMessage();
}

?>