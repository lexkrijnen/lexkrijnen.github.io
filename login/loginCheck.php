<?php
session_start();
include '../login/loginFunction.php';

if(isset($_POST['btn-login']))
{
    $queryresult = GetLogin($_POST['emailadres'], $_POST['wachtwoord']);

    if (empty($queryresult)) {
        print("U bent niet ingelogt.");
    } else {
        print("Een moment A.U.B..<br>");
        print('<nav class="navbar navbar-default" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php"><img class="brand-logo" src="images/wegrobanner.png" alt="logo"></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div></div></nav>');
        print('<meta http-equiv="refresh" content="50;url=../account.php" />');
        foreach ($queryresult as $a => $b){
            $klant_id = $b['klant_nummer'];
            $klant_voornaam = $b['voornaam'];
        }
        $_SESSION['klant_id'] = $klant_id;
        $_SESSION['voornaam'] = $klant_voornaam;
    }
}
?>
