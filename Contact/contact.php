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

    <title>Bouwbedrijf Wegro</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Global styles for this website -->
    <link href="../css/global.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../css/contact.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php"><img class="brand-logo" src="images/wegrobanner.png" alt="logo"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="login.php">Inloggen</a></li>
                    <li class="nav-item"><a href="index.php">Terug</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



    <div class="container">
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 b ">
            <div class="panel ">
                <div class="panel-heading oranje">
                    <div class="panel-title white">Neem contact met ons op</div>

                </div>
                <div class="panel-body a lowborder">
                    <form class="contact-form" action="verzendbericht.php" method="post">
                        <input type="text" class="form-control c" name="naam" placeholder="Naam">
                        <input type="text" class="form-control c" name="mail" placeholder="e-mail">
                        <input type="text" class="form-control c" name="onderwerp" placeholder="Onderwerp">
                        <textarea name="bericht" class="form-control c" rows="10" cols="30" placeholder="Vul hier uw bericht in"></textarea>
                        <button type="submit" name="submit">Verstuur bericht</button>
                    </form>
                </div>
            </div>
        </div>
    </div>










    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Framework -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
