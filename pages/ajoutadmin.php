<?php
	require_once "../includes/connexion_bdd.php";
	require_once "../includes/autoload.inc.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultat Ligue 1 | Ajouter un match</title>
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
			<div class="col-md-3 col-sm-3 col-xs-12">
				<nav class="nav-bar navbar-inverse">
					<ul class="nav navbar-nav navbar-inverse">
						<li><a href="pageadmin.php" class="navbar-link">Résultat des matchs</a></li>
						<li><a href="ajoutadmin.php" class="navbar-link">Ajouter des matchs</a></li>
						<li><a href="listeuser.php" class="navbar-link">Liste des utilisateurs</a></li>
						<li><a href="../includes/logout.php" class="navbar-link">Déconnexion</a></li>
					</ul>
				</nav>
			</div>	

<!-- conteneur -->
			<div class="col-md-9 col-sm-9 col-xs-12">
				<h1>Ajout de match</h1>
		<?php
			$sql2 = "SELECT nom FROM equipe";
			$sql = $db->prepare($sql2);
			$sql->execute();
			echo '
					<table class="table">
						<thead>
							<tr class="info">
								<td>Domicile</td>
								<td>Extérieur</td>
							</tr>
						</thead>';
			
			while ($team = $sql->fetch())
			{
				echo 
					'
						<tr>
							<td><input id="radioteamdom" type="radio" name="dom"/>'.$team["nom"].'</td>
							<td><input id="radioteamext" type="radio" name="ext"/>'.$team["nom"].'</td>
						</tr>
					
					';
			}
			echo '
			</table>
				<form method="POST" action="" class="form-inline">
					<div class="form-group">
						<input type="double" class="form-control" name="cotedom" placeholder="cote domicile"/>
						<input type="double" class="form-control" name="cotenul" placeholder="cote nul"/>
						<input type="double" class="form-control" name="coteext" placeholder="cote exterieur"/>
						<input type="submit" class="form-control" name="valider"/>
					</div>
				</form>
			</div>';
			if(!empty($_POST["valider"]))
			{
				$sql2 = "INSERT INTO resultat(dom, ext, cotedom, cotenul, coteext) VALUES ('".$_POST["dom"]."', '".$_POST["ext"]."', '".$_POST["cotedom"]."', '".$_POST["cotenul"]."', '".$_POST["coteext"]."')";
				$sql = $db->prepare($sql2);
				$sql->execute();
			}
		?>
			</div>
		</div>
	</body>
</html>
			