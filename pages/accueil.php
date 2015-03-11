<?php include("../includes/connexion_bdd.php");
require_once "../includes/autoload.inc.php";?>
<html>
<head>
	<title>En Direct du Stade</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../styles/moncss.css"/>
</head>
<body>
<!-- HEADER -->
<?php include("../includes/header.php"); ?>

<!-- LAYOUT -->
<div class="layout">
	<?php 
		session_start();
		$sql = $db->prepare("SELECT dom, ext, butdom, butext, cotedom, cotenul, coteext FROM resultat");
		$sql->execute();
		
		while ($resultat2 = $sql->fetch())
		{
			echo "	<div class=\"match\">
					<h3>".$resultat2['dom'].' '.$resultat2['butdom'].' - '.$resultat2['butext'].' '.$resultat2['ext']. "</h3>" ;
		?>
			<form method="POST" action="" class="parie">
				<label class="cotes">
					<p><?php echo substr($resultat2['dom'], 0, 3); ?></p>
					<input type="radio" name="cote" value="cotevic"> <span class="cotes-number"><?php echo $resultat2["cotedom"];?></span>
				</label>
				<label class="cotes">
					<p>Nul</p>
					<input type="radio" name="cote" value="cotenul" checked> <span class="cotes-number"><?php echo $resultat2["cotenul"];?></span>
				</label>
				<label class="cotes">
					<p><?php echo substr($resultat2['ext'], 0, 3); ?></p>
					<input type="radio" name="cote" value="cotedef"> <span class="cotes-number"><?php echo $resultat2["coteext"];?></span>
				</label>
				<label class="box-points-mise">Points misés<input type="number" min="1" max="50" name="sommepari" placeholder="(uniquement entre 1 et 50)">
				<input type="submit" name="envoyer" value="PARIER !">
				</label>
			</form>
			<div class="clear"></div>
		</div>
		<?php
		}
	?>
</div>

<!-- FOOTER -->
<?php include("../includes/footer.php"); ?>
<?php 
if(!empty($_POST["envoyer"]))
{
	$user = $_SESSION["user"];
	$cote = $_POST['cote'];
	$somme = $_POST['sommepari'];
	if ($somme > 0)
	{
		if ($somme <51)
		{
			if($user->getPoint()-$somme >= 0)
			{
				$user->parier($somme);
			}
			else
			{
				echo "Vous n'avez pas assez de points pour parier autant, attendez la semaine prochaine.";
			}
		}
		else
		{
			echo "Vous ne pouvez pas parier plus de 50 points";
		}
	}
	else
	{
		echo "Vous devez entrer un nombre";
	}
}
?>

</body>
</html>