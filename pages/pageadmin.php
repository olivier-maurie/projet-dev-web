<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
	</head>
	<body>
		<a href="ajoutadmin.php">Ajouter des matchs</a>
		<a href="listeuser.php">Liste des utilistauers</a>
		<?php
			require_once "../includes/connexion_bdd.php";
			require_once "../includes/autoload.inc.php";
			
			$sql = "SELECT id, dom, ext, butdom, butext, cotedom, cotenul, coteext FROM resultat";
			$sql = $db->prepare($sql);
			$sql->execute();
			
			while ($resultat2 = $sql->fetch())
			{
				$nul = "nul";
				?>
				<div class="row">
					<div class="col-lg-6 col- col-lg-offset-3">
						<div class="row">
							<div class="row">
								<div class="col-lg-8">
									<h3><?php echo $resultat2['dom']; ?>  -  <?php echo $resultat2['ext'];?> </h3>
								</div>
							
							<form method="POST" action="" class="parie">
								<div class="col-lg-4">
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
							
										<input type="submit" class="btn btn-default" name="envoyer" value="VALIDER!">
									
							</form>
							
							
						</div>
					</div>
				</div>

			<?php
			}
			?>
			
			<?php
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
						echo "bite";
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
	</body>
</html>