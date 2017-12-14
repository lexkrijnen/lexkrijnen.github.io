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
            $db = "mysql:host=localhost; dbname=Wegro; port=3306";
            $user = "wegro";
            $pass = "SQLWegro@101";
            $pdo = new PDO($db, $user, $pass);

            if (isset($_GET["toevoegencontract"]) && isset($_GET["document"])) {
                if ($_GET["document"] != "") {
                    $sql = "INSERT INTO Contract (contract_nummer, naam, document)VALUES(?,?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array($_GET["document"], $_GET["naam"], $_GET['id'], 1)); ## 1,1 Vervangen door CONTRACT_NUMMER (te halen uit de URL) en SOORTNUMMER (Meer of MINDER werk) ##
                } else {
                    $error = ("Plaats A.U.B. een bestand.");
                }
            }

                //Contract
                $stmt = $pdo->prepare("SELECT * FROM Contract");
                $stmt->execute();
                $contract = $stmt->fetchAll();

                //Tekening
                $stmt2 = $pdo->prepare("SELECT * FROM Tekening");
                $stmt2->execute();
                $tekening = $stmt2->fetchAll();
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
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

            <!--MEER WERK-->
<div class="container page-box">
    <div class="col-xs-4">
        <h3><b>Contract</b></h3>
        <form method="get" action="test_file.php">
            <table class="table table-hover">
                <tr>
                    <th>C.nr</th>
                    <th>Naam</th>
                    <th>Document</th>
                    <th></th>
                </tr>
                <?php
                foreach ($contract AS $document) {
                    print("<tr>");
                    print("<td>" . $document["contract_nummer"] . "</td>");
                    print("<td>" . $document["document"] . "</td>");
                    print("<td>" . $document["naam"] . "</td>");
                    print("</tr>");
                }
                ?>
                <tr>
                    <td></td>
                    <td><input type="text" name="beschrijving" size="15"></td>
                    <td><input type="text" name="prijs"size="3"></td>
                    <td><input type="submit" name="toevoegenmeerwerk" value="Toevoegen"></td>
                </tr>
            </table>
        </form>
        <a href="meerminderadminlanding.php"><button type="button" class="btn btn-primary btn-return">Terug naar overzicht</button></a>
    </div>


    <div class="col-xs-3"></div> <!-- LEGE RUIMTE TUSSEN KOLOMMEN-->


    <!--MINDER WERK-->
    <div class="col-xs-4">
        <h1>Minder Werk</h1>
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
                    <td><input type="text" name="prijs"size="3"></td>
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
