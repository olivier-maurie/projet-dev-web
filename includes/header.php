<header>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="col-lg-9">
				<a href="accueil.php"><h1>Resultats Ligue 1</h1></a>
			</div>
			<div class="col-lg-3">
			<?php
				echo "bonjour l'ami !";
				echo "Ton nombre de point est de ".$_SESSION["user"]->getPoint();
			?>
				<div class="dropdown">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
					Dropdown
					<span class="caret"></span>
				</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
					</ul>
				</div>
			</div>
		</div><a href="../pages/mesparis.php">Mes Paris</a>
		<div class="mesparis" style="float:right">
		</div>
	</div>
	
</header>