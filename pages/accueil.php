<?php include('../includes/connexion_bdd.php');
require_once "../includes/autoload.inc.php"; 
session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet foot | Connexion, inscription</title>
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
?>

	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 box-pari">
		<h3><?php echo $resultat2['dom']; ?>  -  <?php echo $resultat2['ext'];?> </h3>
		<form method="POST" action="" class="parie">
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

				<input type="number" class="form-control" min="1" max="50" name="sommepari" placeholder="(uniquement entre 1 et 50)">
				<input type="submit" class="btn btn-default" name="envoyer" value="PARIEZ !">
				<input type="number" name="id_paris" class="hidden-parie" value="<?php echo $resultat2["id"]; ?>"/>
		</form>
	</div>

<?php
}
/* condition de pari */
if(!empty($_POST["envoyer"]))
{
	{
	$id_pari = $_POST["id_paris"];
	$user = $_SESSION["user"];
	$somme = $_POST['sommepari'];
	$coolote = $_POST["cote"];
	$cote  = json_decode($coolote);
	$coteparie= $cote[1];
	$equipepari = $cote[0];
	if ($somme > 0)
	{
		if ($somme <51)
		{
			if($user->getPoint()-$somme >= 0)
			{
				$user->ajouteraupari($id_pari, $somme, $coteparie, $equipepari);
				$user->parier($somme);
				header('location : mesparis.php');
			}
			else
			{
				echo "<script>alert(\"Vous n'avez pas assez de points pour parier autant, attendez la semaine prochaine.\")</script>";
			}
		}
		else
		{
			echo "<script>alert(\"Vous ne pouvez pas parier plus de 50 points\")</script>";
		}
	}
	else
	{
		echo "<script>alert(\"Vous devez entrer un nombre\")</script>";
	}
}
}

/*
SELECT r.id, r.dom, r.ext, r.butdom, r.butext, r.cotedom, r.cotenul, r.coteext FROM resultat r JOIN pari p ON r.dom = p.dom AND r.ext = p.ext 
WHERE p.id_user != 6
*/

?>
	</div>
</div>

<!-- FOOTER -->
<?php include("../includes/footer.php"); ?>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
