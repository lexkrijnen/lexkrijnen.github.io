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

	<?php
    session_start();
    @$klant_id = $_SESSION['klant_id'];
    @$klant_voornaam = $_SESSION['voornaam'];

    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    $stmt = $pdo->prepare("SELECT * FROM Project WHERE klant_nummer = '$klant_id'");
    $stmt->execute();
    $projecten = $stmt->fetchAll();

    if($klant_id == "" AND $medewerker_nummer != ""){
        $rol = "medewerker";
    }elseif($klant_id != "" AND $medewerker_nummer == ""){
        $rol = "klant";
    }
   ?>

		<?php headTop() ?>

		<title>Welkom bij Wegro</title>

		<?php headMiddle() ?>

		<!-- Custom styles for this page -->
		<link href="css/login.css" rel="stylesheet">

		<?php headBottom() ?>

		<!-- Navbar inroepen-->
		<?php navTop() ?>
		<li class="nav-item"><a href="index.php">Home</a></li>
		<li class="nav-item"><a href="Contact/contact.php">Contact</a></li>
		<li class="nav-item"><a href="logout.php">Uitloggen</a></li>
		<?php navBottom() ?>

		<div class="container">

			<?php
        if (empty($klant_id)) {
            print('<div class="row"><div class="col-xs-10 col-xs-offset-1 col-md-2 col-md-offset-0 page-box"><h5>Sorry, u bent niet ingelogd.</h5></div></div><br>');
            print('<meta http-equiv="refresh" content="2;url=../login.php" />');
        } else {
        ?>

				<div class="row">
					<div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 page-box">
						<?php
            $hour = date('H', time());

            if( $hour > 6 && $hour <= 11) {
                print("<h1>Goedemorgen, " . $klant_voornaam . "</h1>");
            }
            else if($hour > 11 && $hour <= 16) {
                print("<h1>Goedemiddag, " . $klant_voornaam . "</h1>");
            }
            else if($hour > 16 && $hour <= 23) {
                print("<h1>Goedenavond, " . $klant_voornaam . "</h1>");
            }
            else {
                print("<h1>Hallo, " . $klant_voornaam . "</h1>");
            }
            ?>
					</div>
				</div>
		</div>

		<div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3" id="sidebar" role="navigation">
			<div class="sidebar-nav">
				<ul class="nav">
					<li class="nav-divider"></li>
					<li class="active">
						<h4>Menu</h4>
					</li>
					<li class="nav-divider"></li>
					<li><a href='<?php if($rol=="klant" ){print( "account.php");}elseif($rol=="medewerker" ){print( "profile_medewerker.php");}?>'>Mijn Account</a></li>
					<li><a href="accountoverview.php">Mijn gegevens</a></li>
					<li class="nav-divider"></li>
					<li>
						<h4>Mijn projecten</h4>
					</li>
					<li class="nav-divider"></li>
					<?php
              	foreach ( $projecten as $value ) {
                	print ("<li><a href=\"project.php?id=" . $value['project_nummer'] . "&pdf=voorbeeld.pdf\">" . $value['naam'] . "</a></li>");
                }
              ?>
				</ul>
			</div>
		</div>

		<?php footAlt() ?>
		<?php } ?>
