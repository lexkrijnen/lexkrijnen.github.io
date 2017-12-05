<?php
/**
 * Created by PhpStorm.
 * User: Lex
* Date: 5-12-2017
* Time: 13:42
*/

function GetDBCON(){
    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    try{
        $pdo = new PDO($db, $user, $pass);
    } catch (PDOException $e){
        echo $e->getMessage();
    }
    return $pdo;
}

function GetLogin($username, $password) {
        $db = GetDBCON();
        $stmt2 = $db->prepare("SELECT * FROM Klant WHERE emailadres = '$username' AND wachtwoord = '$password'");
        $stmt2->execute();
        $result = $stmt2->fetchAll();
        if ($result->rowcount()==0){
            return false;
        }
        return $result;
}