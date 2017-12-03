

<?php
session_start();
 require('dbconnect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['e-mailadres']) and isset($_POST['wachtwoord'])){
//3.1.1 Assigning posted values to variables.
    $username = $_POST['e-mailadres'];
    $password = $_POST['wachtwoord'];
//3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM `klant` WHERE e-mailadres='$username' and wachtwoord='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1){
        $_SESSION['e-mailadres'] = $username;
    }else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
    }
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['e-mailadres'])){
    $username = $_SESSION['e-mailadres'];
    echo "Hai " . $username . "
";
    echo "This is the Members Area
";
    echo "<a href='logout.php'>Logout</a>";

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
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
    <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 b">
        <div class="panel " >
            <div class="panel-heading oranje">
                <div class="panel-title white">Log hier in met uw Wegro account</div>
            </div>
            <div class="panel-body a lowborder" >



                <form method="POST" action="login.php"  id="loginform" class="form-horizontal" role="form">

                    <div  class="input-group c">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="e-mailadres" placeholder="Vul hier u Email in">
                    </div>

                    <div class="input-group c">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="wachtwoord"  placeholder="Vul hier uw Wachtwoord in">
                    </div>

                    <div  class="form-group d">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <input class="btn oranje white" type="submit" name="submit" value="Login">
                        </div>
                    </div>

                </form>



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


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Framework -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>