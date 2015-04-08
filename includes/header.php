<header>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
			<!-- logo -->
				<div class="col-lg-8 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
					<a href="accueil.php"><h1>Resultats Ligue 1</h1></a>
				</div>
			<!-- menu -->
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
					<ul>
						<li><a href="../pages/mesparis.php">Mes Paris</a><li>
						<li><?php echo "Points : ".$_SESSION["user"]->getPoint();?></li>
						<li><a href="../includes/logout.php">Déconnexion</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>