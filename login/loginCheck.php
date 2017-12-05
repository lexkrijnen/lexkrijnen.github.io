<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Lex
 * Date: 5-12-2017
 * Time: 13:46
 */
include 'loginFunction.php';

$e_mail = $_POST{'e-mailadres'};
$password = $_POST{'wachtwoord'};

if(isset($_POST['submit']))
{
    $queryresult = GetLogin($e_mail, $password);

    if (empty($queryresult)) {
        print("U bent niet ingelogt.");
    } else {
        print("U bent ingelogt.<br>");
        print ('<a href="../account.php">Ga verder</a>');
        foreach ($queryresult as $a => $b){
            $klant_id = $b['klant_nummer'];
            $klant_voornaam = $b['voornaam'];
        }
        $_SESSION['klant_id'] = $klant_id;
        $_SESSION['voornaam'] = $klant_voornaam;
    }
}