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

        <title>Contract/Tekening</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Global styles for this website -->
        <link href="css/global.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="css/profile.css" rel="stylesheet">

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

        //Contract
        $stmt = $pdo->prepare("SELECT * FROM Contract");
        $stmt->execute();
        $contract = $stmt->fetchAll();

        //Tekening
        $stmt2 = $pdo->prepare("SELECT * FROM Tekening");
        $stmt2->execute();
        $tekening = $stmt2->fetchAll();

        if ($klant_id == "" AND $medewerker_nummer != ""){
            $rol = "medewerker";
        } elseif($klant_id != "" AND $medewerker_nummer == ""){
            $rol = "klant";
        }
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
                    <li class="nav-item"><a href="logout.php">Uitloggen</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-12 sidebar-offcanvas" id="sidebar" role="navigation">
                <div class="sidebar-nav">
                    <ul class="nav">
                        <li class="active">
                            <h4><b>Menu</b></h4>
                        </li>
                        <li class="nav-divider"></li>
                        <li><a href="account.php">Mijn Account</a></li>
                        <li><a href="accountoverview.php">Mijn gegevens</a></li>
                        <li class="nav-divider"></li>
                        <li>
                            <h4><b>Mijn projecten</b></h4>
                        </li>
                        <li class="nav-divider"></li>
                        <li><a href="meerminderlanding.php">Meer/Minder werk</a></li>
                        <li><a href="contract_tekening.php">Contract/Tekening</a></li>
                        <li class="nav-divider"></li>
                    </ul>
                </div>
                <!--/.well -->
            </div>
            <!--/span-->
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-md-3 col-md-offset-0 page-box">
                    <!--Contract-->
                    <form>
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
				    print("<td> <a href='pdf-viewer/web/viewer.html?file=/pdf/" . $document["document"] . "' target='pdf_viewer'>" . $document["naam"] . "</td>");
                    print("</tr>");
                    }
                ?>
                        </table>
                    </form>
                    <br>
                    <!--Tekening-->
                    <form>
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
                    </form>
                </div>
                <?php $pdo = NULL; ?>
                <div id="viewer-box" class="col-xs-10 col-xs-offset-1 col-md-8 page-box">
                    <iframe class="pdf-viewer" name="pdf_viewer"></iframe>

                    <!-- If embedded pdf does not work, display fallback option instead. -->
                    <div class="pdf-fail">
                        <p>Problemen met het bekijken?</p>
                        <a class="btn btn-primary" onclick="window.open('pdf-viewer/web/viewer.html?file=/pdf/test.pdf', 'newwindow', 'width=600,height=1000'); return false;">Openen in nieuw scherm.</a>
                    </div>
                </div>
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
