<?php
session_start();

$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);



if(isset($_POST['btn-login'])){
    $errMsg = '';
    //username and password sent from Form
    $username = trim($_POST['e-mailadres']);
    $password = trim($_POST['wachtwoord']);

    if($username == '')
        $errMsg .= 'Vul een geldig e-mailadres in<br>';

    if($password == '')
        $errMsg .= 'Vul een geldig wachtwoord in<br>';


    if($errMsg == ''){
        $records = $databaseConnection->prepare('SELECT e-mailadres,wachtwoord FROM  Klant WHERE e-mailadres = :e-mailadres');
        $records->bindParam(':e-mailadres', $username);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0 && password_verify($password, $results['wachtwoord'])){
            $_SESSION['e-mailadres'] = $results['e-mailadres'];
            header('location:account.php');
            exit;
        }else{
            $errMsg .= 'Username and Password are not found<br>';
        }
    }
}

?>