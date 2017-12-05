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
		<link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Global styles for this website -->
    <link href="css/global.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="css/contact.css" rel="stylesheet">

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
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>



<div class="container">
    <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 b ">
        <div class="panel " >
            <div class="panel-heading oranje">
                <div class="panel-title white">Neem contact met ons op</div>

            </div>
            <div class="panel-body a lowborder" >
                <form method="POST" action="contact.php"  id="loginform" class="form-horizontal" role="form">

                    <div  class="c">
                        <input id="naam" type="text" class="form-control" name="naam" placeholder="Vul hier uw naam in">
                    </div>

                    <div class="c">
                        <input id="email" type="text" class="form-control" name="email"  placeholder="Vul hier uw e-mailadres in">
                    </div>

                     <div class="c">
                        <input id="onderwerp" type="text" class="form-control" name="onderwerp"  placeholder="Onderwerp van uw bericht">
                    </div>

                    <div class="c">
                        <input id="bericht" type="text" class="form-control formdinges" name="bericht"  placeholder="Vul hier uw bericht in">
                    </div>

                    <div>
                        <input id="naarzelfsturen" type="checkbox" class="form-control" name="naarzelfsturen">
                    </div>

                    <div  class="form-group d">

                        <div class="col-sm-12 controls">
                            <input class="btn oranje white" type="submit" onclick="alert('Uw bericht is verzonden')" name="btn-login" value="Verzenden">
                        </div>
                    </div>
                </form>
                <div> </div>
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
