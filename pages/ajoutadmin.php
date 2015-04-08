<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
	</head>
	<body>
		<?php require_once '../includes/connexion_bdd.php'; 
			$sql2= "SELECT nom FROM equipe";
			$sql = $db->prepare($sql2);
			$sql->execute();
		?>
		<form method="POST" action="">
			<?php while ($team = $sql->fetch())
			{ ?>
			<input id="radioteamdom" type="radio" name="dom" value=<?php echo $team["nom"];?>/><?php echo $team["nom"];?>
			<input id="radioteamext" type="radio" name="ext" value=<?php echo $team["nom"];?>/><?php echo $team["nom"]; echo "blaaaa";?>
			<?php }?>
			<input type="double" name="cotedom" placeholder="cote domicile"/>
			<input type="double" name="cotenul" placeholder="cote nul"/>
			<input type="double" name="coteext" placeholder="cote exterieur"/>
			<input type="submit" name="valider"/>
		</form>
		<?php
			if(!empty($_POST["valider"]))
			{
				$sql2 = "INSERT INTO resultat(dom, ext, cotedom, cotenul, coteext) VALUES ('".$_POST["dom"]."', '".$_POST["ext"]."', '".$_POST["cotedom"]."', '".$_POST["cotenul"]."', '".$_POST["coteext"]."')";
				$sql = $db->prepare($sql2);
				$sql->execute();
			}
		?>
	</body>
</html>
			