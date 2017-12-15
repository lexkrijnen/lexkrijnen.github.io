<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contract toevoegen</title>
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
    <link href="css/index.css" rel="stylesheet">
    <?php
    $error = "";

    $db = "mysql:host=localhost; dbname=Wegro; port=3306";
    $user = "wegro";
    $pass = "SQLWegro@101";
    $pdo = new PDO($db, $user, $pass);

    if (isset($_GET["toevoegencontract"]) && isset($_GET["document"])) {
        if ($_GET["document"] != "" AND $_GET["naam"] != "" ) {
            $sql = "INSERT INTO Contract (contract_nummer, document, naam)VALUES(?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($_GET["contract_nummer"], $_GET["document"], $_GET['naam']));
        } else {
            $error = ("Plaats A.U.B. een bestand en voeg een naam toe");
        }
    }

    //TABEL CONTRACT
    $stmt = $pdo->prepare("SELECT * FROM Contract");
    $stmt->execute();
    $contract = $stmt->fetchAll();

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
        <h1>Contract</h1>
        <form method="get" action="test_file.php">
            <table class="table-bordered">
                <tr>
                    <th>C.nr</th>
                    <th>Document</th>
                    <th>Naam</th>
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
                    <td><input type="text" name="contract_nummer" size="15"></td>
                    <td><input type="file" name="document"></td>
                    <td><input type="text" name="naam"size="15"></td>
                    <td><input type="submit" name="toevoegencontract" value="Toevoegen"></td>
                </tr>
            </table>
        </form>
        <form method="get" action="test_PDF_upload.php">
                 <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Contract toevoegen</a>
                    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Bestanden toevoegen</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tr>
                                        <thead>
                                            <th><b>C.nr</b></th>
                                            <th><b>Naam</b></th>
                                            <th><b>Document</b></th>
                                            <th></th>
                                        </thead>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="text" name="pdf naam" size="15"></td>
                                        <td><input type="file" name="bestand"></td>
                                        <td><input type="submit" name="toevoegencontract" value="Toevoegen"></td>
                                    </tr>
                                </table>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><b>Close</b></button>
                               </div>
                        </div>
                    </div>
                </div>
        </form>
        <?php
        if ($error != "") {
            print('<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"> ' . $error . '</span></div>');
        } ?>
    </div>
</div>
<?php $pdo = NULL; ?>
</body>
</html>
