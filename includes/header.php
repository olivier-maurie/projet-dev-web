<header>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="col-lg-9">
				<a href="accueil.php"><h1>Resultats Ligue 1</h1></a>
			</div>
			<div class="col-lg-3">
			<a href="../pages/mesparis.php"><h2>Mes Paris</h2></a>
				<?php
				echo "bonjour l'ami !";
				echo "Ton nombre de point est de ".$_SESSION["user"]->getPoint();
				?>
			</div>
		</div>
		<div class="mesparis" style="float:right">

		</div>
	</div>
	
</header>