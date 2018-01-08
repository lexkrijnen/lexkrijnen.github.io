<?php
    session_start();
    @$klant_id = $_SESSION['klant_id'];
    @$klant_voornaam = $_SESSION['voornaam'];
    @$medewerker_nummer = $_SESSION['medewerker_nummer'];

    $id = $_GET['id'];
    $error = "";

    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    $projectid = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM Contract WHERE project_nummer = '$projectid'");
    $stmt->execute();
    $contract = $stmt->fetchAll();

    $stmt8 = $pdo->prepare("SELECT * FROM Project WHERE klant_nummer = '$klant_id'");
    $stmt8->execute();
    $projecten = $stmt8->fetchAll();

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

    $stmt = $pdo->prepare("SELECT * FROM Tekening WHERE project_nummer = '$projectid'");
    $stmt->execute();
    $tekening = $stmt->fetchAll();

    $pdo = NULL;

    if($klant_id == "" AND $medewerker_nummer != ""){
        $rol = "medewerker";
    }elseif($klant_id != "" AND $medewerker_nummer == ""){
        $rol = "klant";
    }
    ?>

	<?php include 'includes.php';?>
	<?php headTop() ?>

	<title>Bouwbedrijf Wegro</title>

	<?php headMiddle() ?>

	<!-- Custom styles for this page -->
	<link href="css/profile.css" rel="stylesheet">

	<?php headBottom() ?>

	<!-- Navbar inroepen-->
	<?php navTop() ?>
	<li class="nav-item"><a href="index.php">Home</a></li>
	<li class="nav-item"><a href="Contact/contact.php">Contact</a></li>
	<li class="nav-item"><a href="logout.php">Uitloggen</a></li>
	<?php navBottom() ?>

	<?php
if (empty($klant_id) AND empty($medewerker_nummer)) {
    print('<div class="container"><div class="row"><div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 page-box"><h5>Sorry, u bent niet ingelogd.</h5></div></div></div><br>');
    print('<meta http-equiv="refresh" content="2;url=../login.php" />');
} else {
?>



		<div class="container">
			<div class="row">
				<div id="viewer-can" class="col-xs-10 col-xs-offset-1 col-md-3 col-md-offset-0 page-box">

					<!--Contract-->
					<div class="table-responsive">
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
                    //print("<td> <a href='pdf-viewer/web/viewer.html?file=/pdf/" . $document["document"] . "' target='pdf_viewer'>" . $document["document"] . "</td>");
                    print("<td> <a href='project.php?id=" . $projectid . "&pdf=" . $document["document"] . "'>" . $document["document"] . "</td>");
                    print("</tr>");
                }
                ?>
						</table>
					</div>

					<!--Tekening-->
					<div class="table-responsive">
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
                    print("<td> <a href='project.php?id=" . $projectid . "&pdf=" . $document2["document"] . "'>" . $document2["document"] . "</td>");
                    print("</tr>");
                }
                ?>
						</table>
					</div>
				</div>

				<div id="viewer-box" class="col-xs-10 col-xs-offset-1 col-md-4 page-box">
					<?php
            $pdf = $_GET['pdf'];
            print('<iframe class="pdf-viewer" src="pdf-viewer/web/viewer.html?file=/pdf/' . $pdf . '" name="pdf_viewer"></iframe>');
            ?>

						<!-- If embedded pdf does not work, display fallback option instead. -->
						<div class="pdf-fail">
							<p>Problemen met het bekijken?</p>
							<a class="btn btn-primary" onclick="window.open('pdf-viewer/web/viewer.html?file=/pdf/voorbeeld.pdf', 'newwindow', 'width=600,height=1000'); return false;">Openen in nieuw scherm.</a>
						</div>
				</div>


				<div class="row">
					<div class="col-xs-10 col-xs-offset-1 col-md-2 col-md-offset-0" id="sidebar" role="navigation">
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
                        print ("<li><a href=\"project.php?id=" . $value['project_nummer'] . "\">" . $value['naam'] . "</a></li>");
                    }
                    ?>
							</ul>
						</div>
					</div>
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

        $getid = $_GET['id'];
        $getpdf = $_GET['pdf'];

        //OPHALEN CONTRACTNUMMERS
        $stmt5 = $pdo->prepare("SELECT contract_nummer FROM Contract WHERE project_nummer = '$getid' AND document = '$getpdf'");
        $stmt5->execute(array(':contract_nummer' => $_GET['id']));
        $contractnummerarray = $stmt5->fetchAll();

        foreach ($contractnummerarray as $a => $b) {
            $contractnummer = $b['contract_nummer'];
        }

        //MEER WERK
        $stmt = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 1 AND contract_nummer = '$contractnummer'");
        $stmt->execute();
        $meerwerk = $stmt->fetchAll();
        //MINDER WERK
        $stmt2 = $pdo->prepare("SELECT * FROM Mutatie WHERE soort_nummer = 2 AND contract_nummer = '$contractnummer'");
        $stmt2->execute();
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

            ?>

				<div class="row">
					<div class=" col-xs-10 col-xs-offset-1 mutation-box">
					<!--MEER WERK-->
					<div id="viewer-meer/minder" class="col-xs-12 col-md-5 page-box">
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
					</div>


					<!--MINDER WERK-->
					<div id="viewer-meer/minder" class="col-xs-12 col-md-5 col-md-offset-2 page-box">
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

		<?php footAlt() ?>
