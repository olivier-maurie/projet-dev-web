<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php require_once '../includes/connexion_bdd.php'; ?>
		<form method="POST" action="">
			<input type="text" name="dom" placeholder="domicile"/>
			<input type="text" name="ext" placeholder="exterieur"/>
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
			