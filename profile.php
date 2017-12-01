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

    <title>Welkom bij Wegro</title>

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
						<li class="nav-item"><a href="login.php">Inloggen</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
    <div class="container">

    	<div class="row">
    		<div class="col-xs-10 col-xs-offset-1 col-md-3 col-md-offset-0 page-box">
    			Hier komt een menu
    		</div>

    		<div class="col-xs-10 col-xs-offset-1 col-md-8 page-box">
    			<div class="embed-responsive" id="pdf-viewer">
						<!--<object data="http://www.pdf995.com/samples/pdf.pdf" type="application/pdf"></object>-->
					</div>
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

		<!-- PDF.js for the mobile supported PDF viewer -->
		<script src="//mozilla.github.io/pdf.js/build/pdf.js" type="text/javascript"></script>
		<script>
			// If absolute URL from the remote server is provided, configure the CORS
			// header on that server.
			var url = 'test-files/test.pdf';

// Disable workers to avoid yet another cross-origin issue (workers need
// the URL of the script to be loaded, and dynamically loading a cross-origin
// script does not work).
// PDFJS.disableWorker = true;

// The workerSrc property shall be specified.
PDFJS.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

			// Asynchronous download of PDF
			var loadingTask = PDFJS.getDocument(url);
			loadingTask.promise.then(function(pdf) {
				console.log('PDF loaded');

				// Fetch the first page
				var pageNumber = 1;
				pdf.getPage(pageNumber).then(function(page) {
					console.log('Page loaded');

					var scale = 1.5;
					var viewport = page.getViewport(scale);

					// Prepare canvas using PDF page dimensions
					var canvas = document.getElementById('pdf-viewer');
					var context = canvas.getContext('2d');
					canvas.height = viewport.height;
					canvas.width = viewport.width;

					// Render PDF page into canvas context
					var renderContext = {
						canvasContext: context,
						viewport: viewport
					};
					var renderTask = page.render(renderContext);
					renderTask.then(function () {
						console.log('Page rendered');
					});
				});
			}, function (reason) {
				// PDF loading error
				console.error(reason);
			});
		</script>
	</body>
</html>
