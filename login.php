<?php
session_start();
$db = "mysql:host=localhost; dbname=Wegro; port=3306";
$user = "wegro";
$pass = "SQLWegro@101";
$pdo = new PDO($db, $user, $pass);

if(isset($_GET['btn-login'])){
    $errMsg = "";
    //username and password sent from Form
    $username = ($_GET['e-mailadres']);
    $password = ($_GET['wachtwoord']);

print($username . $password);

        $sql = ('SELECT e-mailadres, wachtwoord FROM  Klant WHERE e-mailadres = :username');
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if(count($results) > 0 && password_verify($password, $results['wachtwoord'])){
            $_SESSION['e-mailadres'] = $results['e-mailadres'];
            header('location:/account.php');
            exit;
        }else {
            $errMsg .= 'Username and Password are not found<br>';
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
    <meta name="author" content="Nard Wemes">
    <link rel="icon" href="images/logo-default.png">

    <title>Welkom bij Wegro</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Global styles for this website -->
    <link href="css/global.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img class="brand-logo" src="images/wegrobanner.png" alt="Logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a href="index.php">Terug</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 b ">
        <div class="panel " >
            <div class="panel-heading oranje">
                <div class="panel-title white">Log hier in met uw Wegro account</div>

            </div>
            <div class="panel-body a lowborder" >
                <form method="GET" action="login.php"  id="loginform" class="form-horizontal" role="form">

                    <div  class="input-group c">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="e-mailadres" placeholder="Vul hier uw e-mailadres in">
                    </div>

                    <div class="input-group c">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="wachtwoord"  placeholder="Vul hier uw wachtwoord in">
                    </div>
                    <div  class="form-group d">

                        <div class="col-sm-12 controls">
                            <input class="btn oranje white" type="submit" name="btn-login" value="Login">
                        </div>
                    </div>
                </form>
                <div> </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="row">
    <div class="col-xs-12 text-center footer-rights">
        <p>© Bouwbedrijf Wegro - Powered by <a href="#">Bootstrap</a> and <a href="#">Glyphicons</a>.</p>
    </div>
</div>



<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>

