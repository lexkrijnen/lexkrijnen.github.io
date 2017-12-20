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
	<?php
        $error = "";

        $db = "mysql:host=localhost; dbname=Wegro; port=3306";
        $user = "wegro";
        $pass = "SQLWegro@101";
        $pdo = new PDO($db, $user, $pass);

        //TABEL CONTRACT (PROBEERSEL, WERKT NOG NIET!!!!!!!
				//if (isset($_POST[""]) {
				//	$sql = "INSERT INTO Contract (naam)VALUES(?)";
				//	$stmt = $pdo->prepare($sql);
				//	$stmt->execute(array($_POST[""]));
				//	$msg = "De SQL Query is uitgevoerd."; //TEST, STRAKS VERVANGEN DOOR MELDING.
				//}
        $projectid = $_GET['id'];

        $stmt = $pdo->prepare("SELECT * FROM Contract WHERE project_nummer = '$projectid'");
        $stmt->execute();
        $contract = $stmt->fetchAll();

        //TABEL TEKENING
        if (isset($_GET["toevoegentekening"]) && isset($_GET["document"])) {
            if ($_GET["document"] != "" AND $_GET["naam"] != "" ) {
                $sql = "INSERT INTO Tekening (tekening_nummer, document, naam, project_nummer) VALUES(?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($_GET["project_nummer"], $_GET["naam"], $_GET["document"], $_GET["tekening_nummer"]));
            } else {
                $error = ("Vul A.U.B alles in");
            }
        }

        $stmt = $pdo->prepare("SELECT * FROM Tekening");
        $stmt->execute();
        $tekening = $stmt->fetchAll();

        $pdo = NULL;
    ?>
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
					<li class="nav-item"><a href="contact.php">Contact</a></li>
					<li class="nav-item"><a href="profile.php">Mijn profiel</a></li>
					<li class="nav-item"><a href="index.php">Uitloggen</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-3 col-md-offset-0 page-box">
				<!--Contract-->
				<table class="table table-hover">
					<tr>
						<thead>
							<th>
								<h3><b>Contract</b></h3>
							</th>
						</thead>
					</tr>
					<?php
                	foreach ($contract AS $document) {
                    print("<tr>");
										print("<td> <a href='pdf-viewer/web/viewer.html?file=/pdf/" . $document["document"] . "' target='pdf_viewer'>" . $document["document"] . "</td>");
                    print("</tr>");
                  }
                ?>
				</table>
				<!--Uploaden Contract-->
					<a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Contract toevoegen</a>
					<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Bestand toevoegen</h4>
								</div>
								<div class="modal-body">
									<form action="upload_file.php" method="post" enctype="multipart/form-data">

									<input type="file" name="file" size="50" />
                                    <input type="hidden" name="id" value="<? print($_GET['id']); ?>"><br>
									<input type="submit" name="submitcontract" value="Upload" />

									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal"><b>Close</b></button>
								</div>
							</div>
						</div>
					</div>
				<br>
				<!--Tekening-->
				<table class="table table-hover">
					<tr>
						<thead>
							<th>
								<h3><b>Tekeningen</b></h3>
							</th>
						</thead>
					</tr>
					<?php
            foreach ($tekening AS $document2) {
                print("<tr>");
                print("<td> <a href='pdf-viewer/web/viewer.html?file=/pdf/" . $document2["document"] . "' target='pdf_viewer'>" . $document2["naam"] . "</td>");
                print("</tr>");
                }
            ?>
				</table>
				<!--Uploaden Tekening-->
				<form method="get" action="test_PDF_upload.php">
					<a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#largeModal">Tekening toevoegen</a>
					<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Bestand toevoegen</h4>
								</div>
								<div class="modal-body">
									<table class="table">
										<tr>
											<thead>
												<th><b>Tekening.nr</b></th>
												<th><b>Project.nr</b></th>
												<th><b>Naam</b></th>
												<th><b>Document</b></th>
												<th></th>
											</thead>
										</tr>
										<tr>
											<form action="upload_file.php" method="post" enctype="multipart/form-data">
												<input type="file" name="document" />
												<br />
												<input type="submit" value="Upload" />
											</form>
										</tr>
									</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div id="viewer-box" class="col-xs-10 col-xs-offset-1 col-md-8 page-box">
				<iframe class="pdf-viewer" src="pdf-viewer/web/viewer.html?file=/pdf/test.pdf" name="pdf_viewer"></iframe>

				<!-- If embedded pdf does not work, display fallback option instead. -->
				<div class="pdf-fail">
					<p>Problemen met het bekijken?</p>
					<a class="btn btn-primary" onclick="window.open('pdf-viewer/web/viewer.html?file=/pdf/test.pdf', 'newwindow', 'width=600,height=1000'); return false;">Openen in nieuw scherm.</a>
				</div>
			</div>


                <?php
                session_start();
                @$klant_id = $_SESSION['klant_id'];
                @$klant_voornaam = $_SESSION['voornaam'];
                @$medewerker_nummer = $_SESSION['medewerker_nummer'];

                $db = "mysql:host=localhost; dbname=Wegro; port=3306";
                $user = "wegro";
                $pass = "SQLWegro@101";
                $pdo = new PDO($db, $user, $pass);
                //MEER WERK
                $stmt = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 1 AND contract_nummer = :contract_nummer");
                $stmt->execute(array(':contract_nummer' => $_GET['id']));
                $meerwerk = $stmt->fetchAll();
                //MINDER WERK
                $stmt2 = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 2 AND contract_nummer = :contract_nummer");
                $stmt2->execute(array(':contract_nummer' => $_GET['id']));
                $minderwerk = $stmt2->fetchAll();
                //NAAM PROJECT
                $stmt3 = $pdo->prepare("SELECT p.naam FROM Project p JOIN Contract c ON  p.project_nummer = c.project_nummer WHERE contract_nummer = :contract_nummer");
                $stmt3->execute(array(':contract_nummer' => $_GET['id']));
                $naamproject = $stmt3->fetchAll();

                if ($klant_id == "" AND $medewerker_nummer != ""){
                    $rol = "medewerker";
                } elseif($klant_id != "" AND $medewerker_nummer == ""){
                    $rol = "klant";
                }

            if (empty($klant_id)) {
                print('<div class="container page-box"><div class="col-xs-4 col-md-5"><h5>Sorry, u bent niet ingelogd.</h5></div><br>');
                print('<meta http-equiv="refresh" content="2;url=../login.php" />');
            } else {
            ?>

            <!--MEER WERK-->
            <div>
                <div class="col-xs-4 page-box">
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
                            </tr>
                            <?php
                            $meerwerkcount = 1;
                            foreach ($meerwerk AS $werk) {
                                print("<tr>");
                                print("<td>" . $meerwerkcount . "</td>");
                                print("<td>" . $werk["beschrijving"] . "</td>");
                                print("<td>€ " . $werk["prijs"] . "</td>");
                                print("</tr>");
                                $meerwerkcount++;
                            }
                            ?>
                        </table>
                    </form>
                    <a href="meerminderlanding.php"><button type="button" class="btn btn-primary btn-return">Terug</button></a>
                </div>


                <div class="col-xs-3"></div>
                <!-- LEGE RUIMTE TUSSEN KOLOMMEN-->

                <!--MINDER WERK-->
                <div class="col-xs-4 page-box">
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
                            </tr>
                            <?php
                            $minderwerkcount = 1;
                            foreach ($minderwerk AS $werk2) {
                                print("<tr>");
                                print("<td>" . $minderwerkcount . "</td>");
                                print("<td>" . $werk2["beschrijving"] . "</td>");
                                print("<td>- € " . $werk2["prijs"] . "</td>");
                                print("</tr>");
                                $minderwerkcount++;
                            }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
            <?php $pdo = NULL; ?>
            <?php } ?>


        </div>
	</div>
	<!-- /.container -->

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
