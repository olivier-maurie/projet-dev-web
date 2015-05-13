<?php
	require_once "../includes/connexion_bdd.php";
	require_once "../includes/autoload.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet foot | Administration</title>
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
			<h1>Résultat des Matchs</h1>
		<?php
			/* affiche les résultats de la requête */
			require_once "../includes/connexion_bdd.php";
			require_once "../includes/autoload.inc.php";
			
			$sql = "SELECT id, dom, ext, butdom, butext, cotedom, cotenul, coteext FROM resultat";
			$sql = $db->prepare($sql);
			$sql->execute();
			
			while ($resultat2 = $sql->fetch())
			{
				$nul = "nul";
				$logodomsql = "SELECT logo FROM equipe WHERE nom = '".$resultat2["dom"]."'";
				$logodomexe = $db->prepare($logodomsql);
				$logodomexe->execute();
				$logodom = $logodomexe->fetch();
				$logoextsql = "SELECT logo FROM equipe WHERE nom = '".$resultat2["ext"]."'";
				$logoextexe = $db->prepare($logoextsql);
				$logoextexe->execute();
				$logoext = $logoextexe->fetch();
		?>
				<div class="row resultat-admin">
					<div class="col-md-6 col-sm-6 col-xs-7">
						<img src="..<?php echo $logodom["logo"];?>" alt="image <?php echo $logodom["logo"];?>" />
						<?php echo $resultat2['dom']; ?>  -  <?php echo $resultat2['ext'];?>
						<img src="..<?php echo $logoext["logo"];?>" alt="image <?php echo $logoext["logo"];?>"/>
					</div>
					<form method="POST" action="" class="parie">
						<div class="col-md-4 col-sm-4 col-xs-3">
							<ul>
								<li>
									<span class="equipe"><?php echo substr($resultat2['dom'], 0, 3); ?></span>
									<span><input type="radio" name="cote" value=<?php echo json_encode(array($resultat2["dom"], $resultat2["dom"]));?>></span>
									<span><?php echo $resultat2["cotedom"];?></span>
									<?php $dom = $resultat2["cotedom"];?>
								</li>
								<li>
									<span class="equipe">Nul</span>
									<span><input type="radio" name="cote" value=<?php echo json_encode(array($nul, $resultat2["dom"]));?> checked/></span>
									<span><?php echo $resultat2["cotenul"];?></span>
									<?php $nul = $resultat2["cotenul"];?>
								</li>
								<li>
									<span class="equipe"><?php echo substr($resultat2['ext'], 0, 3); ?></span>
									<span><input type="radio" name="cote" value=<?php echo json_encode(array($resultat2['ext'], $resultat2["dom"])); ?>></span>
									<span><?php echo $resultat2["coteext"];?></span>
									<?php $ext=$resultat2["coteext"];?>
								</li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
							<input type="submit" class="btn btn-primary valid_result" name="envoyer" value="VALIDER">
						</div>
					</form>
				</div>

				<?php
				}
					/* récupère les données de la bdd */
					if(!empty($_POST["envoyer"]))
					{
						$json = $_POST["cote"];
						$lol = json_decode($json);
						$match= $lol[0];
						$equipe_dom = $lol[1];
						echo $match;
						$req_pari2 = "SELECT id, dom, ext, cotedom, cotenul, coteext, sommeparie, id_user, coteparie, equipe_pari FROM pari WHERE equipe_pari = '".$match."' AND dom = '".$equipe_dom."'";
						$req_pari=$db->prepare($req_pari2);
						$req_pari->execute();
						
						while($gain = $req_pari->fetch())
						{
							$user_id = $gain["id_user"];
							$req_user = $db->prepare("SELECT id, nom, prenom, password, pseudo, points, admin FROM user WHERE id = '".$user_id."'");
							$req_user->execute();
							while($columns = $req_user->fetch())
							{
								$useract = new user($columns["id"], $columns["nom"], $columns["prenom"], $columns["password"], $columns["pseudo"], $columns["points"]);
								$useract->victoire($gain["coteparie"], $gain["sommeparie"]);
								$delete2 = "DELETE FROM pari WHERE id = :id";
								$params = array(
									'id' => $gain["id"]
								);
								$delete = $db->prepare($delete2);
								$delete->execute($params);	
							}
						}
						$sql = "DELETE FROM resultat WHERE dom = '".$equipe_dom."'";
						$sql2 = $db->prepare($sql);
						$sql2->execute();
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>