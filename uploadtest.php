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

        <title>Mijn profiel</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Global styles for this website -->
        <link href="css/global.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="css/test_profile.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
  <body>
  	<?php/*
			$target_dir = "/pdf/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
							echo "File is an image - " . $check["mime"] . ".";
							$uploadOk = 1;
					} else {
							echo "File is not an image.";
							$uploadOk = 0;
					}
			}*/
		?>

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
            <li class="nav-item"><a href="contact.php">Contact</a></li>
						<li class="nav-item"><a href="profile.php">Mijn profiel</a></li>
            <li class="nav-item"><a href="index.php">Uitloggen</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
    <div class="container">
    	<div class="row">
    		<div class="col-xs-12">



 <form action="<?php print $PHP_SELF?>" enctype="multipart/form-data" method="post">
Last name:<br /> <input type="text" name="name" value="" /><br />
class notes:<br /> <input type="file" name="classnotes" value="" /><br />
  <input type="submit" name="submit" value="Submit Notes" />
</form>

				<?php
				 define ("filesplace","./pdf");

				 if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {

				 if ($_FILES['classnotes']['type'] != "application/pdf") {
				 echo "<p>Class notes must be uploaded in PDF format.</p>";
				 } else {
				 $name = $_POST['name'];
				 $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], filesplace."/$name.pdf");
				 if ($result == 1) echo "<p>Upload done .</p>";
				 else echo "<p>Sorry, Error happened while uploading . </p>";
				} #endIF
				 } #endIF
				?>

    			<!--<form action="uploadtest.php" method="post" enctype="multipart/form-data">
						<input type="file" name="doc">
						<br>
						<input type="submit" value="Upload">
					</form>-->

    		</div>
    	</div>
    </div><!-- /.container -->

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
