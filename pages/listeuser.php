<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php
			include( "../includes/connexion_bdd.php");
			$sql2 = "SELECT id, nom, prenom, password, pseudo, points, admin FROM user";
			$sql = $db->prepare($sql2);
			$sql->execute();
			echo "<form method='post'>";
			while ($liste = $sql->fetch())
			{
				echo " nom : ". $liste["nom"].", prenom : ".$liste["prenom"].", pseudo : ".$liste["pseudo"].", points : ".$liste["points"];
				echo "<input type='submit' name='envoyer' value='envoyer'/>";
				echo "<input type='hidden' name='name' value='".$liste["points"]."'";
				echo "</br>";
			}
			echo "</form>";
			echo $_POST['name'];
			
		?>
	</body>
</html>