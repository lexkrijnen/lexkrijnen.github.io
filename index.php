<?php include 'includes.php';?>
<?php head() ?>
		<?php navTop() ?>
			<li class="nav-item">
				<a href="login.php">
					<?php print($ingelogd);?>
				</a>
			</li>
		<?php navBottom() ?>

		<div class="container page">

			<div class="row">
				<div class="col-xs-offset-1">
					<p class="page-question">Waarmee kan ik u van dienst zijn?</p>
				</div>
			</div>

			<div class="row">
				<a href="MBhome.php">
					<div class="col-xs-10 col-xs-offset-1 col-md-3 col-md-offset-0 btn btn-default select-btn">
						<img class="select-logo" src="images/MBtegel2.png" alt="logo">
					</div>
				</a>
				<a href="BBhome.php">
					<div class="col-xs-10 col-xs-offset-1 col-md-3 btn btn-default select-btn">
						<img class="select-logo" src="images/BBtegel2.png" alt="logo">
					</div>
				</a>
				<a href="TBhome.php">
					<div class="col-xs-10 col-xs-offset-1 col-md-3 btn btn-default select-btn">
						<img class="select-logo" src="images/TBtegel2.png" alt="logo">
					</div>
				</a>
			</div>

		</div>
		<!-- /.container -->

			<?php foot() ?>
