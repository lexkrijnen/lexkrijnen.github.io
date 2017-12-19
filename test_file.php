<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Tekenig toevoegen</title>
	<link rel="stylesheet" href="css/meerminderwerk.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="Welkom bij Bouwbedrijf Wegro.">
	<meta name="author" content="Nard Wemes">
	<link rel="icon" href="images/Logo%20bouwbedrijf%20Wegro.png">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Global styles for this website -->
	<link href="css/global.css" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="css/test_profile.css" rel="stylesheet">
	<?php
    $error = "";

    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

     if (isset($_GET["toevoegenmeerwerk"]) && isset($_GET["beschrijving"])) {
        if ($_GET["beschrijving"] != "") {
            $sql = "INSERT INTO Mutatie (beschrijving, prijs, contract_nummer, soort_nummer)VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($_GET["beschrijving"], $_GET["prijs"], $_GET['id'], 1)); ## 1,1 Vervangen door CONTRACT_NUMMER (te halen uit de URL) en SOORTNUMMER (Meer of MINDER werk) ##
        } else {
            $error = ("Vul A.U.B. een beschrijving in.");
        }
    }

    if (isset($_GET["toevoegenminderwerk"]) && isset($_GET["beschrijving"])) {
        if ($_GET["beschrijving"] != "") {
            $sql = "INSERT INTO Mutatie (beschrijving, prijs, contract_nummer, soort_nummer)VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($_GET["beschrijving"], $_GET["prijs"], $_GET['id'], 2)); ## 1,1 Vervangen door CONTRACT_NUMMER (te halen uit de URL) en SOORTNUMMER (Meer of MINDER werk) ##
        } else {
            $error = ("Vul A.U.B. een beschrijving in.");
        }
    }
    //TABEL MEER WERK
    $stmt = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 1 AND contract_nummer = :contract_nummer");
    $stmt->execute(array(':contract_nummer' => $_GET['id']));
    $meerwerk = $stmt->fetchAll();

    //TABEL MINDER WERK
    $stmt2 = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 2 AND contract_nummer = :contract_nummer");
    $stmt2->execute(array(':contract_nummer' => $_GET['id']));
    $minderwerk = $stmt2->fetchAll();

    //NAAM PROJECT
    $stmt3 = $pdo->prepare("SELECT naam FROM Project WHERE contract_nummer = :contract_nummer");
    $stmt3->execute(array(':contract_nummer' => $_GET['id']));
    $naamproject = $stmt3->fetchAll();

    ?>
</head>

<body>
	<!--NAVBAR-->
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
					<li class="nav-item"><a href="login.php">Uitloggen</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

    <!-- Sidebar -->
    <div class="sidebar-item sidebar-block">
        <h3 class="sidebar-item">Menu</h3>
            <ul class="sidebar-item sidebar-up">
                <li class="sidebar-item button"><a href="#">Link 1</a></li>
                <li class="sidebar-item button"><a href="#">Link 2</a></li>
                <li class="sidebar-item button"><a href="#">Link 3</a></li>
            </ul>
        </div>

	<!--MEER WERK-->
	<div class="container page-box">
		<div class="col-xs-4">
			<h1>Meer Werk</h1>
			<?php
        foreach ( $naamproject as $value ) {
            print ("<h5>Projectnaam: " . $value['naam'] . "</h5>");
        }
        ?>
				<form method="get" action="meermindertoevoegen.php">
					<table class="table table-hover table-bordered">
						<tr>
							<th>Nr.</th>
							<th>Beschrijving</th>
							<th>Prijs</th>
							<th></th>
							<th></th>
						</tr>
						<?php
                $meerwerkcount = 1;
                foreach ($meerwerk AS $werk) {
                    print("<tr>");
                    print("<td>" . $meerwerkcount . "</td>");
                    print("<td>" . $werk["beschrijving"] . "</td>");
                    print("<td>€ " . $werk["prijs"] . "</td>");
                    print("<td> <a href=\"meerminderbewerk.php?nummer=" . $werk["mutatie_id"] . "&id=" . $werk["contract_nummer"] . "\">Bewerk</a> </td>");
                    print("<td> <a href=\"meerminderverwijder.php?nummer=" . $werk["mutatie_id"] . "&id=" . $werk["contract_nummer"] . "\">Verwijder</a></td>");
                    print("</tr>");
                    $meerwerkcount++;
                }
                ?>
							<tr>
								<td></td>
								<td><input type="text" name="beschrijving" size="15"></td>
								<td><input type="text" name="prijs" size="3"></td>
								<td><input type="submit" name="toevoegenmeerwerk" value="Toevoegen"></td>
								<td><input type="hidden" name="id" value="<?php print($_GET['id']);?>"></td>
							</tr>
					</table>
				</form>
				<?php
        if ($error != "") {
            print('<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"> ' . $error . '</span></div>');
        } ?>
					<a href="meerminderadminlanding.php"><button type="button" class="btn btn-primary btn-return">Terug naar overzicht</button></a>
		</div>


		<div class="col-xs-3"></div>
		<!-- LEGE RUIMTE TUSSEN KOLOMMEN-->


		<!--MINDER WERK-->
		<div class="col-xs-4">
			<h1>Minder Werk</h1>
			<?php
        foreach ( $naamproject as $value ) {
            print ("<h5>Projectnaam: " . $value['naam'] . "</h5>");
        }
        ?>
				<form method="get" action="meermindertoevoegen.php">
					<table class="table table-hover table-bordered">
						<tr>
							<th>Nr.</th>
							<th>Beschrijving</th>
							<th>Prijs</th>
							<th></th>
							<th></th>
						</tr>
						<?php
                $minderwerkcount = 1;
                foreach ($minderwerk AS $werk2) {
                    print("<tr>");
                    print("<td>" . $minderwerkcount . "</td>");
                    print("<td>" . $werk2["beschrijving"] . "</td>");
                    print("<td>- € " . $werk2["prijs"] . "</td>");
                    print("<td> <a href=\"meerminderbewerk.php?nummer=" . $werk2["mutatie_id"] . "&id=" . $werk2["contract_nummer"] . "\">Bewerk</a> </td>");
                    print("<td> <a href=\"meerminderverwijder.php?nummer=" . $werk2["mutatie_id"] . "&id=" . $werk2["contract_nummer"] . "\">Verwijder</a></td>");
                    print("</tr>");
                    $minderwerkcount++;
                }
                ?>
							<tr>
								<td></td>
								<td><input type="text" name="beschrijving" size="15"></td>
								<td><input type="text" name="prijs" size="3"></td>
								<td><input type="submit" name="toevoegenminderwerk" value="Toevoegen"></td>
								<td><input type="hidden" name="id" value="<?php print($_GET['id']);?>"></td>
							</tr>
					</table>
				</form>
		</div>
	</div>
	<?php $pdo = NULL; ?>
</body>

</html>
