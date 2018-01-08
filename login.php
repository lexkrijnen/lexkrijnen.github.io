<?php
	session_start();
	@$klant_id = $_SESSION['klant_id'];
	@$medewerker_nummer = $_SESSION['medewerker_nummer'];
	if (!empty($klant_id OR $medewerker_nummer)) {
		$ingelogd = "Mijn Account";
	} else {
		$ingelogd = "Inloggen";
	}
?>

	<?php include 'includes.php';?>
	<?php headTop() ?>

	<title>Inloggen</title>

	<?php headMiddle() ?>

	<!-- Custom styles for this page -->
	<link href="css/login.css" rel="stylesheet">

  <!--- reCAPTCHA loader --->
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<?php headBottom() ?>

	<!-- Navbar inroepen-->
	<?php navTop() ?>
	<li class="nav-item"><a href="index.php">Terug</a></li>
	<?php navBottom() ?>

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
			}
		?>

		<div class="container">
			<div class="row">
				<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-xs-12 b ">
					<div class="panel">
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

								<div class="form-group">
									<div class="col-sm-12 controls">
										<input class="btn btn-default select-btn white d" type="submit" name="btn-login" value="Login">
									</div>
								</div>
							</form>
						</div><!-- .panel-body -->
					</div><!-- .panel -->
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->

	<?php footAlt() ?>
