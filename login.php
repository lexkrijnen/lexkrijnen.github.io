<!DOCTYPE html>
<html>
<?php
session_start();
include '../login/loginFunction.php';

if(isset($_POST['submit']))
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

<body>
<form action="login.php" method="POST">
    E-mailadres:<br>
    <input type="text" name="emailadres" value="">
    <br>
    Wachtwoord:<br>
    <input type="password" name="wachtwoord" value="">
    <br><br>
    <input type="submit" name="submit">
    <input type="reset">
</form>
</body>
</html>