<?php
include('../includes/connexion_bdd.php');
require_once('../includes/autoload.inc.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultat Ligue 1 | Accueil</title>
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

<!-- HEADER -->
	<?php include("../includes/header.php"); ?>

<!-- LAYOUT -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
			<?php
			/* Affichage des box de pari pour chaque match */
			$user = $_SESSION["user_id"];
			$sql = "SELECT id, dom, ext, butdom, butext, cotedom, cotenul, coteext FROM resultat";
			$sql = $db->prepare($sql);
			$sql->execute();
			while ($resultat2 = $sql->fetch())
			{$nul = "nul";
			$logodomsql = "SELECT logo FROM equipe WHERE nom = '".$resultat2["dom"]."'";
			$logodomexe = $db->prepare($logodomsql);
			$logodomexe->execute();
			$logodom = $logodomexe->fetch();
			$logoextsql = "SELECT logo FROM equipe WHERE nom = '".$resultat2["ext"]."'";
			$logoextexe = $db->prepare($logoextsql);
			$logoextexe->execute();
			$logoext = $logoextexe->fetch();
			?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 box-match">
				<div class="row text-center">
					<h3>
						<img src="..<?php echo $logodom["logo"];?>" alt="image <?php echo $logodom["logo"];?>" />
						<?php echo $resultat2['dom']; ?>  -  <?php echo $resultat2['ext'];?>
						<img src="..<?php echo $logoext["logo"];?>" alt="image <?php echo $logoext["logo"];?>"/>
					</h3>
				</div>
				<div class="row"> 
					<form method="POST" action="" class="parie">
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 col-xs-offset-1">
							<ul>
								<li>
									<span class="equipe"><?php echo substr($resultat2['dom'], 0, 3); ?></span>
									<span><input type="radio" name="cote" value=<?php echo json_encode(array($resultat2['dom'], $resultat2["cotedom"]));?>></span>
									<span><?php echo $resultat2["cotedom"];?></span>
									<?php $dom = $resultat2["cotedom"];?>
								</li>
								<li>
									<span class="equipe">Nul</span>
									<span><input type="radio" name="cote" value=<?php echo json_encode(array($nul, $resultat2["cotenul"]))?> checked/></span>
									<span><?php echo $resultat2["cotenul"];?></span>
									<?php $nul = $resultat2["cotenul"];?>
								</li>
								<li>
									<span class="equipe"><?php echo substr($resultat2['ext'], 0, 3); ?></span>
									<span><input type="radio" name="cote" value=<?php echo json_encode(array($resultat2['ext'], $resultat2["coteext"])) ?>></span>
									<span><?php echo $resultat2["coteext"];?></span>
									<?php $ext=$resultat2["coteext"];?>
								</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-5 col-xs-5">
							<input type="number" class="form-control valeur-parie" min="1" max="50" name="sommepari" placeholder="(de 1 à 50 points)">
						</div>
						<div class="col-xs-1">
							<input type="submit" class="btn btn-default btn-parie btn-primary" name="envoyer" value="PARIEZ !">
						</div>
						<input type="number" name="id_paris" class="hidden" value="<?php echo $resultat2["id"]; ?>"/>
					</form>
				</div>
			</div>

			<?php
			}
			/* condition de pari */
			if(!empty($_POST["envoyer"])) {
				$id_pari = $_POST["id_paris"];
				$user = $_SESSION["user"];
				$somme = $_POST['sommepari'];
				$coolote = $_POST["cote"];
				$cote  = json_decode($coolote);
				$coteparie= $cote[1];
				$equipepari = $cote[0];
				if ($somme > 0) {
					if ($somme <51)	{
						if($user->getPoint()-$somme >= 0) {
							$user->ajouteraupari($id_pari, $somme, $coteparie, $equipepari);
							$user->parier($somme);
						} else {
							echo "<script>alert(\"Vous n'avez pas assez de points pour parier autant, attendez la semaine prochaine.\")</script>";
						}
					} else {
						echo "<script>alert(\"Vous ne pouvez pas parier plus de 50 points\")</script>";
					}
				} else {
					echo "<script>alert(\"Vous devez entrer un nombre\")</script>";
				}
			}
			?>
		</div>
	</div>
</div>

<!-- FOOTER -->
<?php include("../includes/footer.php"); ?>

</body>
</html>