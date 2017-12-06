<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
    <meta name="author" content="Nard Wemes">
    <link rel="icon" href="../images/Logo%20bouwbedrijf%20Wegro.png">
    <title>Een moment geduld A.U.B.</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<?php
    session_start();
    session_destroy();
    print('<nav class="navbar navbar-default" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="../index.php"><img class="brand-logo" src="../images/wegrobanner.png" alt="logo"></a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div></div></nav>');
    print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>U bent nu uitgelogd.</h5></div><br>');
    print('<meta http-equiv="refresh" content="2;url=../index.php" />');
?>
