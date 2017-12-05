<?php
session_start();
include '../login/loginFunction.php';

if(isset($_POST['btn-login']))
{
    $queryresult = GetLogin($_POST['emailadres'], $_POST['wachtwoord']);
    var_dump($queryresult);

    if (empty($queryresult)) {
        print("U bent niet ingelogt.");
    } else {
        print("U bent ingelogt.<br>");
        print('<meta http-equiv="refresh" content="2;url=../account.php" />');
        foreach ($queryresult as $a => $b){
            $klant_id = $b['klant_nummer'];
            $klant_voornaam = $b['voornaam'];
        }
        $_SESSION['klant_id'] = $klant_id;
        $_SESSION['voornaam'] = $klant_voornaam;
    }
}
?>
