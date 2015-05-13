<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet foot | Liste des utilisateurs</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
	<link href="../css/design.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3">
				<nav class="nav-bar navbar-inverse">
					<ul class="nav navbar-nav navbar-inverse">
						<li><a href="pageadmin.php" class="navbar-link">Résultat des matchs</a></li>
						<li><a href="ajoutadmin.php" class="navbar-link">Ajouter des matchs</a></li>
						<li><a href="listeuser.php" class="navbar-link">Liste des utilisateurs</a></li>
						<li><a href="../includes/logout.php" class="navbar-link">Déconnexion</a></li>
					</ul>
				</nav>
			</div>
			
			<div class="col-md-9 col-sm-9 col-xs-9">
				<h1>Liste des utilisateurs</h1>
				<table class="table">
					<thead>
						<tr>
							<td>Nom</td>
							<td>Prénom</td>
							<td>Pseudo</td>
							<td>Points</td>
						</tr>
					</thead>
				<?php
					include( "../includes/connexion_bdd.php");
					$sql2 = "SELECT id, nom, prenom, password, pseudo, points, admin FROM user";
					$sql = $db->prepare($sql2);
					$sql->execute();
					echo '<form method="post">';
					while ($liste = $sql->fetch())
					{
						echo '
							<tr>
								<td>'.$liste["nom"].'</td>
								<td>'.$liste["prenom"].'</td>
								<td>'.$liste["pseudo"].'</td>
								<td>'.$liste["points"].'</td>
							</tr>';
					}
					echo "</form>";
				?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>