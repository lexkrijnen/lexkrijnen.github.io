<?php
session_start();
@$klant_id = $_SESSION['klant_id'];
@$medewerker_nummer = $_SESSION['medewerker_nummer'];
@$medewerker_functie = $_SESSION['medewerker_functie'];
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
		<link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">
		<title>Welkom bij Wegro</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Global styles for this website -->
		<link href="css/global.css" rel="stylesheet">
		<!-- Custom styles for this page -->
		<link href="css/login.css" rel="stylesheet">
        <!--- reCAPTCHA loader --->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>

		<!-- NAV BAR -->
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
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		<?php
if (!empty($klant_id)) {
    print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Een moment gedult A.U.B.</h5></div><br>');
    print('<meta http-equiv="refresh" content="0.5;url=../account.php" />');
} else if (!empty($medewerker_nummer)) {
    if ($medewerker_functie == "1") {
        print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Een moment gedult A.U.B.</h5></div><br>');
        print('<meta http-equiv="refresh" content="0;url=../profile_admin.php" />');
    } elseif ($medewerker_functie == "2") {
        print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Een moment gedult A.U.B.</h5></div><br>');
        print('<meta http-equiv="refresh" content="0;url=../profile_medewerker.php" />');
    }
} else {
?>

			<div class="container">
				<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 b ">
					<div class="panel ">
						<div class="panel-heading oranje">
							<div class="panel-title white">Log hier in met uw Wegro account</div>

						</div>
						<div class="panel-body a lowborder">
							<form method="POST" action="../login/loginCheck.php" id="loginform" class="form-horizontal" role="form">

								<div class="input-group c">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="login-username" type="email" class="form-control" name="emailadres" placeholder="Vul hier uw e-mailadres in">
								</div>

								<div class="input-group c">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="login-password" type="password" class="form-control" name="wachtwoord" placeholder="Vul hier uw wachtwoord in">
								</div>

                                <div class="g-recaptcha" data-callback="captcha_filled" data-expired-callback="captcha_expired" data-sitekey="6LeINj8UAAAAAL23qoLUp4GzzpLWgtMY5_qfG69o">
                                </div>

								<div class="form-group d">

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
			<div class="row">
				<div class="col-xs-12 text-center footer-rights">
					<p>Bouwbedrijf Wegro © 2009 -<script>print((new Date()).getFullYear());</script>.</p>
				</div>
			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
	<?php } ?>

	</html>
